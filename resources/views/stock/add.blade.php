@extends('master')
@section('title')
    Add New Stock Amount
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
    <form action="{{ route('stock.store') }}" method="POST">
        @csrf
        <div class="col-md-12">
            <h4 class="card-title mb-4">Create New Stock</h4>
            <hr/>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Stock Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="stock_date" id="horizontal-firstname-input" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input1" class="col-sm-4 col-form-label">Chalan No</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="chalan_no" id="horizontal-firstname-input1" required>
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
                                        <th>Action</th>
                                    </tr>
                               </thead>
                               <tbody id="stockTbody">
                                    <tr>
                                        <td>
                                            <select class="form-control select2" name="stock[0][supplier]" style="width: 100%">
                                                <option disabled selected>--Select Supplier--</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}" >{{ $supplier->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control select2 inventory-itm-select" name="stock[0][product]" data-id="0">
                                                <option disabled selected>--Select Product--</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}" >{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="select2 form-control select2-multiple" name="stock[0][size][]" id="size0" multiple="multiple" data-placeholder="Product Size" style="width: 100%">
                                                @foreach($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="select2 form-control select2-multiple" name="stock[0][color][]" id="color0" multiple="multiple" data-placeholder="Product Color" style="width: 100%">
                                                @foreach($colors as $color)
                                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" class="form-control inventory-unit-price" data-id="0" name="stock[0][unit_price]" min="1" id="unitPrice0"/></td>
                                        <td><input type="number" class="form-control inventory-take-amount" data-id="0" name="stock[0][stock_amount]" min="1" id="stockAmount0"/></td>
                                        <td><input type="number" class="form-control inventory-total-amount" data-id="0" name="" min="1" readonly id="totalPrice0"/></td>
                                        <td><button type="button" class="btn btn-success btn-sm" id="addStockBtn">+</button></td>
                                    </tr>
                               </tbody>
                           </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="com-md-12">
            <div class="card card-body pb-1">
                <div class="form-group row justify-content-end">
                    <div class="col-sm-12">
                        <div>
                            <button type="submit" class="btn btn-primary btn-block w-md">Create New Stock</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
