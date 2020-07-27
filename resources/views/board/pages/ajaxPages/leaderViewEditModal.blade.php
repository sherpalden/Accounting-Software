<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Modal Heading</h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
  @forelse($leader as $leaders)
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add New Leader</h4>
            <p class="card-category">Complete profile</p>
          </div>
          <div class="card-body">
            <form id="LeaderUpdateForm" data-id="{{ $leaders->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">First name</label>
                    <input type="text" id="LeaderFirstName" name="LeaderFirstName" class="form-control" value="{{ $leaders->first_name }}" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Middle name</label>
                    <input type="text" id="LeaderMiddleName" value="{{ $leaders->middle_name }}" name="LeaderMiddleName" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Last name</label>
                    <input type="text" class="form-control" id="LeaderLastName" name="LeaderLastName" value="{{ $leaders->last_name }}" required>
                  </div>
                </div>
              </div>
              <div class="row">
                      <div class="col-md-4">
                          <div class="form-group bmd-form-group is-filled">
                              <label class="bmd-label-floating">Gender</label>
                              <div class="form-check-inline">
                                  <label class="form-check-label">
                                      <input type="radio" class="form-check-input" value="male" name="LeaderGender" 
                                      @if($leaders->gender == "male")
                                      checked
                                      @endif
                                       required>Male
                                  </label>
                              </div>
                              <div class="form-check-inline">
                                  <label class="form-check-label">
                                      <input type="radio" class="form-check-input" value="female"
                                      @if($leaders->gender == "female")
                                      checked
                                      @endif
                                       name="LeaderGender">Female
                                  </label>
                              </div>
                              <div class="form-check-inline disabled">
                                  <label class="form-check-label">
                                      <input type="radio" class="form-check-input" value="other"
                                      @if($leaders->gender == "other")
                                      checked
                                      @endif
                                       name="LeaderGender">Other
                                  </label>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group bmd-form-group is-filled">
                              <label class="bmd-label-floating">Date of Birth</label>
                              <input id="LeaderDob" value="{{ $leaders->dob }}" name="LeaderDob" type="text" class="form-control no-border" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                          </div>
                      </div>
                      <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Citizenship Number</label>
                    <input type="text" id="LeaderCitizenshipNumber" name="LeaderCitizenshipNumber" value="{{ $leaders->citizenship_no }}" class="form-control" required>
                  </div>
                </div>
                  </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="Email" id="LeaderEmail" name="LeaderEmail" value="{{ $leaders->email }}" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group bmd-form-group is-filled">
                      <label for="LeaderCitizenshipPhoto" class="userRegisterLabel" class="bmd-label-floating">Photo: Click to choose citizenship photo</label>
                      <input id="LeaderCitizenshipPhoto" class="form-control" type="file" name="LeaderCitizenshipPhoto" accept="image/x-png,image/jpeg,image/jpg" onchange="readURRL(this);">
                      <img id="ShowLeaderCitizenshipImage" src="/images/Leaders/Citizenship/{{ $leaders->citizenship_photo }}" data-id="{{ $leaders->citizenship_photo }}" class="editLeaderPic">
                  </div>
                 </div>
                 <div class="col-md-3">
                  <div class="form-group bmd-form-group is-filled">
                      <label for="LeaderPhoto" class="userRegisterLabel" class="bmd-label-floating">Photo: Click to choose Leader Photo</label>
                      <input id="LeaderPhoto" class="form-control" type="file" name="LeaderPhoto" accept="image/x-png,image/jpeg,image/jpg" onchange="readURRRLL(this);">
                      <img id="ShowLeaderImage" src="/images/Leaders/Profile/{{ $leaders->profile_photo }}" data-id="{{ $leaders->profile_photo }}" class="editLeaderPic">
                  </div>
                 </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Father's full name</label>
                    <input type="text"  class="form-control" id="LeaderFatherName" name="LeaderFatherName" value="{{ $leaders->father_name }}" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Pernament Address</label>
                    <input type="text" value="{{ $leaders->permanent_address }}" class="form-control" id="LeaderPermanentAddress" name="LeaderPermanentAddress" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Temporary Address</label>
                    <input type="text"  class="form-control" id="LeaderTemporaryAddress" value="{{ $leaders->temporary_address }}" name="LeaderTemporaryAddress" required>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                <div class="form-group">
                    <label class="bmd-label-floating">Mobile no.</label>
                    <input type="text" id="LeaderMobile" name="LeaderMobile" value="{{ $leaders->mobile }}" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Qualification</label>
                    <input type="text" id="LeaderQualification" name="LeaderQualification" value="{{ $leaders->qualification }}" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Experience</label>
                    <input type="text" class="form-control" id="LeaderExperience" value="{{ $leaders->experience }}" name="LeaderExperience">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label class="bmd-label-floating">Generation of</label>
                      <select id="LeaderGenerationOf" name="LeaderGenerationOf" class="form-control">
                        <option value="" hidden>Click to choose</option>
                        <option value="">Green Nepal Multicare Provision</option>
                        @forelse($generation as $generations)
                        <option value="{{ $generations->id }}"
                          @if($leaders->generation_of == $generations->id)
                                      selected
                                      @endif
                          >
                          {{ $generations->first_name.' '.$generations->middle_name.' '.$generations->last_name }}({{$generations->email}})
                        </option>
                        @empty
                        <!-- <option value="" disabled>No one to choose</option> -->
                        @endforelse
                      </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Beneficiary Full Name</label>
                    <input type="text" class="form-control" id="LeaderBeneficiaryFullName" value="{{ $leaders->beneficiary_name }}" name="LeaderBeneficiaryFullName">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Beneficiary Citizenship Number</label>
                    <input type="text" class="form-control" id="BeneficiaryCitizenshipNumber" value="{{ $leaders->beneficiary_citizenship_no }}" name="BeneficiaryCitizenshipNumber">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Relationship with Beneficiary</label>
                    <input type="text" class="form-control" value="{{ $leaders->beneficiary_relationship }}" id="LeaderBeneficiaryRelationship" name="LeaderBeneficiaryRelationshi">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group bmd-form-group is-filled">
                      <label for="LeaderBenficiaryCitizenshipPhoto" class="userRegisterLabel" class="bmd-label-floating">Photo: Click to choose Beeficiary's citizenship Photo</label>
                      <input id="LeaderBenficiaryCitizenshipPhoto" class="form-control" type="file" name="LeaderBenficiaryCitizenshipPhoto" accept="image/x-png,image/jpeg,image/jpg" onchange="readURRRRLLL(this);">
                      <img id="ShowLeaderBeneficiaryImage"
                      @if($leaders->beneficiary_citizenship_photo == '')
                      hidden
                      @else
                      src="/images/Leaders/BeneficiaryCitizenship/{{ $leaders->beneficiary_citizenship_photo }}"
                      @endif  
                        class="editLeaderPic" data-id="{{ $leaders->beneficiary_citizenship_photo }}">
                  </div>
                 </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Pan No.</label>
                    <input type="text" class="form-control" value="{{ $leaders->pan_no }}" id="LeaderPanNo" name="LeaderPanNo">
                  </div>
                </div>
              </div>
              <button type="submit" id="editSubmitButton" class="btn btn-primary pull-right">Update</button>
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