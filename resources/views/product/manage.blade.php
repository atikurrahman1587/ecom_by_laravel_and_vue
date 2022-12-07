@extends('master')
@section('title')
    Manage color
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

                    <h4 class="card-title">All Product Info Goes Here</h4>
                    <hr/>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Selling price</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="text-right">
                                    <a href="{{ route('product.update-status',['id'=>$product->id]) }}" class="btn {{ $product->status == 1 ? 'btn-info' : 'btn-warning' }} btn-sm">
                                        <i class="fas {{ $product->status == 1 ? 'fa-arrow-alt-circle-up' : 'fa-arrow-alt-circle-down' }}" title="{{ $product->status == 1 ? 'Published' : 'Unpublished' }}"></i>
                                    </a>
                                    <a href="{{ route('product.detail',['id'=>$product->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-book-open" title="Detail"></i>
                                    </a>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit" title="Edit"></i>
                                    </a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('productForm{{ $product->id }}').submit();" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt" title="Delete"></i>
                                    </a>
                                    <form method="POST" action="{{ route('product.delete', ['id'=>$product->id]) }}" id="productForm{{ $product->id }}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
