@extends('master')
@section('title')
    Manage Size
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
                    <h4 class="card-title mb-4">Create New Size</h4>
                    <hr/>
                    <form action="{{ route('size.store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Size Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="horizontal-firstname-input" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input11" class="col-sm-2 col-form-label">Size Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="code" id="horizontal-firstname-input11" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input1" class="col-sm-2 col-form-label">Size Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="horizontal-email-input1"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label  class="col-sm-2">Publication Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="status" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Size</button>
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

                    <h4 class="card-title">All Size Info Goes Here</h4>
                    <hr/>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Size Name</th>
                            <th>Size Code</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($sizes as $size)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $size->name }}</td>
                                <td>{{ $size->code }}</td>
                                <td>{{ $size->description }}</td>
                                <td>{{ $size->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="text-right">
                                    <a href="{{ route('size.update-status',['id'=>$size->id]) }}" class="btn {{ $size->status == 1 ? 'btn-info' : 'btn-warning' }} btn-sm">
                                        <i class="fas {{ $size->status == 1 ? 'fa-arrow-alt-circle-up' : 'fa-arrow-alt-circle-down' }}" title="{{ $size->status == 1 ? 'Published' : 'Unpublished' }}"></i>
                                    </a>
                                    <a href="{{ route('size.edit', $size->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit" title="Edit"></i>
                                    </a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('sizeForm{{ $size->id }}').submit();" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt" title="Delete"></i>
                                    </a>
                                    <form method="POST" action="{{ route('size.destroy', $size->id) }}" id="sizeForm{{ $size->id }}">
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
        </div>
    </div>
@endsection
