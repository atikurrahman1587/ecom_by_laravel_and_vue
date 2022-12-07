<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $category;
    public static $message;
    public static $image;
    public static $imgURL;

    public static function getImageURL($request, $category=null) {
        if (self::$image = $request->file('image'))
        {
            if ($category)
            {
                if (file_exists($category->image))
                {
                    if ($category->image != 'dummy.jpg')
                    {
                        unlink($category->image);
                    }
                }
            }

            self::$imgURL = imageUpload(self::$image,'category-image/');
        }
        else
        {
            if ($category)
            {
                self::$imgURL = $category->image;
            }
            else
            {
                self::$imgURL = 'dummy.jpg';
            }

        }
        return self::$imgURL;
    }

    public static function saveBasicInfo($category, $request, $imgURL) {
        $category->name           = $request->name;
        $category->description    = $request->description;
        $category->image          = $imgURL;
        $category->status         = $request->status;
        $category->save();
    }

    public static function newCategory($request) {
        self::saveBasicInfo(new Category(), $request, self::getImageURL($request));
    }

    public static function updateCategoryStatus($id) {
        self::$category = Category::find($id);
        if (self::$category->status == 1)
        {
            self::$category->status = 0;
            self::$message = 'category info unpublished successfully';
        }
        else
        {
            self::$category->status = 1;
            self::$message = 'category info published successfully';
        }
        self::$category->save();
        return self::$message;
    }

    public static function updateCategory($request, $id) {
        self::$category = Category::find($id);
        self::saveBasicInfo(self::$category, $request, self::getImageURL($request, self::$category) );

    }
}
