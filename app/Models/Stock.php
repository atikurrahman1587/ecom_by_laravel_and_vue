<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Stock extends Model
{
    use HasFactory;
    private static $stock;

    public static function newStock($request)
    {
        self::$stock = new Stock();
        self::$stock->stock_date        = $request->stock_date;
        self::$stock->stock_timestamp   = strtotime($request->stock_date);
        self::$stock->chalan_no         = $request->chalan_no;
        self::$stock->created_by        = Auth::user()->id;
        self::$stock->save();
        return self::$stock;
    }

    public function stockDetails()
    {
        return $this->hasMany('App\Models\StockDetal');
    }
}
