<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    public static $size;
    public static function sizeInfoSave($requestSizeId, $productId)
    {
         foreach ($requestSizeId as $item) {
              self::$size = new ProductSize();
              self::$size->productId = $productId;
              self::$size->size      = $item;
              self::$size->save();
         }
    }
}
