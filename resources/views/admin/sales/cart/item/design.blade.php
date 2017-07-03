<?php 
$designInfo = $item->designInfo(); 
?>

<table class="table table-borderless table-order">
<colgroup>
    <col width="120"/>
    <col width="180"/>
    <col width=""/>
</colgroup>
<tbody>
    <!--Item Detail-->
    <tr>
        <td class="text-middle">
            <b>Customer:</b><br/>
            {{ $cart->customer->full_name() }}<br/>
            <a href="mailto:{{ $cart->customer->email }}">{{ $cart->customer->email }}</a>
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="text-middle" colspan="2"><img src="{{ resize_image( $item->product_image, 320, 320, 'fit-x' ) }}" alt=""></td>
        <td>
            <h5>{{ $item->product_name }}</h5>
            
            <ul style="list-style:none; padding-left:0;">
                <li>
                    {!! the_content($item->product_description) !!}
                </li>
            </ul>
        </td>
    </tr> 
    <!--End Item Detail-->
    
    @if($designInfo && $designInfo->logo_require == YES)
        <!--Logo Styles--> 
        <tr>
            <td colspan="10"><h4>Logo Styles</h4></td>
        </tr>
        <tr>
            <td colspan="10">
                <?php $logoSamples = json_decode($designInfo->logo_samples); ?>
                @if(is_array($logoSamples))
                    @foreach($logoSamples as $logo)
                    <a href="{{ url($logo) }}" target="_blank"><img src="{{ resize_image( $logo, 150, 150, 'fit-x' ) }}"/></a>
                    @endforeach
                @endif
            </td>
        </tr>
        <!--End Logo Styles-->
        
        <!--Logo Design Breif--> 
        <tr>
            <td colspan="10"><h4>Logo Design Brief</h4></td>
        </tr>
        <tr>
            <td colspan="10">
                <table class="table">
                <colgroup>
                    <col width="300"/>
                    <col width=""/>
                </colgroup>
                <tbody>
                    <tr>
                        <td>Primary Contact Email</td>     
                        <td><a href="mailto:{{ $designInfo->logo_email }}">{{ $designInfo->logo_email }}</a></td>
                    </tr>    
                    <tr>
                        <td>Name of your business</td>
                        <td>{{ $designInfo->logo_business }}</td>
                    </tr>    
                    <tr>
                        <td>Industry of your business</td>
                        <td>{{ $designInfo->logo_industry }}</td>
                    </tr>    
                    <tr>
                        <td>More Information</td>
                        <td>{{ $designInfo->logo_audience }}</td>
                    </tr>
                    <tr>
                        <td colspan="10">&nbsp;</td>
                    </tr>
                    
                    <tr>
                        <td><h5>Logo Examples</h5></td>
                        <td></td>
                    </tr>    
                    @foreach($item->filesBy(0) as $file)
                    <tr>
                        <td><a href="{{ url($file->path) }}" target="_blank">{{ $file->name }}</a></td>
                        <td>{{ $file->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </td>
        </tr>
        <!--End Logo Design Breif--> 
    @endif
    
    @if($designInfo)
        <!--Card Design Breif--> 
        <tr>
            <td colspan="10"><h4>Business Card Design Brief</h4></td>
        </tr>
        <tr>
            <td colspan="10">
                <table class="table">
                <colgroup>
                    <col width="300"/>
                    <col width=""/>
                </colgroup>
                <tbody>
                    <tr>
                        <td>Primary Contact Email</td>
                        <td><a href="mailto:{{ $designInfo->card_email }}">{{ $designInfo->card_email }}</a></td>
                    </tr>    
                    <tr>
                        <td>Name of your business</td>
                        <td>{{ $designInfo->card_business }}</td>
                    </tr>    
                    <tr>
                        <td>Business Card Type</td>
                        <td>{{ $designInfo->card_type_name }}</td>
                    </tr>    
                    <tr>
                        <td>More Information</td>
                        <td>{{ $designInfo->card_information }}</td>
                    </tr>
                    <tr>
                        <td colspan="10">&nbsp;</td>
                    </tr>
                    
                    <tr>
                        <td><h5>Company Logo</h5></td>
                        <td></td>
                    </tr>    
                    @foreach($item->filesBy(1) as $file)
                    <tr>
                        <td><a href="{{ url($file->path) }}" target="_blank">{{ $file->name }}</a></td>
                        <td>{{ $file->created_at }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="10">&nbsp;</td>
                    </tr>
                    
                    <tr>
                        <td><h5>Business Card Examples</h5></td>
                        <td></td>
                    </tr>    
                    @foreach($item->filesBy(2) as $file)
                    <tr>
                        <td><a href="{{ url($file->path) }}" target="_blank">{{ $file->name }}</a></td>
                        <td>{{ $file->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </td>
        </tr>
        <!--End Card Design Breif--> 
    @endif
</tbody>
</table>