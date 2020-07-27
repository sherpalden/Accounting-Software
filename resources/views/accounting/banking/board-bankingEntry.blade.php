@include('board.header-board')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/NepaliDate.css')}}">

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" id="SearchHeader">
            <h4 class="card-title">Banking Entry</h4>
          </div>
          <div id="modalLoading" hidden>
         <!-- data comes from js -->
          </div>
          <div class="card-body">
<!-- contents -->
<!-- *****Purchase Entry Form OR Page Starts***** -->
<form id="BankEntry" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row" style="margin-top: 1%";>
  	<div class="col-md-6">
      <div class="form-group">
        <label class="bmd-label-floating">Name of Bank</label>
        <select id="bankName" class="form-control">
        	<option value="" hidden>Select Bank Name:</option>
        	<option>Himalayan Bank</option>
        	<option>NCC Bank</option>
        	<option>Swiss Bank</option>
        	<option>Standard Chartered Bank</option>
        </select>
      </div>
    </div>
   	<div class="col-md-6">
      <div class="form-group">
        <label class="bmd-label-floating">Transaction Type</label>
        <select id="btType" class="form-control">
        	<option value="" hidden>Select Transaction Type:</option>
        	<option>Deposits</option>
        	<option>Withdrawl</option>
        	<option>Receipt</option>
        	<option>Payment</option>
        </select>
      </div>
    </div>
  </div>

  <div class="row" style="margin-top: 1%";>
    <div class="col-md-4">
      <div class="form-group">
        <label class="bmd-label-floating">Account Type</label>
        <select id="bankAccountName" class="form-control">
        	<option value="" hidden>Select Account Type</option>
        	<option>Account Type1</option>
        	<option>Account Type2</option>
        	<option>Account Type3</option>
        	<option>Account Type4</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="bmd-label-floating">Account name</label>
        <select id="bankAccountName" class="form-control">
        	<option value="" hidden>Select Account Name:</option>
        	<option>Account name1</option>
        	<option>Account name2</option>
        	<option>Account name3</option>
        	<option>Account name4</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
     <label><p></p></label>
      <div class="form-group">
        <label class="bmd-label-floating">Account Number</label>
        <input class="form-control" type="text" id="accountNumber0" disabled>
      </div>
    </div>
  </div>

  <div class="row" style="margin-top: 1%";>
    <div class="col-md-4">
      <div class="form-group">
        <label class="bmd-label-floating">Vendor name</label>
        <select id="bankAccountName" class="form-control">
        	<option value="" hidden>Select Vendor</option>
        	<option>Vendor Name1</option>
        	<option>Vendor Name2</option>
        	<option>Vendor Name3</option>
        	<option>Vendor Name4</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="bmd-label-floating">Customer name</label>
        <select id="bankAccountName" class="form-control">
        	<option value="" hidden>Select Customer</option>
        	<option>Customer Name1</option>
        	<option>Customer Name2</option>
        	<option>Customer Name3</option>
        	<option>Customer Name4</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
   	 <label><p></p></label>
      <div class="form-group">
        <label class="bmd-label-floating">Pan Number</label>
        <input class="form-control" type="text" id="panNumber0" disabled>
      </div>
    </div>

  <div class="row" style="margin-top: 2%; margin-left: 1px">
    <div class="col-sm-6">
      <div class="form-group">
        <label class="bmd-label-floating">Cheque Details</label>
        <textarea class="form-control" rows="4" cols="50"></textarea>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label class="bmd-label-floating">Enter Description If Necessary</label>
        <textarea class="form-control" rows="4" cols="50"></textarea>
      </div>
    </div>
  </div>

    <!-- ********Cheque Details********** -->



    <!-- ********Cheque Details********** -->



  
  <div style="border: 1px solid black; width: 100%; margin-top: 1.5%;"></div>
  </span>
  <button type="submit" id="submitID" class="btn btn-primary pull-right" data-userid="b{{ Auth::user()->id }}">SUBMIT</button>
  <div class="clearfix"></div>
</form>
<!-- *****Purchase Entry Form OR Page Ends****** -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@include('board.footer-board')
<script type="text/javascript" src="{{asset('js/boardAccountingBanking.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>



