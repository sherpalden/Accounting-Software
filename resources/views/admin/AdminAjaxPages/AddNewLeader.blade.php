    
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
            <strong style="font-size: 150%;">Add New Leader</strong>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <form method="post" enctype="multipart/form-data" id="AdminAddNewLeader">
                @csrf
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="LeaderFirstName">First Name:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="LeaderFirstName" name="LeaderFirstName" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="LeaderMiddleName">Middle Name:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="LeaderMiddleName" name="LeaderMiddleName" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="LeaderLastName">Last Name:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="LeaderLastName" name="LeaderLastName" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="LeaderLastName">Gender:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <select class="form-control" id="LeaderGender" name="LeaderGender" required>
                <option value=""></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="none">Not to mention</option>
            </select>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="LeaderDOB">Date of Birth:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="Date" id="LeaderDOB" name="LeaderDOB" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="LeaderCitizenshipNumber">Citizenship Number:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="LeaderCitizenshipNumber" name="LeaderCitizenshipNumber" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderPhoto" class="pull-right">Citizenship Photo:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="CitizenshipPhoto" name="LeaderPhoto" type="file" class="form-control" accept="image/x-png,image/jpeg" onchange="ShowCitizenshipPhoto(event)" required>
        </div>
        <div class="col-sm-4 borderr">
            <img id="CitizenshipPreview"/>
        </div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label class="pull-right" for="LeaderFatherName">Father's Name:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="LeaderFatherName" name="LeaderFatherName" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderPhoneNumber" class="pull-right">Phone Number:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input type="text" id="LeaderPhoneNumber" name="LeaderPhoneNumber" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderPermanentAdderss" class="pull-right">Pemanent Address:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="LeaderPermanentAdderss" name="LeaderPermanentAdderss" type="text" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderTemporaryAdderss" class="pull-right">Temporary Address:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="LeaderTemporaryAdderss" name="LeaderTemporaryAdderss" type="text" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderQualification" class="pull-right">Qualification:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="LeaderQualification" name="LeaderQualification" type="text" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderExperience" class="pull-right">Experience:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="LeaderExperience" name="LeaderExperience" type="text" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderEmail" class="pull-right">Email:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="LeaderEmail" name="LeaderEmail" type="text" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderPhoto" class="pull-right">Photo:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="LeaderPhoto" name="LeaderPhoto" type="file" class="form-control" accept="image/x-png,image/jpeg" onchange="showLeaderPhotoPreview(event)" required>
        </div>
        <div class="col-sm-4 borderr">
            <img id="LeaderPhotoPreview"/>
        </div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderGeneration" class="pull-right">Generation of:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <select id="LeaderGeneration" name="LeaderGeneration" class="form-control" required>
                <option>Robin</option>
                <option>Prakash</option>
                <option>Tanka</option>
                <option>Samikshya</option>
            </select>
        </div>
        <div class="col-sm-4 borderr">
            <img id="ProductImagePreview"/>
        </div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderBeneficiary" class="pull-right">Beneficiary:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="LeaderBeneficiary" name="LeaderBeneficiary" type="text" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="BeneficiaryCitizenshipNo" class="pull-right">Beneficiary Citizenship No.:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="BeneficiaryCitizenshipNo" name="BeneficiaryCitizenshipNo" type="text" class="form-control">
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="BeneficiaryCitizenshipPhoto" class="pull-right">Beneficiary Citizenship:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="BeneficiaryCitizenshipPhoto" name="BeneficiaryCitizenshipPhoto" type="file" class="form-control" accept="image/x-png,image/jpeg" onchange="showBeneficiaryCitizenshipPreview(event)">
        </div>
        <div class="col-sm-4 borderr">
            <img id="BeneficiaryPhotoPreview"/>
        </div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr">
            <label for="LeaderRelationship" class="pull-right">Relationship with Beneficiary:</label>
        </div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <input id="BeneficiaryRelationship" name="BeneficiaryRelationship" type="text" class="form-control" required>
        </div>
        <div class="col-sm-4 borderr"></div>
    </div>
    <div class="row ProductAddRow">
        <div class="col-sm-4 ProductAddFirstCol borderr"></div>
        <div class="col-sm-4 ProductAddSecondCol borderr">
            <!-- <a href="javascript:void(0);" class="btn btn-success pull-right" id="AddNewProductSave">Save</a> -->
            <button id="btnAddNewLeader" type="submit" class="btn btn-success pull-right">Save</button>
        </div>
    </div>
    </form>