@extends('emails.template')
@section('content')
    
    <table border="0" cellpadding="0" cellspacing="0" style="background: #fff;">
        <tr>
            <td style="padding: 50px" class="main-content">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding: 0 0 10px 0;">
                            <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; color: #757679; line-height: 42px; mso-line-height-rule:exactly;">Hi, {{ $receiverName }}!</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">
                                <br/><br/> 
                                Requestor Phone: {{ $customerPhone }}<br/>
                                Requestor Email: {{ $customerEmail }}<br/>
                                
                                @if(isset($customerAddress))
                                Requestor Address: {{ $customerAddress }}, {{ $customerState }} {{ $customerCountry }}, {{ $customerZipcode }}<br/>
                                @endif

                                Sample Pack: {{ $packName }}<br/>
                                Shipping Method: {{ $shipping }}<br/>
                                Price: {{ $price }}<br/>
                                <br/><br/>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Thanks for visiting RockDesign.com <br />RockDesign Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
@stop
