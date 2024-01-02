@extends('dydziai.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Dydziai</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/dydis/create') }}" class="btn btn-success btn-sm" title="Add New dydis">
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
                                        <th>name</th>
                                        <th>id_Dydis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dydziai as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->id_Dydis }}</td>
                                            <td>
                                                <a href="{{ url('/dydis/' . $item->id_Dydis) }}" title="View dydis">
                                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>View</button>
                                                </a>
                                                <a href="{{ url('/dydis/' . $item->id_Dydis . '/edit') }}" title="Edit dydis">
                                                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button>
                                                </a>
                                                <form method="POST" action="{{ url('/dydis' . '/' . $item->id_Dydis) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete dydis" onclick="return confirm(&quot;Confirm delete?&quot;)">
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