<?php
    $orderInfo = $cart->payloadData();
    $billingAddress  = $orderInfo['billingAddress'];
    $shippingAddress = $orderInfo['shippingAddress'];        
    $paymentMethod   = $orderInfo['paymentMethod'];
    $shippingMethod  = isset($orderInfo['shippingMethod']) ? $orderInfo['shippingMethod'] : false;
    $coupon     = isset($orderInfo['coupon']) ? $orderInfo['coupon'] : false;
    $currency   = isset($orderInfo['currency']) ? $orderInfo['currency'] : 'USD';
?>

@extends('admin.layouts.default')

@section('content')

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">Cart Details</h1>
        </div>
        
        <div class="col-sm-5 text-right">
            <a href="{{ my_route($list_route) }}" class="btn btn-default">Back</a>
        </div>
    </div>  
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">

    <!-- My Block -->
    <div class="block">
        <div class="block-content">

            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="shipping-titl">Customer</div>
                    <div class="shipping-details">{{ $cart->customer->full_name() }}</div>
                    <div class=""><a href="mailto:{{ $cart->customer->email }}">{{ $cart->customer->email }}</a></div>
                </div>
                
                @if($cart->isShippingRequired())    
                    <div class="col-md-3 col-sm-3">
                        <div class="shipping-titl">Bill to</div>
                        
                        <div class="shipping-details">{{ $billingAddress['first_name'] }} {{ $billingAddress['last_name'] }}</div>
                        <ul>
                            <li>{{ $billingAddress['address'] }}</li>
                            <li>{{ $billingAddress['city'] }}, {{ $billingAddress['state_name'] }} {{ $billingAddress['zipcode'] }}</li>
                            <li>{{ $billingAddress['country_name'] }}</li>
                            <li>{{ $billingAddress['phone'] }}</li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="shipping-titl">Ship to</div>
                        
                        <div class="shipping-details">{{ $shippingAddress['first_name'] }} {{ $shippingAddress['last_name'] }}</div>
                        <ul>
                            <li>{{ $shippingAddress['address'] }}</li>
                            <li>{{ $shippingAddress['city'] }}, {{ $shippingAddress['state_name'] }} {{ $shippingAddress['zipcode'] }}</li>
                            <li>{{ $shippingAddress['country_name'] }}</li>
                            <li>{{ $shippingAddress['phone'] }}</li>
                        </ul>
                    </div>
                @else
                    <div class="col-md-3 col-sm-3">
                        <div class="shipping-titl">Address</div>
                        
                        <div class="shipping-details">{{ $shippingAddress['first_name'] }} {{ $shippingAddress['last_name'] }}</div>
                        <ul>
                            <li>{{ $shippingAddress['address'] }}</li>
                            <li>{{ $shippingAddress['city'] }}, {{ $shippingAddress['state_name'] }} {{ $shippingAddress['zipcode'] }}</li>
                            <li>{{ $shippingAddress['country_name'] }}</li>
                            <li>{{ $shippingAddress['phone'] }}</li>
                        </ul>
                    </div>
                @endif
                    
                <div class="col-md-3 col-sm-4 shipping-method-wrap text-right">
                    @if($shippingMethod)
                    <div class="shipping-titl">Shipping Method</div>
                    <div class="shipping-details">
                        {{ $shippingMethod->serviceName }}
                    </div>
                    @endif
                    
                    <div class="shipping-titl">Payment method</div>
                    <div class="shipping-details">
                        {{ $paymentMethod->name }}
                    </div>
                </div>
            </div>
            
            @if(isset($shippingAddress['note']) && $shippingAddress['note'] != '')
            <div class="row">
                <div class="col-md-12">
                    <div class="shipping-titl">Note:</div>
                    {!! the_content($shippingAddress['note']) !!}
                </div>
            </div>
            @endif        
            
            <div class="row">
                <div class="col-md-12 col-sm-12 tables-wrap">
                    <table class="table order-information">
                        <colgroup>
                            <col width="110"/>
                            <col width="250"/>
                            <col width=""/>
                            <col width="80"/>
                            <col width="120"/>
                            <col width="120"/>
                        </colgroup>
                        <tbody>
                            <tr class="order-information-titl">
                                <th class="item-column" colspan="2">Item</th>
                                <th class="descript-column">Description</th>
                                <th class="qty-column text-center">Quantity</th>
                                <th class="rate-column text-center">Rate</th>
                                <th class="total-column text-center">Total ({{ $currency }})</th>
                            </tr>
                            
                            @foreach($cart->items as $item)
                            <tr>
                                <td class="item-column">
                                    <img src="{{ resize_image( $item->product_image, 100, 65, 'crop' ) }}" alt="{{ $item->name }}"/>
                                </td>
                                <td class="item-column">
                                    {{ $item->product_name }}
                                </td>
                                <td class="descript-column">
                                    <ul>
                                        @if($item->template_uid)
                                        <li>Template ID: {{ $item->template_uid }}</li>
                                        @endif
                                        
                                        @if($item->product_type != PRODUCT_DESIGN)
                                        <li>Quantity: 
                                            @if($item->hasCustomSets())
                                                {{ $item->qty }} cards total for various names<br/>
                                                
                                                @foreach($item->customSets() as $r)
                                                &nbsp;&nbsp;{{ $r['name'] }} : {{ $r['quantity'] }}<br/>
                                                @endforeach
                                            @else
                                                {{ $item->product_quantity }} cards
                                            @endif
                                        </li>
                                        <li>Set: {{ $item->sets }}</li>
                                        @endif
                                        
                                        @foreach($item->features() as $ft)
                                        <li>
                                            {{ $ft->feature_name }}: 
                                            
                                            <?php $options = $item->featureOptions($ft->feature_id); ?>
                                            @foreach($options as $opt)
                                                {{ $opt->option_name }}
                                                <?php 
                                                if($opt->side_type == FRONTSIDE) echo "(Front)"; 
                                                else if($opt->side_type == BACKSIDE) echo "(Back)";
                                                ?>
                                            @endforeach
                                        </li>
                                        @endforeach
                                        
                                        @if($item->product_type == PRODUCT_TEMPLATE)
                                        <!--<li>
                                            Front Side Content: {{ $item->template_front }}
                                        </li>
                                        <li>
                                            Back Side Content: {{ $item->template_back }}
                                        </li>-->
                                        @elseif($item->product_type == PRODUCT_DESIGN)
                                        <li>
                                            {!! the_content($item->description) !!}
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                                <!--<td class="qty-column">{{ $item->product_quantity * $item->sets  }}</td>-->
                                <td class="qty-column text-center">
                                    @if($item->product_type != PRODUCT_DESIGN)
                                        {{ $item->product_quantity * $item->sets }}
                                    @endif
                                </td>
                                <td class="rate-column text-center">
                                    @if($item->product_type != PRODUCT_DESIGN)
                                        {{ format_currency($item->unit_price, $currency) }}
                                    @endif
                                </td>
                                <td class="total-column text-center">{{ format_currency($item->item_price, $currency) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>  
                    
                    {!! Form::open(array('url' => route('admin.sales.cart.complete', $cart->id), 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'cart-form')) !!}            
                    <table class="order-information-total table-borderless table" align="right" style="width: 230px;">
                        <colgroup>
                            <col width="90"/>
                            <col width=""/>
                        </colgroup>
                        <tbody>
                            <tr class="sub-total-row">
                                <td class="order-information-titl text-middle">Sub Total</td>
                                <td class="text-right">$ <input type="text" name="subtotal-price" class="currency-text form-control" value="{{ currency_convert($cart->subTotalPrice(), $currency) }}"/></td>
                            </tr>

                            @if($shippingMethod)
                            <tr class="sub-total-row">
                                <td class="order-information-titl text-middle">SHIPPING</td>
                                <td class="text-right">$ <input type="text" name="shipping-price" class="currency-text form-control" value="{{ currency_convert($shippingMethod->amount, $currency) }}"/></td>
                            </tr>
                            @endif
                            
                            @if($cart->taxPrice > 0)
                            <tr class="sub-total-row">
                                <td class="order-information-titl text-middle">TAX</td>
                                <td class="text-right">$ <input type="text" name="tax-price" class="currency-text form-control" value="{{ currency_convert($cart->taxPrice, $currency) }}"/></td>
                            </tr>
                            @endif
                            
                            @if($cart->discountPrice() > 0)
                            <tr class="sub-total-row">
                                <td class="order-information-titl text-middle">Discount:</td>
                                <td class="text-right"> -$ <input type="text" name="discount-price" class="currency-text form-control discount" value="{{ currency_convert($cart->discountPrice(), $currency) }}"/></td>
                            </tr>
                            @endif
                            
                            <tr class="total-row">
                                <td class="order-information-titl text-middle">TOTAL</td>
                                <td class="text-right">$ <span id="total-price">{{ currency_convert($cart->totalPrice(), $currency) }}</span></td>
                            </tr>
                            
                            <tr class="total-row">
                                <td colspan="2" class="text-right"><button type="button" class="btn btn-success btn-complete">Complete</button></td>
                            </tr>
                        </tbody>
                    </table> 
                    {!! Form::close() !!}    
                </div>
            </div>
            
        </div>
    </div>
    <!-- END My Block -->
    
</div>

@stop

@section('additional')
@stop

@section('styles')
<style>
ul {list-style: none; padding-left:0;}
.shipping-titl {font-weight: bold; font-size: 110%;}
.order-information-titl {font-weight: bold;}
.currency-text {width: 85%; display: inherit;}
</style>
@stop

@section('scripts')
<script src="{{ asset('admins/js/pages/sales_cart.js') }}"></script>
@stop