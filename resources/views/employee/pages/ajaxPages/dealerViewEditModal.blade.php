<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Modal Heading</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
  @forelse($dealer as $dealers)
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add New Dealer</h4>
            <p class="card-category">Complete profile</p>
          </div>
          <div class="card-body">
            <form id="DealerUpdateForm" data-id="{{ $dealers->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-9">
                  <div class="form-group">
                    <label class="bmd-label-floating">Dealer name</label>
                    <input type="text" id="DealerName" name="DealerName" value="{{ $dealers->name }}" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group bmd-form-group is-filled">
                      <label class="bmd-label-floating">Date of establishment</label>
                      <input id="DealerDateOfEstablishment" value="{{ $dealers->date_of_establishment }}" name="DealerDateOfEstablishment" type="text" class="form-control no-border" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Address</label>
                    <input type="text" id="DealerAddress" value="{{ $dealers->address }}" name="DealerAddress" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">PAN no.</label>
                    <input type="Number" id="DealerPanNo" value="{{ $dealers->pan_no }}" name="DealerPanNo" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone no.</label>
                    <input type="text" id="DealerPhone" value="{{ $dealers->phone_no }}" name="DealerPhone" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="Email" id="DealerEmail" value="{{ $dealers->email }}" name="DealerEmail" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Owner</label>
                    <select id="DealerOwner" name="DealerOwner" class="form-control" required>
                        <option value="" hidden>Click to choose</option>
                        @forelse($leader as $leaders)
                        <option value="{{ $leaders->id }}"
                          @if($dealers->owner == $leaders->id)
                                      selected
                                      @endif
                          >
                          {{ $leaders->first_name.' '.$leaders->middle_name.' '.$leaders->last_name }}({{$leaders->email}})
                        </option>
                        @empty
                        <!-- <option value="" disabled>No one to choose</option> -->
                        @endforelse
                      </select>
                  </div>
                </div>
              </div>
              <button type="submit" id="editDealerSubmitButton" class="btn btn-primary pull-right">Update</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @empty
  <h3 class="text-center">No Data Found</h3>
  @endforelse
</div>

<!-- Modal footer -->
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>