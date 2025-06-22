<style>
    .sec {
        border-style: solid;
        border-color: #1c3a10 !important;
        border-radius: 50px !important;
        padding: 50px !important;
        background-color: #fff !important;
    }
</style>
@extends('layouts.aps')

@section('content')
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Hello, Welcome!</h1>
        </div>
        <p style="color: grey; padding-left:5px;">Welcome to Dashboard Fiberco.</p>
        <hr width="100%">

        <div class="products-area-wrapper gridView">
            <div class="products-row"
                style="width: 100%; border-radius: 50px; background-color: #1c3a10; color: #fff; display: flex; justify-content: space-between; align-items: center; position: relative; overflow: hidden;">

                <!-- Teks di kiri -->
                <div class="product-cell image" style="padding: 50px; z-index: 0;">
                    <h1 style="margin: 0;">Hai, {{ Auth::user()->name }}</h1>
                    <h4 style="margin: 0;">Ready to manage your website?</h4>
                </div>

                <!-- Gambar mengambang di atas -->
                <img src="{{ asset('img/10915594_4590503.svg') }}" alt=""
                    style="position: absolute; right: 50px; bottom: 0; max-height: 200px; z-index: 1;">
            </div>
        </div>


        <div class="products-area-wrapper gridView justify-content-center d-flex mt-5">
            <div class="products-row sec" style="padding: 20px;">
                <div class="product-cell image text-center">
                    <h2 style="font-weight:bold">{{ $products }}</h2>
                    <h2 style="font-weight:bold">Products</h2>
                </div>
            </div>
            <div class="products-row sec" style="padding: 20px;">
                <div class="product-cell image text-center">
                    <h2 style="font-weight:bold">{{ $partners }}</h2>
                    <h2 style="font-weight:bold">Partners</h2>
                </div>
            </div>
            <div class="products-row sec" style="padding: 20px;">
                <div class="product-cell image text-center">
                    <h2 style="font-weight:bold">{{ $faqs }}</h2>
                    <h2 style="font-weight:bold">FAQs</h2>
                </div>
            </div>
        </div>

    </div>
@endsection
