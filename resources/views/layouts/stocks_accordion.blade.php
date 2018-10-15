<div id="accordion">
    @foreach ($stocks as $stock)
    <div class="card">
        <div class="card-header" id="{{ $stock->name }}">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#stock{{ $stock->id }}" aria-expanded="true" aria-controls="stock{{ $stock->id }}">
                    {{ $stock->name }}
                </button>
            </h5>
        </div>
        <div id="stock{{ $stock->id }}" class="collapse show" aria-labelledby="{{ $stock->name }}" data-parent="#accordion">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($stock->products as $product)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $product->name }}
                        {{-- <span class="badge badge-primary badge-pill">14</span> --}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>