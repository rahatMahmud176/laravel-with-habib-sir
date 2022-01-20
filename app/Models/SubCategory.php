<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
   
    use HasFactory;
    protected $fillable = ['categoryId','title','description','image','status'];
    public static $subCategory; 
    public static $image; 
    public static $imageURL; 


public static function subCategoryBasicInfo($request, $subCategory, $imageURL)
{
    $subCategory->title        = $request->title;
    $subCategory->categoryId   = $request->categoryId;
    $subCategory->description  = $request->description;
    $subCategory->image        = $imageURL;
    $subCategory->status       = $request->status;
    $subCategory->save();
}

public static function subCategoryInfoSave($request)
{  
     self::$imageURL = imageUpload($request->file('image'),'sub-category-image/');
     self::$subCategory = new SubCategory(); 
     self::subCategoryBasicInfo($request, self::$subCategory, self::$imageURL);
}
public static function updateSubCategoryStatus($id)
{
    self::$subCategory = SubCategory::find($id);
     if ( self::$subCategory->status == 1) {
        self::$subCategory->status = 0;
     } else {
        self::$subCategory->status = 1;
     }
     self::$subCategory->save(); 
} 
public static function subCategoryUpdate($request,$id)
{
   self::$subCategory = SubCategory::find($id);
   if ( self::$image = $request->file('image')) {
       if (file_exists(self::$subCategory->image)) {
           unlink(self::$subCategory->image);
       }
       self::$imageURL = imageUpload($request->file('image'),'sub-category-image/');

   } else {
       self::$imageURL = self::$subCategory->image;
   } 
   self::subCategoryBasicInfo($request, self::$subCategory, self::$imageURL); 
}  
public function category()
{
    return $this->belongsTo('App\Models\Category','categoryId');
}






}//Model
