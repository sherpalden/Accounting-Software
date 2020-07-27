    

<div>
    <form method="post" id="TaxPurchaseData">
        <div class="row" style="margin-top: 1.5%; margin-bottom: 1.5%;">
            <select class="form-control" id="SelectSupplier" name="SelectSupplier" style="width: auto; font-weight: bold; margin: auto;">
                <option value="" hidden="hidden">Select Suppplier Name</option>
                <option value="AddNewSupplier">Add New Suppplier</option>
                @forelse($supplier as $suppliers)
                <option value="{{ $suppliers->id }}" data-id="{{ $suppliers->PanNo }}">{{ $suppliers->SupplierName }}</option>
                @empty
                <option value="">Reload Page or the database is empty</option>
                @endforelse
            </select>
        </div> 
        <div id="DateInvoicePanDiv" hidden="hidden">
            <div class="row" style="margin-bottom: 3%;">
                <div class="col-sm-4">
                    <!-- <input type="date" class="form-control" style="margin: auto; width: auto;"> -->
                    <input placeholder="Enter Date" class="textbox-n form-control" type="text" onfocus="(this.type='date')" title="Date" onblur="(this.type='text')" id="TaxPurchaseDate" name="TaxPurchaseDate" style="margin: auto; width: auto;">
                </div>
                <div class="col-sm-4">
                        <input type="number" class="form-control" id="TaxPurchaseInvioce" name="TaxPurchaseInvioce" placeholder="Enter Invoice Number" title="Invoice Number" style="width: auto; margin: auto;">
                </div>
                <div class="col-sm-4">
                    <p style="text-align: center; font-size: 100%;">Pan No.: <span id="PanNoId" style="font-size: 115%; font-weight: bold;"></span></p>
                </div>
            </div>
            <div class="row" style="margin-bottom: 0.3%;">
                <div class="col-sm-3" style="margin-top: 1%;">
                    <label style="float: right;">Asset Type:</label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" id="PurchaseType" name="PurchaseType" style="width: auto; float: left;">
                        <option value="" hidden="hidden">Choose asset type</option>
                        <option value="1">Current asset</option>
                        <option value="2">Fixed asset</option>
                        <option value="3">Tangible asset</option>
                        <option value="4">Intangible asset</option>
                        <option value="5">Financial asset</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Fixed purchase div -->
        @include('admin.AdminAjaxPages.PurchaseTax.fixed')
        <!-- Current asset -->
        @include('admin.AdminAjaxPages.PurchaseTax.current')
        <!-- intangible asset -->
        @include('admin.AdminAjaxPages.PurchaseTax.intangible')
        <div hidden="hidden">     
        
        <div class="row" style="margin-bottom: 0.3%;">
            <div class="col-sm-3" style="margin-top: 1%;">
                <label style="float: right;">Exempted Purchase:</label>
            </div>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="TaxPurchaseExemptedPurchase" name="TaxPurchaseExemptedPurchase" title="Exempted Purchase" style="width: auto; float: left;">
            </div>
        </div>
        <div class="row" style="margin-bottom: 0.3%;">
            <div class="col-sm-3" style="margin-top: 1%;">
                <label style="float: right;">Import Amount:</label>
            </div>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="TaxPurchaseImportAmount" name="TaxPurchaseImportAmount" title="Import Amount" style="width: auto; float: left;">
            </div>
        </div>
        <div class="row" style="margin-bottom: 0.3%;">
            <div class="col-sm-3" style="margin-top: 1%;">
                <label style="float: right;">VAT on Import:</label>
            </div>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="TaxPurchaseVatOnImport" name="TaxPurchaseVatOnImport" title="VAT on Import" style="width: auto; float: left;">
            </div>
        </div>
        <div class="row" id="DynamicAddPurchaseDetails" style="margin-bottom: 0.3%; display: none;"></div>
        <div class="row" style="margin-bottom: 0.3%;">
            <div class="col-sm-3" style="margin-top: 1%;">
                <label style="float: right;">Description:</label>
            </div>
            <div class="col-sm-9">
                <label class="switch">
                  <input type="checkbox" id="TexPurchaseSwitchBtn">   
                  <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="row" style="margin-bottom: 0.3%;">
            <div class="col-sm-3" style="margin-top: 1%;"></div>
            <div class="col-sm-3">
                <a href="javascript:void(0);" id="TaxPurchaseSaveBtn" class="btn btn-success" style="float: right;">Save</a>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
        </div>
        </div>
    </form>
</div>
                