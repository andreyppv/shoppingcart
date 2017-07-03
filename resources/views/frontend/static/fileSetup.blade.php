@extends('frontend.layouts.default')

@section('content')

@include('frontend.static._supportNav')

<div class="container section how-order-section">
    <div class="row">
        <div class="col-md-9">
            <h2>FILE SETUP INSTRUCTIONS</h2>
            <p>Please follow the setup instructions below for setting up your design files</p>
            <div id="download-templates" class="how-content-block">
                <h2>Download Templates</h2>
                <p>Please download the blank templates below for setting up your print files. </p>
                <div class="how-download-bl">
                    <div class="how-download-titl">
                        <img src="{{ asset('frontend/img/file-setup-icon.svg') }}" alt="FILE SETUP">
                        <span>DOWNLOAD</span>
                    </div>
                    <div class="how-download-line"></div>
                    <ul>
                        <li><a href="{{ upload_url('static/file-setup/regular-business-card-blank-template.zip') }}">Regular 3.5&rdquo; x 2&rdquo; business card template</a></li>
                        <li><a href="{{ upload_url('static/file-setup/3mm-rounded-business-card-blank-template.zip') }}">Rounded 3.5&rdquo; x 2&rdquo; business card template (3mm radius)</a></li>
                        <li><a href="{{ upload_url('static/file-setup/6mm-rounded-business-card-blank-template.zip') }}">Rounded 3.5&rdquo; x 2&rdquo; business card template (6mm radius)</a></li>
                        <li><a href="{{ upload_url('static/file-setup/square-business-card-blank-template.zip') }}">2&rdquo; x 2&rdquo; business card template</a></li>
                        <li><a href="{{ upload_url('static/file-setup/PVC-business-card-blank-template.zip') }}">PVC business card template</a></li>
                        <li><a href="{{ upload_url('static/file-setup/metal-business-card-blank-template.zip') }}">Metal business card template</a></li>
                        <li><a href="{{ upload_url('static/file-setup/acrylic-business-card-blank-template.zip') }}">Acrylic business card template</a></li>
                    </ul>
                </div>
            </div>
            <div id="vector-format" class="how-content-block">
                <h2>Vector Format</h2>
                <p>We only accept vector file format for printing. We recoomend you send us the final vector file in Adobe Illustrator CS6 ai format, eps, or pdf. Your logo will need to be original vector format as well. If you do not have the logo in vector format, we also provide the logo trancing service.  Bitmap format such as jpg, jpeg, bmp, psd, png, tiff are not recommended for printing. For best quality, rockdesign will only print with vector files. </p>
                <p><img src="{{ asset('frontend/img/static/file-setup/vector-img.jpg') }}" alt="vector vs bitmap"></p>

            </div>
            <div id="font-outline" class="how-content-block">
                <h2>FONT OUTLINE</h2>
                <p>In order to render your font correctly, make sure you have outlined all your texts in illustrator. Please see below for how to create outline.</p>
                <p><img src="{{ asset('frontend/img/static/file-setup/font-outline-img.jpg') }}" alt="how to create outlines"></p>
            </div>
            <div id="file-setup" class="how-content-block">
                <h2>FILE SETUP EXAMPLES</h2>
                <p>Please see some examples below for how to setup the print files. Print features such as emboss, deboss, foil stamp, spot UV, thermography, the elements must fil in BLACK (K:100%). For spot color printing, such as single solid color, you must set the color in pantone with pantone solid uncoated code indicated on the print file. For design with bleed, we require at least 1mm bleed on all sides. For design with photo, you will need to embed the photo in high resolution (300dip). For metal business cards, you can indicate the print feature by using different color blocks. For Acrylic business cards, you must set the color mode in RGB, and the laser cut area must be set in RED stroke, and the etching are must be fill in BLACK. Once you have provided us the design, our designer will look through your setup again and provide you a print proof. </p>
                <div class="file-setup-row">
                    <div class="file-setup-col">
                        <img src="{{ asset('frontend/img/static/file-setup/file-setup-example1.jpg') }}" alt="Black business card setup example">
                    </div>
                    <div class="file-setup-col file-setup-col-right">
                        <div class="how-download-titl">
                            <img src="{{ asset('frontend/img/file-setup-icon.svg') }}" alt="FILE SETUP">
                            <span>BLACK BUSINESS CARD</span>
                        </div>
                        <div class="how-download-line"></div>
                        <a href="{{ upload_url('static/file-setup/black-business-card-print-file-setup.zip') }}">Download setup example</a>
                    </div>
                </div>
                
                
                <div class="file-setup-row">
                    <div class="file-setup-col">
                        <img src="{{ asset('frontend/img/static/file-setup/file-setup-example2.jpg') }}" alt="Letterpress business card setup example">
                    </div>
                    <div class="file-setup-col file-setup-col-right">
                        <div class="how-download-titl">
                            <img src="{{ asset('frontend/img/file-setup-icon.svg') }}" alt="FILE SETUP">
                            <span>LETTERPRESS BUSINESS CARD</span>
                        </div>
                        <div class="how-download-line"></div>
                        <a href="{{ upload_url('static/file-setup/letterepress-business-card-print-file-setup.zip') }}">Download setup example</a>
                    </div>
                </div>
                
                
                <div class="file-setup-row">
                    <div class="file-setup-col">
                        <img src="{{ asset('frontend/img/static/file-setup/file-setup-example3.jpg') }}" alt="Regular suede business card setup example">
                    </div>
                    <div class="file-setup-col file-setup-col-right">
                        <div class="how-download-titl">
                            <img src="{{ asset('frontend/img/file-setup-icon.svg') }}" alt="FILE SETUP">
                            <span>REGULAR SUEDE BUSINESS CARD</span>
                        </div>
                        <div class="how-download-line"></div>
                        <a href="{{ upload_url('static/file-setup/regular-suede-business-card-print-file-setup.zip') }}">Download setup example</a>
                    </div>
                </div>
                
                
                <div class="file-setup-row">
                    <div class="file-setup-col">
                        <img src="{{ asset('frontend/img/static/file-setup/file-setup-example4.jpg') }}" alt="Stainless steel business card setup example">
                    </div>
                    <div class="file-setup-col file-setup-col-right">
                        <div class="how-download-titl">
                            <img src="{{ asset('frontend/img/file-setup-icon.svg') }}" alt="FILE SETUP">
                            <span>STAINLESS STELL METAL BUSINESS CARD</span>
                        </div>
                        <div class="how-download-line"></div>
                        <a href="{{ upload_url('static/file-setup/stainless-metal-business-card-print-file-setup.zip') }}">Download setup example</a>
                    </div>
                </div>
                
                
                <div class="file-setup-row">
                    <div class="file-setup-col">
                        <img src="{{ asset('frontend/img/static/file-setup/file-setup-example5.jpg') }}" alt="Black metal business card setup example">
                    </div>
                    <div class="file-setup-col file-setup-col-right">
                        <div class="how-download-titl">
                            <img src="{{ asset('frontend/img/file-setup-icon.svg') }}" alt="FILE SETUP">
                            <span>BLACK METAL BUSINESS CARD</span>
                        </div>
                        <div class="how-download-line"></div>
                        <a href="{{ upload_url('static/file-setup/black-metal-business-card-print-file-setup.zip') }}">Download setup example</a>
                    </div>
                </div>
                
                
                <div class="file-setup-row">
                    <div class="file-setup-col">
                        <img src="{{ asset('frontend/img/static/file-setup/file-setup-example6.jpg') }}" alt="Acrylic business card setup example">
                    </div>
                    <div class="file-setup-col file-setup-col-right">
                        <div class="how-download-titl">
                            <img src="{{ asset('frontend/img/file-setup-icon.svg') }}" alt="FILE SETUP">
                            <span>ACRYLIC BUSINESS CARD</span>
                        </div>
                        <div class="how-download-line"></div>
                        <a href="{{ upload_url('static/file-setup/acrylic-business-card-print-file-setup.zip') }}">Download setup example</a>
                    </div>
                </div>
            </div>
            
            <div id="our-services" class="how-content-block">
                <h2>OUR SERVICES</h2>
                <p>Rockdesign offer professional design services for all the customers who are printing with us. We offer design services from simple logo tracing, business card designs to logo design. Our professional design solutions will set your brand apart from the competitors. To learn more about rockdesign's design services, please visit our <a href="{{ route('design.category.all') }}">design services page</a>. </p>
                <p><img src="{{ asset('frontend/img/static/file-setup/our-service-img.jpg') }}" alt="design services img"></p>
            </div>
        </div>
        <div class="col-md-3 how-order-sidebar-wrap">
            <div class="how-order-sidebar">
                <ul class="how-order-sidebar-menu">
                    <li><a href="#download-templates">DOWNLOAD TEMPLATES</a></li>
                    <li><a href="#vector-format">VECTOR FORMAT</a></li>
                    <li><a href="#font-outline">FONT OUTLINE</a></li>
                    <li><a href="#file-setup">FILE SETUP EXAMPLES</a></li>
                    <li><a href="#our-services">OUR SERVICES</a></li>
                    <li><span>STILL NEED HELP ?</span></li>
                    <li><a href="{{ route('page.corporate.orders.html') }}" class="cont-us">CONTACT US</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    
@stop

@section('styles')
<link href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet" />
@stop

@section('scripts')
<script src="{{ asset('vendor/sticky/jquery.sticky.js') }}"></script>
<script src="{{ asset('frontend/js/pages/support.js') }}"></script>
@stop