@extends('emails.template')
@section('content')
	
    <table border="0" cellpadding="0" cellspacing="0" style="background: #fff;">
    <tr>
        <td style="padding: 10px" class="main-content">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding: 0 0 30px 0;">
                        <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; color: #757679; line-height: 42px; mso-line-height-rule:exactly;">Password Assistance</span>
                    </td>
                </tr>
                <tr>
                    <td>
                       <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">We received a request to reset the password associated with this e-mail address.
                            <br/>
                            <br/>If you made this request, please follow the instructions below.
                            <br/>Click on the link below to reset your password using our secure server:
                            <br/>

                            <a href="{{ route('customer.reset', [$token]) }}" style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;vetica,sans-serif; color:#43a1e8; text-decoration: none;"><span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;vetica,sans-serif; font-size: 15px; color: #43a1e8; line-height: 25px; mso-line-height-rule:exactly;">{{ route('customer.reset', [$token]) }}.</span></a>
                       </p>

                        <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">If you did not request to have your password reset you can safely ignore this email. Rest assured your customer account is safe.
                            <br/>
                            <br/> If clicking the link does not seem to work, you can copy and paste the link into your browser's address window, or retype it there. Once you have returned to RockDesign.com, we will give instructions for resetting your password.
                            <br/>
                            <br/> RockDesign will never e-mail you and ask you to disclose or verify your RockDesign password, credit card, or banking account number. If you receive a suspicious e-mail with a link to update your account information, do not click on the link.
                        </p>
                        <br />
                    </td>
                </tr>

                <tr>
                    <td>
                        <br />
                        <br />
                        <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Thanks for visiting RockDesign.com <br />RockDesign Team</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
    
@stop