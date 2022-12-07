@extends('master')
@section('title')
    Product Information Detail
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Product Info Goes Here</h4>
                    <hr/>
                    <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tr>
                            <th>Product ID</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Product Code</th>
                            <td>{{ $product->code }}</td>
                        </tr>
                        <tr>
                            <th>Product Model</th>
                            <td>{{ $product->model }}</td>
                        </tr>
                        <tr>
                            <th>Product Category</th>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Product Sub Category</th>
                            <td>{{ isset($product->subCategory->name) ? $product->subCategory->name : 'Not Available' }}</td>
                        </tr>
                        <tr>
                            <th>Product Brand</th>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                            <th>Product Unit</th>
                            <td>{{ $product->unit->name }}</td>
                        </tr>
                        <tr>
                            <th>Product Regular Price</th>
                            <td>{{ $product->regular_price }}</td>
                        </tr>
                        <tr>
                            <th>Product Selling Price</th>
                            <td>{{ $product->selling_price }}</td>
                        </tr>
                        <tr>
                            <th>Product Meta Tag</th>
                            <td>{{ $product->meta_tag }}</td>
                        </tr>
                        <tr>
                            <th>Product Meta Description</th>
                            <td>{{ $product->meta_description }}</td>
                        </tr>
                        <tr>
                            <th>Product Short Description</th>
                            <td>{!! $product->short_description !!}</td>
                        </tr>
                        <tr>
                            <th>Product Long Description</th>
                            <td>{!! $product->long_description !!}</td>
                        </tr>
                        <tr>
                            <th>Product Feature Image</th>
                            <td><img src="{{ asset($product->image) }}" alt="" width="70" height="70"></td>
                        </tr>
                        <tr>
                            <th>Product Status</th>
                            <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                        </tr>
                        <tr>
                            <th>Product Minimum Stock Amount</th>
                            <td>{{ $product->sku }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Product Color Info Goes Here</h4>
                    <hr/>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tr>
                            @foreach($product->colors as $productColor)
                            <td>{{ $productColor->color->name }}</td>
                            @endforeach
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Product Size Info Goes Here</h4>
                    <hr/>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tr>
                            @foreach($product->sizes as $productSize)
                            <td>{{ $productSize->size->name }}</td>
                            @endforeach
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Product Other Image Goes Here</h4>
                    <hr/>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tr>
                            @foreach($product->otherImages as $productImage)
                            <td><img src="{{asset($productImage->other_image)}}" alt="" height="70" width="70"></td>
                            @endforeach
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
