<!-- Product Display -->
<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse($filteredProducts as $product)
        <!-- Product Card -->
        <div class="col">
            <a href="{{ route('preke', ['id' => $product->id_Drabuzis]) }}">
                <div class="card h-100">
                    <img src="data:image/png;base64,{{ base64_encode($product->Nuotrauka) }}" class="card-img-top" alt="{{ $product->Pavadinimas }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->Pavadinimas }}</h5>
                        <p class="card-text">{{ $product->Aprasas }}</p>
                        <p class="card-text">${{ $product->Kaina }}</p>
                        <a href="{{ route('preke1', ['id' => $product->id_Drabuzis]) }}" class="btn btn-success">Peržiūrėti prekę</a>
                        <a href="{{ route('adddrabuzis.to.cart', $product->id_Drabuzis) }}" class="btn btn-outline-danger">Pridėti į krepšelį</a>
                        <p class="btn-holder">
                            <a href="{{ route('prekeRedag', ['id' => $product->id_Drabuzis]) }}" class="btn btn-primary">Redaguoti prekę</a>
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
            <a href="{{ route('prekes') }}" class="btn btn-primary btn-sm" title="Go to Prekes">
                <i class="fa fa-bars" aria-hidden="true"></i> Prekes
            </a>
        </div>
    @endforelse
</div>

<!-- Input range element for minimum price -->

