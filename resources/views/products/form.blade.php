@extends('layouts.app')

@section('content')
<div class="container">
<form id="productForm"
      method="POST"
      action="{{ isset($product) ? route('products.update',$product) : route('products.store') }}">
    @csrf
    @isset($product) @method('PUT') @endisset

    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ $product->name ?? '' }}">
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" id="category" class="form-control">
            <option value="">Select</option>
            @foreach($categories as $id => $name)
                <option value="{{ $id }}"
                    {{ isset($product) && $product->category_id == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="text" name="price" class="form-control"
               value="{{ $product->price ?? '' }}">
    </div>

    <div class="mb-3">
        <label>Quantity</label>
        <input type="text" name="quantity" class="form-control"
               value="{{ $product->quantity ?? '' }}">
    </div>

    <button class="btn btn-success">Save</button>
</form>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {

    $('#category').select2({
        placeholder: "Select Category",
        width: '100%'
    });

    $('#productForm').validate({
        rules: {
            name: { required: true },
            category_id: { required: true },
            price: { required: true, number: true },
            quantity: { required: true, digits: true }
        },
        messages: {
            name: "Please enter product name",
            category_id: "Please select category",
            price: "Please enter valid price",
            quantity: "Please enter quantity"
        },
        errorClass: 'text-danger'
    });

});
</script>
@endpush
