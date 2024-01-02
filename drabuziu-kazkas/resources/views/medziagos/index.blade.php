@extends('medziagos.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>medziagos</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/medziaga/create') }}" class="btn btn-success btn-sm" title="Add New medziaga">
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
                                        <th>Medziaga</th>
                                        <th>id_Medziaga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medziagos as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->Medziaga }}</td>
                                            <td>{{ $item->id_Medziaga }}</td>
                                            <td>
                                                <a href="{{ url('/medziaga/' . $item->id_Medziaga) }}" title="View medziaga">
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>View</button>
                                                </a>
                                                <a href="{{ url('/medziaga/' . $item->id_Medziaga . '/edit') }}" title="Edit medziaga">
                                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button>
                                                </a>
                                                <form method="POST" action="{{ url('/medziaga' . '/' . $item->id_Medziaga) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete medziaga" onclick="return confirm(&quot;Confirm delete?&quot;)">
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