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
                </span> Add Customer
              </h3>
            </div>
            <!-- body content start -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Customer</h4>
                        <form class="form-sample" method="POST" action="customerlist" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @csrf
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Customer name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="eg: Kumar" name="customer_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Routename</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="route_name" required>
                                                <option disabled>select</option>
                                                @foreach($route as $route)
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
                                            <input type="text" class="form-control" placeholder="Trade name" name="trade_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Address" name="customer_address" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">GST no:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="gst no" name="gst_no" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Mobile no:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="mobile no" name="mobile_number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <button type="submit" class="btn btn-gradient-primary btn-sm btn-icon-text">
                                <i class="btn-icon-prepend"></i>Submit 
                            </button>
                        </form>
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