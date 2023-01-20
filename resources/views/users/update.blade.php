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
                </span> Update User
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Edituser <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- body content start -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update User</h4>
                        @foreach($users as $user)
                        <form class="form-sample" method="POST" action="userlist" >
                        @csrf
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="Name" name="name" value="{{ $user->name }}" required>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">Role</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="user_role"  required> 
                                            <option value="{{ $user->role }}">{{ $user->role }}</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Salesman">Salesman</option>
                                            <option value="Developer">Developer</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">User Id</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="@" name="username" value="{{ $user->username }}" required/>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">Password</label>
                                    <div class="col-sm-9">
                                    <input type="password" class="form-control" placeholder="****" name="password" value="{{ $user->password }}" required/>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-text">
                            <i class="btn-icon-prepend"></i>Update </button>
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