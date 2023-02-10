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
                </span> Add Stock
              </h3>
            </div>
            <!-- body content start -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Retun To Stock</h4>
                        <form class="form-sample" method="POST" action="add_stock" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="required">Date</label>
                                        <div class="col-sm-9">
                                        <input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>" name="stock_date" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="required">Customer Name</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="customer_name" required>
                                            <option disabled>select</option>
                                            @foreach($customers as $value)
                                                <option value="{{$value->customer_name}}">{{$value->customer_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="required">Brand Name</label>
                                        <div class="col-sm-12">
                                                <select class="form-select" name="brand_name" required>
                                                <option disabled>select</option>
                                                @foreach($brands as $value)
                                                <option value="{{$value->name}}">{{$value->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                    </div>
                                </div>
                                
                               
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="required">Product Name</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="product_name" required>
                                            <option disabled>select</option>
                                            @foreach($products as $value)
                                                <option value="{{$value->name}}">{{$value->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="required">Qty</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" placeholder="₹" name="stock_qty" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="required">MRP</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" placeholder="₹" name="stock_mrp" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="required">GST</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" placeholder="₹" name="stock_gst" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="required">Stock Type</label>
                                        <div class="col-sm-9">
                                                <select class="form-select" name="stock_type" required>
                                                    <option disabled>select</option>
                                                    <option value="expiry_stock">Expiry stock</option>
                                                    <option value="mismatch_stock">Mismatch stock</option>
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                              <button type="submit" class="btn btn-gradient-primary btn-sm btn-icon-text">
                              <i class="btn-icon-prepend"></i>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- body content end -->          
        </div>
        @include('layouts.footer')
      </div>
    </div>
  </body>
</html>