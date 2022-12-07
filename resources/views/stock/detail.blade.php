@extends('master')
@section('title')
    Stock Detail
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
        <h4 class="card-title mb-4">Stock Detail Info</h4>
        <hr/>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Stock Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" readonly name="stock_date" value="{{ $stock->stock_date }}" id="horizontal-firstname-input" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input1" class="col-sm-4 col-form-label">Chalan No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" readonly name="chalan_no" value="{{ $stock->chalan_no }}" id="horizontal-firstname-input1" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Product Name</th>
                                <th>Product Size</th>
                                <th>Product Color</th>
                                <th>Unit Price</th>
                                <th>Stock Amount</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stock->stockDetails as $stockDetail)
                            <tr>
                                <td>{{ \App\Models\Supplier::find($stockDetail->supplier)->company_name }}</td>
                                <td>{{ \App\Models\Product::find($stockDetail->product)->name }}</td>
                                <td>{{ \App\Models\Size::find($stockDetail->size)->name }}</td>
                                <td>{{ \App\Models\Color::find($stockDetail->color)->name }}</td>
                                <td>{{ $stockDetail->unit_price }}</td>
                                <td>{{ $stockDetail->stock_amount }}</td>
                                <td>{{ number_format($stockDetail->unit_price * $stockDetail->stock_amount) }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
