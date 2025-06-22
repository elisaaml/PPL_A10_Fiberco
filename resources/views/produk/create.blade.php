@extends('layouts.aps')

@section('content')
    <br><br><br><br>
    <h3 style="color:black; font-weight:bold; font-size:60px; margin: 0;">Add Product</h3>
    <br>
    <form id="add-produk" action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="action" value="add">
        <div class="form-group">
            <label for="produk_name">Product Name</label>
            <input type="produk_name" class="form-control dark" name="produk_name" id="produk_name"
                placeholder="Product Name" required>
            @error('produk_name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stok">Stock</label>
            <input type="stok" class="form-control dark" name="stok" id="stok" placeholder="Stock" required>
            @error('stok')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Description</label>
            <input type="text" class="form-control dark" name="deskripsi" id="deskripsi" placeholder="Description"
                required>
            @error('deskripsi')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="produk_img">Image</label>
            <input type="file" class="form-control dark" name="produk_img" id="produk_img">
            @error('produk_img')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="button" class="btn btn-dark mb-5" id="btn-submit">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('btn-submit').addEventListener('click', function(e) {
            Swal.fire({
                title: 'Are you sure you want to add this product?',
                //text: "Pastikan data sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('add-produk').submit();
                }
            });
        });
    </script>
@endsection
