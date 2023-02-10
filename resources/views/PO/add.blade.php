<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body>
  <div class="container-scroller">
    @include('layouts.navbar')
    <div class="container-fluid page-body-wrapper">
      @include('layouts.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
              </span> Purchase Order
            </h3>
          </div>
          <!-- body content start -->
          <form class="form-sample" method="POST" action="polist" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 

                  <!-- <p class="card-description"> Personal info </p> -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group row">
                        <label class="required">Date</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>" name="date" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group row">
                        <label class="required">Bill Type</label>
                        <div class="col-sm-8">
                          <select class="form-select" name="bill_type" >
                            <option disabled>select</option>
                            <option value="Paid">Paid</option>
                            <option value="Topay">Topay</option>
                            <option value="Credit">Credit</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group row">
                        <label class="required">PO number</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control"  placeholder="PO number" name="po_number" required />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group row">
                        <label class="required">PO Date</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" name="po_date"  />
                        </div>
                      </div>
                    </div>
                   
                  </div>
                  
                  <div class="row">
                    
                     <div class="col-md-4">
                      <div class="form-group row">
                        <label class="required">Company Name</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" placeholder="@Company name" name="company_name" required />
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <table id="addrow" width="100%">
                  <!-- <div class="row card-body">
                    <button style="width:15%;" type="addButton" class="btn-info btn-sm btn-icon-text btn btn-success addButton offset-1">
                      <i class="mdi mdi-plus-circle"></i>Add Product
                    </button>
                  </div> -->
                  <div class="row">
                    <tr>
                      <th class="required" style="width:15%;padding-left:25px">Brands</th>
                      <th class="form-group required" style="width:15%;padding-left:25px">Products</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">UOM</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">qty</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">gst</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">mrp</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">Wrate</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">Rrate</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">Orate</th>
                    </tr>
                    <div class="row">

                    
                    <datalist id="option_brand">
                      @foreach($brands as $brands)
                        <option value="{{$brands->name}}">{{$brands->name}}</option>
                      @endforeach
                    </datalist>
                    <datalist id="option_product">
                      @foreach($products as $products)
                        <option value="{{$products->name}}">{{$products->name}}</option>
                      @endforeach
                    </datalist>
                    <datalist id="option_uom">
                        <option disabled>Select</option>
                        <option value="kgs">kgs</option>
                        <option value="unit">unit</option>
                        <option value="dozen">dozen</option>
                        <option value="numbers">numbers</option>
                        <option value="pieces">pieces</option>   
                    </datalist>

                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField" required/>
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField" required/>                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField" required/>    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]" required />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]" required />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]" />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]"/>
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>

                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField" >
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField">                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField">    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]"  />
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>

                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField">
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField">                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField">    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]"  />
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>

                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField">
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField">                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField">    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]" />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]" />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]" />
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>

                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField">
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField">                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField">    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]" />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]" />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]" />
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>

                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField">
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField">                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField">    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]" />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]" />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]" />
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>
                      
                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField">
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField">                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField">    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]"  />
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>

                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField">
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField">                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField">    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]"  />
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>

                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField">
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField">                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField">    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]"  />
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>

                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control"  list="option_brand" name="brands[]" id="inputField">
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="products[]" id="inputField">                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="po_uom[]" id="inputField">    
                          </div>

                        </td>
                        <td style="width:10%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_qty[]" />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="%" name="po_gst[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]"  />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]"  />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]"  />
                          </div>
                        </td>
                        <!-- <td style="width:10%;">

                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> -->
                      </tr>

                    </div>
                  </div>
                </table>

                <div class="row" style="justify-content:center">
                  <button style="width:10%;margin-top:20px;margin-bottom:15px" type="submit" class="btn-info btn-sm btn-icon-text">
                    Submit
                  </button>
                </div>
              </div>
            </div>
          </form>


          <!-- body content end -->
          @include('layouts.footer')
        </div>
      </div>
    </div>
</body>

</html>
<script>
  $(function() {
    $(".addButton").click(function() {
      $('.clonetr:last').clone(true).appendTo("#addrow");
    });

    $(".deleteButton").click(function() {
      if ($('.deleteButton').length > 1) {

        $(this).closest("tr").remove();
      }

    });
  });

let inputField = document.getElementById("inputField");
// let getDataBtn = document.getElementById("getDataBtn");
// let result = document.getElementById("result");

// getDataBtn.addEventListener("click", function() {
//   let selectedOption = inputField.value;
//   result.innerHTML = "Selected option: " + selectedOption;
// });
function calculate() {
            var total_amount = document.getElementById('total_amount');
            var dd = document.getElementById('dd');
            var dc = document.getElementById('dc');
            var freight = document.getElementById("txtPassportNumber");
            
            total_amount.value = total_amount.value.replace(/\\D/, "");
            dd.value = dd.value.replace(/\\D/, "");
            dc.value = dc.value.replace(/\\D/, "");
            freight.value = freight.value.replace(/\\D/, "");
           
            total_amount.value = Number(freight.value) * Number(quantity.value * (Number(cgst.value / 100))) + Number(freight.value) * Number(quantity.value) + Number(dd.value) + Number(dc.value) + Number(handling.value) + Number(statistical.value)+ Number(LR_Charges.value);
            // total_amount.value = Number(freight.value)  + Number(cgst.value * (freight.value / 100)) + Number(dd.value) + Number(dc.value);
        }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>