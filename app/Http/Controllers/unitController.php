<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class unitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.unit.manage',[
            'unites'    =>Unit::all(),
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
    public function unitInfoValidate($request)
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
        $this->unitInfoValidate($request);
        Unit::unitInfoSave($request);
        Alert::success('Success','Unit Save Succefully');
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
    public function updateUnitStatus($id)
    {
        Unit::updateUnitStatus($id);
        Alert::success('Success','Unit update Succefully');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('backEnd.unit.edit',[
            'unites'    =>Unit::all(),
            'unit'     =>Unit::find($id),
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
        Unit::unitUpdate($request,$id);
        Alert::success('Success','Unit update Succefully');
        return redirect('unit');
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
