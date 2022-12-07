<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public static $subCategory;
    public static $message;
    public static $image;
    public static $imgURL;

    public static function getImageURL($request, $subCategory=null) {
        if (self::$image = $request->file('image'))
        {
            if ($subCategory)
            {
                if (file_exists($subCategory->image))
                {
                    if ($subCategory->image != 'dummy.jpg')
                    {
                        unlink($subCategory->image);
                    }
                }
            }
            self::$imgURL = imageUpload(self::$image,'sub-category-image/');
        }
        else
        {
            if ($subCategory)
            {
                self::$imgURL = $subCategory->image;
            }
            else
            {
                self::$imgURL = 'dummy.jpg';
            }

        }
        return self::$imgURL;
    }

    public static function saveBasicInfo($subCategory, $request, $imgURL) {
        $subCategory->category_id   = $request->category_id;
        $subCategory->name          = $request->name;
        $subCategory->description   = $request->description;
        $subCategory->image         = $imgURL;
        $subCategory->status        = $request->status;
        $subCategory->save();
    }

    public static function newSubCategory($request) {
        self::saveBasicInfo(new SubCategory(), $request, self::getImageURL($request));
    }

    public static function updateSubCategoryStatus($id) {
        self::$subCategory = SubCategory::find($id);
        if (self::$subCategory->status == 1)
        {
            self::$subCategory->status = 0;
            self::$message = 'sub category info unpublished successfully';
        }
        else
        {
            self::$subCategory->status = 1;
            self::$message = 'sub category info published successfully';
        }
        self::$subCategory->save();
        return self::$message;
    }

    public static function updateSubCategory($request, $id) {
        self::$subCategory = SubCategory::find($id);
        self::saveBasicInfo(self::$subCategory, $request, self::getImageURL($request, self::$subCategory) );

    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

}
