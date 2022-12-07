@extends('master')
@section('title')
    Manage Supplier
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
    <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <h4 class="card-title mb-4">Create New Supplier</h4>
            <hr/>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Company Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="company_name" id="horizontal-firstname-input" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input1" class="col-sm-4 col-form-label">Contact Person</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="person_name" id="horizontal-firstname-input1" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input2" class="col-sm-4 col-form-label">Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="code" id="horizontal-firstname-input2">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input3" class="col-sm-4 col-form-label">Mobile Number</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="mobile" id="horizontal-firstname-input3" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input4" class="col-sm-4 col-form-label">Email Address</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" id="horizontal-firstname-input4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input5" class="col-sm-4 col-form-label">Company Logo</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file" name="logo" accept="image/*" id="horizontal-email-input5">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input7" class="col-sm-4 col-form-label">Account Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="account_number" id="horizontal-firstname-input7">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input6" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="horizontal-firstname-input6"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label  class="col-sm-4">Publication Status</label>
                            <div class="col-sm-8">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="com-md-12">
            <div class="card card-body pb-1">
                <div class="form-group row justify-content-end">
                    <div class="col-sm-12">
                        <div>
                            <button type="submit" class="btn btn-primary btn-block w-md">Create New Supplier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Supplier Info Goes Here</h4>
                    <hr/>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Company Name</th>
                            <th>Contact Parson</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $supplier->company_name }}</td>
                                <td>{{ $supplier->person_name }}</td>
                                <td>{{ $supplier->mobile }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>
                                    <img src="{{asset( $supplier->logo )}}" alt="" width="50" height="50">
                                </td>
                                <td>{{ $supplier->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="text-right">
                                    <a href="{{ route('supplier.update-status',['id'=>$supplier->id]) }}" class="btn {{ $supplier->status == 1 ? 'btn-info' : 'btn-warning' }} btn-sm">
                                        <i class="fas {{ $supplier->status == 1 ? 'fa-arrow-alt-circle-up' : 'fa-arrow-alt-circle-down' }}" title="{{ $supplier->status == 1 ? 'Published' : 'Unpublished' }}"></i>
                                    </a>
                                    <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit" title="Edit"></i>
                                    </a>
                                    <a href="" onclick="event.preventDefault();document.getElementById('supplierForm{{ $supplier->id }}').submit();" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt" title="Delete"></i>
                                    </a>
                                    <form method="POST" action="{{ route('supplier.delete', $supplier->id) }}" id="supplierForm{{ $supplier->id }}">
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
