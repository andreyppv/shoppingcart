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
                    @if($item->template_uid)
                    <li>Template ID: {{ $item->template_uid }}
                    @endif
                    
                    <li>Quantity: 
                        @if($item->hasCustomSets())
                            {{ $item->product_quantity }} cards total for various names<br/>
                            
                            @foreach($item->customSets() as $r)
                            &nbsp;&nbsp;{{ $r['name'] }} : {{ $r['quantity'] }}<br/>
                            @endforeach
                        @else
                            {{ $item->product_quantity }} cards
                        @endif
                    </li>
                    
                    <li>Set: {{ $item->sets }}</li>
                    
                    @foreach($item->features() as $ft)
                    <li>
                        {{ $ft->feature_name }}: 
                        
                        <?php $options = $item->featureOptions($ft->feature_id); ?>
                        @foreach($options as $opt)
                            {{ $opt->option_name }}
                            <?php 
                            if($opt->side_type == FRONTSIDE) echo "(Front)"; 
                            else if($opt->side_type == BACKSIDE) echo "(Back)";
                            ?>
                        @endforeach
                    </li>
                    @endforeach
                    
                    @if($item->product_type == PRODUCT_TEMPLATE)
                    <!--<li>
                        Front Side Content: {{ $item->template_front }}
                    </li>
                    <li>
                        Back Side Content: {{ $item->template_back }}
                    </li>-->
                    @endif
                </ul>
            </td>
        </tr> 
        <!--End Item Detail-->
        
        <!--Uploaded Files--> 
        <tr>
            <td colspan="10"><h4>Uploaded Files</h4></td>
        </tr>
        <tr>
            <td colspan="10">
                <table class="table">
                <colgroup>
                    <col width="300"/>
                    <col width=""/>
                </colgroup>
                <tbody>
                    @foreach($item->files as $file)
                    <tr>
                        <td><a href="{{ url($file->path) }}" target="_blank">{{ $file->name }}</a></td>
                        <td>{{ $file->created_at }}</td>
                    </tr>                          
                    @endforeach
                </tbody>
                </table>
            </td>
        </tr>
        <!--End Uploaded Files-->
        
        <!--Design Info-->
        <tr>
            <td colspan="10"><h4>Design Information</h4></td>
        </tr>
        <tr>
            <td colspan="10">
                <table class="table">
                <tbody>
                    <tr>
                        <td>Front Side</td>
                    </tr>   
                    <tr>
                        <td>{!! the_content($item->template_front) !!}</td>
                    </tr>
                    <tr>
                        <td>Back Side</td>
                    </tr>
                    <tr>
                        <td>{!! the_content($item->template_back) !!}</td>
                    </tr>
                </tbody>
                </table>
            </td>
        </tr>
        <!--End Design Info-->
    </tbody>
</table>