<div class="row row-pad">
    <div class="col-md-6 m-b-15">
        <div class="swiper-container admin-panel-carousel">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <img src="{{ asset('frontend/img/customer/homepage-slide1.jpg') }}" alt="slide">
                    <div class="overflow-text">
                        <span class="label bg-orange text-white">NEW</span>
                        <h2 class="text-white">Acrylic Business Card</h2>
                        <a href="{{ url('unique-business-cards/acrylic-business-cards') }}" class="text-white hint-text">Please click here for more information</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 cust-panel-left m-b-15">
        <div class="cust-panel panel bg-turq">
            <div class="panel-body">
                <div class="pull-top">
                    <div class="pull-left">
                        <i class="fa fa-play-circle-o text-white"></i>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="pull-bottom">
                    <a href="{{ route('page.file.setup.html') }}" target="_blank" class="text-white">RockDesign Tutorials</a>
                    <p class="text-white">Learn how to setup print file and much more</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-6 cust-panel-right m-b-15">
        <div class="cust-panel panel no-border widget bg-brown no-margin">
            <div class="panel-body">
                <div class="pull-top">
                    <div class="pull-left">
                        <i class="fa fa-rocket text-white"></i>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="pull-bottom bottom-left bottom-right padding-20">
                    <a href="{{ route('page.print.feature.html') }}" target="_blank" class="text-white">Print Features Information</a>
                    <p class="text-white no-margin">Learn rockdesign print features</p>
                </div>
            </div>
        </div>
    </div>
</div>