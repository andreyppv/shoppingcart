@extends('emails.template')
@section('content')

    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 0 0 10px 0;">
                <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; color: #757679; line-height: 42px; mso-line-height-rule:exactly;">Hi, {{ $stuff->full_name() }}!</span>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">New job <a style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; color:#43a1e8; text-decoration: none;" href="{{ route('admin.sales.order.item', array('id' => $item->id)) }}">{{ $item->jobNumber() }}</a> is assigned to you. Please check your job <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #43a1e8; line-height: 25px; mso-line-height-rule:exactly;"><a style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; color:#43a1e8; text-decoration: none;" href="{{ route('admin.sales.order.item', array('id' => $item->id)) }}">here</a></span>.
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <span style="font-family: HelveticaNeue-thin, Helvetica Neue thin, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;; font-size: 15px; color: #757679; line-height: 25px; mso-line-height-rule:exactly;">Keep up good works! <br />RockDesign Team</span>
            </td>
        </tr>
    </table>
    
@stop