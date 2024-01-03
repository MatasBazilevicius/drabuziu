<!-- Product Display -->
<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse($filteredProducts as $product)
        <!-- Product Card -->
        <div class="col mb-4">
            <a href="{{ route('prekes', ['id' => $product->id_Drabuzis]) }}" class="text-decoration-none">
                <div class="card h-100">
                    <img src="data:image/png;base64,{{ base64_encode($product->Nuotrauka) }}" class="card-img-top" alt="{{ $product->Pavadinimas }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->Pavadinimas }}</h5>
                        <p class="card-text">{{ $product->Aprasas }}</p>
                        <ul class="list-unstyled">
                            <li><strong>Material:</strong> {{ $product->Medziaga }}</li>
                            <li><strong>Manufacturer:</strong> {{ $product->Gamintojas }}</li>
                            <li><strong>Color:</strong> {{ $product->Spalva }}</li>
                            <li><strong>Size:</strong> {{ $product->Dydis }}</li>
                        </ul>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->Kaina }}</p>
                        <a href="{{ route('preke1', ['id' => $product->id_Drabuzis]) }}" class="btn btn-success">View Product</a>
                        <a href="{{ route('adddrabuzis.to.cart', $product->id_Drabuzis) }}" class="btn btn-outline-danger">Add to Cart</a>
                        <p class="btn-holder">
                            <a href="{{ route('prekeRedag', ['id' => $product->id_Drabuzis]) }}" class="btn btn-primary">Edit Product</a>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <!-- No products found message -->
        <div class="col">
            <div class="alert alert-warning" role="alert">
                <strong>Prekės nerastos</strong>
            </div>
               
            <a href="{{ route('prekes') }}" class="btn btn-primary btn-sm" title="Go to Products">
                <i class="fa fa-bars" aria-hidden="true"></i> Grįžti atgal
            </a>
        </div>
    @endforelse
</div>
