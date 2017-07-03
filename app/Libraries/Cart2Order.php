<?php

namespace App\Libraries;

use App\Models\TempFile;
use App\Models\Cart;
use App\Models\Coupon;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemOption;
use App\Models\OrderItemFile;
use App\Models\OrderItemDesignInfo;
             
class Cart2Order
{
    private $_cart = null;
    private $_orderInfo = null;
    
    public function __construct($cartId = NULL)
    {
        $this->_cart = Cart::find($cartId);
    }  
    
    public function canPush()
    {
        if(!isset($this->_cart->id)) return false;
        if(!($this->_orderInfo = $this->_cart->payloadData())) return false;
        
        $this->_cart->calculateTaxAndDiscountFromPayload();
                
        return true;
    }
    
    public function push($subtotalPrice, $shippingPrice = 0, $taxPrice = 0, $discountPrice = 0)
    {
        $billingAddress  = $this->_orderInfo['billingAddress'];
        $shippingAddress = $this->_orderInfo['shippingAddress'];        
        $paymentMethod   = $this->_orderInfo['paymentMethod'];
        $currency   = isset($this->_orderInfo['currency']) ? $this->_orderInfo['currency'] : 'USD';
        $coupon     = isset($this->_orderInfo['coupon']) ? $this->_orderInfo['coupon'] : false;
        
        $order = $this->_createOrder($subtotalPrice, $shippingPrice, $taxPrice, $discountPrice);         
        if($order)
        {
            //save items
            foreach($this->_cart->items as $item)
            {
                $orderItem = $this->_createOrderItem($order, $item);
                if($orderItem)
                {
                    //save item options
                    foreach($item->options as $option)
                    {
                        $orderItemOption = new OrderItemOption;
                        $orderItemOption->order_id  = $order->id;
                        $orderItemOption->item_id   = $orderItem->id;
                        $orderItemOption->feature_id= $option->feature_id;
                        $orderItemOption->feature_name  = $option->feature_name;
                        $orderItemOption->feature_type  = $option->feature_type;
                        $orderItemOption->feature_sort  = $option->feature_sort;
                        $orderItemOption->side_type     = $option->side_type;
                        $orderItemOption->option_id     = $option->option_id;
                        $orderItemOption->option_name   = $option->option_name;
                        $orderItemOption->option_sort   = $option->option_sort;
                        $orderItemOption->option_price  = $option->option_price * $this->_cart->currency_rate;
                        $orderItemOption->save();
                    }
                    
                    //save item files
                    foreach($item->files as $file)
                    {
                        $orderItemFile = new OrderItemFile;
                        $orderItemFile->order_id = $order->id;
                        $orderItemFile->item_id  = $orderItem->id;
                        $orderItemFile->name     = $file->name;
                        $orderItemFile->path     = $file->path;
                        $orderItemFile->size     = $file->size;
                        $orderItemFile->target   = $file->target;
                        $orderItemFile->created_at = $file->created_at;
                        $orderItemFile->save();
                    }
                    
                    //save design info if exist
                    if($designInfo = $item->designInfo())
                    {
                        $orderDesignInfo = new OrderItemDesignInfo;
                        $orderDesignInfo->order_id      = $order->id;
                        $orderDesignInfo->item_id       = $orderItem->id;
                        $orderDesignInfo->logo_require  = $designInfo->logo_require;
                        $orderDesignInfo->logo_email    = $designInfo->logo_email;
                        $orderDesignInfo->logo_business = $designInfo->logo_business;
                        $orderDesignInfo->logo_industry = $designInfo->logo_industry;
                        $orderDesignInfo->logo_audience = $designInfo->logo_audience;
                        $orderDesignInfo->logo_samples  = $designInfo->logo_samples;
                        $orderDesignInfo->card_email    = $designInfo->card_email;
                        $orderDesignInfo->card_business = $designInfo->card_business;
                        $orderDesignInfo->card_information = $designInfo->card_information;
                        $orderDesignInfo->card_type_id  = $designInfo->card_type_id;
                        $orderDesignInfo->card_type_name= $designInfo->card_type_name;
                        $orderDesignInfo->save();
                    }
                }
                else
                {
                    Order::destroy($order->id);
                    
                    return false;
                }
            }
        }
        else
        {
            Order::destroy($order->id);
            
            return false;
        }
        
        //if coupon is applied, then increase coupou's used_time
        if($coupon != false)
        {
            $couponRow = Coupon::find($coupon['id']);
            if(isset($couponRow->id)) 
            {
                $couponRow->used_time++;
                $couponRow->save();
            }
        }
        
        //remove current cart
        Cart::destroy($this->_cart->id);   
        
        ///////////////////////////////////////////////////////////////////////
        //FINAL
        //save shipping addressa and billing address
        if(isset($shippingAddress['save_address']))
        {
            $this->_cart->customer->saveShippingAddress(
                $shippingAddress['first_name'],
                $shippingAddress['last_name'],
                $shippingAddress['phone'],
                $shippingAddress['address'],
                $shippingAddress['city'],
                $shippingAddress['country'],
                $shippingAddress['state'],
                $shippingAddress['zipcode'],
                ''
            );    
        }
        if(isset($billingAddress['save_address']))
        {
            $this->_cart->customer->saveShippingAddress(
                $billingAddress['first_name'],
                $billingAddress['last_name'],
                $billingAddress['phone'],
                $billingAddress['address'],
                $billingAddress['city'],
                $billingAddress['country'],
                $billingAddress['state'],
                $billingAddress['zipcode'],
                ''
            );    
        }
        
        return $order->id;       
    }
    
    private function _createOrder($subtotalPrice, $shippingPrice, $taxPrice, $discountPrice)
    {
        $billingAddress  = $this->_orderInfo['billingAddress'];
        $shippingAddress = $this->_orderInfo['shippingAddress'];        
        $paymentMethod   = $this->_orderInfo['paymentMethod'];
        $currency        = isset($this->_orderInfo['currency']) ? $this->_orderInfo['currency'] : 'USD';
        
        //create new order 
        $order = new Order;
        $order->number = Order::newNumber();
        
        $order->billing_name    = $billingAddress['first_name'] . ' ' . $billingAddress['last_name'];
        //$order->billing_email   = $billingAddress['email'];
        $order->billing_address = $billingAddress['address'];
        $order->billing_city    = $billingAddress['city'];
        $order->billing_country = $billingAddress['country_name'];
        $order->billing_state   = $billingAddress['state_name'];
        $order->billing_zipcode = $billingAddress['zipcode'];
        $order->billing_phone   = $billingAddress['phone'];
        
        $order->shipping_name    = $shippingAddress['first_name'] . ' ' . $shippingAddress['last_name'];
        //$order->shipping_email   = $shippingAddress['email'];
        $order->shipping_address = $shippingAddress['address'];
        $order->shipping_city    = $shippingAddress['city'];
        $order->shipping_country = $shippingAddress['country_name'];
        $order->shipping_state   = $shippingAddress['state_name'];
        $order->shipping_zipcode = $shippingAddress['zipcode'];
        $order->shipping_phone   = $shippingAddress['phone'];
        $order->shipping_note    = $shippingAddress['note'];
        
        $order->currency         = $currency;
        $order->currency_rate    = $this->_cart->currency_rate;
        //$order->sub_total_price  = $cart->subTotalPrice() * $cart->currency_rate;
        $order->sub_total_price  = $subtotalPrice;
        
        //$order->transaction_id  = $transactionId;
        //$order->payer_id        = $payerId;
        $order->status          = ORDER_NEW;
        
        //calculate shipping
        if($this->_cart->isShippingRequired() == true)
        {
            $shippingMethod  = $this->_orderInfo['shippingMethod'];
        
            $order->shipping_method = $shippingMethod->serviceType;
            //$order->shipping_price  = $shippingMethod->amount * $cart->currency_rate;
            $order->shipping_price  = $shippingPrice;
        }
        else
        {
            $order->shipping_price  = 0;
        }
        
        //calculate tax
        //$order->tax_price       = $cart->taxPrice * $cart->currency_rate;
        $order->tax_price       = $taxPrice;
        //$order->discount_price  = $cart->discountPrice();
        $order->discount_price  = $discountPrice;
        
        $totalPrice = $order->sub_total_price + $order->shipping_price + $order->tax_price - $order->discount_price;
        $order->total_price     = $totalPrice < 0 ? 0 : $totalPrice;
        $order->payment_method  = $paymentMethod->code;
        
        $order->customer_id     = $this->_cart->customer_id;
        $order->customer_name   = $this->_cart->customer->full_name();
        $order->customer_email  = $this->_cart->customer->email;    
        
        if(!$order->save()) return false;
        
        return $order; 
    }
    
    private function _createOrderItem($order, $item)
    {
        $orderItem = new OrderItem;
        $orderItem->order_id    = $order->id;
        $orderItem->product_type= $item->product_type;
        $orderItem->product_id  = $item->product_id;
        $orderItem->name        = $item->product_name;
        $orderItem->description = $item->product_description;
        $orderItem->turnaround_time = $item->product_turnaround_time;
        $orderItem->image       = $item->product_image;
        $orderItem->unit_price  = $item->unit_price * $this->_cart->currency_rate;
        $orderItem->qty         = $item->product_quantity;
        $orderItem->sets        = $item->sets;
        $orderItem->price       = $item->item_price * $this->_cart->currency_rate;
        $orderItem->discount_percent= $item->discount_percent;
        $orderItem->custom_sets = $item->custom_sets;
        $orderItem->template_uid    = $item->template_uid;
        $orderItem->template_front  = $item->template_front;
        $orderItem->template_back   = $item->template_back;
        $orderItem->reference_order_id = $item->reference_order_id;
        $orderItem->job_number      = OrderItem::newJobNumber(); 
        $orderItem->job_updated     = $order->created_at;
        
        if(!$orderItem->save()) return false;
        
        return $orderItem;
    }
}