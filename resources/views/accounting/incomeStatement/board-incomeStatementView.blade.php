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
            <h4 class="card-title">Income Statement</h4>
          </div>
          <div id="modalLoading" hidden>
         <!-- data comes from js -->
          </div>
          <div class="card-body">

<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;"></div>
  <div class="row" style="border: 0px solid black; margin-left: 10px;">
    <div class="col-sm-6 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Particulars</label>
      </div>
    </div>
    <div class="col-sm-3 text-center">
      <div class="form-group">
         <label class="font-weight-bold">Amount</label>
      </div>
    </div>
    <div class="col-sm-3 text-center">
      <div class="form-group">
         <label class="font-weight-bold">Amount Balance</label>
      </div>
    </div>
  </div> 
<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;"></div>

<div class="row hov">
  <div class="col-sm-6">Total Sales</div>
  <div class="col-sm-3 text-center">{{ $total_sales }}</div>
</div>
<div class="row hov">
  <div class="col-sm-6">Cost of Sales</div>
  <div class="col-sm-3 text-center">({{ $cost_of_sales }})</div>
</div>

<div class="row hov"> Direct Expenses </div>
@for($i = 0; $i < count($direct_expenses); $i++)
<div class="row hov">
  <div class="col-sm-6">{{ $direct_expenses[$i]->account }}</div>
  <div class="col-sm-3 text-center">({{ $direct_expenses[$i]->amount }})</div>
</div>
@endfor

<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;">
</div>

<div class="row hov">
  <div class="col-sm-6">Gross Profit</div>
  <div class="col-sm-3"></div>
  <div class="col-sm-3 text-center">{{ $gross_profit }}</div>
</div>

<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;">
</div>

<div class="row hov"> Indirect Expenses </div>
@for($i = 0; $i < count($indirect_expenses); $i++)
<div class="row hov">
  <div class="col-sm-6">{{ $indirect_expenses[$i]->account }}</div>
  <div class="col-sm-3 text-center">({{ $indirect_expenses[$i]->amount }})</div>
</div>
@endfor

<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;">
</div>

<div class="row hov"> Incomes </div>
@for($i = 0; $i < count($incomes); $i++)
<div class="row hov">
  <div class="col-sm-6">{{ $incomes[$i]->account }}</div>
  <div class="col-sm-3 text-center">{{ $incomes[$i]->amount }}</div>
</div>
@endfor

<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;">
</div>

<div class="row hov">
@if($net >= 0)
  <div class="col-sm-6">Net Profit before tax</div>
@else
  <div class="col-sm-6">Net loss</div>
@endif
  <div class="col-sm-3"></div>
  <div class="col-sm-3 text-center">{{ $net }}</div>
</div>

<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;">
</div>

		  </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('board.footer-board')
<script type="text/javascript" src="{{asset('js/boardAccountingJournal.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>
