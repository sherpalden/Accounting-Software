dealerTable();
// get leader table view
function dealerTable() {
    $.ajax({
        url: '/board/page/dealer/table',
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
            $('#DealerPage').html(response);
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
    $(document).on('submit', '#DealerNewRegister', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        var dataa = {
            RegisteredBy: id,
            DealerName: $('#DealerName').val(),
            EstdDate: $('#DealerDateOfEstablishment').val(),
            Email: $('#DealerEmail').val(),
            Phone: $('#DealerPhone').val(),
            Owner: $('#DealerOwner').val(),
            PanNo: $('#DealerPanNo').val(),
            Address: $('#DealerAddress').val(),
        }
        var formdata = new FormData();
        for (key in dataa) {
            formdata.append(key, dataa[key]);
        }
        // for (var value of formdata.values()) {
        //     console.log(value);
        // }
        // console.log(dataa);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/board/dealer/register',
            method: 'POST',
            contentType: false,
            processData: false,
            data: formdata,
            dataType: 'json',
            beforeSend: function() {
                $('#dealerRegisterSubmitButton').html('<span class="spinner-border spinner-border-sm"></span>loading..');
            },
            success: function(result) {
                $('#leaderRegisterSubmitButton').html('Submit');
                console.log(result.status);
                console.log(result.message);
                alert(result.message);
                // $('#openAddLeaderAjaxButton').html('Register leader <i class="fa fa-user-plus"></i>');
                // $('#SearchHeader').removeAttr('hidden');
                dealerTable();
            },
            error: function(jqXHR) {
                // console.log(jqXHR.responseJSON.message);
                console.log('Registration failed');
                alert('Registration failed');
                $('#dealerRegisterSubmitButton').html(' SUBMIT');
            }
        });
    });



    // Leader update form
    $(document).on('submit', '#DealerUpdateForm', function(event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        var dataa = {
            Id: id,
            DealerName: $('#DealerName').val(),
            EstdDate: $('#DealerDateOfEstablishment').val(),
            Email: $('#DealerEmail').val(),
            Phone: $('#DealerPhone').val(),
            Owner: $('#DealerOwner').val(),
            PanNo: $('#DealerPanNo').val(),
            Address: $('#DealerAddress').val(),
        }
        var formdata = new FormData();
        for (key in dataa) {
            formdata.append(key, dataa[key]);
        }
        // for (var value of formdata.values()) {
        //     console.log(value);
        // }
        // console.log(dataa);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/board/dealer/update',
            method: 'POST',
            contentType: false,
            processData: false,
            data: formdata,
            dataType: 'json',
            beforeSend: function() {
                $('#dealerRegisterSubmitButton').html('<span class="spinner-border spinner-border-sm"></span>loading..');
            },
            success: function(result) {
                $('#leaderRegisterSubmitButton').html('Submit');
                console.log(result.status);
                console.log(result.message);
                alert(result.message);
                $('#myModal').removeClass('show');
                $('.modal-backdrop').remove();
                dealerTable();
            },
            error: function(jqXHR) {
                // console.log(jqXHR.responseJSON.message);
                console.log('Registration failed');
                alert('Registration failed');
                $('#dealerRegisterSubmitButton').html(' SUBMIT');
            }
        });
    });
});



// delete Dealer
$(document).ready(function() {
    $(document).on('click', '.DealerDelete', function(e) {
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
            url: '/board/dealer/delete',
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
                dealerTable();
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
