<div class="container section sub-sect-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="sub-nav-sect">
                <div class="section-title">
                    <h1>SUPPORT</h1>                            
                </div>
                <nav class="sub-nav">
                    <div class="sub-nav-wrap">
                        <ul>
                            <li @if($page_menu == 'how_order') class="current" @endif><a href="{{ route('page.how.order.html') }}"><img src="{{ asset('frontend/img/how-to-order-icon.svg') }}" alt="HOW TO ORDER">HOW TO ORDER</a></li>
                            <li @if($page_menu == 'file_setup') class="current" @endif><a href="{{ route('page.file.setup.html') }}"><img src="{{ asset('frontend/img/file-setup-icon.svg') }}" alt="FILE SETUP">FILE SETUP</a></li>
                            <li @if($page_menu == 'print_feature') class="current" @endif><a href="{{ route('page.print.feature.html') }}"><img src="{{ asset('frontend/img/print-feature-icon.svg') }}" alt="PRINT FEATURES">PRINT FEATURES</a></li>
                            <li @if($page_menu == 'faq') class="current" @endif><a href="{{ route('page.faq.html') }}"><img src="{{ asset('frontend/img/faq-icon.svg') }}" alt="FAQ">FAQ</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>