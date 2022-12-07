<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public static $unit;
    public static $message;


    public static function saveBasicInfo($unit, $request) {
        $unit->name         = $request->name;
        $unit->code         = $request->code;
        $unit->description  = $request->description;
        $unit->status       = $request->status;
        $unit->save();
    }

    public static function newUnit($request) {
        self::saveBasicInfo(new Unit(), $request);
    }

    public static function updateUnitStatus($id) {
        self::$unit = Unit::find($id);
        if (self::$unit->status == 1)
        {
            self::$unit->status = 0;
            self::$message = 'Color info unpublished successfully';
        }
        else
        {
            self::$unit->status = 1;
            self::$message = 'Color info published successfully';
        }
        self::$unit->save();
        return self::$message;
    }

    public static function updateUnit($request, $id) {
        self::$unit = Unit::find($id);
        self::saveBasicInfo(self::$unit, $request );

    }
}
