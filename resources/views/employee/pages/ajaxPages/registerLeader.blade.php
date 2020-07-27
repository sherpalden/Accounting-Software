<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add New Leader</h4>
            <p class="card-category">Complete profile</p>
          </div>
          <div class="card-body">
            <form id="LeaderNewRegister" data-id="{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">First name</label>
                    <input type="text" id="LeaderFirstName" name="LeaderFirstName" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Middle name</label>
                    <input type="text" id="LeaderMiddleName" name="LeaderMiddleName" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Last name</label>
                    <input type="text" class="form-control" id="LeaderLastName" name="LeaderLastName" required>
                  </div>
                </div>
              </div>
              <div class="row">
                      <div class="col-md-4">
                          <div class="form-group bmd-form-group is-filled">
                              <label class="bmd-label-floating">Gender</label>
                              <div class="form-check-inline">
                                  <label class="form-check-label">
                                      <input type="radio" class="form-check-input" value="male" name="LeaderGender" required>Male
                                  </label>
                              </div>
                              <div class="form-check-inline">
                                  <label class="form-check-label">
                                      <input type="radio" class="form-check-input" value="female" name="LeaderGender">Female
                                  </label>
                              </div>
                              <div class="form-check-inline disabled">
                                  <label class="form-check-label">
                                      <input type="radio" class="form-check-input" value="other" name="LeaderGender">Other
                                  </label>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group bmd-form-group is-filled">
                              <label class="bmd-label-floating">Date of Birth</label>
                              <input id="LeaderDob" name="LeaderDob" type="text" class="form-control no-border" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                          </div>
                      </div>
                      <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Citizenship Number</label>
                    <input type="text" id="LeaderCitizenshipNumber" name="LeaderCitizenshipNumber" class="form-control" required>
                  </div>
                </div>
                  </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="Email" id="LeaderEmail" name="LeaderEmail" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group bmd-form-group is-filled">
                      <label for="LeaderCitizenshipPhoto" class="userRegisterLabel" class="bmd-label-floating">Photo: Click to choose citizenship photo</label>
                      <input id="LeaderCitizenshipPhoto" class="form-control" type="file" name="LeaderCitizenshipPhoto" accept="image/x-png,image/jpeg,image/jpg" onchange="readURL(this);" required>
                      <img id="ShowLeaderCitizenshipImage" class="editLeaderPic" src="" hidden>
                  </div>
                 </div>
                 <div class="col-md-3">
                  <div class="form-group bmd-form-group is-filled">
                      <label for="LeaderPhoto" class="userRegisterLabel" class="bmd-label-floating">Photo: Click to choose Leader Photo</label>
                      <input id="LeaderPhoto" class="form-control" type="file" name="LeaderPhoto" accept="image/x-png,image/jpeg,image/jpg" onchange="readURLL(this);" required>
                      <img id="ShowLeaderImage" class="editLeaderPic" src="" hidden>
                  </div>
                 </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Father's full name</label>
                    <input type="text"  class="form-control" id="LeaderFatherName" name="LeaderFatherName" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Pernament Address</label>
                    <input type="text" class="form-control" id="LeaderPermanentAddress" name="LeaderPermanentAddress" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Temporary Address</label>
                    <input type="text"  class="form-control" id="LeaderTemporaryAddress" name="LeaderTemporaryAddress" required>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mobile no.</label>
                    <input type="text" id="LeaderMobile" name="LeaderMobile" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Qualification</label>
                    <input type="text" id="LeaderQualification" name="LeaderQualification" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Experience</label>
                    <input type="text" class="form-control" id="LeaderExperience" name="LeaderExperience">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label class="bmd-label-floating">Generation of:</label>
                      <select id="LeaderGenerationOf" name="LeaderGenerationOf" class="form-control">
                        <option value="" hidden>Click to choose</option>
                        <option value="">Green Nepal Multicare Provision</option>
                        @forelse($generation as $generations)
                        <option value="{{ $generations->id }}">
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
                    <label class="bmd-label-floating">Beneficiary Full Name:</label>
                    <input type="text" class="form-control" id="LeaderBeneficiaryFullName" name="LeaderBeneficiaryFullName">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Beneficiary Citizenship Number:</label>
                    <input type="text" class="form-control" id="BeneficiaryCitizenshipNumber" name="BeneficiaryCitizenshipNumber">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Relationship with Beneficiary:</label>
                    <input type="text" class="form-control" id="LeaderBeneficiaryRelationship" name="LeaderBeneficiaryRelationshi"p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group bmd-form-group is-filled">
                      <label for="LeaderBenficiaryCitizenshipPhoto" class="userRegisterLabel" class="bmd-label-floating">Photo: Click to choose Beeficiary's citizenship Photo</label>
                      <input id="LeaderBenficiaryCitizenshipPhoto" class="form-control" type="file" name="LeaderBenficiaryCitizenshipPhoto" accept="image/x-png,image/jpeg,image/jpg" onchange="readURLLL(this);">
                      <img id="ShowLeaderBeneficiaryImage" class="editLeaderPic" src="" hidden>
                  </div>
                 </div>
              </div>
              <button type="submit" id="leaderRegisterSubmitButton" class="btn btn-primary pull-right">Submit</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>