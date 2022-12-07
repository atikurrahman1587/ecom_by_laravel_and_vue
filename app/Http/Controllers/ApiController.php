<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\Size;
use App\Models\StockDetal;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private $result     = [];
    private $categories = [];
    private $products;
    private $image;
    private $name;
    private $popularProducts;
    private $featureProducts;
    private $specialProducts;
    private $bestSalesProducts;
    private $product;
    private $images;
    private $stockDetails = [];
    private $colorRes = [];
    private $sizeRes = [];
    private $qty;

    public function AllCategory(){
        $this->categories = Category::where('status', 1)->get(['id','name','image']);
        foreach ($this->categories as $key => $category){
            $this->result[$key]['category']         = $category;
            $this->result[$key]['sub_categories']   = SubCategory::where('status', 1)->where('category_id', $category->id)->get(['id','name','image']);
        }
        return response()->json($this->result);
    }
    public function CategoryForOthers(){
        return response()->json(Category::where('status', 1)->take(5)->get(['id','name','image']));
    }

    public function allRecentProduct() {
        $this->products = Product::where('status', 1)->orderBy('id', 'DESC')->take(10)->get(['id', 'name', 'image', 'regular_price', 'selling_price']);
        foreach ($this->products as $product){
            $this->image    = asset($product->image);
            $product->image = $this->image;
            $this->name     =  substr($product->name,0,50);
            if (strlen($this->name) < 50){
                $product->name =  $this->name;
            }else{
                $product->name =  $this->name.'.....';
            }
            $product->image2 = isset(OtherImage::where('product_id', $product->id)->first()->other_image) ? asset(OtherImage::where('product_id', $product->id)->first()->other_image) : $product->image;
        }
        return response()->json($this->products);
    }

    public function allTrendingProduct()
    {
        $this->popularProducts = Product::where('status', 1)->orderBy('hit_count', 'DESC')->take(8)->get(['id','hit_count', 'name', 'image', 'regular_price', 'selling_price']);
        foreach ($this->popularProducts as $popularProduct){
            $popularProduct->image = asset($popularProduct->image);
            $this->name     =  substr($popularProduct->name,0,50);
            if (strlen($this->name) < 50){
                $popularProduct->name =  $this->name;
            }else{
                $popularProduct->name =  $this->name.'.....';
            }
            $popularProduct->image2 = isset(OtherImage::where('product_id', $popularProduct->id)->first()->other_image) ? asset(OtherImage::where('product_id', $popularProduct->id)->first()->other_image) : $popularProduct->image;
        }

        $this->bestSalesProducts = Product::where('status', 1)->orderBy('sales_count', 'DESC')->take(8)->get(['id','sales_count', 'name', 'image', 'regular_price', 'selling_price']);
        foreach ($this->bestSalesProducts as $bestSalesProduct){
            $bestSalesProduct->image = asset($bestSalesProduct->image);
            $this->name     =  substr($bestSalesProduct->name,0,50);
            if (strlen($this->name) < 50){
                $bestSalesProduct->name =  $this->name;
            }else{
                $bestSalesProduct->name =  $this->name.'.....';
            }
            $bestSalesProduct->image2 = isset(OtherImage::where('product_id', $bestSalesProduct->id)->first()->other_image) ? asset(OtherImage::where('product_id', $bestSalesProduct->id)->first()->other_image) : $bestSalesProduct->image;
        }

        $this->featureProducts = Product::where(['status' => 1, 'feature_status' =>1])->orderBy('id', 'DESC')->take(8)->get(['id', 'name', 'image', 'regular_price', 'selling_price']);
        foreach ($this->featureProducts as $featureProduct){
            $featureProduct->image = asset($featureProduct->image);
            $this->name     =  substr($featureProduct->name,0,50);
            if (strlen($this->name) < 50){
                $featureProduct->name =  $this->name;
            }else{
                $featureProduct->name =  $this->name.'.....';
            }
            $featureProduct->image2 = isset(OtherImage::where('product_id', $featureProduct->id)->first()->other_image) ? asset(OtherImage::where('product_id', $featureProduct->id)->first()->other_image) : $featureProduct->image;
        }

        $this->specialProducts = Product::where(['status' => 1, 'special_status' =>1])->orderBy('id', 'DESC')->take(8)->get(['id', 'name', 'image', 'regular_price', 'selling_price']);
        foreach ($this->specialProducts as $specialProduct){
            $specialProduct->image = asset($specialProduct->image);
            $this->name     =  substr($specialProduct->name,0,50);
            if (strlen($this->name) < 50){
                $specialProduct->name =  $this->name;
            }else{
                $specialProduct->name =  $this->name.'.....';
            }
            $specialProduct->image2 = isset(OtherImage::where('product_id', $specialProduct->id)->first()->other_image) ? asset(OtherImage::where('product_id', $specialProduct->id)->first()->other_image) : $specialProduct->image;
        }

        return response()->json([
            0 => [
                'name' => 'Popular Product',
                'products' => $this->popularProducts,
            ],
            1 => [
                'name' => 'Best Sales Product',
                'products' => $this->bestSalesProducts,
            ],
            2 => [
                'name' => 'Feature Product',
                'products' => $this->featureProducts,
            ],

            3 => [
                'name' => 'Special Product',
                'products' => $this->specialProducts,
            ],
        ]);

    }

    public function allCategoryProduct($id)
    {
        $this->products = Product::where(['status' => 1 ,'category_id' => $id])->orderBy('id', 'DESC')->take(50)->get(['id', 'name', 'image', 'regular_price', 'selling_price']);
        foreach ($this->products as $product){
            $product->image = asset($product->image);
            $this->name     =  substr($product->name,0,50);
            if (strlen($this->name) < 50){
                $product->name =  $this->name;
            }else{
                $product->name =  $this->name.'.....';
            }
            $product->image2 = isset(OtherImage::where('product_id', $product->id)->first()->other_image) ? asset(OtherImage::where('product_id', $product->id)->first()->other_image) : $product->image;
        }
        return response()->json($this->products);
    }
    public function recentProductForCategory()
    {
        $this->products = Product::where('status', 1)->orderBy('id', 'DESC')->take(3)->get(['id', 'category_id','name' ,'image', 'selling_price']);
        foreach ($this->products as $product){
            $product->image = asset($product->image);
            $product->category   = Category::where('id', $product->category_id)->first()->name;
        }
        return response()->json($this->products);
    }
    public function getProductImageById($id)
    {
        $this->product = Product::find($id);
        $this->images = OtherImage::where('product_id', $id)->get();
        if(count($this->images) > 0)
        {
            array_push($this->result, asset($this->product->image));
            foreach ($this->images as $image){
               array_push($this->result, isset( $image->other_image) ? asset( $image->other_image) : asset($this->product->image));
            }
        } else
        {
            array_push($this->result, asset($this->product->image));
        }
        return response()->json($this->result);
    }

    public function getProductBasicInfo($id)
    {
        $this->product      = Product::find($id);
        $this->product->hit_count = $this->product->hit_count + 1;
        $this->product->save();

        $this->stockDetails = StockDetal::where('product', $id)->get();
        $stockIn        = 0;
        $stockOut       = 0;
        $stockTempOut   = 0;
        foreach ($this->stockDetails as $stockDetail)
        {
            $stockIn        = $stockIn + $stockDetail->stock_amount;
            $stockTempOut   = $stockTempOut + $stockDetail->quantity_temp_out;
            $stockOut       = $stockOut + $stockDetail->stock_out;
        }
        if ($stockIn > $stockOut)
        {

            foreach ($this->stockDetails as $stockDetail)
            {
                $this->qty = ($stockIn - ($stockOut + $stockTempOut));
                array_push($this->colorRes, Color::find($stockDetail->color)->name);
                array_push($this->sizeRes, Size::find($stockDetail->size)->name);
            }
        }

        return response()->json([
            'id'            => $this->product->id,
            'name'          => $this->product->name,
            'selling_price' => $this->product->selling_price,
            'regular_price' => $this->product->regular_price,
            'description'   => $this->product->short_description,
            'colors'        => array_unique($this->colorRes),
            'sizes'         => array_unique($this->sizeRes),
            'stock_status'  => $this->getProductStockStatus($id),
            'category'      => $this->product->category->name,
            'qty_amount'    => $this->qty,
            'image'         => asset($this->product->image),
        ]);
    }

    public function getProductStockStatus($id)
    {
        $this->stockDetails = StockDetal::where('product', $id)->get();
        $stockIn        = 0;
        $stockTempOut   = 0;
        $stockOut       = 0;

        foreach ($this->stockDetails as $stockDetail)
        {
            $stockIn        = $stockIn + $stockDetail->stock_amount;
            $stockTempOut   = $stockTempOut + $stockDetail->quantity_temp_out;
            $stockOut       = $stockOut + $stockDetail->stock_out;
        }
        if ($stockIn > $stockOut)
        {
           if (($stockIn - ($stockOut + $stockTempOut)) == 0 || ($stockIn - ($stockOut + $stockTempOut)) <= 10 ){
                return 'Limited Stock';
           }
           else
           {
               return 'In Stock';
           }
        }
        else
        {
            return 'Out of Stock';
        }
    }
    public function getProductDescription($id)
    {
        return response()->json(Product::find($id)->long_description);
    }
}
