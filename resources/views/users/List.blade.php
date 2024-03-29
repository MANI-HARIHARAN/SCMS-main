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
                <div style="float:right">
                <h3 class="page-title">
                    <a class="nav-link" href="/adduser"> 
                    <span style="width: 150px;font-size :16px;" class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-plus-box mdi-icon"></i>&nbsp;Add User
                    </span></a>
                </h3>
                </div>
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
                    <h4 class="card-title">Users Table</h4>
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
                            <a href="/userupdate{{$value->id}}" class="mdi mdi-lead-pencil"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="mdi mdi-delete" data-href="/userdelete/{{$value->id}}"  data-toggle="modal" data-target="#confirm-delete"></a>
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
    <!-- delete model popup start -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header"><h4>Delete</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel"></h4>
              </div>
              <div class="modal-body">
                  <p>Are You Sure ?</p>
                  <!-- <p class="debug-url"></p> -->
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-danger btn-ok">Delete</a>
              </div>
          </div>
      </div>
    </div>
    <!-- delete model popup end -->
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    function myFunction() {
      alert("Are you sure?");
    }
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        $('.debug-url').html('Delete This Id: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });

  </script>