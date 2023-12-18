@extends('kategorijos.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 Crud</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/kategorija/create') }}" class="btn btn-success btn-sm" title="Add New Kategorija">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>pavadinimas</th>
                                        <th>aprasymas</th>
                                        <th>fk_Kategorijaid_Kategorija</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($kategorijos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pavadinimas }}</td>
                                        <td>{{ $item->aprasymas }}</td>
                                        <td>{{ $item->fk_Kategorijaid_Kategorija }}</td>
 
                                        <td>
                                            <a href="{{ url('/kategorija/' . $item->id_Kategorija) }}" title="View kategorija"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/kategorija/' . $item->id_Kategorija . '/edit') }}" title="Edit kategorija"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/kategorija' . '/' . $item->id_Kategorija) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Kategorija" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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