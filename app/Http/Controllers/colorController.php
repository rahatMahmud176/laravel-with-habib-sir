<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class colorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('backEnd.color.manage',[
            'colors'    =>Color::all(),
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
    public function colorInfoValidate($request)
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
        $this->colorInfoValidate($request);
        Color::colorInfoSave($request);
        Alert::success('Success','Color Save Succefully');
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
    public function updateColorStatus($id)
    {
        Color::updateColorStatus($id);
        Alert::success('Success','Color update Succefully');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('backEnd.color.edit',[
            'colors'   =>Color::all(),
            'color'     =>Color::find($id),
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
        Color::colorUpdate($request,$id);
        Alert::success('Success','Color update Succefully');
        return redirect('color');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;
    }
}
