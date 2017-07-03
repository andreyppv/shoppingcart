<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CartItem;
use App\Models\TaxZone;

class Cart extends Model
{
    protected $table = 'carts';  
    
    public $taxPrice = 0;
    public $shippingPrice = 0;
    public $hasCoupon = false;
    public $couponDiscountPercent = 0;
    
    protected static function boot() {
        parent::boot();

        static::deleting(function($order) { // before delete() method call this
             $order->items()->delete();
             $order->options()->delete();
             $order->files()->delete();
        });
    }
    
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
    
    public function items()
    {
        return $this->hasMany('App\Models\CartItem', 'cart_id');
    }
    
    public function files()
    {
        return $this->hasMany('App\Models\CartItemFile', 'cart_id');
    }
    
    public function options()
    {
        return $this->hasMany('App\Models\CartItemOption', 'cart_id');
    }
    
    public function subTotalPrice()
    {
        $result = 0;
        
        foreach($this->items as $item)
        {
            $result += $item->item_price;
        }
        
        return $result;
    }
    
    public function discountPrice() 
    {
        return $this->subTotalPrice() * $this->couponDiscountPercent / 100;        
    }
    
    public function totalPrice()
    {
        return $this->subTotalPrice() + $this->taxPrice + $this->shippingPrice - $this->discountPrice();
    }

    public function totalWeight()
    {
        $result = 0;
        
        foreach($this->items as $item)
        {
            $result += $item->weight;
        }
        
        return $result;    
    }
    
    public function isShippingRequired()
    {
        foreach($this->items as $item)
        {
            if($item->product_type != PRODUCT_DESIGN) return true;
        }    
        
        return false;
    }
    
    /**
    * check if pending order can be completed manually
    * 
    */
    public function payloadData()
    {
        if($this->payload == '') return false;
        
        $payloads = unserialize($this->payload);
        if(!is_array($payloads)) return false;       
        if(!isset($payloads['shippingAddress'])
            || !isset($payloads['billingAddress'])
            //|| !isset($payloads['shippingMethod'])
            || !isset($payloads['paymentMethod']))
        {   
            return false;
        }
                
        return $payloads;
    }
    
    public function calculateTaxAndDiscountFromPayload()
    {
        $orderInfo = $this->payloadData();
        if($orderInfo === false) return;
        
        $shippingAddress = $orderInfo['shippingAddress'];      
        $shippingMethod  = isset($orderInfo['shippingMethod']) ? $orderInfo['shippingMethod'] : false;
        $coupon = isset($orderInfo['coupon']) ? $orderInfo['coupon'] : false;
        
        //calc tax 
        if($this->isShippingRequired())
        {
            $this->shippingPrice = $shippingMethod->amount;    
        }
         
        if($shippingAddress['country_code'] == 'CA')
        {
            $taxRate = TaxZone::getTaxRate($shippingAddress['country'], $shippingAddress['state']) / 100;
            
            $totalPrintPrice = 0;
            $totalDesignPrice = 0;
            $designTaxRate = 5; //percent
            foreach($this->items as $item)
            {
                if($item->product_type == PRODUCT_DESIGN) $totalDesignPrice += $item->item_price;
                else $totalPrintPrice += $item->item_price;
            }
            $this->taxPrice = number_format(($totalPrintPrice + $this->shippingPrice) * $taxRate + $totalDesignPrice * $designTaxRate / 100, 2);         
        }    
        
        //calc discount
        if($coupon != false)
        {
            $this->hasCoupon = true;
            $this->couponDiscountPercent = $coupon['percent'];
        }
    }
}
