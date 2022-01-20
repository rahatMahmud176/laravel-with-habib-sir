<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOtherImage extends Model
{
    use HasFactory;
    public static $otherImage;
    public static $imageURL;
    public static $imageExtrention;
    public static $image;
    public static $imageName;

    public static function otherImageInfoSave($requestOtherImage, $productId, $title)
    {
         $i = 1;
         foreach ($requestOtherImage as $otherImage) {  
          self::$imageExtrention  = $otherImage->getClientOriginalExtension();
          self::$imageName        = str_replace(' ','-',$title).'-'.time().'-'.$i++.'.'.self::$imageExtrention;  
          self::$imageURL         = imageUpload($otherImage,'product-other-image/',self::$imageName);

              self::$otherImage = new ProductOtherImage();
              self::$otherImage->productId      = $productId;
              self::$otherImage->image          = self::$imageURL;
              self::$otherImage->save();
         }
    }
}//Model
