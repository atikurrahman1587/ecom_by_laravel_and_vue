@extends('master')
@section('title')
    Edit Product
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
    <form action="{{ route('product.update',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-sm-4 col-form-label">Category Name</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="category_id" id="categoryId">
                                    <option value="" selected disabled>---Select Category---</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' :'' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-4 col-form-label">Sub Category</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="sub_category_id" id="subCategoryId">
                                    <option value="" selected disabled>---Select Sub Category---</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}" {{ $sub_category->id == $product->sub_category_id ? 'selected' :'' }}>{{ $sub_category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-4 col-form-label">Brand Name</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="brand_id">
                                    <option value="" selected disabled>---Select Brand---</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' :'' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-4 col-form-label">Unit Name</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="unit_id">
                                    <option value="" selected disabled>---Select Unit---</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id ? 'selected' :'' }}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-4 col-form-label">Product Size</label>
                            <div class="col-sm-8">
                                <select class="select2 form-control select2-multiple" name="size_id[]" multiple="multiple" data-placeholder="Select Product Size">
                                    @foreach($sizes as $size)
                                        <option value="{{ $size->id }}"@foreach($product->sizes as $productSize) {{ $size->id == $productSize->size_id ? 'selected' : '' }} @endforeach>{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-4 col-form-label">Product Color</label>
                            <div class="col-sm-8">
                                <select class="select2 form-control select2-multiple" name="color_id[]" multiple="multiple" data-placeholder="Select Product Color">
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}" @foreach($product->colors as $productColor) {{ $color->id == $productColor->color_id ? 'selected' : '' }} @endforeach>{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input12" class="col-sm-4 col-form-label">Product Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" id="horizontal-firstname-input12" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input13" class="col-sm-4 col-form-label">Product Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="code" value="{{ $product->code }}" id="horizontal-firstname-input13" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input14" class="col-sm-4 col-form-label">Product Model</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="model" value="{{ $product->model }}" id="horizontal-firstname-input14" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input22" class="col-sm-4 col-form-label">Product Price</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Regular</span>
                                    </div>
                                    <input type="number" min="1" id="horizontal-firstname-input22" name="regular_price" value="{{ $product->regular_price }}" aria-label="First name" class="form-control">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Selling</span>
                                    </div>
                                    <input type="number" min="1" name="selling_price" value="{{ $product->selling_price }}" aria-label="Last name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input122" class="col-sm-4 col-form-label">Meta Tag</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="meta_tag" value="{{ $product->meta_tag }}" id="horizontal-firstname-input122" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input16" class="col-sm-4 col-form-label">Meta Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="meta_description" id="horizontal-email-input16">{{ $product->meta_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="horizontal-email-input17" class="col-sm-4 col-form-label">Product Short Description</label>
                            <hr/>
                            <textarea class="form-control summernote" name="short_description" rows="3" id="horizontal-email-input17">{{ $product->short_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="horizontal-email-input18" class="col-sm-4 col-form-label">Product Long Description</label>
                            <hr/>
                            <textarea class="form-control summernote" name="long_description" rows="3" id="horizontal-email-input18">{{ $product->long_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="horizontal-email-input19" class="col-form-label">Feature Image</label>
                            <hr/>
                            <input type="file" name="image" class="form-control-file" accept="image/*" id="horizontal-email-input19">
                            <br/>
                            <img src="{{ asset($product->image) }}" alt="" width="50" height="50">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="horizontal-email-input20" class="col-form-label">Other Image</label>
                            <hr/>
                            <input type="file" name="other_image[]" class="form-control-file" multiple accept="image/*" id="horizontal-email-input20">
                            <br/>
                            @foreach($product->otherImages as $otherImage)
                                <img src="{{ asset($otherImage->other_image) }}" alt="" width="50" height="50">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label class="col-form-label">Publication Status</label>
                            <hr/>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" {{ $product->status == 1 ? 'checked' : '' }} name="status" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" {{ $product->status == 0 ? 'checked' : '' }} name="status" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block w-md">Update Product Info</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
