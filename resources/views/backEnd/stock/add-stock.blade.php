@extends('backEnd.master')
@section('title')
Add Stock
@endsection
@section('mainContent')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif


<div class="row"> 
     {{ Form::open(['route'=>'productStockAdd','method'=>'POST']) }}
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Stock form</h4>   
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" name="stockDate" class="form-control" id="horizontal-firstname-input" required> 
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Challan number:</label>
                    <div class="col-sm-10">
                        <input type="text" name="chalanNo" class="form-control" id="horizontal-firstname-input" required>
                    </div>
                </div>  
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsiv">
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <td>Supplier</td>
                                <td>Product Select</td>
                                <td>Product Size</td>
                                <td>Product Color</td>
                                <td>Unit Price</td>
                                <td>Stock Amount</td>
                                <td>Total Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                         
                        <tbody id="tbodyStock">
                            <tr>
                                <td>
                                    <select name="stock[0][supplier]" id="" class="form-control select2"> 
                                        @foreach($suppliers as $item) 
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="stock[0][product]" id="" class="form-control select2 addStockItemSelect" data-id="0"> 
                                        <option value="">--select Product--</option>
                                        @foreach($products as $item) 
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="stock[0][size][]" id="size0" class="form-control select2" multiple="multiple"> 
                                        @foreach($sizes as $item) 
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                     <select name="stock[0][color][]" id="color0" class="form-control select2" multiple="multiple"> 
                                        @foreach($colors as $item) 
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="stock[0][unitPrice]" id="unitPrice0" class="form-control invantory-unit-price" data-id="0"></td>
                                <td><input type="number" name="stock[0][stockAmount]" id="stockAmount0" class="form-control invantory-take-amount" data-id="0"></td>
                                <td><input type="number" name="stock[0][totalPrice]" id="totalPrice0" class="form-control"></td>
                                <td>
                                    <button type="button" class="btn btn-success addRowStock">+</button> 
                                </td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 



<div class="row"> 
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary container-fluid">Submit</button>
            </div>
        </div>
    </div>
</div>

 
    {{ Form::close() }}
@endsection
