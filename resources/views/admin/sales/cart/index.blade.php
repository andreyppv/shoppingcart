@extends('admin.layouts.default')

@section('content')

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">Cart ( Pending )</h1>
        </div>
        
        <!--<div class="col-sm-5 text-right">
            <a class="btn btn-primary" href='{{ URL::route("admin.sales.order.create") }}'>Create Order</a>    
        </div>-->
    </div>  
    
    @if($current_user->isAdmin())
    <!--<div class="row">
        <div class="alert alert-warning alert-dismissable">
            <p><b>Be carefully! Deleting items may cause a problem on frontend for customers.</b></p>
        </div>
    </div>
    <div class="row">
        <div class="alert alert-warning alert-dismissable">
            <p><b>There may be a problem in red bordered orders. Please check if they are paid on your paypal account. If it's paid, you can complete it manually.</b></p>
        </div>
    </div>-->
    @endif
    
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <?php 
    $base_index = ($carts->currentPage() - 1) * $carts->count();
    $i = 0;
    ?>
    <?php 
    foreach($carts as $cart) { 
        $i++; 
        //$orderInfo  = $cart->payloadData(); 
        $currency   = isset($orderInfo['currency']) ? $orderInfo['currency'] : 'USD';
        //$cart->calculateTaxAndDiscountFromPayload();
    ?>       
    <div class="block <?php //echo $orderInfo ? 'block-warning' : ''; ?>">   
        <div class="order-item block-content">
        
            <table class="table table-borderless table-order">
            <colgroup>
                <col width="60"/>
                <col width=""/>
                <col width="100"/>
                <col width="160"/>
                <col width="120"/>
                
                @if($current_user->isAdmin())
                <!--<col width="50"/>-->
                @endif
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="2" class="text-middle">
                        <b>Customer:</b><br/>
                        {{ $cart->customer->full_name() }}<br/>
                        <a href="mailto:{{ $cart->customer->email }}">{{ $cart->customer->email }}</a>
                    </td>
                    <td class="text-middle"></td>
                    <td colspan="" class="text-bottom text-right">
                        <small class="text-top" style="font-size:15px; line-height:30px;">$</small>
                        <span class="text-top" style="font-size:25px;">{{ currency_convert($cart->subTotalPrice(), $currency) }}</span>
                        <label class="text-success text-bottom">{{ $currency }}</label>
                    </td>
                    
                    @if($current_user->isAdmin())
                    <!--<td class="text-bottom text-right" colspan="2">
                        @if($cart->payloadData())
                        <a href="{{ route('admin.sales.cart.detail', $cart->id) }}" class="btn btn-sm btn-warning">View Details</a>
                        @endif
                    </td>-->
                    @endif
                </tr>
                
                @foreach($cart->items as $cartItem)
                    <tr class="order-item-row">
                        <td class="text-middle"><img src="{{ resize_image( $cartItem->product_image, 50, 50, 'fit-x' ) }}" alt=""></td>
                        <td class="text-middle"><a href='{{ URL::route("admin.sales.cart.item", $cartItem->id) }}'>{{ $cartItem->product_name }}</a></td>
                        <td class="text-middle">
                            @if($cartItem->product_type != PRODUCT_DESIGN)
                            {{ $cartItem->product_quantity }} cards
                            @endif
                        </td>
                        <td class="text-middle text-right">{{ format_currency($cartItem->item_price, $currency) }}</td>
                        <td class="text-middle">{{ date('Y-m-d H', strtotime($cartItem->created_at)) }}</td>
                        
                        @if($current_user->isAdmin())
                        <!--<td class="text-middle">
                            <button data-href="{{ route('admin.sales.cart.item.delete', $cartItem->id) }}" type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-times"></i></button>
                        </td>-->
                        @endif
                    </tr>
                @endforeach
            </tbody>
            </table>
            
        </div>
    </div>
    <?php } ?>

    @if($carts->isEmpty())
    <div class="block">   
        <div class="block-content">
            <p>There is no cart.</p>
        </div>
    </div>
    @endif
    <!-- END My Block -->
    
    <div class="block"><div class="block-content"><div class="row" style="padding-bottom:15px;">
        <div class="col-sm-6">
            @if($carts->total() > 0) 
            <div class="dataTables_info" id="data-table_info" role="status" aria-live="polite">
                Showing <b>{{ $base_index + 1 }} to {{ $carts->currentPage() * $carts->count() }}</b> of <b>{{ $carts->total() }}</b> entries    
            </div>
            @endif
        </div>
        <div class="col-sm-6">
            <div class="dataTables_paginate paging_simple_numbers">
                {!! paginate_links($carts); !!}
            </div>    
        </div>
    </div></div></div>
</div>

@stop

@section('additional')
<script>
warningText = 'Be carefully! Deleting items may cause a problem on frontend for customers.';
</script>
@stop

@section('styles')
<link href="{{ asset('vendor/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
<style>
.block-warning {border:1px solid red;}
</style>
@stop

@section('scripts')
<script>ajaxUpdateItemUrl = '{{ route("admin.sales.order.assign.stuff") }}';</script>
<script src="{{ asset('admins/js/pages/sales_order.js') }}"></script>
@stop