@extends('frontend.layouts.default')

@section('content')

@include('frontend.static._supportNav')

<style>
.mfp-iframe-holder .mfp-content {
    max-width: 1920px;
}
</style>

<div class="container section how-order-section">
    <div class="row">
        <div class="col-md-6">
            <h2>HOW TO ORDER</h2>
            <p>Watch the general guideline on how to order on our website or fill out the question form below to take you to ordering steps.</p>
            <div class="how-order-block">
                <div class="how-order-block-inner">
                    <div class="how-order-bl-titl">Do you have a print ready design file?</div>
                    <div class="how-order-options-wrap">
                        <div class="radio radio-success">
                            <input type="radio" name="radio1" id="radio1" value="checked-yes" class="check-option">
                            <label for="radio1">Yes, I do have print ready files prepared according to the proof example</label>
                        </div>
                        <div class="radio radio-success">
                            <input type="radio" name="radio1" id="radio2" value="checked-no" class="check-option">
                            <label for="radio2">No, I don&rsquo;t have print ready files</label>
                        </div>
                        <button class="how-order-next">NEXT</button>
                    </div>
                </div>
            </div>
            <div class="how-order-block how-order-block-yes display-none">
                <div class="how-order-block-inner">
                    <div class="how-order-bl-titl">Do you know which product and finishing you like to order?</div>
                    <div class="how-order-options-wrap">
                        <div class="radio radio-success">
                            <input type="radio" name="radio2" id="radio3" value="checked-yes-yes" class="check-option">
                            <label for="radio3">Yes, I know exactly which product and finishing I would like to order</label>
                        </div>
                        <div class="radio radio-success">
                            <input type="radio" name="radio2" id="radio4" value="checked-yes-no" class="check-option">
                            <label for="radio4">No, I&rsquo;m not sure which product or finishing is recommended for my design</label>
                        </div>
                        <button class="how-order-next">NEXT</button>
                    </div>
                </div>
            </div>
            <div class="how-order-block how-order-block-no display-none">
                <div class="how-order-block-inner">
                    <div class="how-order-bl-titl">Do you know what kind of design you are looking for ?</div>
                    <div class="how-order-options-wrap">
                        <div class="radio radio-success">
                            <input type="radio" name="radio3" id="radio5" value="checked-no-yes" class="check-option">
                            <label for="radio5">Yes, I have a clear direction and know exactly what I&rsquo;m looking for</label>
                        </div>
                        <div class="radio radio-success">
                            <input type="radio" name="radio3" id="radio6" value="checked-no-no" class="check-option">
                            <label for="radio6">No, I need to have designer come up with design concepts for my project</label>
                        </div>
                        <button class="how-order-next">NEXT</button>
                    </div>
                </div>
            </div>
            <div class="how-order-block how-order-block-yes-yes display-none">
                <div class="how-order-block-inner">
                    <div class="how-order-bl-titl">Ordering Process</div>
                    <div class="step-titl">STEP 1</div>
                    <p>If you have a print ready design file in editable vector format AND you know what finishings you would like to use please use our price calculator and place your order online using our secure paypal payment system. We do recommend emailing your design into <a href="mailto:sales@rockdesign.com">sales@rockdesign.com</a> prior to ordering to verify your pricing and specifications.</p>
                    <div class="step-titl">STEP 2</div>
                    <p>Once you have placed your order and have paid, our online orders department will contact you with in 1 business day to confirm your specifications.</p>
                    <div class="step-titl">STEP 3</div>
                    <p>A PDF proof will then be sent to you for your approval. Once you have confirmed this proof we will begin production.</p>
                    <div class="step-titl">STEP 4</div>
                    <p>Once the production is completed and ready for shopping. Our sales team will email you the tracking number. </p>
                </div>
            </div>
        <div class="how-order-block how-order-block-yes-no display-none">
                <div class="how-order-block-inner">
                    <div class="how-order-bl-titl">Ordering Process</div>
                    <div class="step-titl">STEP 1</div>
                    <p>If you are unsure of what you would like please purchase our custom design service. With this service our designers will prepare 3 custom layouts for you to select from. Please note that there is a surcharge for clients not printing with RockDesign.</p>
                    <div class="step-titl">STEP 2</div>
                    <p>After you have purchased a design service one of our design coordinators will contact you via email with in 4 business hours. Please note that this turn around time may be extended during periods of high volume.</p>
                    <div class="step-titl">STEP 3</div>
                    <p>Our design coordinator will ask you a variety of questions to help come up with a clear vision of what you are looking for. Once you have thoroughly answered these questions our designers will begin to work on your design files. When they are ready for your viewing our design coordinator will forward you pdfs as well as pricing for your review.</p>
                    <div class="step-titl">STEP 4</div>
                    <p>Once you have decided on what finishings, cardstock and quantity you would like to order our coordinator will quote you for shipping. Once a shipping method has been determined a final PDF proof will be forwarded to you for your approval. Once you have approved this proof our production time begins.</p>
                </div>
            </div>
            <div class="how-order-block how-order-block-no-yes display-none">
                <div class="how-order-block-inner">
                    <div class="how-order-bl-titl">Ordering Process</div>
                    <div class="step-titl">STEP 1</div>
                    <p>If you have a clear idea of what you are looking for please purchase our simple design service. This service will provide you with one design layout based on your idea as well as 3 revisions. Please note that there is a surcharge for this service if you do not plan on printing with RockDesign.</p>
                </div>
            </div>
            <div class="how-order-block how-order-block-no-no display-none">
                <div class="how-order-block-inner">
                    <div class="how-order-bl-titl">Ordering Process</div>
                    <div class="step-titl">STEP 1</div>
                    <p>If you are unsure of what you would like please purchase our custom design service. With this service our designers will prepare 3 custom layouts for you to select from. Please note that there is a surcharge for clients not printing with RockDesign.</p>
                    <div class="step-titl">STEP 2</div>
                    <p>After you have purchased a design service one of our design coordinators will contact you via email with in 4 business hours. Please note that this turn around time may be extended during periods of high volume.</p>
                    <div class="step-titl">STEP 3</div>
                    <p>Our design coordinator will ask you a variety of questions to help come up with a clear vision of what you are looking for. Once you have thoroughly answered these questions our designers will begin to work on your design files. When they are ready for your viewing our design coordinator will forward you pdfs as well as pricing for your review.</p>
                    <div class="step-titl">STEP 4</div>
                    <p>Once you have decided on what finishings, cardstock and quantity you would like to order our coordinator will quote you for shipping. Once a shipping method has been determined a final PDF proof will be forwarded to you for your approval. Once you have approved this proof our production time begins.</p>
                </div>
            </div>
        </div>
        
     
        <div class="col-md-6">
            <div class="video-wrap">
              <a href="https://vimeo.com/176667684" class="popup-vimeo">
                    <img src="{{ asset('frontend/img/static/how-to-order-img.jpg') }}"  class="video-poster">
                    <div class="video-overlay-block">
                        <div class="video-overlay-block-inner">
                            <div class="video-overlay-block-titl">HOW TO ORDER</div>
                            <img src="{{ asset('frontend/img/Logo2.svg') }}" alt="logo">
                        </div>
                    </div>
                    <div class="round-play"><i class="fa fa-play"></i></div>
              </a>
            </div>
        </div>

        
    </div>
</div>
    
@stop

@section('styles')
<link href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet" />
@stop

@section('scripts')
<script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script>
$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
});

$(".check-option").change(function() {
    $(".how-order-next").addClass("active");
});

$('.how-order-next').click(function() {
    $(".how-order-next").removeClass("active");
    var str = "";
    $(".radio input:checked").each(function() {
        str = $(this).val();
        if (str == "checked-yes") {
            $(".how-order-block").addClass("display-none");
            $(".how-order-block-yes").removeClass("display-none");
        } else if (str == "checked-no") {
            $(".how-order-block").addClass("display-none");
            $(".how-order-block-no").removeClass("display-none");
        } else if (str == "checked-yes-yes") {
            $(".how-order-block").addClass("display-none");
            $(".how-order-block-yes-yes").removeClass("display-none");
        } else if (str == "checked-yes-no") {
            $(".how-order-block").addClass("display-none");
            $(".how-order-block-yes-no").removeClass("display-none");
        } else if (str == "checked-no-yes") {
            $(".how-order-block").addClass("display-none");
            $(".how-order-block-no-yes").removeClass("display-none");
        } else if (str == "checked-no-no") {
            $(".how-order-block").addClass("display-none");
            $(".how-order-block-no-no").removeClass("display-none");
        }
        $('.radio input').attr('checked', false);
    });
});
</script>
@stop