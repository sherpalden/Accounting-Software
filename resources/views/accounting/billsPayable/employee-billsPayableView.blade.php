@include('employee.header-employee')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/NepaliDate.css')}}">

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" id="SearchHeader">
            <h4 class="card-title">Bills Payable</h4>
          </div>
          <div id="modalLoading" hidden>
         <!-- data comes from js -->
          </div>
          <div class="card-body">
<!-- contents -->
<!-- *****Purchase Entry Form OR Page Starts***** -->
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label class="bmd-label-floating">Vendor name</label>
          <select id="SupplierSelect" class="form-control">
            <option value="" hidden>Select Vendor</option>
            <option>Vendor1</option>
            <option>Vendor2</option>
            <option>Vendor3</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <label><p></p></label>
        <div class="form-group">
          <label class="bmd-label-floating">Pan Number</label>
          <input id="PanNoInput" type="text" class="form-control" disabled required>
        </div>
      </div>
    </div>
      
    

  <div style="border: 1px solid black; width: 100%; margin-bottom: 0.5%; margin-top: 2%"></div>
  <div class="row" style="border: 0px solid black;">
  	<div class="col-sm-1 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">S.N.</label>
      </div>
    </div>
    <div class="col-sm-3 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Date</label>
      </div>
    </div>
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Invoice No.</label>
      </div>
    </div>
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Pending Amt.</label>
      </div>
    </div>
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Paid Amt.</label>
      </div>
    </div>
    <div class="col-sm-2 text-center">
      <div class="form-group">
         <label class="font-weight-bold">Balance Amt.</label>
      </div>
    </div>
   </div>
   <div style="border: 1px solid black; width: 100%; margin-top: 0.5%;"></div>
   <!-- dynamic data row -->
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
   	<div class="col-sm-1 text-center">1.</div>
   	<div class="col-sm-3 text-center">14/05/2014</div>
   	<div class="col-sm-2 text-center">0001</div>
   	<div class="col-sm-2 text-center">20,000.00 /-</div>
   	<div class="col-sm-2 text-center">0.00 /-</div>
    <div class="col-sm-2 text-center">20,000.00/-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-1 text-center">2.</div>
    <div class="col-sm-3 text-center">20/05/2014</div>
    <div class="col-sm-2 text-center">0089</div>
    <div class="col-sm-2 text-center">20,000.00 /-</div>
    <div class="col-sm-2 text-center">0.00 /-</div>
    <div class="col-sm-2 text-center">40,000.00 /-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-1 text-center">3.</div>
    <div class="col-sm-3 text-center">20/05/2014</div>
    <div class="col-sm-2 text-center">--</div>
    <div class="col-sm-2 text-center">0.00 /-</div>
    <div class="col-sm-2 text-center">5000.00 /-</div>
    <div class="col-sm-2 text-center">35,000.00 /-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-1 text-center">4.</div>
    <div class="col-sm-3 text-center">20/06/2014</div>
    <div class="col-sm-2 text-center">1198</div>
    <div class="col-sm-2 text-center">20,000.00 /-</div>
    <div class="col-sm-2 text-center">0.00 /-</div>
    <div class="col-sm-2 text-center">55,000.00 /-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-1 text-center">5.</div>
    <div class="col-sm-3 text-center">20/08/2014</div>
    <div class="col-sm-2 text-center">0089</div>
    <div class="col-sm-2 text-center">20,000.00 /-</div>
    <div class="col-sm-2 text-center">0.00 /-</div>
    <div class="col-sm-2 text-center">75,000.00 /-</div>
   </div>
<!-- *****Purchase Entry Form OR Page Ends****** -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@include('employee.footer-employee')
<script type="text/javascript" src="{{asset('js/employeeAccountingBillsPayable.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>




