<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class OtherImage extends Model
{
    use HasFactory;
    public static $otherImage;
    public static $otherImages;
    public static $imgURL;

    public static function newOtherImage($requestOtherImage, $productId)
    {
        if ($requestOtherImage != null){
            foreach ($requestOtherImage as $image){
                self::$imgURL   = imageUpload($image,'other-image/');
                self::$otherImage = new OtherImage();
                self::$otherImage->product_id  = $productId;
                self::$otherImage->other_image = self::$imgURL;
                self::$otherImage->save();
            }
        }
    }
    public static function updateOtherImage($requestOtherImage, $productId)
    {
        $otherImages = OtherImage::where('product_id', $productId)->get();
        if ($otherImages)
        {
            foreach ($otherImages as $image){
                if (file_exists($image->other_image))
                {
                    unlink($image->other_image);
                }
            }
            $image->delete();
        }
        self::newOtherImage($requestOtherImage, $productId);
    }

    public static function otherImageDelete($id) {
        self::$otherImages = OtherImage::where('product_id', $id)->get();
        if (self::$otherImages)
        {
            foreach (self::$otherImages as $image){
                if (file_exists($image->other_image))
                {
                    unlink($image->other_image);
                }
                $image->delete();
            }
        }
    }
}
