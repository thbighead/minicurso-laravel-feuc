@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text">{{ $product->name }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Price</h5>
                    <p class="card-text">$ {{ $product->price }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Stocks</h5>
                    @foreach ($product->stocks as $stock)
                    <a href="#" class="card-link">{{ $stock->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Product description</h5>
                    <p class="card-text">
                        {{ (bool) $product->description ? $product->description : 'No description' }}
                    </p>
                </div>
            </div>
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection