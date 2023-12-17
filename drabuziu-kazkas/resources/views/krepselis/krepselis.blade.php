<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krepšelis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezlk1owX1BI3cZLl1V/I+CVRZC5zNApLxvwg+Sdmc+fuBE1RyN3TpPPsjIVpE0UH" crossorigin="anonymous">

</head>
<body>
    

        <div class="container my-5">
    <h1 class="text-center mb-4">Krepšelis</h1>

                <table id = "cart" class = "table table-bordered">
                 <thead>
                    <tr>
                        <th> Drabužis</th>
                        <th> Kaina </th>
                        <th> Iš viso </th>
                        <th></th>
                        
                    </tr>
                </thead>
                    <tbody>
                    @if(session('cart'))

                @foreach(session('cart') as $id => $details)

                    <tr rowId="{{ $id }}">

                        <td data-th="Drabužis">

                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['Nuotrauka'] }}" class="card-img-top"/></div>

                                <div class="col-sm-9">

                                    <h4 class="nomargin">{{ $details['Pavadinimas'] }}</h4>

                                </div>
                           </div>
                        </td>

                        <td data-th="Kaina">${{ $details['Kaina'] }}</td>

                        <td data-th="Iš viso" class="text-center"></td>

                        <td class="actions">

                        <button class="btn btn-delete" style="background-color: red; color: white;" onclick="deleteItem()">Delete</button>

                        </td>

                    </tr>

                @endforeach

                @endif

                    </tbody>
                </table>
                        
                

            </div>

            <div class="col-md-4">
                <h2>Order Summary</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Subtotal
                        <span class="badge bg-primary rounded-pill">$44.98</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tax
                        <span class="badge bg-primary rounded-pill">$5.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total
                        <span class="badge bg-primary rounded-pill">$49.98</span>
                    </li>
                </ul>

                <a href="{{ route('uzsakymas') }}" class="btn btn-success mt-3">Formuoti užsakymą</a>
                <a class="btn btn-primary" href="{{ route('meniu') }}">Meniu</a>
            </div>
        </div>
    </div>

    <script>
    function deleteItem() {
        // Add your delete item logic here
        alert("Item deleted!");
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function deleteItem(itemId) {
            // Implement your logic to delete the item with the specified itemId
            // You can use JavaScript to interact with the server or update the UI accordingly
            console.log('Deleting item with ID ' + itemId);
        }
    </script>
</body>
</html>
