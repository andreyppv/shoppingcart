@extends('emails.template')
@section('content')
    
    <table border="0" cellpadding="0" cellspacing="0" style="background: #fff;">
        <tr>
            <td style="padding: 20px" class="main-content">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding: 0 0 10px 0;">
                            <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; color: #757679; line-height: 42px; mso-line-height-rule:exactly;">Hi, Sales Manager!</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">
                               Below is the client detail for custom quotation request, please response to this client.
                               
                                <br/><br/>
                                Full Name: {{ $name }}<br/>
                                Email Address: {{ $email }}<br/>
                                Phone Number: {{ $phone }}<br/>
                                Company Name: {{ $company }}<br/>
                                Number of sets/employess: {{ $sets }}<br/>
                                How many cards per set: {{ $cards }}<br/>
                                Product/Features are interested in: {{ $interest }}<br/>
                                <br/>
                                <br/>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Keep up good works! <br />RockDesign Team</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
@stop
