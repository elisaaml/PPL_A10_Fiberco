@extends('layouts.aps')

@section('content')
    <br><br><br><br>
    <h3 style="color:black; font-weight:bold; font-size:60px; margin: 0;">Add Distribution</h3>
    <br>
    <form id="add-distrib" action="{{ route('distribution.store') }}" method="POST">
        @csrf
        <input type="hidden" name="action" value="add">
        <div class="form-group">
            <label for="cust_name">Customer Name</label>
            <input type="text" class="form-control dark" name="cust_name" id="cust_name" placeholder="Customer Name"
                required>
            {{-- @error('cust_name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror --}}
        </div>

        <div class="form-group">
            <label for="produk_id">Product</label>
            <select class="form-control dark" name="produk_id" id="produk_id" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($produk as $product)
                    <option value="{{ $product->id }}">{{ $product->produk_name }}</option>
                @endforeach
            </select>
            {{-- @error('produk_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror --}}
        </div>

        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" class="form-control dark" name="qty" id="qty" placeholder="Quantity" required>
            {{-- @error('qty')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror --}}
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea type="text" class="form-control dark" name="address" id="address" placeholder="Address" required></textarea>
            {{-- @error('address')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror --}}
        </div>

        <div class="form-group">
            <label for="shipping_date">Shipping Date</label>
            <input type="date" class="form-control dark" name="shipping_date" id="shipping_date"
                placeholder="Customer Name" required>
            {{-- @error('shipping_date')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror --}}
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control dark" name="status" id="status" required>
                <option value="On Process">On Process</option>
                <option value="Delivered">Delivered</option>
                <option value="Complete">Complete</option>
                <option value="On Hold">On Hold</option>
            </select>
            {{-- @error('status')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror --}}
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Data harap diisi semua.</strong>
            </div>
            @endif --}}
            {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="form-text text-danger">{{ $error }}</div>
                @endforeach
            @endif --}}
            @if ($errors->any())
                <div class="form-text text-danger">Please fill out all required fields.</div>
            @endif

        </div>

        <button type="button" id="btn-submit" class="btn btn-dark mb-5">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('btn-submit').addEventListener('click', function(e) {
            Swal.fire({
                title: 'Are you sure you want to add this new Distribution?',
                //text: "Pastikan data sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('add-distrib').submit();
                }
            });
        });
    </script>
@endsection
