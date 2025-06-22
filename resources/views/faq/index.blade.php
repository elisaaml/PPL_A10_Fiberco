@extends('layouts.aps')

@section('content')
    <br><br><br><br>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="color:black; font-weight:bold; font-size:60px; margin: 0;">{{ __('FAQ') }}</h1>
        <a href="{{ route('faq.create') }}" class="btn btn-sm btn-custom">Add New FAQ +</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell">ID</div>
            <div class="product-cell">Question</div>
            <div class="product-cell">Answer</div>
            <div class="product-cell">Action</div>
        </div>

        @forelse ($faq as $item)
            <div class="products-row">
                <div class="product-cell">{{ ++$i }}</div>
                <div class="product-cell">{{ $item->faq_quest }}</div>
                <div class="product-cell"><x-ellipsis :text="$item->faq_answ" :limit="50" /></div>
                <div class="product-cell">
                    <form id="delete-form" action="{{ route('faq.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                        <a href="{{ route('faq.edit', $item->id) }}" class="btn btn-sm btn-icon"><ion-icon
                                name="create-outline"></ion-icon></a>
                        @csrf
                        @method('DELETE')
                        <button type="button" id="submit-btn" class="btn btn-sm btn-icon"><ion-icon
                                name="trash-outline"></ion-icon></button>
                    </form>
                </div>
            </div>
        @empty
            <div class="products-row">
                <div class="product-cell" colspan="4">There are no data.</div>
            </div>
        @endforelse

        <div style="margin-top: 20px;">
            {!! $faq->links() !!}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success_create'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success_create') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if (session('success_update'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success_update') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <script>
        document.getElementById('submit-btn').addEventListener('click', function(e) {
            Swal.fire({
                title: 'Are you sure you want to delete this FAQ?',
                //text: "Pastikan data sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
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
