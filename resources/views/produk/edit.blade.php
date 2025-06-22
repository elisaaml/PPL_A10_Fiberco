@extends('layouts.aps')

@section('content')
    <h3 style="color:black; font-weight:bold; font-size:60px; margin: 0;">Edit Produk</h3>
    <br>
    <form id="edit-produk" action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="produk_name">Product Name</label>
            <input type="produk_name" class="form-control dark" name="produk_name" id="produk_name"
                value="{{ $produk->produk_name }}" required>
            @error('produk_name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stok">Stock</label>
            <input type="stok" class="form-control dark" name="stok" id="stok"
                value="{{ $produk->stok }}" required>
            @error('stok')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Description</label>
            <input type="text" class="form-control dark" name="deskripsi" id="deskripsi" value="{{ $produk->deskripsi }}"
                required>
            @error('deskripsi')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="produk_img">Image</label>
            <input type="file" name="produk_img" class="form-control @error('produk_img') is-invalid @enderror" id="produk_img">
            <img src="/img/produk/{{ $produk->produk_img }}" width="300px">
            @error('produk_img')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="button" id="btn-submit" class="btn btn-dark mb-5">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('btn-submit').addEventListener('click', function(e) {
            Swal.fire({
                title: 'Are you sure you want to save the changes to this product?',
                //text: "Pastikan data sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('edit-produk').submit();
                }
            });
        });
    </script>
@endsection
