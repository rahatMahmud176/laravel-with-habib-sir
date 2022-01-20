<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'categoryId',
    //     'subCategoryId',
    //     'unitId',
    //     'title',
    //     'code',
    //     'model',
    //     'regularPrice',
    //     'sellingPrice',
    //     'metaTag',
    //     'metaDescription',
    //     'shortDescription',
    //     'longDescription',
    //     'featuredImage', 
    //     'status',

    // ];
    public static $product; 
    public static $image; 
    public static $imageURL; 
    public static $imageName;
    public static $imageExtrention;
     

    

// public static function productBasicInfo($request,$product, $imageURL)
// {
//     $product->categoryId        = $request->categoryId;
//     $product->subCategoryId     = $request->subCategoryId;
//     $product->unitId            = $request->unitId;
//     $product->title             = $request->title;
//     $product->code              = $request->code;
//     $product->model             = $request->model;
//     $product->regularPrice      = $request->regularPrice;
//     $product->sellingPrice      = $request->sellingPrice;
//     $product->metaTag           = $request->metaTag;
//     $product->metaDescription   = $request->metaDescription;
//     $product->shortDescription  = $request->shortDescription;
//     $product->longDescription   = $request->longDescription;
//     $product->featuredImage     = $imageURL;
//     $product->status            = $request->status; 
//     $product->save();
//     return $product;
// }

public static function productInfoSave($request)
{  
    self::$image            =$request->file('featuredImage');
    self::$imageExtrention  = self::$image->getClientOriginalExtension();
    self::$imageName        = str_replace(' ','-',$request->title).'-'.time().'.'.self::$imageExtrention;
    self::$imageURL         = imageUpload(self::$image,'product-image/',self::$imageName);
    self::$product          = new Product(); 
    // self::productBasicInfo($request, self::$product, self::$imageURL); 
    self::$product->categoryId        = $request->categoryId;
    self::$product->subCategoryId     = $request->subCategoryId;
    self::$product->unitId            = $request->unitId;
    self::$product->title             = $request->title;
    self::$product->code              = $request->code;
    self::$product->model             = $request->model;
    self::$product->regularPrice      = $request->regularPrice;
    self::$product->sellingPrice      = $request->sellingPrice;
    self::$product->metaTag           = $request->metaTag;
    self::$product->metaDescription   = $request->metaDescription;
    self::$product->shortDescription  = $request->shortDescription;
    self::$product->longDescription   = $request->longDescription;
    self::$product->featuredImage     = self::$imageURL;
    self::$product->status            = $request->status; 
    self::$product->save();
    return self::$product;
}
public static function updateProductStatus($id)
{
    self::$product = Product::find($id);
     if ( self::$product->status == 1) {
        self::$product->status = 0;
     } else {
        self::$product->status = 1;
     }
     self::$product->save(); 
} 
public static function productUpdate($request,$id)
{
   self::$product = Product::find($id);
   if ( self::$image = $request->file('productImage')) {
       if (file_exists(self::$product->productImage)) {
           unlink(self::$product->productImage);
       }
       self::$imageURL = imageUpload($request->file('productImage'),'product-image/');

   } else {
       self::$imageURL = self::$product->productImage;
   } 
   self::productBasicInfo($request, self::$product, self::$imageURL); 
}  

function category ()
{
   return $this->belongsTo('App\Models\Category','categoryId');
}





}//Model
