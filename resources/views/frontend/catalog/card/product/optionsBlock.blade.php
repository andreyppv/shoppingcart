<li class="{{ $ft->is_print == YES ? 'print-feature' : '' }}">
    <span class="feature-name">{{ $ft->name }}</span>
    <div class="card-options-sub-menu">
        @if($ft->link != '')
        <a href="{{ $ft->link }}" title="To learn more about {{ $ft->name }}, please visit our feature gallery" target="_blank">
            <i class="fa fa-question-circle info-icon"></i>
        </a>
        @else
        <a title="To learn more about {{ $ft->name }}, please visit our feature gallery" target="_blank">
            <i class="fa fa-question-circle info-icon"></i>
        </a>
        @endif
            
        @if($ft->type == DROPDOWN)
            <select name="product_options[{{$ft->id}}]" class="product-option dropbox-item @if($ft->is_print == 1) product-print-option @endif">
                @foreach($ft->optionsSorted() as $i => $op)
                <option @if($i==0) selected="selected" @endif value="{{ $op->id }}">{{ $op->name }}</option>
                @endforeach
            </select>
        @else
            <div class="card-options-sub-menu-content">   
                <input type="hidden" class="checkbox-item product-option" name="product_options[{{$ft->id}}][0]" value="0">
                
                @if($ft->both_side == YES)
                    <div>
                        <h4>FRONT SIDE</h4>
                        <div class="front-options options-box">
                            @foreach($ft->optionsSorted() as $op)
                            <div class="option-item-box checkbox check-success">
                                <input type="checkbox" class="checkbox-item product-option" name="product_options[{{$ft->id}}][{{ FRONTSIDE }}][{{$op->id}}]" value="{{ $op->id }}" id="product_options_front{{ $op->id }}">
                                <label for="product_options_front{{ $op->id }}">{{ $op->name }}</label>      
                            </div>
                            @endforeach
                            
                            <div class="clear"></div>
                        </div>
                    </div>
                    
                    <div>    
                        <h4>BACK SIDE</h4>
                        <div class="back-options options-box ">
                            @foreach($ft->optionsSorted() as $op)
                            <div class="option-item-box checkbox check-success">
                                <input type="checkbox" class="checkbox-item product-option" name="product_options[{{$ft->id}}][{{ BACKSIDE }}][{{$op->id}}]" value="{{ $op->id }}" id="product_options_back{{ $op->id }}">
                                <label for="product_options_back{{ $op->id }}">{{ $op->name }}</label>      
                            </div>
                            @endforeach
                            
                            <div class="clear"></div>
                        </div>
                    </div>
                @else
                    <div>
                        <div class="front-options options-box">
                            <div style="height:35px;">&nbsp;</div>
                            @foreach($ft->optionsSorted() as $op)
                            <div class="option-item-box checkbox check-success">
                                <input type="checkbox" class="checkbox-item product-option" name="product_options[{{$ft->id}}][0][{{$op->id}}]" value="{{ $op->id }}" id="product_options_both{{ $op->id }}">
                                <label for="product_options_both{{ $op->id }}">{{ $op->name }}</label>      
                            </div>
                            @endforeach
                            
                            <div class="clear"></div>
                        </div>
                    </div>
                @endif
            </div>
        @endif 
         
    </div>
</li>