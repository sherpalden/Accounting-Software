<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add New Dealer</h4>
            <p class="card-category">Complete profile</p>
          </div>
          <div class="card-body">
            <form id="DealerNewRegister" data-id="{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
              	<div class="col-md-9">
                  <div class="form-group">
                    <label class="bmd-label-floating">Dealer name</label>
                    <input type="text" id="DealerName" name="DealerName" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
              	<div class="col-md-4">
                  <div class="form-group bmd-form-group is-filled">
                      <label class="bmd-label-floating">Date of establishment</label>
                      <input id="DealerDateOfEstablishment" name="DealerDateOfEstablishment" type="text" class="form-control no-border" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Address</label>
                    <input type="text" id="DealerAddress" name="DealerAddress" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">PAN no.</label>
                    <input type="Number" id="DealerPanNo" name="DealerPanNo" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
              	<div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone no.</label>
                    <input type="text" id="DealerPhone" name="DealerPhone" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="Email" id="DealerEmail" name="DealerEmail" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
              	<div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Owner</label>
                    <select id="DealerOwner" name="DealerOwner" class="form-control" required>
                        <option value="" hidden>Click to choose</option>
                        @forelse($owner as $owners)
                        <option value="{{ $owners->id }}">
                          {{ $owners->first_name.' '.$owners->middle_name.' '.$owners->last_name }}({{$owners->email}})
                        </option>
                        @empty
                        <option value="" disabled>No one to choose</option>
                        @endforelse
                      </select>
                  </div>
                </div>
              </div>
              <button type="submit" id="dealerRegisterSubmitButton" class="btn btn-primary pull-right">Submit</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>