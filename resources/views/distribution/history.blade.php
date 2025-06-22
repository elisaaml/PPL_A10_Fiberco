@extends('layouts.aps')

@section('content')
    <br><br><br><br>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="color:black; font-weight:bold; font-size:60px; margin: 0;">{{ __('History Data Distribution') }}</h1>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell">ID</div>
            <div class="product-cell">Customer Name</div>
            <div class="product-cell">Product</div>
            <div class="product-cell">Qty</div>
            <div class="product-cell">Address</div>
            <div class="product-cell">Shipping Date</div>
            <div class="product-cell">Completed At</div>
            <div class="product-cell">Status</div>
        </div>

        @forelse ($distribution as $item)
            <div class="products-row">
                <div class="product-cell">{{ ++$i }}</div>
                <div class="product-cell">{{ $item->cust_name }}</div>
                <div class="product-cell">{{ $item->produk->produk_name }}</div>
                <div class="product-cell">{{ $item->qty }}</div>
                <div class="product-cell"><x-ellipsis :text="$item->address" :limit="50" /></div>
                <div class="product-cell">{{ $item->shipping_date }}</div>
                <div class="product-cell">{{ $item->completed_at }}</div>
                <div class="product-cell">{{ $item->status }}</div>
            </div>
        @empty
            <div class="products-row">
                <div class="product-cell text-center" colspan="8">There are no data.</div>
            </div>
        @endforelse

    </div>
@endsection
