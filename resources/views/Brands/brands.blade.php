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
                    <i class="mdi  mdi-ticket menu-icon"></i>
                    </span> Brands List
                </h3>
                <div  style="float:right">
                    <a class="nav-link" href="/brands_add"> 
                    <span class="page-title-icon bg-primary text-white me-2">
                    <i class="mdi  mdi-ticket menu-icon mdi-icon"></i>
                    </span>Add Brands</a>
                </div>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Brandlist <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                    </ul>
                </nav>
            </div>
<!-- body content start -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Brand Name</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($brands as $info)
              <tr>
                <td>{{$info->id}}</td>
                <td>{{$info->name}}</td> 
                <td>
                  <a href="/brands_edit{{$info->id}}" class="mdi mdi-lead-pencil"></a>
                  <a href="/brands_delete/{{$info->id}}" class="mdi mdi-delete"></a>
                </td> 
              </tr>
              @endforeach
                      </tbody>
                    </table>
                    <div>
                     
                    </div>
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