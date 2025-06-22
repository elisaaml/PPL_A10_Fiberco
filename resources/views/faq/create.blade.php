@extends('layouts.aps')

@section('content')
<br><br><br><br>
    <h3 style="color:black; font-weight:bold; font-size:60px; margin: 0;">Add FAQ</h3>
    <br>
    <form id="add-faq" action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="action" value="add">
        <div class="form-group">
            <label for="faq_quest">Question</label>
            <textarea type="faq_quest" class="form-control dark" name="faq_quest" id="faq_quest"
                placeholder="Question" required></textarea>
            @error('faq_quest')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="faq_answ">Answer</label>
            <textarea type="text" class="form-control dark" name="faq_answ" id="faq_answ" placeholder="Answer" required></textarea>
            @error('faq_answ')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="button" id="btn-submit" class="btn btn-dark mb-5">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('btn-submit').addEventListener('click', function(e) {
            Swal.fire({
                title: 'Are you sure you want to add this new FAQ?',
                //text: "Pastikan data sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('add-faq').submit();
                }
            });
        });
    </script>
@endsection
