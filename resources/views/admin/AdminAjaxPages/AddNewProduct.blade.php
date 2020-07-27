    
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
            <strong style="font-size: 150%;">Add New Product</strong>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <form enctype="multipart/form-data" id="AdminAddNewProductForm">
                @csrf
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="ProductName">Product Name:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="ProductName" name="ProductName" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="BatchCode" class="pull-right">Batch Code:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="BatchCode" name="BatchCode" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="ProductPrice" class="pull-right">Price:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="ProductPrice" name="ProductPrice" type="number" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="ProductImage" class="pull-right">Image:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="ProductImage" name="ProductImage" type="file" class="form-control" accept="image/x-png,image/jpeg" onchange="ShowPhoto(event)">
        </div>
        <div class="col-sm-4 borderr">
            <img id="ProductImagePreview"/>
        </div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr"></div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <a href="javascript:void(0);" class="btn btn-success pull-right" id="AddNewProductSave">Save</a>
        </div>
    </div>
    </form>