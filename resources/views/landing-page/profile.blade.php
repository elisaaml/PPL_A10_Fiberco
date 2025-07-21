@extends('layouts.landing-page')

@section('content')
    <!-- about us -->
    <section id="quality" class="padding-large position-relative mt-5">
        <div class="section-header text-center">
            <h2 class="section-title under">About Us</h2>
        </div><br>
        <div class="container">
            <div class="row">
                <div class="icon-box-wrapper d-flex flex-wrap justify-content-between">
                    <div class="icon-boxx text-center col-md-6 col-sm-12">
                        <div class="content-box">
                            <img src="{{ asset('/img/' . $profilCompany->banner1) }}" alt="banner 1" width="100%">
                            <div class="icon-content">
                                <p style="padding:15px; font-size:20px; text-align:justify; font-weight:600; line-height:50px">{{ $profilCompany->about1 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="icon-boxx text-center col-md-6 col-sm-12">
                        <div class="content-box">
                            <div class="icon-content">
                                <img src="{{ asset('/img/' . $profilCompany->banner2) }}" alt="banner 2" width="100%">
                                <p style="padding:15px; font-size:20px; text-align:justify; font-weight:600; line-height:50px">{{ $profilCompany->about2 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- end about us -->

    <br><br>
    <!-- partner -->
    <section id="quality">
        <div class="section-header text-center">
            <h2 class="section-title under">Our Partners</h2>
        </div><br>
        <div class="container">
            <div class="row">
                <div class="icon-box-wrapper d-flex flex-wrap justify-content-center">
                    @forelse ($partner as $item)
                    <div class="icon-box text-center col-md-3 col-sm-12">
                        <div class="content-box border-top border-bottom">
                            <div class="icon-box-icon icon-wrapper">
                                <img src="{{ asset('img/icon 2.png') }}" alt="icon" width="100px" class="img-side">
                            </div>
                            <div class="icon-content">
                                <img src="{{ asset('/img/partners/' . $item->partner_img) }}" alt="icon" style="padding:15px;" width="200px">
                                <h3 style="padding:15px;">{{ $item->partner_name }}</h3>
                            </div>
                        </div>
                    </div>
                    @empty
                        <center><p>Partner Not Available</p></center>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- end partner -->

    <!-- team -->
    <section id="quality">
        <div class="section-header text-center">
            <h2 class="section-title under">Meet Our Teams</h2>
            <p>Introducing the core team of CV. SUMBERSARI, whose expertise and dedication guarantee operational excellence and top-quality product delivery.</p>
        </div><br>
        <div class="container">
            <div class="row">
                <div class="icon-box-wrapper d-flex flex-wrap justify-content-center">
                    @forelse ($team as $item)
                    <div class="icon-box text-center col-md-3 col-sm-12">
                        <div class="content-box border-top border-bottom mb-5">
                            <div class="icon-content mb-5">
                                <img src="{{ asset('/img/teams/' . $item->team_img) }}" alt="icon" style="padding:15px;" width="200px">
                                <h3 style="padding:15px;">{{ $item->team_name }}</h3>
                                <h6 style="padding:15px;">{{ $item->team_position }}</h6>
                                <p style="padding:15px;">{{ $item->team_description }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                        <center><p>team Not Available</p></center>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- end team -->
@endsection
