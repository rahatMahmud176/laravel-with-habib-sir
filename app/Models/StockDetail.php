<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockDetail extends Model
{
    use HasFactory;
    
    
   public static function detailsSave($itemValue){
            $this->details = new StockDetail();
            $this->details->stockId     = $this->stock->id;
            $this->details->supplierId    = $itemValue['supplier'];
            $this->details->productId     = $itemValue['product'];
            $this->details->sizeId        = $itemValue['size'];
            $this->details->colorId       = $itemValue['color'];
            $this->details->unitPrice   = $itemValue['unitPrice'];
            $this->details->stockAmount = $itemValue['stockAmount'];
            $this->details->save();
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
