<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    public static $color;
    public static $message;


    public static function saveBasicInfo($color, $request) {
        $color->name           = $request->name;
        $color->code           = $request->code;
        $color->description    = $request->description;
        $color->status         = $request->status;
        $color->save();
    }

    public static function newColor($request) {
        self::saveBasicInfo(new Color(), $request);
    }

    public static function updateColorStatus($id) {
        self::$color = Color::find($id);
        if (self::$color->status == 1)
        {
            self::$color->status = 0;
            self::$message = 'Color info unpublished successfully';
        }
        else
        {
            self::$color->status = 1;
            self::$message = 'Color info published successfully';
        }
        self::$color->save();
        return self::$message;
    }

    public static function updateColor($request, $id) {
        self::$color = Color::find($id);
        self::saveBasicInfo(self::$color, $request );

    }
}
