<form id="PurchaseAddVendor" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="bmd-label-floating">Vendor Name</label>
            <input type="text" id="VendorName" name="VendorName" class="form-control" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="bmd-label-floating">PAN Number</label>
            <input type="text" id="VendorPanNo" name="VendorPanNo" class="form-control" pattern="[0-9]+"    maxlength="9" minlength="9" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="bmd-label-floating">Phone Number</label>
            <input type="tel" id="VendorPhone" name="VendorPhone" class="form-control" maxlength="15" minlength="10" required>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label class="bmd-label-floating">Email</label>
            <input type="Email" id="VendorEmail" name="VendorEmail" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="bmd-label-floating">Address</label>
            <input type="text" id="VendorAddress" name="VendorAddress" class="form-control">
          </div>
        </div>
      </div>
      <button type="submit" id="submitID" class="btn btn-primary pull-right">submit</button>
      <div class="clearfix"></div>
</form>