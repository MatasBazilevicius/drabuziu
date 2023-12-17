<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezlk1owX1BI3cZLl1V/I+CVRZC5zNApLxvwg+Sdmc+fuBE1RyN3TpPPsjIVpE0UH" crossorigin="anonymous">
    <title>Krepšelis</title>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
@php
    $cartTotal = app('App\Http\Controllers\CartController')->calculateCartTotal();
@endphp   
<div class="container my-5">
    <h1 class="text-center mb-4">Krepšelis</h1>

    <div class="mt-3">
    @if(session('cart'))
        <a href="{{ route('uzsakymas') }}" class="btn btn-success btn-lg">Formuoti užsakymą</a>
        @else
    <p>Your cart is empty. Add items to proceed to payment.</p>
        @endif

        <a href="{{ route('meniu') }}" class="btn btn-primary btn-lg">Meniu</a>
    </div>
</div>
    <div class="table-responsive">
        <table id="cart" class="table table-bordered">
            <thead>
                <tr>
                    <th> Drabužis</th>
                    <th> Kaina </th>
                    <th> Kiekis </th>
                    <th> Iš viso </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        <tr rowId="{{ $id }}">
                            <td data-th="Drabužis">
                                <div class="col-sm-3 hidden-xs">
                                    <img src="data:image/png;base64,{{ base64_encode($details['Nuotrauka']) }}" class="card-img-top"/>
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['Pavadinimas'] }}</h4>
                                </div>
                            </td>
                            <td data-th="Kaina">${{ $details['Kaina'] }}</td>
                            <td data-th="Kiekis" class="text-center">{{ $details['Kiekis'] }}</td>
                            <td data-th="Iš viso" class="text-center">${{ $details['Kaina'] * $details['Kiekis'] }}</td>
                            <td class="actions">
                                <a class="btn btn-danger btn-sm delete-product">
                                    Ištrinti
                                </a>
                            </td>   
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"></td>
                        <td data-th="Iš viso" class="text-center">${{ $cartTotal }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endif
   
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
 
    <script>
    function deleteItem() {
        // Add your delete item logic here
        alert("Item deleted!");
    }
    </script>


    @section ('scripts')
        <script type = "text/javascript">
        $(".delete-product").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Ar tikrai nori ištrinti?")) {
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });


       

        </script>

    <script>
        function deleteItem(itemId) {
            // Implement your logic to delete the item with the specified itemId
            // You can use JavaScript to interact with the server or update the UI accordingly
            console.log('Deleting item with ID ' + itemId);
        }
    </script>
</body>
</html>
