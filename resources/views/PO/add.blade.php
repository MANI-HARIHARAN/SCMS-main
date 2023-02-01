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
          <form class="form-sample" method="POST" action="po_insert" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                        <label class="required">PO number</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="PO number" name="po_number" required />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label class="required">Company Name</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" placeholder="@Company name" name="company_name" required />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label class="required">PO Date</label>
                        <div class="col-sm-9">
                          <input type="Date" class="form-control" name="po_date" required />
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

                  <div class="row card-body">
                    <button style="width:15%;" type="addrowdata" class="btn-info btn-sm btn-icon-text btn btn-success addButton offset-1">
                      <i class="mdi mdi-plus-circle"></i>Add Product
                    </button>
                  </div>
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

                      <tr class="clonetr">
                        <td style="width:15%;">

                          <div class="col-sm-12">
                            <select class="form-select" name="brands[]" required>
                              <option disabled>select</option>
                              @foreach($brands as $brands)
                              <option value="{{$brands->name}}">{{$brands->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <select class="form-select" name="products[]" required>
                              <option disabled>select</option>
                              @foreach($products as $products)
                              <option value="{{$products->name}}">{{$products->name}}</option>
                              @endforeach
                            </select>
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <select class="form-select" name="po_uom[]" required>
                              <option disabled>select</option>
                              <option value="kgs">kgs</option>
                              <option value="unit">unit</option>
                              <option value="dozen">dozen</option>
                              <option value="numbers">numbers</option>
                              <option value="pieces">pieces</option>
                            </select>
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
                            <input type="number" class="form-control" placeholder="₹" name="po_mrp[]" required />
                          </div>

                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_wrate[]" required />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_rrate[]" required />
                          </div>
                        </td>
                        <td style="width:10%;">

                          <div class="col-sm-12">
                            <input type="number" class="form-control" placeholder="₹" name="po_orate[]" required />
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
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>