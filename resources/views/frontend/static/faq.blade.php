@extends('frontend.layouts.default')

@section('content')

@include('frontend.static._supportNav')

<div class="container section how-order-section faq-section">
    <div class="row">
        <div class="col-md-9">
            <h2>FAQ</h2>
            <p>Please follow the setup instructions below for setting up your design files</p>
            <div class="how-content-block">
                <div class="faq-list">
                    <h2>Shipping</h2>
                    <div class="faq-list-cont">
                        <p>RockDesign offers world wide shipping. All our products are shipped via FedEx, and our sample packs are shipped via FedEx or Canada Post. Please note, some rural area may take slightly longer for the shipmment. Please note, Canada Post shipping does not include tracking numnber, for faster and more secure shipping, we recommend FedEx shipping option for sample pack purchase.</p>
                        <p><img src="{{ asset('frontend/img/static/faq/delivery-img.jpg') }}" alt="delivery image"></p>
                    </div>
                </div>
                <div class="faq-list">
                    <h2>Turnaround Time</h2>
                    <div class="faq-list-cont">
                        <p>RockDesign's luxury and premium business cards' turnaround time are 12 - 16 Business Days + Transit Time. Plastic business cards' turnaround time are 10 - 12 Business Days + Transit Time. Classic business cards' turnaround time are 7 - 10 business days + transit time. Metal business cards' turnaround time are 14- 20 Business Days + Transit Time. Quick business cards' turnaround time are 3 - 5 Business Days + Transit Time.</p>
                        <p><img src="{{ asset('frontend/img/static/faq/turnaround-img.jpg') }}" alt="turnaround time image"></p>
                        <p>
                            Please Note: Turnaround varies depending on job quality and complexity. Should you have any question, please feel free to contact us.
                            The turnaround times posted by RockDesign.com are for printing, and only begin after the Client has sent approval for the digital proof. The Client must acknowledge and agree that all listed turnaround times are estimates only and do not include shipping time. These times are calculated as business days and do not include weekends or holidays.
                            Unexpected failures, malfunctions, and / or technical problems with (printing) equipment may delay the printing process. If such a delay were to occur, RockDesign.com may, at its discretion and on a case by case basis, provide compensation in the form of re-print discounts or expedited shipping. Technical difficulties or delays will not be grounds for order cancellations or refunds.
                        </p>
                    </div>
                </div>
                <div class="faq-list">
                    <h2>Custom Printing</h2>
                    <div class="faq-list-cont">
                        <p>If you are looking for customize print products or for large corporate ordering, please fill out the <a target="_blank" href="http://www.rockdesign.com/corporate-orders">corporate order form to get a free quotation via email.</a> </p>
                        <p><img src="{{ asset('frontend/img/static/faq/custom-img.jpg') }}" alt="custom printing"></p>
                        <p>Please Note: You will be contacted by our sales team via email in 1-2 business days. (business day does not include weekend and holiday)</p>
                    </div>
                </div>
                <div class="faq-list">
                    <h2>Payment</h2>
                    <div class="faq-list-cont">
                        <p>Full payment is required prior to any orders being processed through to production. An order will not be processed under any circumstances before a full payment has been made using a valid credit card or cash funds (e-transfer, PayPal, bank wire). RockDesign.com will not be liable for any delay in order completion due to a delay in payment.</p>
                    </div>
                </div>
                <div class="faq-list">
                    <h2>Order Cancellation / Refund</h2>
                    <div class="faq-list-cont">
                        <p>
                            Due to the custom nature of the products sold by RockDesign.com, an order cannot be cancelled or modified once it has been approved by the Client and has been sent into production. Partial refunds may be available on orders that have begun processing but have not yet gone into production, and will be determined on a case by case basis. If a partial refund will be given, the refund will be calculated based on the portion of work that has not yet been completed. Any design charges will still be applicable if the Client decides not to print after the design has been created.
                            Custom designs and artwork generated internally by the staff of RockDesign.com are subject to human error. If an error occurs in regards to pricing, stock, coating, turnaround time, or any other aspect of an order that is deemed to be at the fault of RockDesign.com staff, RockDesign.com maintains the right to cancel the order and provide a full refund to the Client. Alternatively, any miscommunication that occurs from the Client to RockDesign.com during the quoting process will not qualify the order for cancellation or refund. If any changes are made to an order, it will be viewed as a secondary order and will not qualify as a reprint.
                            In the event that a project is inactive for more than 60 days with no response from the Client, RockDesign.com reserves the right to deduct a 20% cancellation fee from the order price if the project is cancelled and a refund is issued to the client.
                        </p>
                    </div>
                </div>
                <div class="faq-list">
                    <h2>Proofing</h2>
                    <div class="faq-list-cont">
                        <p>A digital proof of work will be submitted for the client’s approval prior to being sent for printing. The client is then responsible for carefully reviewing the proof and order prior to submission in the interest of avoiding errors. Once an order is accepted and confirmed by the Client, no liability is accepted by RockDesign.com for any errors not noticed or corrected by the Client on the proof. RockDesign.com will not accept any changes to an order that has been confirmed and sent to printing. Should the Client choose to ask RockDesign.com to print the Product without their review or approval, RockDesign.com will not be responsible for any flaws, errors, or problems of any sort on the Product, and a re-print option will not be available. If The Client chooses to upload a file, we strongly recommend that The Client submits a print-ready file in vector format with all text outlined. Any modifications made to files by RockDesign.com to get them print ready may be subject to design fees on a case by case basis. As such, RockDesign.com is not responsible for any errors in the Product, including but not limited to: misspelling, bleeds, grammar, damaged fonts, low quality images and graphics, punctuation, crop marks, transparency, overprint, incorrect colours, insufficient safe margins, etc.</p>
                        <p><img src="{{ asset('frontend/img/static/faq/proof-img.jpg') }}" alt="proof printing"></p>
                    </div>
                </div>
                <div class="faq-list">
                    <h2>Color Accuracy</h2>
                    <div class="faq-list-cont">
                        <p>While all reasonable efforts will be made to ensure colour accuracy, RockDesign.com does not guarantee that an exact colour match will occur between the Client’s artwork, imaging, files, or previously printed materials due to inherent variations in the printing process. There is a 10% colour shift that may occur due to press calibrations in printing, and colour may shift during the course of a single press run or between separate runs.</p>
                        <p><img src="{{ asset('frontend/img/static/faq/color-img.jpg') }}" alt="color printing"></p>
                        <p>RockDesign.com also cannot guarantee colour matching a preview or sample as it appears on a Client’s monitor as we cannot compensate for individual display colour variances. It is highly recommended that all designs and files be created in a CMYK colour format in order to decrease the likelihood of colour shifts occurring if a conversion from RGB to CMYK is necessary. It is possible to convert a RGB file into CMYK if the client is unable to provide one, however, many of the colours in RGB are not reproducible in a CMYK format and RockDesign.com does not guarantee any colour accuracy when doing such a conversion. We highly recommend that the Client provides the Pantone (PMS) colour codes when doing spot colour printing.</p>                        
                    </div>
                </div>
                
                <div class="faq-list">
                    <h2>Design Services</h2>
                    <div class="faq-list-cont">
                        <p>At RockDesign, all our designers are trying their best effort to create professional designs for all our clients. It is important that client submit a clear and detailed design briefs prior to the design process along with image examples, and our designers will be creating design based on those specific guidelines. Keep in mind that once a direction is chosen and our designer has already put their time into the design process, changing the direction may cost additional fees. Clints need to keep the number of revisions listed on our website, extra revisions may require additional fees. Once our designer has finalized the design, clients must pay for the printing services first, then our designer will send the finalized design files to the clients. We can not send the font files due to the copyright policy. In the event that the client chooses to take the final design and for printing elsewhere, additional design fees will be applied to the order unless stated otherwise. Please note, all design services are not refundable.</p>
                        <p><img src="{{ asset('frontend/img/static/faq/design-img.jpg') }}" alt="design services image"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 how-order-sidebar-wrap">
            <div class="how-order-sidebar">
                <ul class="how-order-sidebar-menu">
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