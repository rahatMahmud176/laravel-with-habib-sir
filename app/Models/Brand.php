<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory; 
    protected $fillable = ['title','description','image','status'];
    public static $brand; 
    public static $image; 
    public static $imageURL; 


public static function brandBasicInfo($request, $brand, $imageURL)
{
    $brand->title        = $request->title; 
    $brand->description  = $request->description;
    $brand->image        = $imageURL;
    $brand->status       = $request->status;
    $brand->save();
}

public static function brandInfoSave($request)
{  
     self::$imageURL = imageUpload($request->file('image'),'sub-brand-image/');
     self::$brand = new Brand(); 
     self::brandBasicInfo($request, self::$brand, self::$imageURL);
}
public static function updateBrandStatus($id)
{
    self::$brand = Brand::find($id);
     if ( self::$brand->status == 1) {
        self::$brand->status = 0;
     } else {
        self::$brand->status = 1;
     }
     self::$brand->save(); 
} 
public static function brandUpdate($request,$id)
{
   self::$brand = Brand::find($id);
   if ( self::$image = $request->file('image')) {
       if (file_exists(self::$brand->image)) {
           unlink(self::$brand->image);
       }
       self::$imageURL = imageUpload($request->file('image'),'sub-brand-image/');

   } else {
       self::$imageURL = self::$brand->image;
   } 
   self::brandBasicInfo($request, self::$brand, self::$imageURL); 
}  
 
}//Model
