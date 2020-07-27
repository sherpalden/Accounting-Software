

<!-- *****Purchase Entry Form OR Page Starts***** -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/NepaliDate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/boardCustom.css')}}">
    <div class="row" style="margin-left: 10px;">
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
    <div class="row" style="margin-left: 10px;">
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
      
    

  <div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;"></div>
  <div class="row" style="border: 0px solid black; margin-left: 10px;">
    <div class="col-sm-2 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Date</label>
      </div>
    </div>
    <div class="col-sm-1 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Invoice No.</label>
      </div>
    </div>
    <div class="col-sm-5 text-center" style="border-right: 2px solid black;">
      <div class="form-group">
         <label class="font-weight-bold">Particulars</label>
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

<div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;"></div>
      <!-- dynamic data row -->
@for($i = 0; $i < count($journal_data); $i++)
   @php 
    $index = $journal_data[$i]->index
   @endphp
   @for($j = $i;($journal_data[$j]->index == $index); $j++)
     <div class="row hov">
      <div class="col-sm-2 text-center">{{$journal_data[$j]->date}}</div>
      <div class="col-sm-1 text-center">{{$j}}</div>
      <div class="col-sm-5">{{$journal_data[$j]->particulars}}</div>
      @if($journal_data[$j]->side == "debit")
      <div class="col-sm-2 text-center">{{$journal_data[$j]->amount}} /-</div>
      <div class="col-sm-2"></div>
      @else
      <div class="col-sm-2"></div>
      <div class="col-sm-2 text-center">{{$journal_data[$j]->amount}} /-</div>
      @endif
     </div>
      @if(!(isset($journal_data[$j+1]))) 
        @php 
          $index = "asdfadf";
          $j++;
        @endphp
        @break
      @endif
   @endfor
     <div class="row" style="margin-left: 10px;">
      <div class="col-sm-6">
        <div class="form-group">
          <label class="bmd-label-floating">Narration</label>
          <textarea class="form-control" rows="2">Being {{$journal_data[$i]->particulars}} purchased</textarea>
        </div>
      </div>
     </div>
  <div style="border: 1px solid black; width: 100%; margin-bottom: 5px; margin-top: 5px;margin-left: 10px; margin-right: 10px;"></div>
  @php 
    $i = $j-1
  @endphp
@endfor

<script type="text/javascript" src="{{asset('js/boardAccountingJournal.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>

