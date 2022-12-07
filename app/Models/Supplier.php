<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    public static $supplier;
    public static $message;
    public static $image;
    public static $imgURL;

    public static function getImageURL($request, $supplier=null) {
        if (self::$image = $request->file('logo'))
        {
            if ($supplier)
            {
                if (file_exists($supplier->logo))
                {
                    if ($supplier->logo != 'dummy.jpg')
                    {
                        unlink($supplier->logo);
                    }
                }
            }

            self::$imgURL = imageUpload(self::$image,'supplier-image/');
        }
        else
        {
            if ($supplier)
            {
                self::$imgURL = $supplier->logo;
            }
            else
            {
                self::$imgURL = 'dummy.jpg';
            }

        }
        return self::$imgURL;
    }

    public static function saveBasicInfo($supplier, $request, $imgURL) {
        $supplier->company_name   = $request->company_name;
        $supplier->person_name    = $request->person_name;
        $supplier->code           = $request->code;
        $supplier->mobile         = $request->mobile;
        $supplier->email          = $request->email;
        $supplier->logo           = $imgURL;
        $supplier->address        = $request->address;
        $supplier->account_number = $request->account_number;
        $supplier->status         = $request->status;
        $supplier->save();
    }

    public static function newSupplier($request) {
        self::saveBasicInfo(new Supplier(), $request, self::getImageURL($request));
    }

    public static function updateSupplierStatus($id) {
        self::$supplier = Supplier::find($id);
        if (self::$supplier->status == 1)
        {
            self::$supplier->status = 0;
            self::$message = 'supplier info unpublished successfully';
        }
        else
        {
            self::$supplier->status = 1;
            self::$message = 'supplier info published successfully';
        }
        self::$supplier->save();
        return self::$message;
    }

    public static function updateSupplier($request, $id) {
        self::$supplier = Supplier::find($id);
        self::saveBasicInfo(self::$supplier, $request, self::getImageURL($request, self::$supplier) );

    }
}
