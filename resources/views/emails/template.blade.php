<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; font-family: arial, helvetica, sans-serif; color: #757679; margin: 0px; ">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>RockDesign Registration</title>

    <style>
        @media only screen and (max-width: 500px) {
            .table500 {
                width: 100%!important;
            }
            .main-content {
                padding: 20px 15px!important;
            }
            .footer-content {
                padding: 0 15px!important;
            }
        }
    </style>
</head>

<body style="width: 100%; margin: 0; background: #f2f2f2;">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; background: #f2f2f2;">
        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" width="550" class="table500" align="center" style="background: #f2f2f2;">
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="550" class="table500" style="background: #f2f2f2;">
                                <tr>
                                    <td style="padding: 30px 0; text-align: center">
                                        <img src="{{ url('rockdesign-logo.png') }}" alt="{{ $settings['site.name'] }}" width="240" height="36" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" cellspacing="0" style="background: #fff;">
                                            <tr>
                                                <td style="padding: 50px" class="main-content">
                                                    @yield('content')
                                                </td>
                                            </tr>
                                        </table>                                                
                                    </td>
                                </tr>
                                <tr>
                                    <td class="footer-content" style="padding: 0 15px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style="text-align: center;">
                                                    <div>&nbsp;</div>
                                                    <span style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #a7a9ac; line-height: 16px; mso-line-height-rule:exactly;">This is an automated message. Please do not reply to this email. </span><div>&nbsp;</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tr>
                                                            <td class="footer-links-wrap">
                                                                <a href="{{ URL::route('card.category.business') }}" target="_blank" class="footer-link" style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;"><span style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;">Luxury Business Cards<span class="divider">&nbsp;&nbsp;|</span></span></a>
                                                                <a href="{{ URL::route('template.product.business') }}" target="_blank" class="footer-link" style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;"><span style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;">Templates<span class="divider">&nbsp;&nbsp;|</span></span></a>
                                                                <a href="{{ URL::route('design.category.all') }}" target="_blank" class="footer-link" style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;"><span style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;">Design Services<span class="divider">&nbsp;&nbsp;|</span></span></a>
                                                                <a href="{{ route('page.corporate.orders.html') }}" target="_blank" class="footer-link" style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;"><span style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;">Free Quotation<span class="divider">&nbsp;&nbsp;|</span></span></a>
                                                                <a href="{{ route('page.how.order.html') }}" target="_blank" class="footer-link" style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;"><span style="font-family:arial,helvetica,sans-serif; font-size: 12px; color: #888a8c; line-height: 16px; text-decoration: none; mso-line-height-rule:exactly;">Support</span></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <div>&nbsp;</div>
                                                    <a href="{{ url() }}" target="_blank" style="font-family:arial,helvetica,sans-serif; font-size: 11px; color: #888a8c; line-height: 18px; mso-line-height-rule:exactly; text-decoration: none;"><span style="font-family:arial,helvetica,sans-serif; font-size: 11px; color: #888a8c; line-height: 18px; mso-line-height-rule:exactly;">© 2016  ROCKDESIGN.COM</span></a><br /><br />
                                                    <br />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>