<?php

namespace App\Http\Controllers\Admin\Sales;

use App\Http\Controllers\Core\AdminController;
use App\Libraries\Template;
use App\Libraries\Cart2Order;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use Input, URL;

class CartController extends AdminController {

    protected $menu = 'sales';
    protected $page = 'cart';
    protected $page_title = 'Cart (Pending)';
    
    protected $list_route = 'admin.sales.cart.list';    
    
    protected $list_limit = 10;
    public function __construct()
    {
        parent::__construct();
        
        $this->restrict_any(array('sales.order.manage', 'sales.order.view'));
    }
    
    ////////////////////////////////////////////////////////////////
    //Action Methods
    ////////////////////////////////////////////////////////////////
    
    /**
    * list all orders
    * 
    */
    public function index()
    {              
        $carts = Cart::where('customer_id', '!=', 0)
                ->orderBy('created_at', 'desc')
                ->paginate($this->list_limit); 
        
        return $this->view('sales.cart.index', compact('carts'));         
    }
    
    public function detail($cartId)
    {
        $cart = Cart::find($cartId); 
        if(!isset($cart->id) || !$cart->payloadData()) return response(view('admin.errors.404'), 404);
        
        //calculate tax
        $cart->calculateTaxAndDiscountFromPayload();
        
        return $this->view('sales.cart.detail', compact('cart'));         
    }
    
    public function complete($cartId)
    {
        $subtotalPrice  = Input::has('subtotal-price') ? Input::get('subtotal-price') : 0;
        $shippinglPrice = Input::has('shipping-price') ? Input::get('shipping-price') : 0;
        $taxPrice       = Input::has('tax-price') ? Input::get('tax-price') : 0;
        $discountPrice  = Input::has('discount-price') ? Input::get('discount-price') : 0;
        
        $handle = new Cart2Order($cartId);
        if($handle->canPush() && ($orderId = $handle->push($subtotalPrice, $shippinglPrice, $taxPrice, $discountPrice)))
        {
            //send order confirmation email to customer
            $order = Order::find($orderId);
            $data = array('order' => $order, 'settings' => $this->settings);
            
            $this->sendMail('emails.orderConfirmation', $order->customer_email, $order->customer_name, $data, 'RockDesign Online Order Dept.');
            
            Template::set_message($order->customer_name . '\'s order is completed manually.');
            
            force_redirect(my_route('admin.sales.cart.list'));
        }
        
        force_redirect(URL::previous());
    }
    
    public function item($itemId)
    {
        $item = CartItem::find($itemId);
        if(!isset($item->id)) return response(view('admin.errors.404'), 404);
        
        return $this->view('sales.cart.item', compact('item'));   
    }
    
    public function deleteItem($itemId)
    {
        //restrict by admin
        $this->restrictByRole(USER_ADMIN);
        
        $item = CartItem::find($itemId);
        CartItem::destroy($itemId);
        
        if($item->cart->items->count() == 0)
        {
            Cart::destroy($item->cart->id);
        }
        
        force_redirect(URL::previous());
    }
}