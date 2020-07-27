@include('board.header-board')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/NepaliDate.css')}}">

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" id="SearchHeader">
            <h4 class="card-title">Income Entry</h4>
          </div>
          <div id="modalLoading" hidden>
         <!-- data comes from js -->
          </div>
          <div class="card-body">
<!-- contents -->
<!-- *****Purchase Entry Form OR Page Starts***** -->
<form id="PurchaseVat" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label class="bmd-label-floating">Customer name</label>
        <select id="SupplierSelect" class="form-control">
          <option value="" hidden>Select Customer</option>
          <option>Customer1</option>
          <option>Customer2</option>
          <option>Customer3</option>
        </select>
      </div>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
  </div>

    <div class="row">
      <div class="col-md-4">
        <label class="bmd-label-floating">Date</label>
        <input type="text" id="nepaliDate2" class="nepali-calendar form-control" placeholder="yyy-mm-dd" />
      </div>
      <div class="col-md-4">
        <label class="bmd-label-floating">Invoice Number</label>
        <input type="text" id="InvoiceNo" class="form-control" placeholder="Enter Invoice Number" name="">
      </div>
      <div class="col-md-4">
        <label class="bmd-label-floating">Pan Number</label>
        <input id="PanNoInput" type="text" class="form-control" disabled required>
      </div>
    </div>
    <div style="border: 1px solid black; width: 100%; margin-top: 1.5%;"></div>
    <!-- //vat bill entry form starts here...... -->
      <div id="elements">
        <div class="row staticRow dynamicRow0" style="margin-top: 1%;">
          <div class="col-sm-1 text-right" style="padding-top: 1.5%;">
            <label class="bmd-label-floating" id="label0">1.</label>
          </div>
          <div class="col-sm-5">
           <div class="form-group">
            <label class="bmd-label-floating">Description</label>
            <input type="text" id="Description0" name="description0" class="form-control resp0">
           </div>
          </div>
          <div class="col-sm-3">
           <div class="form-group">
              <label class="bmd-label-floating">Account Type</label>
              <input type="text" id="Account0" name="account0" class="form-control resp0">
           </div>
          </div>
          <div class="col-sm-3">
           <div class="form-group">
             <label class="bmd-label-floating">Amount</label>
             <input type="text" id="Amount0" name="amount0" class="form-control resp0">
           </div>
          </div>
        </div>
      </div> 
  <div style="border: 1px solid black; width: 100%; margin-top: 1.5%;"></div>
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
<script type="text/javascript" src="{{asset('js/boardAccountingIncome.js')}}"></script>
<script type="text/javascript" src="{{asset('js/NepaliDate.js')}}"></script>



    <!-- //vat bill entry form ends here... -->
    <!-- <span id="assetDiv" hidden="hidden"> -->
      <!-- <div style="border: 1px solid black; width: 100%; margin-top: 0%;"></div> -->
      <!-- *****Purchase Type Select Category And Payment Mode Row starts***** -->
      <!-- <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label class="bmd-label-floating">Purchase type</label>
              <select id="purchaseTypeSelect" class="form-control">
                <option value="" hidden>Select Purchase type</option>
                <option value="Ast">Assets</option>
                <option value="Gds">Goods</option>
                <option value="Srv">Services</option>
                <option value="Misc">Miscellaneous</option>
              </select>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label id="categoryLabel" class="bmd-label-floating">Select Category</label>
              <select id="categoryType" class="form-control">
                <option value="Select category" id="selectCategory" hidden="hidden">Select category</option>
                <option value="Add new category" style="font-weight: bold;" id="addNewCategoryOption"></option>
              </select>
             </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="bmd-label-floating">Select Payment Mode</label>
              <select id="paymentTypeSelect" class="form-control">
                <option value="" hidden>Select Payment Method</option>
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
                <option value="Credit">Credit</option>
              </select>
            </div>
          </div>
      </div> -->
      <!-- *****Purchase Type Select Category And Payment Mode Row ends***** -->
<!-- *****Modal To Add Types Of Assets And Categories starts***** -->
<!-- <div class="modal fade" id="addNewCategoryModel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> -->
    
      <!-- Modal Header -->
     <!--  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="addNewCategoryForm"> -->
          <!-- Modal body -->
         <!--  <div class="modal-body">
            <div class="form-group">
                <label class="bmd-label-floating">Add new<span id="Ast_Gds_Srv_Msc"></span> category</label>
                <input type="text" id="addNewCategory" data-userid="b{{ Auth::user()->id }}" class="form-control" required>
            </div>
          </div> -->
          <!-- Modal footer -->
       <!--    <div class="modal-footer">
            <button type="submit" class="btn btn-success">Add</button>
          </div>
      </form>

    </div>
  </div>
</div> -->
<!-- *****Modal To Add Types Of Assets And Categories ends***** -->




