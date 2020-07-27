@include('board.header-board')
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
          <label class="bmd-label-floating">Transaction Type</label>
          <select id="TransactionSelect" class="form-control">
            <option value="" hidden>Select Transaction</option>
            <option>Purchase Transactions</option>
            <option>Sales Transactions</option>
            <option>Expenses Transactions</option>
            <option>Income Transactions</option>
            <option>Purchase Return Transactions</option>
            <option>Sales Return Transactions</option>
            <option>Banking Transactions</option>
          </select>
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


@include('board.footer-board')
<script type="text/javascript" src="{{asset('js/boardAccountingJournal.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>




