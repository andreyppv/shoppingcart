@extends('frontend.layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 section-title">
            <h1>CONGRATULATIONS</h1>
            <h4>
                Your order has been placed successfully.<br/><br/> 
                Our sales team will review your order and notify you via email if there is any issue with the order. 
                Should you have any questions about your order, please email <span class="logged-as"><a href="mailto:supports@rockdesign.com">supports@rockdesign.com</a></span>
            </h4>
        </div>
    </div>
    <div class="row chekout-but-row">
        <div class="col-md-12">
            <div class="button-wrap">
                <a href="{{ url('/') }}"><div class="chekout-but lg-but">BACK TO HOMEPAGE</div></a>
            </div>
        </div>
    </div>
</div>

@stop

@section('styles')
@stop

@section('scripts')
@stop