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
                    <i class="mdi mdi-account"></i>
                    </span> User List
                </h3>
                <div  style="float:right">
                    <a class="nav-link" href="/adduser"> 
                    <span class="page-title-icon bg-primary text-white me-2">
                    <i class="mdi mdi-plus-box mdi-icon"></i>
                    </span>Add User</a>
                </div>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Userlist <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                    </ul>
                </nav>
            </div>
<!-- body content start -->
                <!-- popup toast success start -->
                      @if(session('useradd'))
                      <div class="alert alert-success">
                      {{ session('useradd') }}
                      </div>
                      @endif

                      @if(session('userupdate'))
                      <div class="alert alert-info">
                      {{ session('userupdate') }}
                      </div>
                      @endif
                <!-- popup toast success end-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    </p>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr class="table-paginate">
                          <th> S.No</th>
                          <th> Name</th>
                          <th> Role </th>
                          <th> Username </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $key=>$value)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->role}}</td>
                          <td>{{$value->username}}</td>
                          <td>
                            <a href="/userupdate{{$value->id}}" class="mdi mdi-lead-pencil"></a>
                          </td>      
                        </tr>
                      @endforeach
                      </tbody>
                      <tr>
                      <td class="table-paginate" colspan="3">Showing{{$data->firstItem() }} {{ $data->lastItem() }} of {{ $data->total() }}</td>
                      <td class="table-paginate" colspan="2">{{ $data->links() }}</td>
                      </tr>
                    </table>
                  </div>
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