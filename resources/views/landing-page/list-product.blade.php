@extends('layouts.landing-page')

@section('content')
    <section id="product" class="padding-large overflow-hidden mt-5">
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="section-title under">Our Products</h2>
                    <p>Discover our range of high-quality products</p>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="icon-box-wrapper d-flex flex-wrap d-flex justify-content-center align-items-center">
                            @forelse ($listProduk as $item)
                                <div class="icon-box col-md-4 col-sm-12 mt-3">
                                    <div class="content-box" style="padding:20px;">
                                        <img src="{{ asset('/img/produk/' . $item->produk_img) }}" alt="icon"
                                            width="100%">
                                        <div class="icon-content mt-3">
                                            <h3 class="no-margin mb-3">{{ $item->produk_name }}</h3>
                                        </div>
                                        <p><x-ellipsis :text="$item->deskripsi" :limit="100" /></p>
                                        <a href="{{ route('produk-detail', $item) }}" class="btn btnn">View
                                            Details</a>
                                    </div>
                                </div>
                            @empty
                                <center>
                                    <p>Product Not Available</p>
                                </center>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
