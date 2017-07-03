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
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly; margin-top:0">Thank you for placing your order with RockDesign! It appears as though no files were uploaded when the order <a href="{{ route('customer.tracking.detail', $item->order->id) }}" style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; color:#43a1e8; text-decoration: none;">{{ $item->jobNumber() }}</a> was placed. Please note that we require all clients to provide their files in editable vector format (ai) with all text outlined.
                    <br/>
                    <br/>Please email these files to <a href="mailto:online@rockdesign.com" style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; color:#43a1e8; text-decoration: none;"><span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #43a1e8; line-height: 25px; mso-line-height-rule:exactly;">online@rockdesign.com</span></a> so that we can prepare a pdf proof. Please note that production does not begin until the correct files have been received and a proof has been approved.</p>
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">If you are unable to provide design files in the correct format please purchase one of our design service packages so that we can prepare the files for you. For this option note that all logos must be in vectorized format or there may be a surcharge for tracing.</p>
                <br />
            </td>
        </tr>
        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" style="background: #48bfaf" align="center">
                    <tr>
                        <td style="padding: 15px 40px;">
                            <a href="{{ route('design.category.all') }}" style="text-decoration: none; font-family:arial,helvetica,sans-serif; font-size: 14px; color: #fff; line-height: 16px; mso-line-height-rule:exactly;"><span style="font-family:arial,helvetica,sans-serif; font-size: 14px; color: #fff; line-height: 16px; mso-line-height-rule:exactly;">DESIGN SERVICES</span></a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <br />
                <br />
                <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Thank you for your business! <br />RockDesign Team</span>
            </td>
        </tr>
    </table>

@stop