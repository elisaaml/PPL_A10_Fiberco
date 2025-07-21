@extends('layouts.aps')

@section('content')
<br><br><br><br>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1 style="color:black; font-weight:bold; font-size:60px; margin: 0;">{{ __('Teams') }}</h1>
    <a href="{{ route('team.create') }}" class="btn btn-sm btn-custom">Add New Team +</a>
</div>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="products-area-wrapper tableView">
    <div class="products-header">
        <div class="product-cell">ID</div>
        <div class="product-cell">Name</div>
        <div class="product-cell">Position</div>
        <div class="product-cell">Description</div>
        <div class="product-cell">Image</div>
        <div class="product-cell">Action</div>
    </div>

    @forelse ($team as $item)
        <div class="products-row">
            <div class="product-cell">{{ ++$i }}</div>
            <div class="product-cell">{{ $item->team_name }}</div>
            <div class="product-cell">{{ $item->team_position }}</div>
            <div class="product-cell">{{ $item->team_description }}</div>
            <div class="product-cell"><img src="/img/teams/{{ $item->team_img }}" width="100%"></div>
            <div class="product-cell">
                <a href="{{ route('team.edit', $item->id) }}" class="btn btn-sm btn-icon">
                    <ion-icon name="create-outline"></ion-icon>
                </a>
                <form action="{{ route('team.destroy', $item->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-icon delete-btn">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="products-row">
            <div class="product-cell" colspan="6">There are no data.</div>
        </div>
    @endforelse

    <div style="margin-top: 20px;">
        {!! $team->links() !!}
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Seleksi semua tombol delete
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure want to delete this?',
                // text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form terdekat (form delete)
                    this.closest('form').submit();
                }
            });
        });
    });
</script>

@if (session('success_delete'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success_delete') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@endsection
