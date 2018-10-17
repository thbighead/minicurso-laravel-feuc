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
                        <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm " type="submit">
                                    <i class="material-icons">delete</i>
                            </button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>