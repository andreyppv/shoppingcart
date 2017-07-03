@extends('emails.template')
@section('content')

    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 0 0 10px 0;">
                <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; color: #757679; line-height: 42px; mso-line-height-rule:exactly;">Hi, {{ $orderItem->order->customer_name }}!</span>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Your business cards for order number <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #43a1e8; line-height: 25px; mso-line-height-rule:exactly;"><a style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; color:#43a1e8; text-decoration: none;" href="{{ route('customer.tracking.detail', array('id' => $orderItem->order->id)) }}">{{ $orderItem->order->number() }}</a></span> have been shipped via {{ $orderItem->jobTrackingMethodName() }}. 
                @if($orderItem->job_tracking_number != '')
                The tracking number for your order is: <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 15px; color: #43a1e8; line-height: 25px; mso-line-height-rule:exactly;"><a style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; color:#43a1e8; text-decoration: none;" href="{{ $orderItem->jobTrackingUrl() }}">{{ $orderItem->job_tracking_number }}</a></span>. 
                @endif
                If you have any questions regarding your order, please contact <a href="mailto:online@rockdesign.com" style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; color:#43a1e8; text-decoration: none;"><span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #43a1e8; line-height: 25px; mso-line-height-rule:exactly;">online@rockdesign.com</span></a></p>
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Have a great day!</p>
            </td>
        </tr>
        <tr>
            <td>
                <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Thank you for your business! <br />RockDesign Team</span>
            </td>
        </tr>
    </table>
@stop