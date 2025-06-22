@extends('layouts.aps')

@section('content')
    <br><br><br><br>
    <h3 style="color:black; font-weight:bold; font-size:60px; margin: 0;">Edit Distribution</h3>
    <br>
    <form id="edit-distrib" action="{{ route('distribution.update', $distribution->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="cust_name">Customer Name</label>
            <input type="text" class="form-control dark" name="cust_name" id="cust_name"
                value="{{ $distribution->cust_name }}" required>
            @error('cust_name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="produk_id">Product</label>
            <select class="form-control dark" name="produk_id" id="produk_id" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($produk as $product)
                    <option value="{{ $product->id }}" {{ $distribution->produk_id == $product->id ? 'selected' : '' }}>
                        {{ $product->produk_name }}
                    </option>
                @endforeach
            </select>
            @error('produk_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" class="form-control dark" name="qty" id="qty" value="{{ $distribution->qty }}"
                required>
            @error('qty')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea type="text" class="form-control dark" name="address" id="address" required>{{ $distribution->address }}</textarea>
            @error('address')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="shipping_date">Shipping Date</label>
            <input type="date" class="form-control dark" name="shipping_date" id="shipping_date"
                value="{{ $distribution->shipping_date }}" required>
            @error('shipping_date')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control dark" name="status" id="status" required>
                <option value="On Process" {{ $distribution->status == 'On Process' ? 'selected' : '' }}>On Process
                </option>
                <option value="Delivered" {{ $distribution->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="Complete" {{ $distribution->status == 'Complete' ? 'selected' : '' }}>Complete</option>
                <option value="On Hold" {{ $distribution->status == 'On Hold' ? 'selected' : '' }}>On Hold</option>
            </select>
            @error('status')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="button" id="btn-submit" class="btn btn-dark mb-5">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('btn-submit').addEventListener('click', function(e) {
            Swal.fire({
                title: 'Are you sure want to save the changes to this distribution?',
                //text: "Pastikan data sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('edit-distrib').submit();
                }
            });
        });
    </script>
@endsection
