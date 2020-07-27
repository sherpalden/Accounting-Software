// show Leader register citizenship selected image for upload
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#ShowLeaderCitizenshipImage').removeAttr('hidden');
            $('#ShowLeaderCitizenshipImage')
                .attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#ShowLeaderCitizenshipImage').attr('hidden', 'hidden');
    }
}

// show Leader register profile selected image for upload
function readURLL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#ShowLeaderImage').removeAttr('hidden');
            $('#ShowLeaderImage')
                .attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#ShowLeaderImage').attr('hidden', 'hidden');
    }
}


// show Leader beneficiary citizenshiop selected image for upload
function readURLLL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#ShowLeaderBeneficiaryImage').removeAttr('hidden');
            $('#ShowLeaderBeneficiaryImage')
                .attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#ShowLeaderBeneficiaryImage').attr('hidden', 'hidden');
    }
}


// show Leader register citizenship selected image for upload
function readURRL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#ShowLeaderCitizenshipImage').removeAttr('hidden');
            $('#ShowLeaderCitizenshipImage')
                .attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        var id = $('#ShowLeaderCitizenshipImage').attr('data-id');
        $('#ShowLeaderCitizenshipImage').attr('src', '/images/Leaders/Citizenship/'+id);
    }
}

// show Leader register profile selected image for upload
function readURRRLL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#ShowLeaderImage').removeAttr('hidden');
            $('#ShowLeaderImage')
                .attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        var id = $('#ShowLeaderImage').attr('data-id');
        $('#ShowLeaderImage').attr('src', '/images/Leaders/Profile/'+id);
    }
}


// show Leader beneficiary citizenshiop selected image for upload
function readURRRRLLL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#ShowLeaderBeneficiaryImage').removeAttr('hidden');
            $('#ShowLeaderBeneficiaryImage')
                .attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        var id = $('#ShowLeaderBeneficiaryImage').attr('data-id');
        if (id == '') {
        $('#ShowLeaderBeneficiaryImage').attr('hidden','hidden');
        }
        else{
        $('#ShowLeaderBeneficiaryImage').attr('src', '/images/Leaders/BeneficiaryCitizenship/'+id);
        }
    }
}


$(document).ready(function() {
    // open register leader form ajax page
    $(document).on('click', '#openAddLeaderAjaxButton', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/employee/page/register/leader',
            method: 'GET',
            beforeSend: function() {
                $('#openAddLeaderAjaxButton').html('<span class="spinner-border spinner-border-sm"></span>loading..');
            },
            success: function(response) {
                $('#SearchHeader').attr('hidden', 'hidden');
                $('#LeaderPage').html(response);
            },
            error: function(jqXHR, status) {
                // console.log(jqXHR.responseJSON.message);
                console.log('Register page failed to Load');
                alert('Register page failed to load');
                $('#openAddLeaderAjaxButton').html('Register leader <i class="fa fa-user-plus"></i>');

            }
        });
    });
});


// Leader verify
$(document).on('change', '.verifybox', function(e) {
    e.preventDefault();
    var status = $(this).is(':checked') ? 1 : 0;
    var id = $(this).attr('data-id');
    var verified_by = $(this).attr('data-idd');
    var verify = 0;
    if (status == 1) {
        verify = verified_by;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/employee/leader/verify',
        method: 'POST',
        data: { id: id, verified_by: verify },
        beforeSend: function() {},
        success: function(response) {
            // console.log(response);
        },
        error: function(jqXHR, status) {
            console.log('Failed to verify');
            alert('Failed to verify');
            location.reload(true);
        }
    });
});

$(document).ready(function() {
    $(document).on('click', '.LeaderImageHover', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/employee/leaderTable/modal',
            method: 'GET',
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
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                // $('#myModal').modal();
                $('#ajaxHolder').html(response);
                $('#editSubmitButton').attr('hidden', 'hidden');
                $("#LeaderUpdateForm :input").prop("disabled", true);
            },
            error: function(jqXHR, status) {
                console.log('Failed to load');
                alert('Failed to load');
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            }
        });
    });
});

// leader table eidt button 
$(document).ready(function() {
    $(document).on('click', '.LeaderEditTable', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/employee/leaderTable/modal',
            method: 'GET',
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
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                // $('#myModal').modal();
                $('#ajaxHolder').html(response);
                $('#editSubmitButton').removeAttr('hidden');
                $("#LeaderUpdateForm :input").prop("disabled", false);
            },
            error: function(jqXHR, status) {
                console.log('Failed to load');
                alert('Failed to load');
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            }
        });
    });
});



// Add new Dealer ajax view return 
$(document).ready(function() {
    // open register leader form ajax page
    $(document).on('click', '#openAddDealerAjaxButton', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/employee/page/register/dealer',
            method: 'GET',
            beforeSend: function() {
                $('#openAddDealerAjaxButton').html('<span class="spinner-border spinner-border-sm"></span>loading..');
            },
            success: function(response) {
                $('#SearchHeader').attr('hidden', 'hidden');
                $('#DealerPage').html(response);
            },
            error: function(jqXHR, status) {
                // console.log(jqXHR.responseJSON.message);
                console.log('Register page failed to Load');
                alert('Register page failed to load');
                $('#openAddDealerAjaxButton').html('Register dealer <i class="material-icons">store_mall_directory</i>');

            }
        });
    });
});




// Leader verify
$(document).on('change', '.dealerverifybox', function(e) {
    e.preventDefault();
    var status = $(this).is(':checked') ? 1 : 0;
    var id = $(this).attr('data-id');
    var verified_by = $(this).attr('data-idd');
    var verify = 0;
    if (status == 1) {
        verify = verified_by;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/employee/dealer/verify',
        method: 'POST',
        data: { id: id, verified_by: verify },
        beforeSend: function() {},
        success: function(response) {
            // console.log(response);
        },
        error: function(jqXHR, status) {
            console.log('Failed to verify');
            alert('Failed to verify');
            location.reload(true);
        }
    });
});


$(document).ready(function() {
    $(document).on('click', '.DealerHover', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/employee/dealerTable/modal',
            method: 'GET',
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
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                // $('#myModal').modal();
                $('#ajaxHolder').html(response);
                $('#editDealerSubmitButton').attr('hidden', 'hidden');
                $("#DealerUpdateForm :input").prop("disabled", true);
            },
            error: function(jqXHR, status) {
                console.log('Failed to load');
                alert('Failed to load');
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            }
        });
    });
});


// dealer table eidt button 
$(document).ready(function() {
    $(document).on('click', '.DealerEditTable', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/employee/dealerTable/modal',
            method: 'GET',
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
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                // $('#myModal').modal();
                $('#ajaxHolder').html(response);
                $('#editDealerSubmitButton').removeAttr('hidden');
                $("#DealerUpdateForm :input").prop("disabled", false);
            },
            error: function(jqXHR, status) {
                console.log('Failed to load');
                alert('Failed to load');
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            }
        });
    });
});

//Purchase Entry Section



$(document).on('click','.purchaseNav', function (e){
   e.preventDefault();
     $('.purchaseCat').slideToggle(500, 'linear');
});


//Purchase Entry Section


