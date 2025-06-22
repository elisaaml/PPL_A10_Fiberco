@extends('layouts.landing-page')

@section('content')
    <section id="product" class="padding-large overflow-hidden mt-5">
        <div class="container">
            <div class="mx-auto mt-5" style="max-width: 900px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" style="font-weight: bold">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list-produk') }}" style="font-weight: bold">Our
                                Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $produkDetail->produk_name }}</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div
                            style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <img src="{{ asset('/img/produk/' . $produkDetail->produk_img) }}" alt="icon"
                                class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <h3 class="mb-3">{{ $produkDetail->produk_name }}</h3>
                            <p><strong>Description</strong></p>
                            <p>{{ $produkDetail->deskripsi }}</p>
                            <p><strong>Stock : {{ $produkDetail->stok }}</strong></p>
                            <a href="{{ route('list-produk') }}" class="btn btnn" style="display:block">
                                &larr; Back to Products
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
