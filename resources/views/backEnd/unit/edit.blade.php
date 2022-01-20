@extends('backEnd.master')
@section('title')
    Edit Unit
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Unit form</h4> 
                {{ Form::open(['route'=>['unit.update',$unit->id],'method'=>'POST','enctype'=>'multipart/form-data']) }}
                @method('PUT')
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" id="horizontal-firstname-input" value="{{ $unit->title }}">
                        </div>
                    </div>
                      <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10">
                          <input type="text" name="code" class="form-control" id="horizontal-firstname-input" value="{{ $unit->code }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" id="horizontal-email-input" value="{{ $unit->description }}">
                        </div>
                    </div>  
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-2  ">Publication Status</label>
                        <div class="col-sm-10"> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ $unit->status==1?'checked':'' }} type="radio" name="status" id="inlineRadio1" value="1">
                                <label class="form-check-label"   for="inlineRadio1">Published</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ $unit->status==0?'checked':'' }} type="radio" name="status" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                              </div>
                               
                        </div>
                    </div>  
                     <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-2  "> </label>
                        <div class="col-sm-10">  
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </div>  
                    
                {{ Form::close('') }}
            </div>
        </div>
    </div>
</div>

{{-- for table --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Default Datatable</h4>
                <p class="card-title-desc">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>

                    @php
                        $i = 1;
                    @endphp
                    <tbody>
                     @foreach ($unites as $item)
                     <tr>
                         <td>{{ $i++ }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->code }} </td>
                        <td>
                            @if ($item->status ==1) 
                                <i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Published 
                            @else 
                                <i class="bx bx-block font-size-16 align-middle mr-2"></i> Unpublished
                             @endif
                        </td>
                        <td class="text-right"> 
                            <a href="{{ route('updateUnitStatus',['id'=>$item->id]) }}"><i class="fas fa-arrow-alt-circle-up {{ $item->status==1?'text-danger':'text-success' }}" title="{{ $item->status==1?'Click for Unpublished':'Click for Published' }}">   </i></a>
                             <i class="dripicons-trash text-danger" title="Click for delete">    </i> 
                             <a href="{{ route('unit.edit',$item->id ) }}"><i class="dripicons-document-edit text-info" title="Click for edit"></i></a>  
                        </td> 
                    </tr>
                     @endforeach
                   
                    
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection