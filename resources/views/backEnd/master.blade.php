<!DOCTYPE html>
<html lang="en"> 
    <!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 15:06:42 GMT -->
    <head>

        <meta charset="utf-8" />
        <title>WebSite | @yield('title') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/') }}assets/images/favicon.ico">
        <!-- Summernote css -->
        <link href="{{ asset('/') }}assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
        {{-- For Select2 --}}
        <link href="{{ asset('/') }}assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="{{ asset('/') }}assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/') }}assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- with datetable Responsive datatable examples -->
        <link href="{{ asset('/') }}assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     


        <!-- Bootstrap Css -->
        <link href="{{ asset('/') }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('/') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('/') }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">
            @if (isset(Auth::user()->id))
            @include('backEnd.includes.header')
            <!-- ========== Left Sidebar Start ========== -->
            @include('backEnd.includes.sidebar')
            @endif

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    @yield('mainContent')
                </div>
                <!-- Modal -->
                <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                                <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="{{ asset('/') }}assets/images/product/img-7.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 255</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="{{ asset('/') }}assets/images/product/img-4.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 145</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Shipping:</h6>
                                                </td>
                                                <td>
                                                    Free
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->
                @if (isset(Auth::user()->id))
                @include('backEnd.includes.footer')
                @endif

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('/') }}assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="{{ asset('/') }}assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="{{ asset('/') }}assets/js/pages/dashboard.init.js"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('/') }}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/jszip/jszip.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>    
        <!-- Responsive examples -->
        <script src="{{ asset('/') }}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        {{-- For Select2 --}}
        <script src="{{ asset('/') }}assets/libs/select2/js/select2.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="{{ asset('/') }}assets/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>
        <!-- Summernote js -->
        <script src="{{ asset('/') }}assets/libs/summernote/summernote-bs4.min.js"></script> 
        <script src="{{ asset('/') }}assets/js/pages/form-editor.init.js"></script> 
        <script src="{{ asset('/') }}assets/js/pages/datatables.init.js"></script>   
        <script src="{{ asset('/') }}assets/js/pages/form-advanced.init.js"></script>   
        @include('sweetalert::alert') 
        <!-- App js -->
        <script src="{{ asset('/') }}assets/js/app.js"></script>



        {{-- <script>
$('thead').on('click', '.addSizeColorRow', function () {
    var tr = '<tr>' +
            '<td>' +
            '<select class="form-control select2" data-placeholder="Choose ...">' +
            '<option value="AK">Alaska</option>' +
            '<option value="HI">Hawaii</option>' +
            '</select>' +
            '</td>' +
            '<td>' +
            '<select class="select2 form-control select2-multiple container-fluid my-select2" multiple="multiple" data-placeholder="--Choose product color--">' +
            '<option value="AK">Alaska</option>' +
            '<option value="HI">Hawaii</option>' +
            '<option value="HI">Demo</option>' +
            '<option value="HI">demo1</option>' +
            '</select>' +
            '</td>' +
            '<td><a href="javascript:;" class="btn btn-danger removeColorSizeRow">Remove</a></td>' +
            '</tr>'
    $('tbody').append(tr);
    $('.my-select2').select2();
})

$('tbody').on('click', '.removeColorSizeRow', function () {
    $(this).parent().parent().remove();
});

        </script> --}}
        {{-- <script>
            $(document).on('change', '#categoryId', function () {
                var catId = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: "{{ url('sub-category-by-category-id') }}",
                    data: {id: catId},
                    dataType: 'json',
                    success: function (res) {
                        // console.log(res);
                        var selectElement = $('#subCategoryId');
                        selectElement.empty();
                        var option = '';
                        option += '<option selected disabled value="">--Select Sub Categroy--</option>';
                        $.each(res, function (key, value) {
                            option += '<option value=" ' + value.id + ' "> ' + value.title + ' </option>';
                        })
                        selectElement.append(option);
                    }
                })
            })
        </script> --}}
     
         <script>
             var i = 1;
             $(document).on('click','.addRowStock', function(){
                  $.ajax({
                     type:'GET',
                     url : "{{ url('all-data-for-stock-form') }}",
                     data: '',
                     dataType: 'json',
                     success: function(res){
                        var tr = '';
                        tr +='<tr>';
                        tr +='<td>';
                        tr +='<select name="stock['+i+'][supplier]" id="" class="form-control my-select2">'; 
                        $.each(res.suppliers, function(key,value){
                            tr +='<option value="'+value.id+'">'+value.name+'</option>';
                        }); 
                        tr +='</select>';
                        tr +='</td>';
                        tr +='<td>';
                        tr +='<select name="stock['+i+'][product]" id="" class="form-control my-select2 addStockItemSelect" data-id="'+i+'">'; 
                        tr +='<option value="">--select Product--</option>';  
                        $.each(res.products, function(key,value){
                            tr +='<option value="'+value.id+'">'+value.title+'</option>';
                        });
                        tr +='</select>';
                        tr +='</td>';
                        tr +='<td>';
                        tr +='<select name="stock['+i+'][size][]" id="size'+i+'" class="form-control my-select2" multiple="multiple">'; 
                        $.each(res.sizes, function(key,value){
                            tr +='<option value="'+value.id+'">'+value.title+'</option>';
                        });
                        tr +='</select>';
                        tr +='</td>';
                        tr +='<td>';
                        tr +='<select name="stock['+i+'][color][]" id="color'+i+'" class="form-control my-select2" multiple="multiple">'; 
                        $.each(res.colors, function(key,value){
                            tr +='<option value="'+value.id+'">'+value.title+'</option>';
                        });
                        tr +='</select>';
                        tr +='</td>';
                        tr +='<td><input type="number" name="stock['+i+'][unitPrice]" id="unitPrice'+i+'" class="form-control invantory-unit-price" data-id="'+i+'"></td>';
                        tr +='<td><input type="number" name="stock['+i+'][stockAmount]" id="stockAmount'+i+'" class="form-control invantory-take-amount" data-id="'+i+'"></td>';
                        tr +='<td><input type="number" name="stock['+i+'][totalPrice]" id="totalPrice'+i+'" class="form-control"></td>';
                        tr +='<td>';
                        tr +='<button type="button" class="btn btn-success addRowStock">+</button>';
                        tr +='</td>';
                        tr +='</tr>';
                        $('#tbodyStock').append(tr);
                        $('.my-select2').select2();
                        i++;
                     }
                  });
             });
         </script>
         
          

        <script>
            $(document).on('change', '.addStockItemSelect', function () {
                var productId = $(this).val(); 
                var dataId    = $(this).attr('data-id');  
                $.ajax({
                    type: 'GET',
                    url: "{{ url('product-info-for-stock') }}",
                    data: {id: productId},
                    dataType: 'json',
                    success: function (res) {
                       // console.log(res);
                        var selectSize = $('#size'+dataId);
                        var selectColor= $('#color'+dataId);
                        var price = $('#unitPrice'+dataId);
                        selectSize.empty();
                        var optionSize = '';
                        $.each(res.sizes, function(key, value){
                            optionSize +='<option value=" '+value.id+' ">'+value.name+'</option>';
                        });
                        selectSize.append(optionSize);

                         selectColor.empty();
                        var optionColor = '';
                        $.each(res.colors, function(key, value){
                            optionColor +='<option value=" '+value.id+' ">'+value.name+'</option>';
                        });
                        selectColor.append(optionColor);

                        price.val(res.price); 
                    }
                });
            });
        </script>
        <script>
            $(document).on('keyup','.invantory-take-amount', function(){
                var dataId           = $(this).attr('data-id');
                var takeStockAmount  = $(this).val();
                var unitPrice        = $('#unitPrice'+dataId).val();
                var itemTotalAmount  = unitPrice * takeStockAmount;
                $('#totalPrice'+dataId).val(itemTotalAmount);
                //alert(unitPrice);
            });
            $(document).on('keyup','.invantory-unit-price', function(){
                var dataId           = $(this).attr('data-id');
                var unitPrice  = $(this).val();
                var takeStockAmount        = $('#stockAmount'+dataId).val();
                var itemTotalAmount  = unitPrice * takeStockAmount;
                $('#totalPrice'+dataId).val(itemTotalAmount);
                //alert(unitPrice);
            });
        </script>

 
    
    </body>


    

    <!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 15:07:20 GMT -->
</html>