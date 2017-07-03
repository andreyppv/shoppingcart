@extends('emails.template')
@section('content')
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 0 0 10px 0;">
                <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; color: #757679; line-height: 42px; mso-line-height-rule:exactly;">Hi, {{ $item->order->customer_name }}!</span>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">For your order: <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #43a1e8; line-height: 25px; mso-line-height-rule:exactly;"><a style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; color:#43a1e8; text-decoration: none;" href="{{ route('customer.tracking.detail', $item->order->id) }}">{{ $item->jobNumber() }}</a></span>, we have put that job in production.
                    <br/> Once it is ready for shipping we will contact you via email. 
                </p>
                <br/>
                <br/>
            </td>
        </tr>

        <tr>
            <td>
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Thanks for visiting RockDesign.com <br />RockDesign Team</p>
            </td>
        </tr>
    </table>

@stop