<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductOtherImage;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{  
public $product;
public function productAddPage()
{
    return view('backEnd.product.add-product',[
        'categories'     => Category::where('status',1)->get(),
        'subCategories'  => SubCategory::where('status',1)->get(),
        'colors'         => Color::where('status',1)->get(),
        'sizes'          => Size::where('status',1)->get(),
        'units'          => Unit::where('status',1)->get(),
        'brands'         => Brand::where('status',1)->get()
    ]);
}

public function productSave(Request $request)
{
    $this->product= Product::productInfoSave($request);
    ProductColor::colorInfoSave($request->colorId, $this->product->id);
    ProductSize::sizeInfoSave($request->sizeId, $this->product->id);
    ProductOtherImage::otherImageInfoSave($request->otherImage,$this->product->id,$request->title);

    Alert::success('success','Product Save successfully');
    return redirect()->back();
     
}   
public function manageProduct()
{
    return view('backEnd.product.manage-product',[
        'products'   => Product::all(),
    ]);
}




}//Controller
