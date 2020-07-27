leaderTable();

// get leader table view
function leaderTable() {
    $.ajax({
        url: '/board/page/leader/table',
        method: 'GET',
        beforeSend: function() {
            $('#modalLoading').html('<div class="spinner-grow text-muted"></div>\
                    <div class="spinner-grow text-primary"></div>\
                    <div class="spinner-grow text-success"></div>\
                    <div class="spinner-grow text-info"></div>\
                    <div class="spinner-grow text-warning"></div>\
                    <div class="spinner-grow text-danger"></div>\
                    <div class="spinner-grow text-secondary"></div>\
                    <div class="spinner-grow text-dark"></div>\
                    <div class="spinner-grow text-light"></div>');
            $('#modalLoading').removeAttr('hidden');
        },
        success: function(response) {
            $('#LeaderPage').html(response);
            $('#modalLoading').attr('hidden', 'hidden');
            $('#modalLoading').empty();
        },
        error: function(jqXHR, status) {
            // console.log(jqXHR.responseJSON.message);
            console.log('Table failed to load');
        }
    });
}


$(document).ready(function() {
    // Leader register form
    $(document).on('submit', '#LeaderNewRegister', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        var gender = $("input[name='LeaderGender']:checked").val();
        var dataa = {
            RegisteredBy: id,
            FirstName: $('#LeaderFirstName').val(),
            MiddleName: $('#LeaderMiddleName').val(),
            LastName: $('#LeaderLastName').val(),
            Gender: gender,
            DOB: $('#LeaderDob').val(),
            CitizenshipNumber: $('#LeaderCitizenshipNumber').val(),
            Email: $('#LeaderEmail').val(),
            Mobile: $('#LeaderMobile').val(),
            FatherName: $('#LeaderFatherName').val(),
            PermanentAddress: $('#LeaderPermanentAddress').val(),
            TemporaryAddress: $('#LeaderTemporaryAddress').val(),
            Qualification: $('#LeaderQualification').val(),
            Experience: $('#LeaderExperience').val(),
            GenerationOf: $('#LeaderGenerationOf').val(),
            BeneficiaryName: $('#LeaderBeneficiaryFullName').val(),
            BeneficiaryCitizenship: $('#BeneficiaryCitizenshipNumber').val(),
            BeneficiaryRelationship: $('#LeaderBeneficiaryRelationship').val(),
            CitizenshipPhoto: $('#LeaderCitizenshipPhoto')[0].files[0],
            Photo: $('#LeaderPhoto')[0].files[0],
            BeneficiaryCitizenshipPhoto: $('#LeaderBenficiaryCitizenshipPhoto')[0].files[0]
        }
        var formdata = new FormData();
        for (key in dataa) {
            formdata.append(key, dataa[key]);
        }
        // for (var value of formdata.values()) {
        //     console.log(value);
        // }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/board/leader/register',
            method: 'POST',
            contentType: false,
            processData: false,
            data: formdata,
            dataType: 'json',
            beforeSend: function() {
                $('#leaderRegisterSubmitButton').html('<span class="spinner-border spinner-border-sm"></span>loading..');
            },
            success: function(result) {
                $('#leaderRegisterSubmitButton').html('Submit');
                console.log(result.status);
                console.log(result.message);
                alert(result.message);
                $('#openAddLeaderAjaxButton').html('Register leader <i class="fa fa-user-plus"></i>');
                $('#SearchHeader').removeAttr('hidden');
                leaderTable();
            },
            error: function(jqXHR) {
                // console.log(jqXHR.responseJSON.message);
                console.log('Registration failed');
                alert('Registration failed');
                $('#leaderRegisterSubmitButton').html(' SUBMIT');
            }
        });
    });
});

// update Leader form data
$(document).on('submit', '#LeaderUpdateForm', function(event) {
    event.preventDefault();
    var id = $(this).attr('data-id');
    var gender = $("input[name='LeaderGender']:checked").val();
    var dataa = {
        id: id,
        FirstName: $('#LeaderFirstName').val(),
        MiddleName: $('#LeaderMiddleName').val(),
        LastName: $('#LeaderLastName').val(),
        Gender: gender,
        DOB: $('#LeaderDob').val(),
        CitizenshipNumber: $('#LeaderCitizenshipNumber').val(),
        Email: $('#LeaderEmail').val(),
        Mobile: $('#LeaderMobile').val(),
        FatherName: $('#LeaderFatherName').val(),
        PermanentAddress: $('#LeaderPermanentAddress').val(),
        TemporaryAddress: $('#LeaderTemporaryAddress').val(),
        Qualification: $('#LeaderQualification').val(),
        Experience: $('#LeaderExperience').val(),
        GenerationOf: $('#LeaderGenerationOf').val(),
        BeneficiaryName: $('#LeaderBeneficiaryFullName').val(),
        BeneficiaryCitizenship: $('#BeneficiaryCitizenshipNumber').val(),
        BeneficiaryRelationship: $('#LeaderBeneficiaryRelationship').val(),
        LeaderPanNo: $('#LeaderPanNo').val(),
        CitizenshipPhoto: $('#LeaderCitizenshipPhoto')[0].files[0],
        Photo: $('#LeaderPhoto')[0].files[0],
        BeneficiaryCitizenshipPhoto: $('#LeaderBenficiaryCitizenshipPhoto')[0].files[0]
    }
    var formdata = new FormData();
    for (key in dataa) {
        formdata.append(key, dataa[key]);
    }
    // for (var value of formdata.values()) {
    //     console.log(value);
    // }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/board/leader/update',
        method: 'POST',
        contentType: false,
        processData: false,
        data: formdata,
        dataType: 'json',
        beforeSend: function() {
            $('#editSubmitButton').html('<span class="spinner-border spinner-border-sm"></span>loading..');
        },
        success: function(result) {
            $('#editSubmitButton').html('Update');
            console.log(result.status);
            console.log(result.message);
            alert(result.message);
            $('#myModal').removeClass('show');
            $('.modal-backdrop').remove();
            leaderTable();
        },
        error: function(jqXHR) {
            // console.log(jqXHR.responseJSON.message);
            console.log('Update failed');
            alert('Update failed');
            $('#editSubmitButton').html('Update');
        }
    });
});


// delete Leader
$(document).ready(function() {
    $(document).on('click', '.LeaderDelete', function(e) {
        e.preventDefault();
        var r = confirm("Are you sure to delete?");
        if (r == true) {
            var id = $(this).attr('data-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/board/leader/delete',
            method: 'POST',
            data: { id: id },
            beforeSend: function() {
                $('#modalLoading').html('<div class="spinner-grow text-muted"></div>\
                    <div class="spinner-grow text-primary"></div>\
                    <div class="spinner-grow text-success"></div>\
                    <div class="spinner-grow text-info"></div>\
                    <div class="spinner-grow text-warning"></div>\
                    <div class="spinner-grow text-danger"></div>\
                    <div class="spinner-grow text-secondary"></div>\
                    <div class="spinner-grow text-dark"></div>\
                    <div class="spinner-grow text-light"></div>');
                $('#modalLoading').removeAttr('hidden');
            },
            success: function(response) {
                console.log(response.message);
                alert(response.message);
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
                leaderTable();
            },
            error: function(jqXHR, status) {
                console.log('Failed to delete');
                alert('Failed to delete');
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            }
        });
        }
    });
});


$(document).on('keyup', '#LeaderSearch', function(e){
    e.preventDefault();
    var text = $(this).val().trim();
    $.ajax({
        url: '/board/page/leader/table/search',
        method: 'GET',
        data: { text: text },   
        beforeSend: function() {
            // $('#modalLoading').html('<div class="spinner-grow text-muted"></div>\
            //         <div class="spinner-grow text-primary"></div>\
            //         <div class="spinner-grow text-success"></div>\
            //         <div class="spinner-grow text-info"></div>\
            //         <div class="spinner-grow text-warning"></div>\
            //         <div class="spinner-grow text-danger"></div>\
            //         <div class="spinner-grow text-secondary"></div>\
            //         <div class="spinner-grow text-dark"></div>\
            //         <div class="spinner-grow text-light"></div>');
            // $('#modalLoading').removeAttr('hidden');
        },
        success: function(response) {
            // console.log(response);
            $('#LeaderPage').html(response);
            // $('#modalLoading').attr('hidden', 'hidden');
            // $('#modalLoading').empty();
        },
        error: function(jqXHR, status) {
            console.log('Table failed to load');
            alert('Table failed to load');
            // $('#modalLoading').attr('hidden', 'hidden');
            // $('#modalLoading').empty();
        }
    });
});