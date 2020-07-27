@include('employee.header-employee')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/NepaliDate.css')}}">

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" id="SearchHeader">
            <h4 class="card-title">Journal Entries</h4>
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
          <label class="bmd-label-floating">Filter By:</label>
          <select id="SupplierSelect" class="form-control">
            <option value="" hidden>Select Filter basis</option>
            <option>Date</option>
            <option>Account</option>
            <option>Invoice</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <label><p></p></label>
        <label class="bmd-label-floating">Date from</label>
        <input type="text" id="nepaliDate2" class="nepali-calendar form-control" placeholder="yyy-mm-dd" />
      </div>
      <div class="col-md-4">
        <label><p></p></label>
        <label class="bmd-label-floating">Date to</label>
        <input type="text" id="nepaliDate2" class="nepali-calendar form-control" placeholder="yyy-mm-dd" />
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label class="bmd-label-floating">Ledger account</label>
          <select id="SupplierSelect" class="form-control">
            <option value="" hidden>Select Account</option>
            <option>Cash A/C</option>
            <option>Capital A/C</option>
            <option>Purchase A/C</option>
            <option>Sales A/C</option>
          </select>
        </div>
      </div>
    </div>
      
    

  <div style="border: 1px solid black; width: 100%; margin-bottom: 0.5%; margin-top: 2%"></div>
  <div class="row" style="border: 0px solid black;">
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Date</label>
      </div>
    </div>
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Invoice No.</label>
      </div>
    </div>
    <div class="col-sm-3 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Particulars</label>
      </div>
    </div>
    <div class="col-sm-1 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">LF</label>
      </div>
    </div>
    <div class="col-sm-2 text-center">
      <div class="form-group">
         <label class="font-weight-bold">Debit Amt.</label>
      </div>
    </div>
    <div class="col-sm-2 text-center">
      <div class="form-group">
         <label class="font-weight-bold">Credit Amt.</label>
      </div>
    </div>
   </div>
   <div style="border: 1px solid black; width: 100%; margin-top: 0.5%;"></div>
   <!-- dynamic data row -->
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
   	<div class="col-sm-2 text-center">14/05/2014</div>
   	<div class="col-sm-2 text-center">0001</div>
   	<div class="col-sm-3 text-center">Cash A/C</div>
    <div class="col-sm-1 text-center">LF</div>
   	<div class="col-sm-2 text-center">20,000.00 /-</div>
    <div class="col-sm-2"></div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-2"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-3 text-center">To Sales A/C</div>
    <div class="col-sm-1"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-2">20,000.00 /-</div>
   </div>
   <div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <label class="bmd-label-floating">Narration</label>
        <textarea class="form-control" rows="2"></textarea>
      </div>
    </div>
  </div>
  <div style="border: 1px solid black; width: 100%; margin-top: 0.5%;"></div>
  <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-2 text-center">15/05/2014</div>
    <div class="col-sm-2 text-center">0002</div>
    <div class="col-sm-3 text-center">Purchase A/C</div>
    <div class="col-sm-1 text-center">LF</div>
    <div class="col-sm-2 text-center">35,000.00 /-</div>
    <div class="col-sm-2"></div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-2"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-3 text-center">To S.K Plywoow A/C</div>
    <div class="col-sm-1"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-2">35,000.00 /-</div>
   </div>
   <div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <label class="bmd-label-floating">Narration</label>
        <textarea class="form-control" rows="2"></textarea>
      </div>
    </div>
  </div>
   
<!-- *****Purchase Entry Form OR Page Ends****** -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@include('employee.footer-employee')
<script type="text/javascript" src="{{asset('js/employeeAccountingJournal.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>




