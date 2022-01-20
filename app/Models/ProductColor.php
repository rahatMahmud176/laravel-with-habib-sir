<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    public static $color;

    public static function colorInfoSave($requestColorId, $productId)
    {
         foreach ($requestColorId as $item) {
              self::$color = new ProductColor();
              self::$color->productId = $productId;
              self::$color->color     = $item;
              self::$color->save();
         }
    }






}//Model
