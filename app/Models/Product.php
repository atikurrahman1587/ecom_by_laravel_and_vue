<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $product;
    public static $image;
    public static $imgURL;
    public static $imageExtension;
    public static $imageName;
    public static $message;

    public static function getImageURL($request, $product=null) {
        if (self::$image = $request->file('image'))
        {
            if ($product)
            {
                if (file_exists($product->image))
                {
                    if ($product->image != 'dummy.jpg')
                    {
                        unlink($product->image);
                    }
                }
            }
            self::$imageExtension   = self::$image->getClientOriginalExtension();
            self::$imageName        = str_replace(" ","-",$request->name).'-'.time().'.'.self::$imageExtension;
            self::$imgURL           = imageUpload(self::$image,'product-image/', self::$imageName);
        }
        else
        {
            if ($product)
            {
                self::$imgURL = $product->image;
            }
            else
            {
                self::$imgURL = 'dummy.jpg';
            }

        }
        return self::$imgURL;
    }

    private static function saveBasicInfo($product, $request, $imgURL) {
        $product->category_id         = $request->category_id;
        $product->sub_category_id     = $request->sub_category_id;
        $product->brand_id            = $request->brand_id;
        $product->unit_id             = $request->unit_id;
        $product->name                = $request->name;
        $product->code                = $request->code;
        $product->model               = $request->model;
        $product->regular_price       = $request->regular_price;
        $product->selling_price       = $request->selling_price;
        $product->meta_tag            = $request->meta_tag;
        $product->meta_description    = $request->meta_description;
        $product->short_description   = $request->short_description;
        $product->long_description    = $request->long_description;
        $product->status              = $request->status;
        $product->image               = $imgURL;
        $product->save();
        return $product;
    }

    public static function newProduct($request)
    {
        return self::saveBasicInfo(new Product(), $request, self::getImageURL($request));
    }

    public static function updateProductStatus($id) {
        self::$product = Product::find($id);
        if (self::$product->status == 1)
        {
            self::$product->status = 0;
            self::$message = 'Product info unpublished successfully';
        }
        else
        {
            self::$product->status = 1;
            self::$message = 'Product info published successfully';
        }
        self::$product->save();
        return self::$message;
    }

    public static function updateProduct($request, $id) {
        self::saveBasicInfo(Product::find($id), $request, self::getImageURL($request, Product::find($id)));
    }

    public static function deleteProduct($id) {
        self::$product = Product::find($id);
        if (file_exists(self::$product->image))
        {
            if (self::$product->image != 'dummy.jpg')
            {
                unlink(self::$product->image);
            }
        }
        self::$product->delete();
    }


    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    public function subCategory() {
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function brand() {
        return $this->belongsTo('App\Models\Brand');
    }
    public function unit() {
        return $this->belongsTo('App\Models\unit');
    }
    public function colors() {
        return $this->hasMany('App\Models\ProductColor');
    }
    public function sizes() {
        return $this->hasMany('App\Models\ProductSize');
    }
    public function otherImages() {
        return $this->hasMany('App\Models\OtherImage');
    }
}
