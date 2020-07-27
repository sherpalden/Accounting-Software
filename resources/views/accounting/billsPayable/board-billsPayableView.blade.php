@include('board.header-board')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/NepaliDate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/boardCustom.css')}}">

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
      
    

  <br><br>
   <!-- dynamic data row -->
   @for($i = 0; $i < count($arr); $i++)
   <div class="col-sm-12 font-weight-bold">Bills payable to: {{$arr[$i][0]->vendor_name}}</div>
   <div style="border: 1px solid black; width: 100%; margin-top: 0.5%; margin-bottom: 0.5%"></div>
   <div class="row" style="border: 0px solid black;">
    <div class="col-sm-1 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">S.N.</label>
      </div>
    </div>
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Date</label>
      </div>
    </div>
    <div class="col-sm-3 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Particulars</label>
      </div>
    </div>
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Invoice No.</label>
      </div>
    </div>
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Amount</label>
      </div>
    </div>
    <div class="col-sm-2 text-center">
      <div class="form-group">
         <label class="font-weight-bold">Balance Amount</label>
      </div>
    </div>
   </div>
   <div style="border: 1px solid black; width: 100%; margin-top: 0.5%;"></div>
      @for($j = 0; $j < count($arr[$i]); $j++)
         <div class="row hov">
         	<div class="col-sm-1 text-center">{{ $j+1 }}.</div>
         	<div class="col-sm-2 text-center">{{ $arr[$i][$j]->date }}</div>
         	<div class="col-sm-3 text-center">{{ $arr[$i][$j]->particulars}}</div>
         	<div class="col-sm-2 text-center">{{ $arr[$i][$j]->invoice_number}}</div>
         	<div class="col-sm-2 text-center">{{ $arr[$i][$j]->amount}} /-</div>
          <div class="col-sm-2 text-center">{{ $arr[$i][$j]->balance}} /-</div>
         </div>
      @endfor
   <div style="border: 1px solid black; width: 100%; margin-top: 0.5%;"></div>
   <br><br>
  @endfor
<!-- *****Purchase Entry Form OR Page Ends****** -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@include('board.footer-board')
<script type="text/javascript" src="{{asset('js/boardAccountingBillsReceivable.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>




