<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $product;

    public function index() {
        return view('product.add-product',[
            'categories'        => Category::where('status', 1)->get(),
            'sub_categories'    => SubCategory::where('status', 1)->get(),
            'brands'            => Brand::where('status', 1)->get(),
            'units'             => Unit::where('status', 1)->get(),
            'colors'            => Color::where('status', 1)->get(),
            'sizes'             => Size::where('status', 1)->get(),
        ]);
    }

    public function getAllColorSize(){
        return response()->json([
            'colors'    => Color::where('status', 1)->get(),
            'sizes'     => Size::where('status', 1)->get(),
        ]);
    }
    public function getSubCategoryBycategory() {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    public function create(Request $request) {
        DB::beginTransaction();
        try {
            $this->product = Product::newProduct($request);
            ProductSize::newProductSize($request->size_id, $this->product->id);
            ProductColor::newProductColor($request->color_id, $this->product->id);
            OtherImage::newOtherImage($request->other_image, $this->product->id);
        } catch (ValidationException $e) {
            DB::rollback();
            var_dump($e->getErrors());
        }
        DB::commit();

        return redirect()->back()->with('message', 'Product info create successfully');
    }

    public function manage() {
        return view('product.manage',['products'=>Product::orderBy('id', 'DESC')->take(500)->get(['id','category_id','brand_id','name','code','selling_price', 'image','status']) ]);
    }

    public function updateStatus($id) {
        return redirect()->back()->with('message', Product::updateProductStatus($id));
    }

    public function detail($id) {
        return view('product.detail',['product'=>Product::find($id)]);
    }

    public function edit($id) {
        return view('product.edit',[
            'product'=>Product::find($id),
            'categories'        => Category::where('status', 1)->get(),
            'sub_categories'    => SubCategory::where('status', 1)->get(),
            'brands'            => Brand::where('status', 1)->get(),
            'units'             => Unit::where('status', 1)->get(),
            'colors'            => Color::where('status', 1)->get(),
            'sizes'             => Size::where('status', 1)->get(),
        ]);
    }

    public function update(Request $request, $id) {
        DB::beginTransaction();
        try {
            Product::updateProduct($request, $id);
            ProductSize::updateProductSize($request->size_id, $id);
            ProductColor::updateProductColor($request->color_id, $id);
            if ($request->other_image)
            {
                OtherImage::updateOtherImage($request->other_image, $id);
            }
        } catch (ValidationException $e) {
            DB::rollback();
            var_dump($e->getErrors());
        }
        DB::commit();

        return redirect()->back()->with('message', 'Product info update successfully');
    }

    public function delete(Request $request,$id) {
        DB::beginTransaction();
        try {
            Product::deleteProduct($id);
            ProductSize::where('product_id', $id)->delete();
            ProductColor::where('product_id', $id)->delete();
            OtherImage::otherImageDelete($id);
        } catch (ValidationException $e) {
            DB::rollback();
            var_dump($e->getErrors());
        }
        DB::commit();

        return redirect()->back()->with('message', 'Product info delete successfully');
    }
}
