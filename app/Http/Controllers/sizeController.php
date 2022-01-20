<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class sizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.size.manage',[
            'sizes'    =>Size::all(),
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
    public function sizeInfoValidate($request)
    {
        $this->validate($request,[
            'title'         =>'required',
            'description'   =>'nullable',
            'code'          =>'required',
            'status'        =>'required',
        ]);
    }


    public function store(Request $request)
    {
        $this->sizeInfoValidate($request);
        Size::sizeInfoSave($request);
        Alert::success('Success','Size Save Succefully');
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
    public function updateSizeStatus($id)
    {
        Size::updateSizeStatus($id);
        Alert::success('Success','Size update Succefully');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('backEnd.size.edit',[
            'sizes'    =>Size::all(),
            'size'     =>Size::find($id),
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
        Size::sizeUpdate($request,$id);
        Alert::success('Success','Size update Succefully');
        return redirect('size');
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
