@extends('backEnd.master')
@section('title')
    Add Product
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Product form</h4> 
                {{ Form::open(['route'=>'productSave','method'=>'POST','enctype'=>'multipart/form-data']) }}
                   
                   <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="categoryId" id="categoryId">
                                <option value="" selected disabled>--Select Category--</option> 
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->categoryTitle }}</option> 
                                @endforeach 
                            </select>
                        </div>
                    </div>
                   <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Sub Category</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="subCategoryId" id="subCategoryId">
                                <option selected disabled value="">--Select Sub Categroy--</option> 
                                @foreach ($subCategories as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                   <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="brandId">
                                <option selected disabled value="">--Select Brands--</option> 
                                @foreach ($brands as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option> 
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Unit</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="unitId">
                                <option selected disabled value="">--Select Unit--</option> 
                                @foreach ($units as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Color</label>
                        <div class="col-sm-10">
                            <select name="colorId[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose Color...">
                                @foreach ($colors as $item)
                                   <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Size</label>
                        <div class="col-sm-10">
                            <select name="sizeId[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose Size...">
                                @foreach ($sizes as $item)
                                   <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                            
                       
            </div>
        </div>
    </div>


    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Product form</h4> 
               
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                      <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10">
                          <input type="text" name="code" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                      <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Model</label>
                        <div class="col-sm-10">
                          <input type="text" name="model" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-2 col-form-label">Price:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="">Regular:</span>
                                </div>
                                <input type="number" min="1" name="regularPrice" class="form-control">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Selling:</span>
                                  </div>
                                <input type="number" min="1" name="sellingPrice" class="form-control">
                              </div>
                        </div>
                    </div>  
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Meta Tag</label>
                        <div class="col-sm-10">
                          <input type="text" name="metaTag" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Meta Description</label>
                        <div class="col-sm-10">
                          <input type="text" name="metaDescription" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                    {{-- <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-2  ">Publication Status</label>
                        <div class="col-sm-10"> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" checked type="radio" name="status" id="inlineRadio1" value="1">
                                <label class="form-check-label"   for="inlineRadio1">Published</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                              </div>
                               
                        </div>
                    </div>   --}} 
            </div>
        </div>
    </div>  
</div>
 
{{-- <div class="row"> 
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Product Color & Size</h4>  
                  
                  
                 <table class="table table-striped">
                    <thead>
                      <tr> 
                        <th scope="col">Size</th>
                        <th scope="col">color</th>
                        <th scope="col"> <a href="javascript:;" class="btn btn-success addSizeColorRow">+</a></th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      <tr> 
                        <td>
                            <select class="form-control select2" data-placeholder="Choose Size....">
                                @foreach ($sizes as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option> 
                                @endforeach 
                            </select>
                        </td>
                        <td>
                            <select class="select2 form-control select2-multiple container-fluid" multiple="multiple" data-placeholder="Choose color...">
                                @foreach ($colors as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option> 
                                @endforeach 
                            </select>
                        </td> 
                        <td><a href="javascript:;" class="btn btn-danger addRow">Remove</a></td>
                      </tr>
                  
                    </tbody>
                  </table>
            </div>
        </div>
    </div> 
</div> --}}


<div class="row"> 
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Product Descripions</h4>  
                  
                <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-12 col-form-label">Short Description</label>
                        <div class="col-sm-12">
                             <input type="text" name="shortDescription" class="form-control">
                        </div>
                 </div>   
                <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-12 col-form-label">Long Description</label>
                        <div class="col-sm-12">
                            <textarea name="longDescription" type="text" class="summernote"></textarea> 
                        </div>
                 </div>  
            </div>
        </div>
    </div> 
</div>

<div class="row"> 
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Fetures Image:</h4>   
                <div class="form-group row mb-4"> 
                        <div class="col-sm-12">
                            <input accept="image/*" name="featuredImage" type="file">
                        </div>
                 </div>  
            </div>
        </div>
    </div>  
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Other Images:</h4>   
                <div class="form-group row mb-4"> 
                        <div class="col-sm-12">
                            <input type="file" name="otherImage[]" accept="image/*" multiple/>
                        </div>
                 </div>  
            </div>
        </div>
    </div>  
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Publication Status:</h4>   
                <div class="form-group row mb-4"> 
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" checked type="radio" name="status" id="inlineRadio1" value="1">
                                <label class="form-check-label"  for="inlineRadio1">Published</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Unpublished</label>
                              </div>
                              
                        </div>
                 </div>  
            </div>
        </div>
    </div> 
</div>

<div class="row"> 
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body pb-1">    
                <div class="form-group row mb-4"> 
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info container-fluid">Submit</button>
                        </div>
                 </div>   
                 
            </div>
        </div>
    </div> 
</div>
{{ Form::close() }}

@endsection