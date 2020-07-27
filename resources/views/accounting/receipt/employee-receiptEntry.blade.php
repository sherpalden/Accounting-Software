@include('employee.header-employee')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/NepaliDate.css')}}">

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" id="SearchHeader">
            <h4 class="card-title">Receipt Entry</h4>
          </div>
          <div id="modalLoading" hidden>
         <!-- data comes from js -->
          </div>
          <div class="card-body">
<!-- contents -->
<!-- *****Purchase Entry Form OR Page Starts***** -->
<form id="PurchaseVat" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
   <div class="col-md-3">
    <label><p></p></label>
      <div class="form-group">
        <label class="bmd-label-floating">Date</label>
        <input type="text" id="nepaliDate2" class="nepali-calendar form-control"/>
      </div>
    </div>

    <div class="col-md-5">
      <div class="form-group">
        <label class="bmd-label-floating">Customer Name</label>
        <select id="VendorSelect" class="form-control">
          <option hidden="hidden">Select Customer</option>
          <option>New Himal</option>
          <option>Sampanna</option>
        </select>
      </div>
    </div>
    <div class="col-sm-4">
      <label><p></p></label>
      <div class="form-group">
         <label class="bmd-label-floating">PAN Number</label>
         <input type="text" id="Amount0" name="amount0" class="form-control resp0" disabled>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
         <label class="bmd-label-floating">Bill Invoice</label>
          <select id="VendorSelect" class="form-control">
            <option hidden="hidden"></option>
            <option>78495315</option>
            <option>78495313</option>
            <option>78495314</option>
          </select>
        </div>
    </div>
    <div class="col-sm-4">
      <label><p></p></label>
      <div class="form-group">
         <label class="bmd-label-floating">Amount In Number</label>
         <input type="text" id="Amount0" name="amount0" class="form-control resp0">
      </div>
    </div>
    <div class="col-sm-4"></div>
  </div>

  <div class="row">
    <div class="col-sm-12 text-left">
      <div class="form-group">
        <label class="bmd-label-floating">Amount in words</label>
        <input type="text" id="AmtInWords" name="AmtInWords" class="form-control" disabled>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-3">
      <div class="form-group">
        <label class="bmd-label-floating">Payment Method</label>
        <select id="VendorSelect" class="form-control">
            <option hidden="hidden">Choose Payment Method</option>
            <option>Add New Method</option>
            <option>Cash</option>
            <option>Cheque</option>
            <option>Online Banking</option>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label class="bmd-label-floating">Description</label>
        <textarea class="form-control" rows="4" cols="50"></textarea>
      </div>
    </div>
  </div>
  
    <div style="border: 1px solid black; width: 100%; margin-top: 1.5%;"></div>
  </span>
  <button type="submit" id="submitID" class="btn btn-primary pull-right" data-userid="b{{ Auth::user()->id }}">PRINT</button>
  <div class="clearfix"></div>
</form>
<!-- *****Purchase Entry Form OR Page Ends****** -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@include('employee.footer-employee')
<script type="text/javascript" src="{{asset('js/employeeAccountingReceipt.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>



