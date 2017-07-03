@extends('frontend.layouts.default')

@section('content')

@include('frontend.static._supportNav')

<div class="container section how-order-section">
    <div class="row">
        <div class="col-md-9">
            <h2>PRINT FEATURES</h2>
            <p>Please see below for the indepth information on various print features offered by RockDesign.</p>
            
            <div id="EMBOSS" class="how-content-block">
                <h2>EMBOSS</h2>
                <p>Embossing is a unique process using plates and pressure to create a raised detail on one side of a business card. This finishing pushes through the paper to create a finishing that is visible from 360 degrees. Embossing creates a reversed deboss of the image on the opposite side of the card. Embossing can be combined with foil stamping, ink or can be &ldquo;blind&rdquo; meaning that no further finishing is used on top of the emboss.</p>
                <p><img src="{{ asset('frontend/img/static/feature/emboss-print-feature-img.jpg') }}" alt="emboss"></p>
                <Strong>Considerations:</Strong>
                <p>- Embossing is ideal for designs with buffer zones of at least 2mm. <br/>- Embossing is recommended to be used on cardstocks that are no more than 30pt or less although it is still possible. While it is possible to emboss the card before gluing to avoid a complete reverse deboss on the other side for an additional charge, this is not recommended since it may still leave a slight indentation due to the way the glue dries.</p>
                <p><img src="{{ asset('frontend/img/static/feature/emboss-print-feature-img2.jpg') }}" alt="emboss"></p>                
            </div>

            <div id="DEBOSS" class="how-content-block">
                <h2>DEBOSS</h2>
                <p>Debossing is another one of our processes using plate and pressure. Instead of applying enough pressure to push through the cardstock, only enough pressure is used to create an indented look. This finishing can also be combined with foil, printing, or can be left &ldquo;blind&rdquo; for a more subtle look. White debossing can be applied to all but our coated cardstocks (Silk and regular suede).</p>
                <p><img src="{{ asset('frontend/img/static/feature/deboss-print-feature-img1.jpg') }}" alt="DEBOSS"></p>
                <Strong>Considerations:</Strong>
                <p>- Debossing should be used on cardstocks thicker than 30pt as it may leave slight marks on the other side of the card from the pressure. </p>
                <p><img src="{{ asset('frontend/img/static/feature/deboss-print-feature-img2.jpg') }}" alt="DEBOSS"></p>
            </div>
            
            <div id="FOIL-STAMPING" class="how-content-block">
                <h2>FOIL STAMPING</h2>
                <p>Foil stamping uses a heated plate to apply metallic foil or pigment to the surface of the card. The result is a vibrant and highly saturated metallic appearance. Although this finishing cannot be colour matched, we offer a wide variety of colours including; Regular Gold, Regular Silver, Matte Gold, Matte Silver, White, Black, Red, Copper, Rose Gold, Dark Blue, Light Blue, Green, Non-metallic green, Clear, Pearl, Hot Pink, Rose Pink, and even Rainbow. Our foil stamping is extremely elegant and each plate is created specifically for your business card design.</p>
                <p><img src="{{ asset('frontend/img/static/feature/foil-stamping-print-feature-img1.jpg') }}" alt="FOIL STAMPING"></p>
                <p><img src="{{ asset('frontend/img/static/feature/foil-stamping-print-feature-img3.jpg') }}" alt="FOIL STAMPING"></p>
                <Strong>Considerations:</Strong>
                <p>- Although we can use foil stamping on highly detailed designs this may lead to overflow. <br/>
                    - It is possible to use multiple colours of foil in close proximity however the foil may not strike the same place 100% of the time leading to slight variations in alignment.<br/>
                    - Foil stamping may leave slight pressure marks on the reverse side of the card depending on design and card thickness. <br/>
                    - The appearance of a foil may vary based on colour and texture of the cardstock.<br/>
                    - The minimum recommended font size for foil stamping is 10pt.<br/>
                    - White foil may have inconsistent edges and excessive overflow. Because of this we recommend selecting either matte silver foil or white ink.
                </p>
                <p><img src="{{ asset('frontend/img/static/feature/foil-stamping-print-feature-img2.jpg') }}" alt="FOIL STAMPING"></p>
            </div>
            
            <div id="OFFSET-PRINTING" class="how-content-block">
                <h2>OFFSET PRINTING</h2>
                <p>Offset printing, also called offset lithography, is a method of mass-production printing in which the images on metal plates are transferred (offset) to rubber blankets or rollers and then to the print media.</p>
                <p><img src="{{ asset('frontend/img/static/feature/offset-printing-print-feature-img1.jpg') }}" alt="OFFSET PRINTING"></p>
                <Strong>Considerations:</Strong>
                <p>Offset printing we do not offer 100% colour accuracy, our team will try our best to match with the pantone color coded provided by our clients.</p>                
            </div>
            
            <div id="SPOT-UV" class="how-content-block">
                <h2>SPOT UV</h2>
                <p>Spot UV is a glossy finish that can be applied to specific details of the card. It lays flush with the card and can only be used on our laminated cardstocks (i.e. silk and regular suede). This finishing creates a beautiful reflective shine that can be used to accent details whether they are fine or large. Our spot UV finishing is an excellent way to make your design shine.</p>
                <p><img src="{{ asset('frontend/img/static/feature/spot-uv-print-feature-img1.jpg') }}" alt="SPOT UV"></p>
                <Strong>Considerations:</Strong>
                <p>Spot UV can only be used on our silk laminated and regular sued cardstocks. Full bleed spot UV may experience peeling..</p>
                <p><img src="{{ asset('frontend/img/static/feature/spot-uv-print-feature-img2.jpg') }}" alt="SPOT UV"></p>
            </div>
            
            <div id="THERMOGRAPHY" class="how-content-block">
                <h2>THERMOGRAPHY</h2>
                <p>Thermography is a heat applied process which results in a raised, clear, glossy finish. This finishing creates a particularly remarkable finish that allows the colour of what is underneath to shine through. Thermography is an excellent way to enhance printing as well as can be used on darker cardstocks as well.</p>
                <p><img src="{{ asset('frontend/img/static/feature/thermography-print-feature-img1.jpg') }}" alt="THERMOGRAPHY"></p>
                <Strong>Considerations:</Strong>
                <p>Because this is a heat applied process, it can only be used on one side of the card and cannot be used in close proximity to foil. This finishing is ideal for larger areas that do not contain fine details.</p>
                <p><img src="{{ asset('frontend/img/static/feature/thermography-print-feature-img2.jpg') }}" alt="THERMOGRAPHY"></p>                
            </div>
            
            <div id="LETTERPRESS" class="how-content-block">
                <h2>LETTERPRESS</h2>
                <p>Letterpress is a age tested technique that is comparable to a printing press. Using a plate made specific to each design each colour is pressed into the card to create a coloured imprint. This technique is ideal for block colours and creates a classic and clean finish. We recommend our rock classic white or cream cardstock for use with our letterpress feature. The Rock Classic has a higher density with is ideal for protecting the card from showing the impression through to the other side.</p>
                <p><img src="{{ asset('frontend/img/static/feature/letterpress-print-feature-img1.jpg') }}" alt="LETTERPRESS"></p>
                <Strong>Considerations:</Strong>
                <p>For best results designs should avoid fine details with less than 2mm between letter pressed areas. Letterpress cannot be used on gradient designs. As an alternative please consider offset printing combined with debossing. </p>
                <p><img src="{{ asset('frontend/img/static/feature/letterpress-print-feature-img2.jpg') }}" alt="LETTERPRESS"></p>    
            </div>
            
            
            <div id="METALLIC-INK" class="how-content-block">
                <h2>METALLIC INK</h2>
                <p>Our metallic ink is a form of brilliant metallic printing. This finishing is in available in either silver or gold and is ideal for printing text or designs onto our duplex, triplex, hard suede and soft suede cardstocks. </p>
                <p><img src="{{ asset('frontend/img/static/feature/metallic-ink-print-feature-img1.jpg') }}" alt="Metallic Printing"></p>
                <Strong>Considerations:</Strong>
                <p>The appearance of metallic ink will be more opaque on the suede than it is on our uncoated cardstocks however it remains and excellent way to add a pop of shine to your design. It is important to note that we cannot colour match our metallic inks and are unable to print gradients. </p>
                <p><img src="{{ asset('frontend/img/static/feature/metallic-ink-print-feature-img2.jpg') }}" alt="Metallic Printing"></p>    
            </div>
            
            
            <div id="WHITE-INK" class="how-content-block">
                <h2>WHITE INK</h2>
                <p>White ink is an excellent alternative to white foil and creates a clean matte finish. This finishing can be used on any of our dark uncoated cardstocks including our duplex, and triplex cards as well as our soft and hard suedes.</p>
                <p><img src="{{ asset('frontend/img/static/feature/white-ink-print-feature-img1.jpg') }}" alt="White Ink Printing"></p>
                <Strong>Considerations:</Strong>
                <p>White ink is not as opaque as white foil but has a cleaner finish and tends to yield better results.</p>
                <p><img src="{{ asset('frontend/img/static/feature/white-ink-print-feature-img2.jpg') }}" alt="White Ink Printing"></p>    
            </div>
            
            <div id="DIE-CUTTING" class="how-content-block">
                <h2>DIE CUTTING</h2>
                <p>Die-cutting is a process used to cut paper into a specific shape using a steel cutting die.  It can be used to punch out a decorative shape or pattern to incorporate within a larger piece, or it can be used to create the main shape of an object by cutting the entire sheet of paper in an distinct/designed way.  </p>
                <p><img src="{{ asset('frontend/img/static/feature/die-cut-print-feature-img1.jpg') }}" alt="DIE-CUTTING"></p>
                <Strong>Die Cut Rounded Corners</Strong>
                <p>Die cut rounded corners is an excellent yet subtle way to set your business apart from the rest. Rounded corners create a smooth finish to the edges of your card that is certain to impress. Although our standard rounded corners are 3mm or 6mm radius; we can customize this to suite your needs.</p>
                <p><img src="{{ asset('frontend/img/static/feature/die-cut-print-feature-img2.jpg') }}" alt="DIE-CUTTING"></p>
            </div>
            
            <div id="EDGE-FOIL" class="how-content-block">
                <h2>EDGE FOIL</h2>
                <p>Edge foil is a process where we apply the foil that we normally used for stamping to the edges of the card. The result is a beautiful metallic shine that adds an extra dimension of elegance and luxury to your design. It is available in all of our foil colours to suite your branding needs.</p>
                <p><img src="{{ asset('frontend/img/static/feature/edge-foil-print-feature-img1.jpg') }}" alt="EDGE FOIL"></p>
                <Strong>Considerations:</Strong>
                <p>Edge foil cannot be applied to rounded corners or laminated card stocks such as our silk or regular suede. Edge foil works best on our uncoated thicker stocks such as our duplex, triplex, or smooth white. While we can apply edge foil to our Hard, and soft suede it is not recommended due to excessive sparkling on the other surfaces of the card caused by the texture. Please note that with edge foil there may be slight overflow onto the other surfaces of the card and that the foil consistency may vary.</p>
            </div>
                        
            <div id="EDGE-PAINT" class="how-content-block">
                <h2>EDGE PAINT</h2>
                <p>Edge paint is an ideal way to either add a fun pop of colour to your design, or to hide the white edges of your design. </p>
                <p><img src="{{ asset('frontend/img/static/feature/edge-paint-print-feature-img1.jpg') }}" alt="EDGE PAINT"></p>
                <Strong>Considerations:</Strong>
                <p>We can colour match our edge paint to the pantone code of your choice although please note that we do not guarantee a 100% colour match. Edge paint may overflow onto the other surfaces of the card.</p>
            </div>
            
            <div id="ETCHING" class="how-content-block">
                <h2>ETCHING</h2>
                <p>Etching is a process that can be used only on our metal cards. Etching is used to create a slightly recessed appearance and even creates a matte look when used on our stainless steel cards. Etching is a luxurious and ideal finishing for detailed designs and is beautiful when paired with spot colour.</p>
                <p><img src="{{ asset('frontend/img/static/feature/etching-print-feature-img1.jpg') }}" alt="ETCHING"></p>
                <Strong>Considerations:</Strong>
                <p>When there are multiple colors that need to etch and fill-in the ink, there need to be at least 1mm gap in between.</p>
                <p><img src="{{ asset('frontend/img/static/feature/etching-print-feature-img2.jpg') }}" alt="ETCHING"></p>
                <p><img src="{{ asset('frontend/img/static/feature/etching-print-feature-img3.jpg') }}" alt="ETCHING"></p>
                <p><img src="{{ asset('frontend/img/static/feature/etching-print-feature-img4.jpg') }}" alt="ETCHING"></p>
            </div>
            
            <div id="LASER-ENGRAVING" class="how-content-block">
                <h2>LASER ENGRAVING</h2>
                <p>Laser engraving is an extremely unique process where we use a laser to burn away the desired design. The result varies depending on the material used. On our black duplex uncoated cardstock the result is an intriguing depressed bronze look. Laser engraving on our smooth white cards creates a unique tone. On our quick metal business cards the unique texture of the card causes the laser to create a bronzed gold look while it creates a silver highlight on our black metal cards.</p>
                <p><img src="{{ asset('frontend/img/static/feature/laser-engraving-print-feature-img3.jpg') }}" alt="LASER ENGRAVING"></p>
                <Strong>Considerations:</Strong>
                <p>Laser engraving is not recommended for detailed designs.</p>
                <p><img src="{{ asset('frontend/img/static/feature/laser-engraving-print-feature-img1.jpg') }}" alt="LASER ENGRAVING"></p>
                <p><img src="{{ asset('frontend/img/static/feature/laser-engraving-print-feature-img2.jpg') }}" alt="LASER ENGRAVING"></p>
            </div>
            
            <div id="CUT-THROUGH" class="how-content-block">
                <h2>CUT THROUGH</h2>
                <p>Die cutting is a process where we can customize the shape of your card. This is a great way to make your business cards a unique representation of your brand. We offer both simple and complicated die cuts allowing us to create everything from product tags to unique shapes. </p>
                <p><img src="{{ asset('frontend/img/static/feature/cut-through-print-feature-img1.jpg') }}" alt="CUT THROUGH"></p>
                <Strong>Considerations:</Strong>
                <p>Die cutting is a very unique process so please consult with our sales team prior to ordering to verify feasibility and pricing. </p>
                <p><img src="{{ asset('frontend/img/static/feature/cut-through-print-feature-img2.jpg') }}" alt="CUT THROUGH"></p>                
            </div>
            
            <div id="SPOT-COLOR" class="how-content-block">
                <h2>SPOT COLOR</h2>
                <p>Spot colour is a special technique with which we can apply brilliant solid colours to metal cards. Although it is recommend to be combined with etching, it can stand alone as well given the right design. Our spot colour is the perfect way to add your branding to our already exquisite metal cards.</p>
                <p><img src="{{ asset('frontend/img/static/feature/spot-color-print-feature-img1.jpg') }}" alt="SPOT COLOR"></p>
                <Strong>Considerations:</Strong>
                <p>Spot colour is ideal for designs that do not include fine details and for designs that are not gradients. </p>
                <p><img src="{{ asset('frontend/img/static/feature/spot-color-print-feature-img2.jpg') }}" alt="SPOT COLOR"></p>
            </div>
                        
            <div id="PRISM-FROST" class="how-content-block">
                <h2>PRISM FROST</h2>
                <p>Our exclusive prism and frost finishings are an elegant etching process that is used on our luxury black metal cards to create a textured and fingerprint resistant finish. Prism finishing creates a beautiful micro geometric pattern while frost finishing has an elegant and subtle texture. Opting for our luxury metal business cards with either of these finishings is a superb way to make a bold and confident statement about your company.</p>
                <p><img src="{{ asset('frontend/img/static/feature/prism-frost-print-feature-img2.jpg') }}" alt="PRISM FROST"></p>
                <p><img src="{{ asset('frontend/img/static/feature/prism-frost-print-feature-img3.jpg') }}" alt="PRISM FROST"></p>
                <p><img src="{{ asset('frontend/img/static/feature/prism-frost-print-feature-img1.jpg') }}" alt="PRISM FROST"></p>
            </div>    
            
            <div id="VARIABLE-DATA" class="how-content-block">
                <h2>VARIABLE DATA</h2>
                <p>Variable data is the perfect way to add a customization to each of your cards. Only available on metal, our variable data can be either laser engraved or applied with spot colour to make a single aspect of each card unique. This finishing is a perfect to add unique membership codes or names.</p>
                <p><img src="{{ asset('frontend/img/static/feature/variable-data-print-feature-img1.jpg') }}" alt="VARIABLE DATA"></p>
                <Strong>Considerations:</Strong>
                <p>Client must be able to provide the font file.</p>
               <p><img src="{{ asset('frontend/img/static/feature/variable-data-print-feature-img2.jpg') }}" alt="VARIABLE DATA"></p>
            </div>
            
            <div id="BLEED-DESIGN" class="how-content-block">
                <h2>BLEED DESIGN</h2>
                <p>A design is considered full bleed when any printed elements extend within 0.25” of the end of the card. The reason for this is due to the printing process having to be performed prior to trimming the cards to properly execute the design and alignment. </p>
                <p><img src="{{ asset('frontend/img/static/feature/bleed-print-feature-img1.jpg') }}" alt="BLEED DESIGN"></p>
                <Strong>Considerations:</Strong>
                <p>Full bleed pricing is included in offset printing, white ink and metallic ink. All other print finishings will have a surcharge.</p>
                <p><img src="{{ asset('frontend/img/static/feature/bleed-print-feature-img2.jpg') }}" alt="BLEED DESIGN"></p>
            </div>            
            
            
            <div id="THICKNESS" class="how-content-block">
                <h2>THICKNESS</h2>
                <p>Thickness refers to the width of the card when examining the edges. We measure the thickness of our cardstocks in points which is is a standard unit of measurement. 1pt is equal to 1/72 of an inch. </p>
                <p><img src="{{ asset('frontend/img/static/feature/thickness-print-feature-img.jpg') }}" alt="BUSINESS CARD THICKNESS"></p>
                <Strong>Considerations:</Strong>
                <p>Thickness is different from cardstock weight since it does not indicate the density of the stock. To find out the approximate cardstock weight please email in to <a mailto:sales@rockdesign.com>sales@rockdesign.com</a> for more information.</p>
            </div> 
            
            
            <div id="SIZE" class="how-content-block">
                <h2>SIZE</h2>
                <p>Size refers to the dimensions of the business card. The North American standard is 3.5”x 2” however we can produce odd sized cards to meet your needs.</p>
                <p><img src="{{ asset('frontend/img/static/feature/size-print-feature-img.jpg') }}" alt="BUSINESS CARD SIZE"></p>
                <Strong>Considerations:</Strong>
                <p>Pricing for some odd sized card options under the standard size is available on our website. For oversized or unique odd sizes please email in to <a mailto:sales@rockdesign.com>sales@rockdesign.com</a> for a custom quote.</p>
            </div> 
            
            
            <div id="CARDSTOCK" class="how-content-block">
                <h2>CARDSTOCK</h2>
                <p>This is the material on which we print the cards. We offer a wide selection of everything from white to black, textured to smooth, and metal to plastic. </p>
                <p><img src="{{ asset('frontend/img/static/feature/cardstock-print-feature-img1.jpg') }}" alt="CARDSTOCKS"></p>
                <Strong>Considerations:</Strong>
                <p>Not all cardstocks are ideal for all designs. If you have any questions or concerns please ask one of our sales assistants to asses your design for print feasibility on your cardstock of choice.</p>
                <p><img src="{{ asset('frontend/img/static/feature/cardstock-print-feature-img2.jpg') }}" alt="CARDSTOCKS"></p>
            </div> 
            
            <div id="OVERSIZE-PLATES" class="how-content-block">
                <h2>OVERSIZE PLATES</h2>
                <p>Oversized plates are required for designs that are full bleed and use plate stamping techniques. Full bleed is a design that comes with in 0.25” of the edge of the card. Plate-required techniques include but are not limited to: Foil stamping, deboss, emboss, letterpress, and thermography. If the design comes with in 0.25” of the edge of the card a larger plate is required to be crafted to accurately complete the print job. If your design comes with in 0.25” of the edge please be sure to select this option on our price calculator.</p>
                <p><img src="{{ asset('frontend/img/static/feature/oversize-plates-print-feature-img1.jpg') }}" alt="OVERSIZE PLATES"></p>
                <p><img src="{{ asset('frontend/img/static/feature/oversize-plates-print-feature-img2.jpg') }}" alt="OVERSIZE PLATES"></p>
            </div>
            
            <div id="LASER-CUT" class="how-content-block">
                <h2>LASER CUT</h2>
                <p>Laser cutting is a process which uses a laser to cut our acrylic cards into a unique shape. This finishing is an ideal way to add further personalization to your card order. Within the laser cut feature a custom cut out can also be included.</p>
                <p><img src="{{ asset('frontend/img/static/feature/laser-cut-print-feature-img.jpg') }}" alt="LASER CUT"></p>
                <Strong>Considerations:</Strong>
                <p>Laser cutting is only available on our acrylic cardstock however if you are interested in custom shape cards our metal cards also include custom die cut which is a similar process. This feature is not ideal for highly detailed designs. All website pricing only applies to cards that fit with in the standard 3.5” x 2” size. For oversized pricing please request a custom quote.</p>
            </div> 
            
            <div id="ORIGINAL-FINISHING" class="how-content-block">
                <h2>ORIGINAL FINISHING</h2>
                <p>Original finishing refers to the appearance of the stainless steel stock. Although it is not as reflective as our mirror finishing it still has an elegant sheen which is comparable to the appearance of standard high end stainless steel appliances. </p>
                <p><img src="{{ asset('frontend/img/static/feature/original-finishing-print-feature-img1.jpg') }}" alt="ORIGINAL FINISHING"></p>
                <Strong>Considerations:</Strong>
                <p>Original finishing is an excellent option for metal card designs that have large amounts of un-etched material since it is more scratch resistant that our mirror finishing. Original finishing is only available on our stainless steel cards. A different surface finishing can be used each side of our stainless steel cards with the restriction of there being only one per side.</p>
                <p><img src="{{ asset('frontend/img/static/feature/original-finishing-print-feature-img2.jpg') }}" alt="ORIGINAL FINISHING"></p>
            </div> 
            
            
            <div id="MIRROR-FINISHING" class="how-content-block">
                <h2>MIRROR FINISHING</h2>
                <p>Mirror finishing is a beautiful way to create a highly reflective and polished look on our gold, stainless steel or rose gold cards. With this finishing the un-etched surface will have an elegant sheen.</p>
                <p><img src="{{ asset('frontend/img/static/feature/mirror-finishing-print-feature-img1.jpg') }}" alt="MIRROR FINISHING"></p>
                <Strong>Considerations:</Strong>
                <p>Mirror finishing is more prone to show scratches and blemishes. This finishing is recommended for use with designs where etching covers a large portion of the surface of the card. A different surface finishing can be used each side of our stainless steel cards with the restriction of there being only one per side.</p>
                <p><img src="{{ asset('frontend/img/static/feature/mirror-finishing-print-feature-img2.jpg') }}" alt="MIRROR FINISHING"></p>
            </div> 
            
            <div id="BRUSHED-FINISHING" class="how-content-block">
                <h2>BRUSHED FINISHING</h2>
                <p>Brushed finishing is one of three surface finishing options we offer for our stainless steel cardstocks. This finishing creates a subtle linear brush pattern on the un-etched surface of the card. </p>
                <p><img src="{{ asset('frontend/img/static/feature/brushed-finishing-print-feature-img1.jpg') }}" alt="BRUSHED FINISHING"></p>
                <Strong>Considerations:</Strong>
                <p>This finishing is ideal for clients with designs with both large amounts of etching or large amounts of un-etched surface. A different surface finishing can be used each side of our stainless steel cards with the restriction of there being only one per side.</p>
                <p><img src="{{ asset('frontend/img/static/feature/brushed-finishing-print-feature-img2.jpg') }}" alt="BRUSHED FINISHING"></p>
            </div> 
            
        </div>
        <div class="col-md-3 how-order-sidebar-wrap">
            <div class="how-order-sidebar">
                <ul class="how-order-sidebar-menu">
                    <li><a href="#EMBOSS">EMBOSS</a></li>
                    <li><a href="#DEBOSS">DEBOSS</a></li>
                    <li><a href="#FOIL-STAMPING">FOIL STAMPING</a></li>
                    <li><a href="#OFFSET-PRINTING">OFFSET PRINTING</a></li>
                    <li><a href="#SPOT-UV">SPOT UV</a></li>
                    <li><a href="#THERMOGRAPHY">THERMOGRAPHY</a></li>
                    <li><a href="#LETTERPRESS">LETTERPRESS</a></li>
                    <li><a href="#METALLIC-INK">METALLIC INK</a></li>
                    <li><a href="#WHITE-INK">WHITE INK</a></li>
                    <li><a href="#DIE-CUTTING">DIE CUTTING</a></li>
                    <li><a href="#EDGE-FOIL">EDGE FOIL</a></li>
                    <li><a href="#EDGE-PAINT">EDGE PAINT</a></li>
                    <li><a href="#ETCHING">ETCHING</a></li>
                    <li><a href="#LASER-ENGRAVING">LASER ENGRAVING</a></li>
                    <li><a href="#CUT-THROUGH">CUT THROUGH</a></li>
                    <li><a href="#SPOT-COLOR">SPOT COLOR</a></li>
                    <li><a href="#PRISM-FROST">PRISM / FROST FINISHING</a></li>
                    <li><a href="#VARIABLE-DATA">VARIABLE DATA</a></li>
                    <li><a href="#BLEED-DESIGN">BLEED DESIGN</a></li>
                    <li><a href="#THICKNESS">THICKNESS</a></li>
                    <li><a href="#SIZE">SIZE</a></li>
                    <li><a href="#CARDSTOCK">CARDSTOCK</a></li>
                    <li><a href="#OVERSIZE-PLATES">OVERSIZE PLATES</a></li>
                    <li><a href="#LASER-CUT">LASER-CUT</a></li>
                    <li><a href="#ORIGINAL-FINISHING">ORIGINAL FINISHING</a></li>
                    <li><a href="#MIRROR-FINISHING">MIRROR FINISHING</a></li>
                    <li><a href="#BRUSHED-FINISHING">BRUSHED FINISHING</a></li>

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
<script>
$(".how-order-sidebar ul").sticky({
    topSpacing: 0,
    bottomSpacing: 750
});

$('.how-order-sidebar-menu li a').click(function() {
    $('html,body').animate({
        scrollTop: $(this.hash).offset().top
    }, 200);
    return false;
    e.preventDefault();
});
</script>
@stop