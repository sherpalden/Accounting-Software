$(document).on('change', '#TransactionSelect', function(e) {
    e.preventDefault();
    var selected = $('#TransactionSelect').val();
    if (selected == 'Purchase Transactions') {
        // $('.card-body').empty();
        $.ajax({
            url: '/board/accounting/purchase/journal',
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
                $('#PurchaseVat :input').prop("disabled", true);
                $('#modalLoading').removeAttr('hidden');
            },
            success: function(response) {
                $('.card-title').append(' (Purchase Journal View)')
                $('.card-body').html(response);
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            },
            error: function(jqXHR, status) {
                // console.log(jqXHR.responseJSON.message);
                alert('Page failed to load....');
            }
        });
    }
    else if (selected == 'Sales Transactions') {
        // $('.card-body').empty();
        $.ajax({
            url: '/board/accounting/sales/journal',
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
                $('#PurchaseVat :input').prop("disabled", true);
                $('#modalLoading').removeAttr('hidden');
            },
            success: function(response) {
                $('.card-title').append(' (Sales Journal View)')
                $('.card-body').html(response);
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            },
            error: function(jqXHR, status) {
                // console.log(jqXHR.responseJSON.message);
                alert('Page failed to load....');
            }
        });
    }
    else if (selected == 'Expenses Transactions') {
        // $('.card-body').empty();
        $.ajax({
            url: '/board/accounting/expenses/journal',
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
                $('#PurchaseVat :input').prop("disabled", true);
                $('#modalLoading').removeAttr('hidden');
            },
            success: function(response) {
                $('.card-title').append(' (Expenses Journal View)')
                $('.card-body').html(response);
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            },
            error: function(jqXHR, status) {
                // console.log(jqXHR.responseJSON.message);
                alert('Page failed to load....');
            }
        });
    }
    else if (selected == 'Income Transactions') {
        // $('.card-body').empty();
        $.ajax({
            url: '/board/accounting/income/journal',
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
                $('#PurchaseVat :input').prop("disabled", true);
                $('#modalLoading').removeAttr('hidden');
            },
            success: function(response) {
                $('.card-title').append(' (Income Journal View)')
                $('.card-body').html(response);
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            },
            error: function(jqXHR, status) {
                // console.log(jqXHR.responseJSON.message);
                alert('Page failed to load....');
            }
        });
    }

    else if (selected == 'Purchase Return Transactions') {
        // $('.card-body').empty();
        $.ajax({
            url: '/board/accounting/purchaseReturn/journal',
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
                $('#PurchaseVat :input').prop("disabled", true);
                $('#modalLoading').removeAttr('hidden');
            },
            success: function(response) {
                $('.card-title').append(' (Purchase Return Journal View)')
                $('.card-body').html(response);
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            },
            error: function(jqXHR, status) {
                // console.log(jqXHR.responseJSON.message);
                alert('Page failed to load....');
            }
        });
    }

    else if (selected == 'Sales Return Transactions') {
        // $('.card-body').empty();
        $.ajax({
            url: '/board/accounting/salesReturn/journal',
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
                $('#PurchaseVat :input').prop("disabled", true);
                $('#modalLoading').removeAttr('hidden');
            },
            success: function(response) {
                $('.card-title').append(' (Sales Return Journal View)')
                $('.card-body').html(response);
                $('#modalLoading').attr('hidden', 'hidden');
                $('#modalLoading').empty();
            },
            error: function(jqXHR, status) {
                // console.log(jqXHR.responseJSON.message);
                alert('Page failed to load....');
            }
        });
    }
});