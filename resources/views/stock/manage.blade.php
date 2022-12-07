@extends('master')
@section('title')
    Stock Manage
@endsection
@section('body')
    @if($message = Session::get('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-md-12">
        <h4 class="card-title mb-4">All Stock Info Here</h4>
        <hr/>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Chalan No</th>
                            <th>Stock Date</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $stock->chalan_no }}</td>
                                <td>{{ $stock->stock_date }}</td>
                                <td class="text-right">
                                    <a href="{{ route('stock.detail',['id'=>$stock->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-book-open" title="Detail"></i>
                                    </a>
                                    <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit" title="Edit"></i>
                                    </a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('StockForm{{ $stock->id }}').submit();" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt" title="Delete"></i>
                                    </a>
                                    <form method="POST" action="{{ route('stock.delete', ['id'=>$stock->id]) }}" id="StockForm{{ $stock->id }}">
                                        @csrf
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

@endsection
