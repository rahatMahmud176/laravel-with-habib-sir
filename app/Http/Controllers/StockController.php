<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\StockDetail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{

    private $productId;
    private $sizeData;
    private $sizeArray =[];
    private $colorData;
    private $colorArray =[];
    private $i;
    private $resultArray=[];
    private $stock;
    private $details;

    public function index()
    {
        return view('backEnd.stock.add-stock', [
            'suppliers' => Supplier::where('status', 1)->get(),
            'products' => Product::where('status', 1)->get(),
            'sizes' => Size::where('status', 1)->get(),
            'colors' => Color::where('status', 1)->get(),
        ]);
    }

    public function allDataForStockForm()
    {
        return response()->json([
            'suppliers' => Supplier::where('status', 1)->get(),
            'products' => Product::where('status', 1)->get(),
            'sizes' => Size::where('status', 1)->get(),
            'colors' => Color::where('status', 1)->get(),
        ]);
    }

    public function productDataForStock()
    {
        $this->productId = $_GET['id'];
        $this->sizeData = ProductSize::where('productId', $this->productId)->get();
        foreach ($this->sizeData as $key => $item) {
            $this->sizeArray[$key]['id'] = $item->size;
            $this->sizeArray[$key]['name'] = Size::find($item->size)->title;
        }
        $this->colorData = ProductColor::where('productId', $this->productId)->get();
        foreach ($this->colorData as $key => $item) {
            $this->colorArray[$key]['id'] = $item->color;
            $this->colorArray[$key]['name'] = Color::find($item->color)->title;
        }
        return response()->json([
            'price' => Product::find($this->productId)->regularPrice,
            'sizes' => $this->sizeArray,
            'colors' => $this->colorArray,
        ]);
    }
    public function productStockAdd(Request $request )
    {  
        $this->i =1;
        foreach ($request->stock as $item)
        {
            foreach ($item['size'] as $value)
            {
              foreach ($item['color'] as $colorValue)
                {
                  $this->resultArray[$this->i]['supplier']    = $item['supplier'];
                  $this->resultArray[$this->i]['product']     = $item['product'];
                  $this->resultArray[$this->i]['size']        = $value;
                  $this->resultArray[$this->i]['color']       = $colorValue;
                  $this->resultArray[$this->i]['unitPrice']   = $item['unitPrice'];
                  $this->resultArray[$this->i]['stockAmount'] = $item['stockAmount'];
                  $this->resultArray[$this->i]['totalPrice']  = $item['totalPrice']; 
                  $this->i++;
                }
            }
        } 
        
        $this->stock = new Stock();
        $this->stock->stockDate         = $request->stockDate;
        $this->stock->chalanNo          = $request->chalanNo;
        $this->stock->stock_timestamp   = strtotime($request->stockDate);
        $this->stock->createdBy         = Auth::user()->id;
        $this->stock->updatedBy         = 0;
        $this->stock->save();
        
        foreach ($this->resultArray as $itemValue) {
            StockDetail::detailsSave($itemValue,$this->stock->id);
        }
        
        Alert::success('successfull!','Stock Save successfully!');
        return redirect()->back();
        
        
    }


   





















}//contorller
