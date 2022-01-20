<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('backEnd.category.manageCategory',[
            'categories'    =>Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categoryInfoValidate($request)
    {
        $this->validate($request,[
            'categoryTitle'         =>'required',
            'categoryDescription'   =>'nullable',
            'categoryImage'         =>'required',
            'status'                =>'required',
        ]);
    }
    public function store(Request $request)
    { 
        $this->categoryInfoValidate($request);
        Category::categoryInfoSave($request);
        Alert::success('Success','Category Save Succefully');
        return redirect()->back();
    }
    public function updateCategoryStatus($id)
    {
        Category::updateCategoryStatus($id);
        Alert::success('Success','Category update Succefully');
        return redirect()->back();
    }

    public function subCategoryByCategory()
    {
        $categoryId = $_GET['id'];
        $subCtegory = SubCategory::where('categoryId',$categoryId)->get();
        return response()->json($subCtegory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view('backEnd.category.edit-category',[
             'categories'   =>Category::all(),
             'category'     =>Category::find($id),
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         Category::categoryUpdate($request,$id);
         Alert::success('Success','Category update Succefully');
         return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    } 
}//Controller
