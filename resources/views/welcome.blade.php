@extends('layouts.landing-page')

@section('content')
    <section id="billboard" class="padding-large position-relative mt-3">
        <div class="image-holder position-relative">
            <img src="{{ asset('img/cv sumbersari.jpg') }}" alt="banner" class="w-100 d-block">

            <div
                class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                <div class="banner-content text-center col-md-7">
                    <h2 class="banner-title text-white"><br>CV. Sumber Sari</h2>
                    <div class="btn-center mt-3">
                        <p class="text-center text-white" style="font-weight: 600; font-size:18px">Explore our sustainable
                            coconut fiber solutions and discover the benefits of cocofiber and cocopeat for your urban
                            farming and eco-friendly needs.</p>
                        <a href="{{ route('list-produk') }}" class="btn btn-custom">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- quality -->
    <section id="quality">
        <div class="section-header text-center">
            <h2 class="section-title under">Your Best Choice for Coco Products</h2>
            <p>At CV. SUMBERSARI, we strive to deliver the best coconut coir products with unmatched quality and service.
                Here's why our clients trust us:</p>
        </div><br>
        <div class="container">
            <div class="row">
                <div class="icon-box-wrapper d-flex flex-wrap justify-content-between">
                    <div class="icon-box text-center col-md-3 col-sm-12">
                        <div class="content-box border-top border-bottom">
                            <div class="icon-box-icon icon-wrapper">
                                <img src="{{ asset('img/icon.png') }}" alt="icon" width="100px" class="img-side">
                            </div>
                            <div class="icon-content">
                                <h3 class="no-margin">Premium Quality Products</h3>
                                <p style="padding:15px; font-size:16px;">We produce high-grade coco fiber and coco peat that
                                    meet international standards-perfect for agriculture, horticulture, and industrial
                                    needs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box text-center col-md-3 col-sm-12">
                        <div class="content-box border-top border-bottom">
                            <div class="icon-box-icon icon-wrapper">
                                <img src="{{ asset('img/icon 2.png') }}" alt="icon" width="100px" class="img-side">
                            </div>
                            <div class="icon-content">
                                <h3 class="no-margin">Eco-Friendly And Sustainable</h3>
                                <p style="padding:15px; font-size:16px;">Our manufacturing process uses natural waste and
                                    supports environmentally responsible practices to protect our planet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box text-center col-md-3 col-sm-12">
                        <div class="content-box border-top border-bottom">
                            <div class="icon-box-icon icon-wrapper">
                                <img src="{{ asset('img/icon 3.png') }}" alt="icon" width="100px" class="img-side">
                            </div>
                            <div class="icon-content">
                                <h3 class="no-margin">Partners</h3>
                                <p style="padding:15px; font-size:16px;">We collaborate with both local and international
                                    companies, ensuring consistency, professionalism, and customer satisfaction in every
                                    shipment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- end quality -->

    <!-- product -->
    <section id="product" class="padding-large overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="section-title under">Our Products</h2>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="icon-box-wrapper d-flex flex-wrap justify-content-center align-items-center">
                            @forelse ($produk as $item)
                                <div class="icon-boxx text-center col-md-4 col-sm-3">
                                    <div class="content-box">
                                        <div class="icon-content">
                                            <h3 class="no-margin mb-3">{{ $item->produk_name }}</h3>
                                        </div>
                                        <img src="{{ asset('/img/produk/' . $item->produk_img) }}" alt="icon"
                                            width="100%">
                                        <div class="btn-center mt-3">
                                            <a href="{{ route('list-produk') }}" class="btn"
                                                style="background-color:#283c19;text-transform:capitalize;border-radius:5px;font-weight:bold">View
                                                Product</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <center>
                                    <p>Product Not Available</p>
                                </center>
                            @endforelse
                        </div>
                    </div>
                    @if ($produk->count() >= 5)
                        <center>
                            <a href="{{ route('list-produk') }}" class="btn mt-5"
                                style="background-color:#283c19;text-transform:capitalize;border-radius:5px;font-weight:bold; display:inline-block;">
                                See More
                            </a>
                        </center>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end product -->

    <!-- contact -->
    <section id="product" style="background-color: #a57d5a; padding-top:100px; padding-bottom:70px;">
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="section-title under">Contact Us</h2>
                    <p>For further information, please click the button bellow</p>
                    <div class="btn-center">
                        <a href="{{ route('contact') }}" class="btn"
                            style="background-color:#283c19;text-transform:capitalize;border-radius:5px;font-weight:bold">Contact
                            Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact -->

    <!-- faq -->
    <section id="product" class="padding-large overflow-hidden">
        <div class="container" style="max-width: 900px;">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="section-title under">Frequently Asked Question</h2>
                </div><br>
                <div class="container">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faq as $item)
                            @php
                                $collapseId = 'collapse' . $loop->index;
                                $headingId = 'heading' . $loop->index;
                            @endphp
                            <div class="accordion-item mt-3" style="background-color: #9d7a56; color:#000">
                                <h2 class="accordion-header" id="{{ $headingId }}">
                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="{{ $collapseId }}">
                                        {{ $item->faq_quest }}
                                    </button>
                                </h2>
                                <div id="{{ $collapseId }}"
                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                    aria-labelledby="{{ $headingId }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>{{ $item->faq_quest }}</strong>
                                        <p>{{ $item->faq_answ }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end faq -->
@endsection
