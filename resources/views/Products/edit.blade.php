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
                </span> Update products
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Update Products <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- body content start -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Products</h4>
                    <form action="/products_update/{{$products->id}}" method="POST">
                      @csrf
                      @method('PUT')
                    <!-- <p class="card-description"> Personal info </p> -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">products Name</label>
                            <div class="col-sm-9">
                              <input type="text" name ="name" value="{{$products->name}}" class="form-control"  placeholder="Products NAME">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Brand Names</label>
                                <div class="col-sm-9">
                                  <select id="selectbox" name="brands"value="{{$products->brands}}">
                                    @foreach($products as $item)
                                    <option value="{{ $item->name }}" {{ $item->name == $products->brands ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-md-3 grid-margin stretch-card">
                          <button type="submit" class="btn btn-outline-primary btn-sm btn-icon-text">
                            <i class="btn-icon-prepend"></i>Update </button>
                        </div>
                    </div>
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