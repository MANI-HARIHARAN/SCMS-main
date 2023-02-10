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
          <form class="form-sample"  action="/soupdate/{{$salesOrder->so_no}}" method="POST"   enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            @csrf
            @method('POST') 
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create User</h4>
                  <datalist id="option_brand">
                    @foreach($brands as $item)
                    <option value="{{ old('brand_name', $item->brand_name) }}">
                        {{ $item->name }}
                    </option>
                    @endforeach
                </datalist>
                <datalist id="option_product">
                    @foreach($products as $item)
                    <option value="{{ old('product_name', $item->product_name) }}">
                        {{ $item->name }}
                    </option>
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

                  <!-- <p class="card-description"> Personal info </p> -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group row">
                        <label class="required">Date</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" value="{{$salesOrder->date}}" name="date" required>
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
                        <label class="required">Customer Name</label>
                        <div class="col-sm-9">
                            <select id="selectbox" name="customer_name">                            
                       
                            @foreach($customer_name as $item) 
                            <option value="{{ old('customer_name', $item->customer_name) }}">
                                {{ $item->customer_name }}
                            </option>
                            @endforeach 
                            </select>
                          </div>
                          <label class="dispatch">SO Number</label>
                          <div class="col-sm-9">
                             <input type= "text" class="form-control" readonly="readonly" value="{{$salesOrder->so_no}}" placeholder="SO NUMBER"
                             name="so_no"/>
                            </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label class="required">Route</label>
                        <div class="col-sm-9">
                            <select id="selectbox" name="route">
                                @foreach($route as $item) 
                                <option value="{{ old('route', $item->route) }}">
                                    {{ $item->route_name }}
                                </option>
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
                  <div class="row">
                    <tr>
                      <th class="required" style="width:15%;padding-left:25px">Brands</th>
                      <th class="form-group required" style="width:15%;padding-left:25px">Products</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">UOM</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">Qty</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">GST</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">Rate</th>
                      <th class="form-group required" style="width:10%;padding-left:20px">Product Total</th>                     
                    </tr>
                    <div class="row">
                   
                      <datalist id="option_uom">
                                <option disabled>Select</option>
                                <option value="kgs">kgs</option>
                                <option value="unit">unit</option>
                                <option value="dozen">dozen</option>
                                <option value="numbers">numbers</option>
                                <option value="pieces">pieces</option>   
                      </datalist>
                      @foreach($table as $salesOrder)
                      <tr class="clonetr">
                        <td style="width:15%;">
                          <div class="col-sm-12">
                              <input type="text" class="form-control" value="{{$salesOrder->brand_name}}"  list="option_brand" name="brand_name[]" id="inputField" required/>
                          </div>
                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" value="{{$salesOrder->product_name}}" list="option_product" name="product_name[]" id="inputField" required/>                        
                          </div>
                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{$salesOrder->uom}}" list="option_uom" name="uom[]" id="inputField" required/>    
                          </div>
                        </td>
                        <td style="width:15%;">
                         <div class="col-sm-12">
                            <input type="number" class="form-control" value="{{$salesOrder->qty}}" placeholder="₹" id="qty"name="qty[]"required />
                          </div>
                        </td>
                        <td style="width:15%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" value="{{$salesOrder->gst}}" placeholder="₹" name="gst[]" required />
                          </div>
                        </td>
                        <td style="width:15%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" value="{{$salesOrder->rate}}" placeholder="₹" id="rate" name="rate[]" required />
                          </div>
                        </td>
                        <td style="width:15%;">
                          <div class="col-sm-15">
                            <input type="number" class="form-control"  value="{{$salesOrder->product_total}}" placeholder="₹" id="product_total" name="product_total[]" required />
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
                      @endforeach
                    </div>                   
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
                                    <input type="number" class="form-control" value="{{$salesOrder->grand_total}}" placeholder="₹" id="grand_total"name="grand_total" required />
                                  </div>
                                </td>
                                <td style="width:10%;">
                                    <div class="col-sm-12">
                                      <input type="number" class="form-control" value="{{$salesOrder->cash_received}}" placeholder="₹" id="cash_received" name="cash_received" required />
                                    </div>
                                  </td>
                                  <td style="width:15%;">
                                    <div class="col-sm-12">
                                      <input type="number" class="form-control" value="{{$salesOrder->balance}}" placeholder="₹" id="balance" name="balance" required />
                                    </div>
                                  </td>
                                  <td style="width:15%;">
                                    <div class="col-sm-15">
                                      <input type="number" class="form-control" value="{{$salesOrder->total_outstanding}}" placeholder="₹" id="total_outstanding" name="total_outstanding" required />
                                    </div>
                                  </td>
                              </tr>
                          </div>  
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
  $('input[name^="product_total"]').val(0);
  $('input[name^="qty"],input[name^="rate"]').on('input', function() {
   let $tr = $(this).closest('tr');
   let qty = parseFloat($tr.find('input[name^="qty"]').val());
   let rate = parseFloat($tr.find('input[name^="rate"]').val());
  

  let product_total = qty * rate;
   $tr.find('input[name^="product_total"]').val(product_total.toFixed(2));

   let grand_total = 0;
   $('input[name^="product_total"]').each(function() {
      grand_total += parseFloat($(this).val());
   });
   $('input[name="grand_total"]').val(grand_total.toFixed(2));
   var cash_received = document.getElementById("cash_received");
    var balance = document.getElementById("balance");
    form.addEventListener("input", function () {
    balance.value = grand_total-cash_received;
  });
   
});
$('input[name^="total_outstandingl"]').val(0);
$(document).ready(function(){
  $('#total_outstanding').val(0);
  $('#cash_received').on('input', function() {
    let grand_total = parseFloat($('#grand_total').val());
    let cash_received = parseFloat($(this).val());
    let balance = grand_total - cash_received;
    $('#balance').val(balance.toFixed(2));

    let total_outstanding = parseFloat($('#total_outstanding').val());
    total_outstanding = balance;
    $('#total_outstanding').val(total_outstanding.toFixed(2));
  });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>