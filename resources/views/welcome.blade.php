<!--@extends('backEnd.master')

@section('mainContent')
{{ Form::open(['route'=>'test-submit','method'=>'POST']) }}
    <table class="table table-bordered">
        <thead>
            <tr> 
                <td>Name</td>
                <td>Roll</td>
                <td>Phone</td>
                <td>fatherName</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody id="tbodyStudent">
             <tr> 
                <td> <input name="student[0][name]" type="text" class="form-control"> </td>
                <td><input name="student[0][roll]" type="text" class="form-control"></td>
                <td><input name="student[0][phone]" type="text" class="form-control"></td>
                <td><input name="student[0][fatherName]" type="text" class="form-control"></td>
                <td> <button type="button" class="btn btn-success" id="addRowStudent">+</button> </td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-primary container-fluid" type="submit">Submit</button>
{{ Form::close() }}-->







@endsection