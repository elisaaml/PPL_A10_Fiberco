@extends('layouts.aps')

@section('content')
<br><br><br><br>
<h3 style="color:black; font-weight:bold; font-size:60px; margin: 0;">Edit Partner</h3>
<br>
<form id="edit-partner" action="{{ route('partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="partner_name">Partner Name</label>
        <input type="text" class="form-control dark" name="partner_name" id="partner_name"
            value="{{ $partner->partner_name }}" required>
        @error('partner_name')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="partner_img">Image</label>
        <input type="file" name="partner_img" class="form-control @error('partner_img') is-invalid @enderror" id="partner_img">
        <img src="/img/partners/{{ $partner->partner_img }}" width="300px">
        @error('partner_img')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="button" id="btn-submit" class="btn btn-dark mb-5">Submit</button>
</form>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btn-submit').addEventListener('click', function(e) {
        Swal.fire({
            title: 'Are you sure you want to update this partner?',
            // text: "Please double-check the information before saving.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#343a40',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('edit-partner').submit();
            }
        });
    });
</script>
@endsection
