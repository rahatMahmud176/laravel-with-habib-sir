<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductOtherImage;
use App\Models\StockDetail;

class ApiController extends Controller
{
    private $categories = [];
    private $result     = [];
    private $products;
    private $product;
    private $image;
    private $bestSellProducts;
    private $popularProducts; 
    private $categoryProducts = []; 
    private $productImages; 
    private $productDetails; 
    private $stockIn; 
    private $stockOut;  
    private $colorArray = [];  
    private $sizeArray = []; 
    private $tempOut; 
    
            
    function allCategory() {
        //return response()->json(['categoris'=> Category::all()]);
        //return response()->json( Category::all());
        $this->categories = Category::where('status',1)->get();
        foreach ($this->categories as $key=> $category) {
            $this->result[$key]['category'] = $category;
            $this->result[$key]['sub_category'] = SubCategory::where('categoryId',$category->id)->get();
        } 
        return response()->json($this->result);
    }
    function allRecentProduct (){
        $this->products = Product::where('status',1)->get(['id','title','sellingPrice','featuredImage']);
        foreach ($this->products as $item) {
            $this->image = asset($item->featuredImage);
            $item->featuredImage = $this->image; 
        }  
        return response()->json($this->products);
    }
    function allTrendingProduct(){
            
        $this->bestSellProducts = Product::where(['status'=>1])->orderBy('sellCount','desc')->take('8')->get(['id','title','sellingPrice','featuredImage',]);
        foreach($this->bestSellProducts as $bestSell){
            $bestSell->featuredImage = asset($bestSell->featuredImage);
        }
        $this->popularProducts = Product::where(['status'=>1])->orderBy('clickCount','desc')->take('8')->get(['id','title','sellingPrice','featuredImage',]);
          foreach($this->popularProducts as $popularProduct){
            $popularProduct->featuredImage = asset($popularProduct->featuredImage);
        }
        return response()->json(
                [
                0 => [
                    'name'     => 'Popular',
                    'products' =>  $this->popularProducts,
                ],
                1 => [
                    'name'     => 'Best',
                    'products' => $this->bestSellProducts,
                ], 
                2 => [
                    'name'     => 'Most',
                    'products' => $this->popularProducts,
                ], 
            ]
        );
            
    }
    function productByCategory($id){
        $this->categoryProducts = Product::where(['status'=>1,'categoryId'=>$id])->orderBy('id','desc')->take(30)->get();
        foreach ($this->categoryProducts as $item) {
                $item->featuredImage = asset($item->featuredImage);
        }
        return response()->json($this->categoryProducts);
    }
    function productImageForDetailsPage($id) {
        $this->productImages = ProductOtherImage::where('productId',$id)->get();
        $resultArray = [];
        foreach ($this->productImages as $key=> $productImg ) {
            $resultArray[$key]['imageO'] = asset($productImg->image);
            $resultArray[$key]['imageF'] = asset(Product::find($id)->featuredImage);
        }
         
        return response()->json($resultArray);
    }
    function productBasicInfoForDetailsPage($id) {
         $this->product = Product::find($id);
         $this->productDetails = StockDetail::where('productId',$id)->get();
         foreach ($this->productDetails as $productDetail) {
             $this->stockIn  = $this->stockIn+$productDetail->stockAmount;
             $this->stockOut = $this->stockOut+$productDetail->stock_out;
         }
         
         if ($this->stockIn > $this->stockOut) {
             foreach ($this->productDetails as $productDetail) { 
                 
                array_push($this->colorArray, $productDetail->color);  
                array_push($this->sizeArray, $productDetail->size);
             }
         }
         
         $this->result = [
             'id'                => $this->product->id,
             'title'             => $this->product->title,
             'image'             => asset($this->product->featuredImage),
             'regularPrice'      => $this->product->regularPrice,
             'sellingPrice'      => $this->product->sellingPrice,
             'shortDescription'  => $this->product->shortDescription, 
             'color'             => array_unique($this->colorArray), 
             'size'              => array_unique($this->sizeArray),
             'category'          => $this->product->category, 
             'stockStatus'       => $this->productStockStatus($id),
         ];
         
         return response()->json($this->result); 
    }
    function productStockStatus($id){
        $this->productDetails = StockDetail::where('productId',$id)->get();
        foreach ($this->productDetails as $productDetail) {
             $this->stockIn  = $this->stockIn+$productDetail->stockAmount;
             $this->tempOut  = $this->tempOut+$productDetail->stock_temp_out;
             $this->stockOut = $this->stockOut+$productDetail->stock_out;
         }
        if($this->stockIn > $this->stockOut ){
            if($this->stockIn - ($this->tempOut+$this->stockOut)==0 || $this->stockIn - ($this->tempOut+$this->stockOut)<10 ){
                return 'Stock Lemited';
            } else {
                return 'in Stock';
            }
        } else {
            return 'Stock Out';
        }
    }


    function getProductDescription($id){
        return response()->json(Product::find($id)->longDescription);
    }
}//Controller
