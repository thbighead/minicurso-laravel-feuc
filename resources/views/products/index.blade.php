@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Listing Products!
                    <ul class="list-group">
                        @foreach ($products as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}
                            {{-- <span class="badge badge-primary badge-pill">14</span> --}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
