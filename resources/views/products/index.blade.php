@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
        Add Product
    </a>

    <table class="table table-bordered" id="productTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection


@push('scripts')
<script>
// $(function () {
$(document).ready(function () {

    $('#productTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.index') }}",
        columns: [
            { data: 'name', name: 'name' },
            { data: 'quantity', name: 'quantity' },
            { data: 'price', name: 'price' },
            { data: 'category', name: 'category.name' },
            { data: 'action', orderable: false, searchable: false }
        ]
    });
});

/* SweetAlert Delete */
function deleteProduct(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This product will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/products/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function () {
                    $('#productTable').DataTable().ajax.reload();
                    Swal.fire('Deleted!', 'Product has been deleted.', 'success');
                }
            });
        }
    });
}
</script>
@endpush
