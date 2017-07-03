@extends('emails.template')
@section('content')

	<table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 0 0 30px 0;">
                <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; color: #757679; line-height: 42px; mso-line-height-rule:exactly;">Welcome, {{ $customer->full_name() }}!</span>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif,vetica,sans-serif; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly; margin-top:0">Thank you for registering with RockDesign!  Please feel free to contact us with any questions you may have by emailing into <a href="mailto:sales@rockdesign.com" style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif,vetica,sans-serif; color:#43a1e8; text-decoration: none;"><span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif,vetica,sans-serif; font-size: 15px; color: #43a1e8; line-height: 25px; mso-line-height-rule:exactly;">sales@rockdesign.com</span></a> or by calling us toll free at {{ $settings['site.phone'] }}</p>
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif,vetica,sans-serif; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Here at RockDesign we specialize in providing high-quality, luxurious printing and design services. Please note that our hours of operation are Monday to Friday from 9am to 5pm and that all custom quotes are provided via email. We are closed for all Canadian Statutory holidays.</p>
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif,vetica,sans-serif; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">To learn more about how to order, setup print files, print features, please visit our support page below.</p>
                <br />
            </td>
        </tr>
        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" style="background: #48bfaf" align="center">
                    <tr>
                        <td style="padding: 15px 40px;">
                            <span style="font-family: HelveticaNeue, Helvetica Neue, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif,vetica,sans-serif; font-size: 14px; color: #fff; line-height: 16px; mso-line-height-rule:exactly;"><a href="{{ route('page.how.order.html') }}" style="text-decoration: none; font-family: HelveticaNeue, Helvetica Neue, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif,vetica,sans-serif; font-size: 14px; color: #fff; line-height: 16px; mso-line-height-rule:exactly;">VIEW OUR SUPPORT PAGE</a></span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <br />
                <br />
                <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif,vetica,sans-serif; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Thank you for your business! <br />RockDesign Team</span>
            </td>
        </tr>
    </table>
    
@stop
