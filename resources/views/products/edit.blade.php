@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="name">Product Name *</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="price">Price *</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="stocks[]">Stocks *</label>
                    <select multiple class="form-control" id="stocks[]" name="stocks[]">
                        @foreach ($stocks as $id => $name)
                        <option value="{{ $id }}"
                            {{ !in_array($id, $product->stocks->pluck('id')->all()) ?: 'selected' }}>
                            {{ $name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Product description</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{ $product->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection