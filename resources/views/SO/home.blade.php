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
              </span> Sales Order
            </h3>
          </div>
          <!-- body content start -->
          <form id="order-entry-form" class="form-sample" method="POST" action="/addso" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            @csrf
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create User</h4>

                  <!-- <p class="card-description"> Personal info </p> -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group row">
                        <label class="required">Date</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>" name="date" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group row">
                        <label class="required">Bill Type</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="bill_type" required>
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
                        <label class="required">Company Name</label>
                        <div class="col-sm-9">
                            <select id="selectbox" name="company_name">
                              @foreach($customer as $item)
                                  <option value="{{ $item->customer_name }}">{{ $item->customer_name }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label class="required">Route</label>
                        <div class="col-sm-9">
                            <select id="selectbox" name="route">
                              @foreach($route as $item)
                                  <option value="{{ $item->route_name}}">{{ $item->route_name}}</option>
                              @endforeach
                            </select>
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

                  {{-- <div class="row card-body">
                    <button style="width:15%;margin-bottom:30px" type="addrowdata" class="btn-info btn-sm btn-icon-text btn btn-success addButton offset-1">
                      <i class="mdi mdi-plus-circle"></i>Add Order
                    </button>
                  </div> --}}
                  <div class="row">
                    <tr>
                      <th class="required" style="width:15%;padding-left:25px">Brands</th>
                      <th class="form-group required" style="width:15%;padding-left:25px">Products</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">UOM</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">Qty</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">GST</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">Rate</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">Product Total</th>
                      {{-- <th class="form-group required" style="width:10%;padding-left:20px">Grand Total</th> --}}
                      {{-- <th class="form-group required" style="width:10%;padding-left:20px">Cash Receiveid</th> --}}
                      {{-- <th class="form-group required" style="width:10%;padding-left:20px">Balance</th> --}}
                      {{-- <th class="form-group required" style="width:10%;padding-left:20px">Total Oustanding</th> --}}
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
                              <input type="text" class="form-control"  list="option_brand" name="brand_name[]" id="inputField" required/>
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" name="product_name[]" id="inputField" required/>                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" name="uom[]" id="inputField" required/>    
                          </div>

                        </td>
                        <td style="width:15%;">


                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" id="qty"name="qty[]" required />
                          </div>

                        </td>
                        <td style="width:15%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="gst[]" required />
                          </div>
                        </td>
                        <td style="width:15%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" id="rate" name="rate[]" required />
                          </div>
                        </td>
                        <td style="width:15%;">
                          <div class="col-sm-15">
                            <input type="number" class="form-control" placeholder="₹" id="product_total" name="product_total[]" required />
                          </div>
                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </div>    
                    <tr class="clonetr">
                      <td style="width:15%;">
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  list="option_brand" name="brand_name[]" id="inputField" />
                        </div>
                      </td>

                      <td style="width:10%;">
                        <div class="col-sm-12"> 
                         <input type="text" class="form-control" list="option_product" name="product_name[]" id="inputField" />                        
                        </div>
                      </td>
                      <td style="width:10%;">

                        <div class="col-sm-12">
                          <input type="text" class="form-control" list="option_uom" name="uom[]" id="inputField" />    
                        </div>

                      </td>
                      <td style="width:15%;">


                        <div class="col-sm-12">
                          <input type="number" class="form-control" placeholder="₹" id="qty"name="qty[]"  />
                        </div>

                      </td>
                      <td style="width:15%;">
                        <div class="col-sm-12">
                          <input type="number" class="form-control" placeholder="₹" name="gst[]"  />
                        </div>
                      </td>
                      <td style="width:15%;">
                        <div class="col-sm-12">
                          <input type="number" class="form-control" placeholder="₹" id="rate" name="rate[]"  />
                        </div>
                      </td>
                      <td style="width:15%;">
                        <div class="col-sm-15">
                          <input type="number" class="form-control" placeholder="₹" id="product_total" name="product_total[]"  />
                        </div>
                      </td>
                      <td style="width:10%;">
                        <div class="col-sm-12">
                          <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                            <i class="mdi mdi-delete"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </div>    
                  <tr class="clonetr">
                    <td style="width:15%;">
                      <div class="col-sm-12">
                          <input type="text" class="form-control"  list="option_brand" name="brand_name[]" id="inputField" />
                      </div>
                    </td>

                    <td style="width:10%;">
                      <div class="col-sm-12"> 
                       <input type="text" class="form-control" list="option_product" name="product_name[]" id="inputField" />                        
                      </div>
                    </td>
                    <td style="width:10%;">

                      <div class="col-sm-12">
                        <input type="text" class="form-control" list="option_uom" name="uom[]" id="inputField" />    
                      </div>

                    </td>
                    <td style="width:15%;">


                      <div class="col-sm-12">
                        <input type="number" class="form-control" placeholder="₹" id="qty"name="qty[]"  />
                      </div>

                    </td>
                    <td style="width:15%;">
                      <div class="col-sm-12">
                        <input type="number" class="form-control" placeholder="₹" name="gst[]"  />
                      </div>
                    </td>
                    <td style="width:15%;">
                      <div class="col-sm-12">
                        <input type="number" class="form-control" placeholder="₹" id="rate" name="rate[]"  />
                      </div>
                    </td>
                    <td style="width:15%;">
                      <div class="col-sm-15">
                        <input type="number" class="form-control" placeholder="₹" id="product_total" name="product_total[]"  />
                      </div>
                    </td>
                    <td style="width:10%;">
                      <div class="col-sm-12">
                        <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                          <i class="mdi mdi-delete"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                </div>    
                <tr class="clonetr">
                  <td style="width:15%;">
                    <div class="col-sm-12">
                        <input type="text" class="form-control"  list="option_brand" name="brand_name[]" id="inputField" />
                    </div>
                  </td>

                  <td style="width:10%;">
                    <div class="col-sm-12"> 
                     <input type="text" class="form-control" list="option_product" name="product_name[]" id="inputField" />                        
                    </div>
                  </td>
                  <td style="width:10%;">

                    <div class="col-sm-12">
                      <input type="text" class="form-control" list="option_uom" name="uom[]" id="inputField" />    
                    </div>

                  </td>
                  <td style="width:15%;">


                    <div class="col-sm-12">
                      <input type="number" class="form-control" placeholder="₹" id="qty"name="qty[]"  />
                    </div>

                  </td>
                  <td style="width:15%;">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" placeholder="₹" name="gst[]"  />
                    </div>
                  </td>
                  <td style="width:15%;">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" placeholder="₹" id="rate" name="rate[]"  />
                    </div>
                  </td>
                  <td style="width:15%;">
                    <div class="col-sm-15">
                      <input type="number" class="form-control" placeholder="₹" id="product_total" name="product_total[]"  />
                    </div>
                  </td>
                  <td style="width:10%;">
                    <div class="col-sm-12">
                      <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                        <i class="mdi mdi-delete"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </div>    
              <tr class="clonetr">
                <td style="width:15%;">
                  <div class="col-sm-12">
                      <input type="text" class="form-control"  list="option_brand" name="brand_name[]" id="inputField" />
                  </div>
                </td>

                <td style="width:10%;">
                  <div class="col-sm-12"> 
                   <input type="text" class="form-control" list="option_product" name="product_name[]" id="inputField" />                        
                  </div>
                </td>
                <td style="width:10%;">

                  <div class="col-sm-12">
                    <input type="text" class="form-control" list="option_uom" name="uom[]" id="inputField" />    
                  </div>

                </td>
                <td style="width:15%;">


                  <div class="col-sm-12">
                    <input type="number" class="form-control" placeholder="₹" id="qty"name="qty[]"  />
                  </div>

                </td>
                <td style="width:15%;">
                  <div class="col-sm-12">
                    <input type="number" class="form-control" placeholder="₹" name="gst[]"  />
                  </div>
                </td>
                <td style="width:15%;">
                  <div class="col-sm-12">
                    <input type="number" class="form-control" placeholder="₹" id="rate" name="rate[]"  />
                  </div>
                </td>
                <td style="width:15%;">
                  <div class="col-sm-15">
                    <input type="number" class="form-control" placeholder="₹" id="product_total" name="product_total[]"  />
                  </div>
                </td>
                <td style="width:10%;">
                  <div class="col-sm-12">
                    <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </div>    
            <tr class="clonetr">
              <td style="width:15%;">
                <div class="col-sm-12">
                    <input type="text" class="form-control"  list="option_brand" name="brand_name[]" id="inputField" />
                </div>
              </td>

              <td style="width:10%;">
                <div class="col-sm-12"> 
                 <input type="text" class="form-control" list="option_product" name="product_name[]" id="inputField" />                        
                </div>
              </td>
              <td style="width:10%;">

                <div class="col-sm-12">
                  <input type="text" class="form-control" list="option_uom" name="uom[]" id="inputField" />    
                </div>

              </td>
              <td style="width:15%;">


                <div class="col-sm-12">
                  <input type="number" class="form-control" placeholder="₹" id="qty"name="qty[]"  />
                </div>

              </td>
              <td style="width:15%;">
                <div class="col-sm-12">
                  <input type="number" class="form-control" placeholder="₹" name="gst[]"  />
                </div>
              </td>
              <td style="width:15%;">
                <div class="col-sm-12">
                  <input type="number" class="form-control" placeholder="₹" id="rate" name="rate[]"  />
                </div>
              </td>
              <td style="width:15%;">
                <div class="col-sm-15">
                  <input type="number" class="form-control" placeholder="₹" id="product_total" name="product_total[]"  />
                </div>
              </td>
              <td style="width:10%;">
                <div class="col-sm-12">
                  <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                    <i class="mdi mdi-delete"></i>
                  </button>
                </div>
              </td>
            </tr>
          </div>    
                        <div class="row">
                          <tr>
                            <th class="form-group required" style="width:10%;padding-left:20px">Grand Total    </th>
                            <th class="form-group required" style="width:10%;padding-left:20px">Cash Receiveid </th>
                            <th class="form-group required" style="width:10%;padding-left:20px">Balance        </th>
                            <th class="form-group required" style="width:15%;padding-left:20px">Total Oustanding</th>
                          </tr>
                          <div class="row">
                              <tr class="clonetr">
                                <td style="width:15%;">
                                  <div class="col-sm-12">
                                    <input type="number" class="form-control" placeholder="₹" id="grand_total"name="grand_total" required />
                                  </div>
                                </td>
                                <td style="width:10%;">

                                    <div class="col-sm-12">
                                      <input type="number" class="form-control" placeholder="₹" id="cash_received" name="cash_received" required />
                                    </div>
                                  </td>
                                  <td style="width:15%;">

                                    <div class="col-sm-12">
                                      <input type="number" class="form-control" placeholder="₹" id="balance" name="balance" required />
                                    </div>
                                  </td>
                                  <td style="width:15%;">

                                    <div class="col-sm-15">
                                      <input type="number" class="form-control" placeholder="₹" id="total_outstanding" name="total_outstanding" required />
                                    </div>
                                  </td>
                              </tr>
                          </div>  
                        </div>
                        {{-- <td style="width:10%;">
                          <div class="col-sm-12">
                            <button type="remove" class="btn btn-danger deleteButton btn-sm btn-icon-text ">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </div>
                        </td> --}}
                     
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
  
  // Get Form Elements
  var form = document.getElementById("order-entry-form");
  var qty = document.getElementById("qty");
  var rate = document.getElementById("rate");
  var product_total = document.getElementById("product_total");
  var grand_total = document.getElementById("grand_total");
  var cash_received = document.getElementById("cash_received");
  var balance = document.getElementById("balance");
  var total_outstanding = document.getElementById("total_outstanding");
  

  // Calculate product_total on Input Change
  form.addEventListener("input", function () {
    product_total.value = qty.value * rate.value;
  });
  form.addEventListener("input", function () {
    grand_total.value = product_total.value;
  });
    form.addEventListener("input", function () {
    balance.value = grand_total.value-cash_received.value;
  });

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

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>