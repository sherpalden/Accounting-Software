@include('board.header-board')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/NepaliDate.css')}}">

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" id="SearchHeader">
            <h4 class="card-title">Payroll View</h4>
          </div>
          <div id="modalLoading" hidden>
         <!-- data comes from js -->
          </div>
          <div class="card-body">
<!-- contents -->
<!-- *****Purchase Entry Form OR Page Starts***** -->
  <div style="border: 1px solid black; width: 100%; margin-bottom: 0.5%;"></div>
  <div class="row" style="border: 0px solid black;">
  	<div class="col-sm-1 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">S.N.</label>
      </div>
    </div>
    <div class="col-sm-3 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Name</label>
      </div>
    </div>
    <div class="col-sm-3 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Phone</label>
      </div>
    </div>
    <div class="col-sm-3 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Department</label>
      </div>
    </div>
    <div class="col-sm-2 text-center">
      <div class="form-group">
         <label class="font-weight-bold">Amount</label>
      </div>
    </div>
   </div>
   <div style="border: 1px solid black; width: 100%; margin-top: 0.5%;"></div>
   <!-- dynamic data row -->
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
   	<div class="col-sm-1 text-center">1.</div>
   	<div class="col-sm-3 text-center">Robin Rai</div>
   	<div class="col-sm-3 text-center">9817849333</div>
   	<div class="col-sm-3 text-center">Finance</div>
   	<div class="col-sm-2 text-center">20,000/-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
   	<div class="col-sm-1 text-center">2.</div>
   	<div class="col-sm-3 text-center">Palden Sherpa</div>
   	<div class="col-sm-3 text-center">9874858618</div>
   	<div class="col-sm-3 text-center">Production</div>
   	<div class="col-sm-2 text-center">30,090/-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
   	<div class="col-sm-1 text-center">3.</div>
   	<div class="col-sm-3 text-center">Sita Nepal</div>
   	<div class="col-sm-3 text-center">9874855678</div>
   	<div class="col-sm-3 text-center">Sales</div>
   	<div class="col-sm-2 text-center">34,590/-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
   	<div class="col-sm-1 text-center">4.</div>
   	<div class="col-sm-3 text-center">Nima lama</div>
   	<div class="col-sm-3 text-center">9874857854</div>
   	<div class="col-sm-3 text-center">Marketing</div>
   	<div class="col-sm-2 text-center">50,090/-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
   	<div class="col-sm-1 text-center">5.</div>
   	<div class="col-sm-3 text-center">Bishal Paudyel</div>
   	<div class="col-sm-3 text-center">9874858958</div>
   	<div class="col-sm-3 text-center">Cashier</div>
   	<div class="col-sm-2 text-center">15,090/-</div>
   </div>
   <div class="row hov" style="margin-top: 4px; font-size: 20px;">
   	<div class="col-sm-1 text-center">6.</div>
   	<div class="col-sm-3 text-center">Jivan Gurung</div>
   	<div class="col-sm-3 text-center">9874858618</div>
   	<div class="col-sm-3 text-center">Advertisement</div>
   	<div class="col-sm-2 text-center">30,090/-</div>
   </div>
<!-- *****Purchase Entry Form OR Page Ends****** -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@include('board.footer-board')
<script type="text/javascript" src="{{asset('js/boardAccountingPayroll.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>




