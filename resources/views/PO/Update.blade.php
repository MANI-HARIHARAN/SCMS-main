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
                            </span> Update PO
                        </h3>
                    </div>
                    <!-- body content start -->
                    <datalist id="option_brand">
                        @foreach($brands as $brands)
                        <option value="{{$brands->name}}">{{$brands->name}}</option>
                        @endforeach
                    </datalist>
                    <datalist id="option_product">
                        @foreach($products as $products)
                        <option value="{{$products->name}}">{{$products->name}}</option>
                        @endforeach
                    </datalist>
                    <datalist id="option_uom">
                        <option disabled>Select</option>
                        <option value="kgs">kgs</option>
                        <option value="unit">unit</option>
                        <option value="dozen">dozen</option>
                        <option value="numbers">numbers</option>
                        <option value="pieces">pieces</option>
                    </datalist>

                    <form class="form-sample" method="POST" action="poupdate" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @csrf
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($date as $date)
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="required">Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" value="{{$date->date}}" name="edit_date" required>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @foreach($potype as $potype)
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="required">Bill Type</label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" name="edit_bill_type" required>
                                                        <option value="{{ $potype->bill_type }}">{{ $potype->bill_type }}</option>
                                                        <option disabled>select</option>
                                                        <option value="Paid">Paid</option>
                                                        <option value="Topay">Topay</option>
                                                        <option value="Credit">Credit</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @foreach($pono as $pono)
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="required">PO number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" value="{{ $pono->po_no}}" name="edit_po_number" required />
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @foreach($podate as $podate)
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="required">PO Date</label>
                                                <div class="col-sm-9">
                                                    <input type="Date" class="form-control" value="{{ $podate->po_date}}" name="edit_po_date" required />
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        @foreach($company as $company)
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="required">Company Name</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" value="{{ $company->company_name}}" name="edit_company_name" required />
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">

                                <table id="addrow" width="100%">
                                    <div class="row">
                                        <tr>
                                            <th class="required" style="width:15%;padding-left:25px">Brands</th>
                                            <th class="form-group required" style="width:15%;padding-left:25px">Products</th>
                                            <th class="form-group required" style="width:10%;padding-left:20px">UOM</th>
                                            <th class="form-group required" style="width:10%;padding-left:20px">qty</th>
                                            <th class="form-group required" style="width:10%;padding-left:20px">gst</th>
                                            <th class="form-group required" style="width:10%;padding-left:20px">mrp</th>
                                            <th class="form-group required" style="width:10%;padding-left:20px">Wrate</th>
                                            <th class="form-group required" style="width:10%;padding-left:20px">Rrate</th>
                                            <th class="form-group required" style="width:10%;padding-left:20px">Orate</th>
                                        </tr>
                                        <div class="row">


                                            @foreach($table as $value)
                                            <tr class="clonetr">



                                                <td style="width:15%;">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" list="option_brand" value="{{ $value->brand_name}}" name="edit_brands[]" id="inputField" required />
                                                        <input type="hidden" class="form-control" value="{{$value->id}}" name="id[]">
                                                    </div>
                                                </td>

                                                <td style="width:10%;">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" list="option_product" value="{{ $value->product_name}}" name="edit_products[]" id="inputField" required />
                                                    </div>
                                                </td>
                                                <td style="width:10%;">

                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" list="option_uom" value="{{ $value->uom}}" name="edit_po_uom[]" id="inputField" required />
                                                    </div>

                                                </td>
                                                <td style="width:10%;">
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" value="{{$value->qty}}" name="edit_po_qty[]" required />
                                                    </div>

                                                </td>
                                                <td style="width:10%;">
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" value="{{$value->gst}}" name="edit_po_gst[]" required />
                                                    </div>
                                                </td>
                                                <td style="width:10%;">

                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" value="{{$value->mrp}}" name="edit_po_mrp[]" />
                                                    </div>

                                                </td>
                                                <td style="width:10%;">

                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" value="{{$value->wrate}}" name="edit_po_wrate[]" />
                                                    </div>
                                                </td>
                                                <td style="width:10%;">

                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" value="{{$value->rrate}}" name="edit_po_rrate[]" />
                                                    </div>
                                                </td>
                                                <td style="width:10%;">

                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" value="{{$value->orate}}" name="edit_po_orate[]" />
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </div>
                                    </div>
                                </table>

                                <div class="row" style="justify-content:center">
                                    <button style="width:10%;margin-top:20px;margin-bottom:15px" type="submit" class="btn-info btn-sm btn-icon-text">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <!-- body content end -->
                    @include('layouts.footer')
                </div>
            </div>
        </div>
</body>

</html>
<script>
    $(function() {
        $(".addButton").click(function() {
            $('.clonetr:last').clone(true).appendTo("#addrow");
        });

        $(".deleteButton").click(function() {
            if ($('.deleteButton').length > 1) {

                $(this).closest("tr").remove();
            }

        });
    });

    let inputField = document.getElementById("inputField");
    // let getDataBtn = document.getElementById("getDataBtn");
    // let result = document.getElementById("result");

    // getDataBtn.addEventListener("click", function() {
    //   let selectedOption = inputField.value;
    //   result.innerHTML = "Selected option: " + selectedOption;
    // });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>