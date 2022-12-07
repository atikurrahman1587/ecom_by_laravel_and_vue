@extends('master')
@section('title')
    Edit Stock Amount
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
    <form action="{{ route('stock.update',$stock->id) }}" method="POST">
        @csrf
        <div class="col-md-12">
            <h4 class="card-title mb-4">Edit Stock Form</h4>
            <hr/>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Stock Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="stock_date" value="{{ $stock->stock_date }}" id="horizontal-firstname-input" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input1" class="col-sm-4 col-form-label">Chalan No</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="chalan_no" value="{{ $stock->chalan_no }}" id="horizontal-firstname-input1" required>
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
                               @foreach($stock->stockDetails as $key => $stockDetail)
                                    <tr>
                                        <td>
                                            <select class="form-control select2" name="stock[{{$key}}][supplier]" style="width: 100%">
                                                <option disabled selected>--Select Supplier--</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}" {{ $stockDetail->supplier == $supplier->id ? 'selected' : ''}} >{{ $supplier->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control select2 inventory-itm-select" name="stock[{{$key}}][product]" data-id="{{$key}}">
                                                <option disabled selected>--Select Product--</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}" {{ $stockDetail->product == $product->id ? 'selected' : ''}} >{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="select2 form-control select2-multiple" name="stock[{{$key}}][size][]" id="size{{$key}}" multiple="multiple" data-placeholder="Product Size" style="width: 100%">
                                                @foreach($sizes as $size)
                                                    <option value="{{ $size->id }}" {{ $stockDetail->size == $size->id ? 'selected' : ''}}>{{ $size->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="select2 form-control select2-multiple" name="stock[{{$key}}][color][]" id="color{{$key}}" multiple="multiple" data-placeholder="Product Color" style="width: 100%">
                                                @foreach($colors as $color)
                                                    <option value="{{ $color->id }}" {{ $stockDetail->color == $color->id ? 'selected' : ''}}>{{ $color->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" class="form-control inventory-unit-price" data-id="{{$key}}" name="stock[{{$key}}][unit_price]" value="{{ $stockDetail->unit_price }}" min="1" id="unitPrice{{$key}}"/></td>
                                        <td><input type="number" class="form-control inventory-take-amount" data-id="{{$key}}" name="stock[{{$key}}][stock_amount]" value="{{ $stockDetail->stock_amount }}" min="1" id="stockAmount{{$key}}"/></td>
                                        <td><input type="number" class="form-control inventory-total-amount" data-id="{{$key}}" name="" value="{{ $stockDetail->unit_price* $stockDetail->stock_amount}}" min="1" readonly id="totalPrice{{$key}}"/></td>
                                        @if($key == 0)
                                            <td><button type="button" class="btn btn-success btn-sm" id="addStockBtn">+</button></td>
                                        @else
                                            <td><button  type="button" class="btn btn-danger btn-sm stock-remove-button">-</button></td>
                                        @endif

                                    </tr>
                                   @endforeach
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
                            <button type="submit" class="btn btn-primary btn-block w-md">Stock Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
