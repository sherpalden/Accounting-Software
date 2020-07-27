@include('board.header-board')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/NepaliDate.css')}}">

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" id="SearchHeader">
            <h4 class="card-title">Ledger Accounts</h4>
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
          <label class="bmd-label-floating">Select Ledger Account:</label>
          <select id="accountSelect" class="form-control">
            <option value="" hidden></option>
            <option>Cash A/C</option>
            <option>Bank A/C</option>
            <option>Purchase A/C</option>
            <option>Salary A/C</option>
            <option>Wages A/C</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="bmd-label-floating">Of the month:</label>
          <select id="monthSelect" class="form-control">
            <option value="" hidden></option>
            <option>Bhaisakh</option>
            <option>Jestha</option>
            <option>Asadh</option>
            <option>Shrawan</option>
            <option>Bhadra</option>
          </select>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  <span id="displayLedger" hidden="hidden">
  <div style="border: 1px solid black; width: 100%; margin-bottom: 0.5%; margin-top: 2%"></div>
  <div class="row" style="border: 0px solid black;">
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Date</label>
      </div>
    </div>
    <div class="col-sm-5 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Particulars</label>
      </div>
    </div>
    <div class="col-sm-1 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">JF</label>
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
   	<div class="col-sm-2">01/05/2076</div>
   	<div class="col-sm-5">To opening balance b/d</div>
    <div class="col-sm-1"></div>
   	<div class="col-sm-2">20,000.00 /-</div>
    <div class="col-sm-2"></div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-2">15/05/2076</div>
    <div class="col-sm-5">To Sales A/C</div>
    <div class="col-sm-1"></div>
    <div class="col-sm-2">20,000.00 /-</div>
    <div class="col-sm-2"></div>
   </div>
   
  <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-2">25/05/2076</div>
    <div class="col-sm-5">By Purchase A/C</div>
    <div class="col-sm-1"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-2 ">35,000.00 /-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-2">31/05/2076</div>
    <div class="col-sm-5">By balance c/d</div>
    <div class="col-sm-1"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-2">5,000.00 /-</div>
   </div>
  <div style="border: 1px solid black; width: 100%; margin-top: 2%;"></div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
    <div class="col-sm-2"></div>
    <div class="col-sm-5">To opening balance b/d</div>
    <div class="col-sm-1"></div>
    <div class="col-sm-4 text-center">(Dr.)5,000.00 /-</div>
   </div>
</span>
<!-- *****Purchase Entry Form OR Page Ends****** -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@include('board.footer-board')
<script type="text/javascript" src="{{asset('js/boardAccountingLedger.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>




