@extends('layouts.aps')

@section('content')
<br><br><br><br>
<h3 style="color:black; font-weight:bold; font-size:60px; margin: 0;">Add Partner</h3>
<br>
<form id="add-partner" action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="action" value="add">

    <div class="form-group">
        <label for="partner_name">Partner Name</label>
        <input type="text" class="form-control dark" name="partner_name" id="partner_name"
            placeholder="Partner Name" required>
        @error('partner_name')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- <div class="form-group">
        <label for="partner_description">Description</label>
        <textarea class="form-control dark" name="partner_description" id="partner_description" placeholder="Partner Description" required></textarea>
        @error('partner_description')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div> --}}

    <div class="form-group">
        <label for="partner_img">Image</label>
        <input type="file" class="form-control dark" name="partner_img" id="partner_img">
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
            title: 'Are you sure want to add this new partner?',
            // text: "Make sure all the information is correct before submitting.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#343a40',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('add-partner').submit();
            }
        });
    });
</script>
@endsection

