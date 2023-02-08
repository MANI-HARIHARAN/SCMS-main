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
          @foreach($users as $user)
          <form class="form-sample" method="POST" action="poupdate" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group row">
                        <label class="required">Date</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" value="{{$user->bill_date}}" name="edit_date" required>
                          <input type="hidden" class="form-control" name="id" value="{{$user->id}}" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group row">
                        <label class="required">Bill Type</label>
                        <div class="col-sm-8">
                          <select class="form-select" name="edit_bill_type" required>
                          <option value="{{ $user->bill_type }}">{{ $user->bill_type }}</option>
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
                          <input type="text" class="form-control" value="{{ $user->po_no}}" name="edit_po_number" required />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label class="required">Company Name</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" value="{{ $user->company_name}}" name="edit_company_name" required />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label class="required">PO Date</label>
                        <div class="col-sm-9">
                          <input type="Date" class="form-control"  value="{{ $user->po_date}}" name="edit_po_date" required />
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
                              <input type="text" class="form-control"  list="option_brand" value="{{ $user->brand_name}}" name="edit_brands" id="inputField" required/>
                          </div>
                        </td>

                        <td style="width:10%;">
                          <div class="col-sm-12"> 
                           <input type="text" class="form-control" list="option_product" value="{{ $user->product_name}}" name="edit_products" id="inputField" required/>                        
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="text" class="form-control" list="option_uom" value="{{ $user->uom}}" name="edit_po_uom" id="inputField" required/>    
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" value="{{ $user->qty}}" name="edit_po_qty" required />
                          </div>

                        </td>
                        <td style="width:10%;">
                          <div class="col-sm-12">
                            <input type="number" class="form-control" value="{{ $user->gst}}" name="edit_po_gst" required />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" value="{{ $user->mrp}}"name="edit_po_mrp" />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" value="{{ $user->wrate}}" name="edit_po_wrate" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" value="{{ $user->rrate}}" name="edit_po_rrate" />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" value="{{ $user->orate}}"name="edit_po_orate"/>
                          </div>
                        </td>
                      </tr>

                    </div>
                  </div>
                </table>
            
                <div class="row" style="justify-content:center">
                  <button style="width:10%;margin-top:20px;margin-bottom:15px" type="submit" class="btn-info btn-sm btn-icon-text">
                    Update
                  </button>
                </div>
              </div>
            </div>
          </form>
          @endforeach

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

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>