@extends('layouts.aps')

@section('content')
<br><br><br><br>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1 style="color:black; font-weight:bold; font-size:60px; margin: 0;">{{ __('Partners') }}</h1>
    <a href="{{ route('partner.create') }}" class="btn btn-sm btn-custom">Add New Partner +</a>
</div>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="products-area-wrapper tableView">
    <div class="products-header">
        <div class="product-cell">ID</div>
        <div class="product-cell">Partner Name</div>
        {{-- <div class="product-cell">Description</div> --}}
        <div class="product-cell">Image</div>
        <div class="product-cell">Action</div>
    </div>

    @forelse ($partner as $item)
        <div class="products-row">
            <div class="product-cell">{{ ++$i }}</div>
            <div class="product-cell">{{ $item->partner_name }}</div>
            {{-- <div class="product-cell">{{ $item->partner_description }}</div> --}}
            <div class="product-cell"><img src="/img/partners/{{ $item->partner_img }}" width="100%"></div>
            <div class="product-cell">
                <form action="{{ route('partner.destroy', $item->id) }}" method="POST" class="delete-form" data-name="{{ $item->partner_name }}">
                    <a href="{{ route('partner.edit', $item->id) }}" class="btn btn-sm btn-icon">
                        <ion-icon name="create-outline"></ion-icon>
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-icon btn-delete">
                        <ion-icon name="trash-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="products-row">
            <div class="product-cell" colspan="4">There are no data.</div>
        </div>
    @endforelse

    <div style="margin-top: 20px;">
        {!! $partner->links() !!}
    </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Tambahkan event listener ke semua tombol hapus
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            const form = this.closest('form');
            const partnerName = form.getAttribute('data-name');

            Swal.fire({
                title: 'Are you sure want to delete this partner?',
                // text: `Do you want to delete partner "${partnerName}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection

