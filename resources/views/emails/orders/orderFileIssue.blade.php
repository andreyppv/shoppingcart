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
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">For your order: <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #43a1e8; line-height: 25px; mso-line-height-rule:exactly;">
                    <a style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; color:#43a1e8; text-decoration: none;" href="{{ route('customer.tracking.detail', $item->order->id) }}">{{ $item->jobNumber() }}</a></span>, we noticed that there are issues with your design files. One of our sales representative will contact you directly via email.
                    <br/>If you need more information on how to prepare your print files, please visit our support page below. 
                </p>
                <br/>
                <br/>
            </td>
        </tr>

        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" style="background: #48bfaf" align="center">
                    <tr>
                        <td style="padding: 15px 40px;">
                            <a href="{{ route('page.file.setup.html') }}" style="text-decoration: none; font-family:arial,helvetica,sans-serif; font-size: 14px; color: #fff; line-height: 16px; mso-line-height-rule:exactly;"><span style="font-family:arial,helvetica,sans-serif; font-size: 14px; color: #fff; line-height: 16px; mso-line-height-rule:exactly;">HOW TO SETUP PRINT FILE</span></a>
                        </td>
                    </tr>
                </table>

                <br/>
                <br/>
            </td>
        </tr>

        <tr>
            <td>
                <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Thank you for your business! <br />RockDesign Team</span>
            </td>
        </tr>
    </table>
@stop