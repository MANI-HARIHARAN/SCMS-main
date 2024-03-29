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
                  <i class="mdi mdi-routes"></i>
                </span> Add Route
              </h3>
            </div>
            <!-- body content start -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Create Route</h4> -->
                        <form class="form-sample" method="POST" action="routelist" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @csrf
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Route name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="eg: Theni" name="route_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-gradient-primary btn-sm btn-icon-text">
                                    <i class="btn-icon-prepend"></i>Submit </button>
                                </div>
                            </div>
                            
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