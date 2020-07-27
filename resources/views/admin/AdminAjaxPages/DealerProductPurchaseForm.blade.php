            

            <div id="PrintDiv">
                <div style="margin: auto; width: 300px;">
                    <div class="pull-left" style="width: 50%; border: 2px solid black;">sd</div>
                    <div class="pull-right" style="width: 50%; border: 2px solid black;">654654</div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-danger pull-right" style="padding-bottom: 1.3%;">
                            <i style="font-size: 20px;" class="fa">&#xf00d;</i>
                        </button>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 2%;">
                    <div class="col-sm-4 ProductAddFirstCol borderr"><strong class="pull-right" style="font-size: 150%;">Dealer:</strong></div>
                    <div class="col-sm-4 ProductAddSecondCol borderr" style="text-align: center;">
                        <strong style="font-size: 150%;">
                            <select id="DealerNameSelect" class="form-control" style="width: 80%;">
                              <option value="volvo">Jorpati</option>
                              <option value="saab">Pision</option>
                              <option value="saab">{{ $ProductCount }}</option>
                            </select>
                        </strong>
                    </div>
                    <div class="col-sm-4 borderr"></div>
                </div>
                <div class="row ProductAddRow SaleRow">
                    <div class="col-sm-3 SalesDiv SalesBorder">
                        <label>Product Name</label>
                    </div>
                    <div class="col-sm-3 SalesDiv SalesBorder">
                        <label>Selling Price</label>
                    </div>
                    <div class="col-sm-3 SalesDiv SalesBorder">
                        <label>Quantity</label>
                    </div>
                    <div class="col-sm-3 SalesDiv">
                        <label>Sales Amount</label>
                    </div>
                </div>
                <form id="SalesForm">
                    @forelse($ProductDetails as $ProductDetail)                    
                    <div class="row ProductAddRow SaleAttrRow">
                        <div class="col-sm-3 SalesAttrDiv SalesBorder SalesAttrPaddingTop">
                            <label>{{ $ProductDetail->ProductName }}</label>
                        </div>
                        <div class="col-sm-3 SalesAttrDiv SalesBorder SalesAttrPaddingTop">
                            <label>{{ $ProductDetail->Price }}</label>
                        </div>
                        <div class="col-sm-3 SalesAttrDiv SalesBorder">
                            <input type="text" class="form-control ProductPurchaseInput" data-id="{{ $ProductDetail->id }}" style="margin: auto; text-align: center; font-weight: bold;">
                        </div>
                        <div class="col-sm-3 SalesAttrDiv SalesAttrPaddingTop">
                            <label>Rs.<span id="a{{ $ProductDetail->id }}" class="ProductTotal" data-id="{{ $ProductDetail->Price }}">0</span>-/</label>
                        </div>
                    </div>
                    @empty
                    <div class="row ProductAddRow SaleAttrRow">
                        <div class="col-sm-12" style="text-align: center;">
                            <strong>Product Not Found In The Database......</strong>
                        </div>
                    </div>
                    @endforelse
                    <div class="row ProductAddRow SaleAttrRow">
                        <div class="col-sm-3 SalesAttrDiv  SalesAttrPaddingTop">
                            <a href="javascript:void(0);" id="PrintPurchase" class="btn btn-info">Print</a>
                            <!-- <button id="PrintPurchase" class="btn btn-primary">Print</button> -->
                        </div>
                        <div class="col-sm-3 SalesAttrDiv  SalesAttrPaddingTop"></div>
                        <div class="col-sm-3 SalesAttrDiv SalesBorder SalesAttrPaddingTop" style="text-align: right;">
                            <label style="color: red; text-decoration: underline;">Total</label>
                        </div>
                        <div class="col-sm-3 SalesAttrDiv SalesAttrPaddingTop">
                            <label style="text-decoration: underline;">Rs.<span id="ProductPurchaseGrandTotal" style="color: red;">0</span>-/</label>
                        </div>
                    </div>
                </form>
            </div>



