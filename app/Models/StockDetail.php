<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockDetail extends Model
{
    public static $details;
    use HasFactory;
    
    
   public static function detailsSave($itemValue,$stockId){
            self::$details = new StockDetail();
            self::$details->stockId       = $stockId;
            self::$details->supplierId    = $itemValue['supplier'];
            self::$details->productId     = $itemValue['product'];
            self::$details->sizeId        = $itemValue['size'];
            self::$details->colorId       = $itemValue['color'];
            self::$details->unitPrice     = $itemValue['unitPrice'];
            self::$details->stockAmount   = $itemValue['stockAmount'];
            self::$details->save();
    }


   public function size()
{
    return $this->belongsTo('App\Models\Size','sizeId');
}
   public function color()
{
    return $this->belongsTo('App\Models\Color','colorId');
}
    
    
    
    
}
