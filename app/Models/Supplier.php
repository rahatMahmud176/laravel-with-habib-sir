<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','image','status'];
    public static $supplier; 
    public static $image; 
    public static $imageURL; 
    public static $imageName; 
    public static $imageExtrention; 

    

public static function supplierBasicInfo($request, $supplier, $imageURL)
{
    $supplier->name         = $request->name;
    $supplier->description  = $request->description;
    $supplier->image        = $imageURL;
    $supplier->status       = $request->status;
    $supplier->save();
}

public static function supplierInfoSave($request)
{  
     self::$image = $request->file('image');
     self::$imageExtrention = self::$image->getClientOriginalExtension();
     self::$imageName       = str_replace(' ','-',$request->name).'-'.time().'.'.self::$imageExtrention;
     self::$imageURL  = imageUpload(self::$image,'supplier-image/',self::$imageName);
     self::$supplier  = new Supplier(); 
     self::supplierBasicInfo($request, self::$supplier, self::$imageURL);
}
public static function updateSupplierStatus($id)
{
    self::$supplier = Supplier::find($id);
     if ( self::$supplier->status == 1) {
        self::$supplier->status = 0;
     } else {
        self::$supplier->status = 1;
     }
     self::$supplier->save(); 
} 
public static function supplierUpdate($request,$id)
{
   self::$supplier = Supplier::find($id);
   if ( self::$image = $request->file('image')) {
       if (file_exists(self::$supplier->image)) {
           unlink(self::$supplier->image);
       }
       self::$imageURL = imageUpload($request->file('image'),'supplier-image/');

   } else {
       self::$imageURL = self::$supplier->image;
   } 
   self::supplierBasicInfo($request, self::$supplier, self::$imageURL); 
}  
}//Modle
