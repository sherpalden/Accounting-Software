    
    <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-danger pull-right" style="padding-bottom: 1.3%;">
                <i style="font-size: 20px;" class="fa">&#xf00d;</i>
            </button>
        </div>
    </div>
    <div class="row" style="margin-bottom: 2%;">
        <div class="col-sm-4 ProductAddFirstCol borderr"></div>
        <div class="col-sm-4 ProductAddSecondCol borderr" style="text-align: center;">
            <strong style="font-size: 150%;">Add New Dealer</strong>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <form method="post" enctype="multipart/form-data" id="AdminAddNewLeader">
                @csrf
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="DealerName">Dealer Name:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="DealerName" name="DealerName" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="DealerPan">PAN Number:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="DealerPan" name="DealerPan" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="DealerRegNo">Registration Number:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="DealerRegNo" name="DealerRegNo" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="DealerAddress">Address:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="DealerAddress" name="DealerAddress" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="DealerPhone">Phone number:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="DealerPhone" name="DealerPhone" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="DealerOwner">Owner's Name:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="DealerOwner" name="DealerOwner" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="DealerEmail">Email:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="Email" id="DealerEmail" name="DealerEmail" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr"></div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <!-- <a href="javascript:void(0);" class="btn btn-success pull-right" id="AddNewProductSave">Save</a> -->
            <button type="submit" class="btn btn-success pull-right">Save</button>
        </div>
    </div>
    </form>