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
            <h4 class="card-title">Trial Balance</h4>
          </div>
          <div id="modalLoading" hidden>
         <!-- data comes from js -->
          </div>
          <div class="card-body">

<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;"></div>
  <div class="row" style="border: 0px solid black; margin-left: 10px;">
    <div class="col-sm-6 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Accounts</label>
      </div>
    </div>
    <div class="col-sm-3 text-center">
      <div class="form-group">
         <label class="font-weight-bold">Debit</label>
      </div>
    </div>
    <div class="col-sm-3 text-center">
      <div class="form-group">
         <label class="font-weight-bold">Credit</label>
      </div>
    </div>
  </div> 
<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;"></div>

@for($i = 0; $i < count($ledger_accounts); $i++)
	<div class="row hov">
     	@if($ledger_balance[$ledger_accounts[$i]][$month[1]]->side == "debit")
     	<div class="col-sm-6">{{$ledger_accounts[$i]}}</div>
     	<div class="col-sm-3 text-center">{{$ledger_balance[$ledger_accounts[$i]][$month[1]]->amount}}</div>
     	<div class="col-sm-3 text-center"></div>
     	@elseif($ledger_balance[$ledger_accounts[$i]][$month[1]]->side == "credit")
     	<div class="col-sm-6">{{$ledger_accounts[$i]}}</div>
     	<div class="col-sm-3 text-center"></div>
     	<div class="col-sm-3 text-center">{{$ledger_balance[$ledger_accounts[$i]][$month[1]]->amount}}</div>
     	@endif
    </div>
@endfor
<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;"></div>
	<div class="row hov">
     	<div class="col-sm-6 text-right">Total:</div>
     	<div class="col-sm-3 text-center">{{$debitTotal}}</div>
     	<div class="col-sm-3 text-center">{{$creditTotal}}</div>
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
