@extends('master')
@section('title')
    Edit Category
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Update Category Info</h4>
                    <hr/>
                    <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="horizontal-firstname-input" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input1" class="col-sm-2 col-form-label">Category Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="horizontal-email-input1">{{ $category->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input2" class="col-sm-2 col-form-label">Category Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="image" accept="image/*" id="horizontal-email-input2">
                                <img src="{{ asset( $category->image ) }}" alt="" height="50" width="100">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label  class="col-sm-2">Publication Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" {{ $category->status == 1 ? 'checked' : '' }} name="status" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" {{ $category->status == 0 ? 'checked' : '' }} name="status" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Category Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Category Info Goes Here</h4>
                    <hr/>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <img src="{{asset( $category->image )}}" alt="" width="50" height="50">
                            </td>
                            <td>{{ $category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td class="text-right">
                                <a href="{{ route('category.update-status',['id'=>$category->id]) }}" class="btn {{ $category->status == 1 ? 'btn-info' : 'btn-warning' }} btn-sm">
                                    <i class="fas {{ $category->status == 1 ? 'fa-arrow-alt-circle-up' : 'fa-arrow-alt-circle-down' }}" title="{{ $category->status == 1 ? 'Published' : 'Unpublished' }}"></i>
                                </a>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit" title="Edit"></i>
                                </a>
                                <a href="{{ route('category.destroy', $category->id) }}" onclick="event.preventDefault();document.getElementById('categoryForm{{ $category->id }}').submit();" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt" title="Delete"></i>
                                </a>
                                <form method="POST" action="{{ route('category.destroy', $category->id) }}" id="categoryForm{{ $category->id }}">
                                    @csrf
                                    @method('delete')
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
