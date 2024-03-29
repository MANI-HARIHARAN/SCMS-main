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
                </span> Update Route
              </h3>
            </div>
            <!-- body content start -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Update Route</h4> -->
                        @foreach($users as $user)
                        <form class="form-sample" method="POST" action="routeupdate" >
                        @csrf
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="Name" name="edit_route_name" value="{{$user->route_name}}" required>
                                        <input type="hidden" class="form-control" name="id" value="{{$user->id}}" required>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-gradient-primary btn-sm btn-icon-text">
                                    <i class="btn-icon-prepend"></i>Update </button>
                                </div>
                            </div>   
                        </form>
                   @endforeach
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