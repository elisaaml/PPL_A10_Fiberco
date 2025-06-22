@extends('layouts.aps')

@section('content')
<br><br><br><br>
<h3 style="color:black; font-weight:bold; font-size:60px; margin: 0;">Edit Team</h3>
<br>
<form id="edit-team" action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="team_name">Name</label>
        <input type="text" class="form-control dark" name="team_name" id="team_name"
               value="{{ $team->team_name }}" required>
        @error('team_name')
        <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="team_position">Position</label>
        <input type="text" class="form-control dark" name="team_position" id="team_position"
               value="{{ $team->team_position }}" required>
        @error('team_position')
        <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="team_description">Description</label>
        <textarea class="form-control dark" name="team_description" id="team_description"
                  required>{{ $team->team_description }}</textarea>
        @error('team_description')
        <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="team_img">Image</label>
        <input type="file" name="team_img" class="form-control @error('team_img') is-invalid @enderror" id="team_img">
        <img src="/img/teams/{{ $team->team_img }}" width="300px">
        @error('team_img')
        <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="button" class="btn btn-dark mb-5" id="btn-submit">Submit</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btn-submit').addEventListener('click', function (e) {
        Swal.fire({
            title: 'Are you sure want to save the changes to this team member?',
            // text: "Pastikan data sudah benar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#343a40',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('edit-team').submit();
            }
        });
    });
</script>
@endsection

