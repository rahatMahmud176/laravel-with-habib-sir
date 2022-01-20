<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['categoryTitle','categoryDescription','categoryImage','status'];
    public static $category; 
    public static $image; 
    public static $imageURL; 

    

public static function categoryBasicInfo($request, $category, $imageURL)
{
    $category->categoryTitle        = $request->categoryTitle;
    $category->categoryDescription  = $request->categoryDescription;
    $category->categoryImage        = $imageURL;
    $category->status               = $request->status;
    $category->save();
}

public static function categoryInfoSave($request)
{  
     self::$imageURL = imageUpload($request->file('categoryImage'),'category-image/');
     self::$category = new Category(); 
     self::categoryBasicInfo($request, self::$category, self::$imageURL);
}
public static function updateCategoryStatus($id)
{
    self::$category = Category::find($id);
     if ( self::$category->status == 1) {
        self::$category->status = 0;
     } else {
        self::$category->status = 1;
     }
     self::$category->save(); 
} 
public static function categoryUpdate($request,$id)
{
   self::$category = Category::find($id);
   if ( self::$image = $request->file('categoryImage')) {
       if (file_exists(self::$category->categoryImage)) {
           unlink(self::$category->categoryImage);
       }
       self::$imageURL = imageUpload($request->file('categoryImage'),'category-image/');

   } else {
       self::$imageURL = self::$category->categoryImage;
   } 
   self::categoryBasicInfo($request, self::$category, self::$imageURL); 
}  
}//Model
