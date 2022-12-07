<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    public static $productSize;

    public static function newProductSize($requestSizeId, $productId)
    {
        foreach ($requestSizeId as $size){
            self::$productSize = new ProductSize();
            self::$productSize->product_id  = $productId;
            self::$productSize->size_id     = $size;
            self::$productSize->save();
        }
    }
    public static function updateProductSize($requestSizeId, $productId)
    {
        ProductSize::where('product_id', $productId)->delete();
        self::newProductSize($requestSizeId, $productId);
    }

    public function size() {
        return $this->belongsTo('App\Models\Size');
    }
}
