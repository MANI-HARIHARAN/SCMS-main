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
                </span> Update Customer
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Editcustomer <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- body content start -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Customer</h4>
                        @foreach($route as $value)
                        <form class="form-sample" method="POST" action="customerupdate" >
                        @csrf
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Customer name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{$value->customer_name}}" name="edit_customer_name" required>
                                            <input type="hidden" class="form-control" value="{{$value->id}}" name="id" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Routename</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="edit_route_name" required>
                                                <option disabled>{{$value->route_name}}</option>
                                                @foreach($routename as $route)
                                                <option value="{{$route->route_name}}">{{$route->route_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Trade name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{$value->trade_name}}" name="edit_trade_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{$value->customer_address}}" name="edit_customer_address" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">GST no:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{$value->customer_gst}}" name="edit_gst_no" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Mobile no:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"  value="{{$value->customer_mobile}}" name="edit_mobile_number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-text">
                                    <i class="btn-icon-prepend"></i>Update 
                            </button>
                        </form>
                   @endforeach
                    </div>
                </div>
            </div>   
            <!-- body content end -->          
          @include('layouts.footer')
        </div>
      </div>
    </div>
  </body>
</html>