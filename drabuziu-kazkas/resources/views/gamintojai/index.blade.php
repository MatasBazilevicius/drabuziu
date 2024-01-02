@extends('gamintojai.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Gamintojai</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/gamintojas/create') }}" class="btn btn-success btn-sm" title="Add New gamintojas">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        
                        <!-- Button for Menu -->
                        <a href="{{ route('meniu') }}" class="btn btn-primary btn-sm" title="Go to Menu">
                            <i class="fa fa-bars" aria-hidden="true"></i> Menu
                        </a>
                        <!-- Button for prekes -->
                        <a href="{{ route('prekes') }}" class="btn btn-primary btn-sm" title="Go to Prekes">
                            <i class="fa fa-bars" aria-hidden="true"></i> Prekes
                        </a>
                        
                        <br/>
                        <br/>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gamintojas</th>
                                        <th>id_Gamintojas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gamintojai as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->Gamintojas }}</td>
                                            <td>{{ $item->id_Gamintojas }}</td>
                                            <td>
                                                <a href="{{ url('/gamintojas/' . $item->id_Gamintojas) }}" title="View gamintojas">
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>View</button>
                                                </a>
                                                <a href="{{ url('/gamintojas/' . $item->id_Gamintojas . '/edit') }}" title="Edit gamintojas">
                                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button>
                                                </a>
                                                <form method="POST" action="{{ url('/gamintojas' . '/' . $item->id_Gamintojas) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete gamintojas" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection