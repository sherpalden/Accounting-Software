<div id="FixedPurchaseDiv" hidden="hidden">
            <div class="row" style="margin-bottom: 0.3%;">
                <div class="col-sm-3" style="margin-top: 1%;">
                    <label style="float: right;">Capital Purchase:</label>
                </div>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="TaxPurchaseCapitalPurchase" name="TaxPurchaseCapitalPurchase" title="Capital Purchase" style="width: auto; float: left;">
                </div>
            </div>
            <div class="row" style="margin-bottom: 0.3%;">
                <div class="col-sm-3" style="margin-top: 1%;">
                    <label style="float: right;">Capital VAT:</label>
                </div>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="TaxPurchaseCapitalVat" name="TaxPurchaseCapitalVat" title="Capital VAT" style="width: auto; float: left;">
                </div>
            </div>
            <div class="row" style="margin-bottom: 0.3%;">
                <div class="col-sm-3" style="margin-top: 1%;">
                    <label style="float: right;">Fixed Asset Type:</label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" id="FixedAssetsTypeChange" name="#" style="width: auto; float: left;">
                        <option value="" hidden="hidden">Choose Fixed Asset Type</option>
                        <option value="11">Non-current Receivables</option>
                        <option value="22">Investments (not short term)</option>
                        <option value="33">Property and Equipment</option>
                    </select>
                </div>
            </div>
            <div class="row" id="PropertyandEquipmentType" hidden="hidden" style="margin-bottom: 0.3%;">
                <div class="col-sm-3" style="margin-top: 1%;">
                    <label style="float: right;">Property and Equipment Type:</label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" id="#" name="#" style="width: auto; float: left;">
                        <option value="" hidden="hidden">Select Property and Equipment Type</option>
                        <option value="111">Spirulina</option>
                        <option value="222">Ganderma</option>
                        <option value="333">Noni</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin-bottom: 0.3%;">
                <div class="col-sm-3" style="margin-top: 1%;">
                    <label style="float: right;">Payment Type:</label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" id="PaymentType" name="PaymentType" style="width: auto; float: left;">
                        <option value="" hidden="hidden">Choose</option>
                        <option value="Cash">Cash</option>
                        <option value="Bank">Bank</option>
                        <option value="Credit">Credit</option>
                    </select>
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