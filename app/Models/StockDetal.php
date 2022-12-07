<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockDetal extends Model
{
    use HasFactory;
    private static $stockDetail;

    public static function newStockDetail($resultArray, $stock) {
        foreach ($resultArray as $v_array){
            self::$stockDetail = new StockDetal();
            self::$stockDetail->stock_id    = $stock->id;
            self::$stockDetail->supplier    = $v_array['supplier'];
            self::$stockDetail->product     = $v_array['product'];
            self::$stockDetail->size        = $v_array['size'];
            self::$stockDetail->color       = $v_array['color'];
            self::$stockDetail->unit_price  = $v_array['unit_price'];
            self::$stockDetail->stock_amount= $v_array['stock_amount'];
            self::$stockDetail->save();
        }
    }
}
