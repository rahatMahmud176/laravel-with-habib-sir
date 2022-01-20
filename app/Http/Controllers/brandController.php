<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class brandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.brand.manage',[
            'brands'    =>Brand::all(),
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
    public function brandInfoValidate($request)
    {
        $this->validate($request,[
            'title'         =>'required',
            'description'   =>'nullable',
            'image'         =>'required',
            'status'        =>'required',
        ]);
    }

    public function store(Request $request)
    {
        $this->brandInfoValidate($request);
        Brand::brandInfoSave($request);
        Alert::success('Success','Brand Save Succefully');
        return redirect()->back();
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
        return view('backEnd.brand.edit',[
            'brands'   =>Brand::all(),
            'brand'     =>Brand::find($id),
        ]);
    }

    public function updateBrandStatus($id)
    {
        Brand::updateBrandStatus($id);
        Alert::success('Success','Brand update Succefully');
        return redirect()->back();
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
        Brand::brandUpdate($request,$id);
        Alert::success('Success','Brand update Succefully');
        return redirect('brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
