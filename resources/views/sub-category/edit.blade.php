@extends('master')
@section('title')
    Edit Sub Category
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
                    <h4 class="card-title mb-4">Update Sub Category info</h4>
                    <hr/>
                    <form action="{{ route('sub-category.update',$sub_category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-4">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id">
                                    <option value=""disabled selected>--Select Category--</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $sub_category->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Sub Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $sub_category->name }}" id="horizontal-firstname-input" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input1" class="col-sm-2 col-form-label">Sub Category Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="horizontal-email-input1">{{ $sub_category->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input2" class="col-sm-2 col-form-label">Sub Category Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="image" accept="image/*" id="horizontal-email-input2">
                                <br/>
                                <img src="{{ asset($sub_category->image) }}" alt="" height="50" width="50" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label  class="col-sm-2">Publication Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" {{ $sub_category->status == 1 ? 'checked' : '' }}  name="status" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" {{ $sub_category->status == 0 ? 'checked' : '' }} name="status" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Sub Category</button>
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

                    <h4 class="card-title">All Sub Category Info Goes Here</h4>
                    <hr/>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($sub_categories as $sub_category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sub_category->category->name }}</td>
                                <td>{{ $sub_category->name }}</td>
                                <td>{{ $sub_category->description }}</td>
                                <td>
                                    <img src="{{asset( $sub_category->image )}}" alt="" width="50" height="50">
                                </td>
                                <td>{{ $sub_category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="text-right">
                                    <a href="{{ route('sub-category.update-status',['id'=>$sub_category->id]) }}" class="btn {{ $sub_category->status == 1 ? 'btn-info' : 'btn-warning' }} btn-sm">
                                        <i class="fas {{ $sub_category->status == 1 ? 'fa-arrow-alt-circle-up' : 'fa-arrow-alt-circle-down' }}" title="{{ $sub_category->status == 1 ? 'Published' : 'Unpublished' }}"></i>
                                    </a>
                                    <a href="{{ route('sub-category.edit', $sub_category->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit" title="Edit"></i>
                                    </a>
                                    <a href="{{ route('sub-category.destroy', $sub_category->id) }}" onclick="event.preventDefault();document.getElementById('subCategoryForm{{ $sub_category->id }}').submit();" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt" title="Delete"></i>
                                    </a>
                                    <form method="POST" action="{{ route('sub-category.destroy', $sub_category->id) }}" id="subCategoryForm{{ $sub_category->id }}">
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
