<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory; 
    protected $fillable = ['title','code','description','status'];
    public static $unit;  


public static function unitBasicInfo($request, $unit)
{
    $unit->title        = $request->title; 
    $unit->description  = $request->description; 
    $unit->code         = $request->code; 
    $unit->status       = $request->status;
    $unit->save();
}

public static function unitInfoSave($request)
{   
     self::$unit = new Unit(); 
     self::unitBasicInfo($request, self::$unit);
}
public static function updateUnitStatus($id)
{
    self::$unit = Unit::find($id);
     if ( self::$unit->status == 1) {
        self::$unit->status = 0;
     } else {
        self::$unit->status = 1;
     }
     self::$unit->save(); 
} 
public static function unitUpdate($request,$id)
{
   self::$unit = Unit::find($id); 
   self::unitBasicInfo($request,self::$unit); 
}
}//Model
