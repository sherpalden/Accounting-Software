// d../ynamic description row addition start
var counter = 0;
var nam = $('.resp' + counter);
var myClass = "resp0";
var classNameOnFocus = "resp0";

$(document).on('keyup', nam, function(e) {
    e.preventDefault();
    var description = $('#Description' + counter).val().trim();
    var accounttype = $('#Account' + counter).val().trim();
    var amount = $('#Amount' + counter).val().trim();

    if (description != '' && accounttype != '' && amount != '') {
        counter += 1;
        nam = 'resp' + counter;
        $('#elements').append('<div class="row staticRow dynamicRow' + counter + '" style="margin-top: 1%;">\
                <div class="col-sm-1 text-right" style="padding-top: 1.5%;">\
                  <label class="bmd-label-floating" id="label' + counter + '">' + (counter + 1) + '.</label>\
                </div>\
                <div class="col-sm-5">\
                  <div class="form-group">\
                    <label class="bmd-label-floating">Description</label>\
                    <input type="text" id="Description' + counter + '" name="description' + counter + '" class="form-control ' + nam + '">\
                  </div>\
                </div>\
                <div class="col-sm-3">\
                 <div class="form-group">\
                    <label class="bmd-label-floating">Account Type</label>\
                    <input type="text" id="Account' + counter + '" name="account' + counter + '" class="form-control ' + nam + '">\
                 </div>\
                </div>\
                <div class="col-sm-3">\
                  <div class="form-group">\
                    <label class="bmd-label-floating">Amount</label>\
                    <input type="text" id="Amount' + counter + '" name="amount' + counter + '" class="form-control ' + nam + '">\
                  </div>\
                </div>\
                </div>');
    }
});

$(document).on('focusout', '.staticRow', function(e) {
    e.preventDefault();
    var myClassName = e.target.className;
    var classArr = myClassName.split(" ");
    myClass = classArr[classArr.length - 1];
    var arr = myClass.split(/([0-9]+)/);
    var ID = arr[1];
    var val_1 = $('#Description' + ID).val().trim();
    var val_2 = $('#Account' + ID).val().trim();
    var val_3 = $('#Amount' + ID).val().trim();
    ID = parseInt(ID);
    if (ID != counter) {
        if (val_1 == '' && val_2 == '' && val_3 == '') {
            classNameOnFocus = "jpt";
            setTimeout(function() {
                if (myClass != classNameOnFocus) {
                    $('.dynamicRow' + ID).remove();
                    for (var i = ID; i < counter; i++) {
                        $('.dynamicRow' + (i + 1)).removeClass('dynamicRow' + (i + 1)).addClass('dynamicRow' + i);
                        $('.resp' + (i + 1)).removeClass('resp' + (i + 1)).addClass('resp' + i);
                        document.getElementById('Description' + (i + 1)).name = 'description' + i;
                        document.getElementById('Account' + (i + 1)).name = 'account' + i;
                        document.getElementById('Amount' + (i + 1)).name = 'amount' + i;

                        document.getElementById('Description' + (i + 1)).id = 'Description' + i;
                        document.getElementById('Account' + (i + 1)).id = 'Account' + i;
                        document.getElementById('Amount' + (i + 1)).id = 'Amount' + i;
                        document.getElementById('label' + (i + 1)).id = 'label' + i;


                        $('#label' + i).html((i + 1)+'.');
                    }
                    counter = counter - 1;
                }
            }, 0.000001);
        }
    }
});

$(document).on('focus', '.staticRow', function(e) {
    var myClassNameOnFocus = e.target.className;
    var classArrr = myClassNameOnFocus.split(" ");
    classNameOnFocus = classArrr[classArrr.length - 1];

    var arr = classNameOnFocus.split(/([0-9]+)/);
    var ID = arr[1];
});
//function to insert comma in the numbers...
// function insertComma(number){

//     strArr = number.toString();
//     //grand total split for adding comma formatting in numbers 
//     var numberArr = strArr.split('.');
//     var numAfterpoint = numberArr[1];
//     if(typeof numAfterpoint == 'undefined'){
//         numAfterpoint = '';
//     }
//     var numberBeforepoint = numberArr[0];
//     var lastThree = numberBeforepoint.substring(numberBeforepoint.length-3);
//     var otherNumbers = numberBeforepoint.substring(0,numberBeforepoint.length-3);
//     if(otherNumbers != '')
//         lastThree = ',' + lastThree;
//     if(numAfterpoint != ''){
//         var numWithComma = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + '.' + numAfterpoint;
//     }
//     else{
//         var numWithComma = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
//     }    
//     return numWithComma;
// }

//function to update the amount automatically...
// function updateAmount(id){
//     $(document).on('change', '.resp'+id, function(){
//         var val_2 = $('#Quantity' + id).val().trim();
//         var val_3 = $('#Rate' + id).val().trim();
//         if(val_2 == ''){
//             val_2 = 0;
//         }
//         if(val_3 == ''){
//             val_3 = 0;
//         }
//         var amount = val_2*val_3;
//         var amountstr = insertComma(amount);
//         $('#Amount'+id).val(amountstr);
//         var total = 0;
//         for (var i = 0; i < counter; i++){
//             var amt = $("#Amount"+i).val();
//             amt = amt.replace(/\,/g,'');//removes comma from numbers...
//             amt = parseFloat(amt);
//             total += amt;   
//         }
//         var firstTotal = insertComma(total);
//         $('#totalAmount').val(firstTotal);

//         var total_1 = $('#totalAmount').val();
//         total_1 = total_1.replace(/\,/g,'');//removes commas from the string number..
//         total_1 = parseFloat(total_1);
//         var discAmt = 0.01*$('#DiscPercent').val()*total_1;
//         var discAmtStr = insertComma(discAmt);
//         $('#DiscountAmt').val(discAmtStr);
//         var taxableAmt = total_1-discAmt;
//         var taxableAmtStr = insertComma(taxableAmt);
//         $('#TaxableAmt').val(taxableAmtStr);
//         var vatamt = 0.13*taxableAmt;
//         var vatamtStr = insertComma(vatamt);
//         $('#VatAmt').val(vatamtStr);
//         var grandtotal = taxableAmt + vatamt;
//         if(grandtotal>1){
//             var grandtotalStr = insertComma(grandtotal)
//             $('#GrandTotal').val(grandtotalStr);
//             var roundedGrandTotal = Math.round(grandtotal);
//             var amtInWords = amountInWords(roundedGrandTotal);
//             var amtInWords = amtInWords + " rupees only.";
//             $('#AmtInWords').val(amtInWords);
//         }else{
//             $('#GrandTotal').val("");
//             $('#AmtInWords').val("");
//         }
//     });
// }

//function to convert amount n numbers into words in Nepali Format....
// function amountInWords(amount){
//     var words = new Array();
//     words[0] = 'Zero';words[1] = 'One';words[2] = 'Two';words[3] = 'Three';words[4] = 'Four';words[5] = 'Five';words[6] = 'Six';words[7] = 'Seven';words[8] = 'Eight';words[9] = 'Nine';words[10] = 'Ten';words[11] = 'Eleven';words[12] = 'Twelve';words[13] = 'Thirteen';words[14] = 'Fourteen';words[15] = 'Fifteen';words[16] = 'Sixteen';words[17] = 'Seventeen';words[18] = 'Eighteen';words[19] = 'Nineteen';words[20] = 'Twenty';words[30] = 'Thirty';words[40] = 'Forty';words[50] = 'Fifty';words[60] = 'Sixty';words[70] = 'Seventy';words[80] = 'Eighty';words[90] = 'Ninety';var op;
//     amount = amount.toString();
//     var atemp = amount.split(".");
//     var number = atemp[0].split(",").join("");
//     var n_length = number.length;
//     var words_string = "";
//     if(n_length <= 9){
//         var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
//         var received_n_array = new Array();
//         for (var i = 0; i < n_length; i++){
//         received_n_array[i] = number.substr(i, 1);}
//         for (var i = 9 - n_length, j = 0; i < 9; i++, j++){
//         n_array[i] = received_n_array[j];}
//         for (var i = 0, j = 1; i < 9; i++, j++){
//         if(i == 0 || i == 2 || i == 4 || i == 7){
//         if(n_array[i] == 1){
//         n_array[j] = 10 + parseInt(n_array[j]);
//         n_array[i] = 0;}}}
//         value = "";
//         for (var i = 0; i < 9; i++){
//         if(i == 0 || i == 2 || i == 4 || i == 7){
//         value = n_array[i] * 10;} else {
//         value = n_array[i];}
//         if(value != 0){
//         words_string += words[value] + " ";}
//         if((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)){
//         words_string += "Crores ";}
//         if((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)){
//         words_string += "Lakhs ";}
//         if((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)){
//         words_string += "Thousand ";}
//         if(i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)){
//         words_string += "Hundred and ";} else if(i == 6 && value != 0){
//         words_string += "Hundred ";}}
//         words_string = words_string.split(" ").join(" ");
//     }
//     return words_string;
// }
// dynamic description row addition ends......


// add new supplier ajax view
$(document).on('change', '#SupplierSelect', function(e) {
    e.preventDefault();
    var selected = $('#SupplierSelect').val();
    if (selected == 'AddNewSupplier') {
        // $('.card-body').empty();
        $.ajax({
            url: '/employee/vat/supplier',
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
                $('.card-title').append(' (Add New Supplier)')
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


// add new supplier submit form
$(document).on('submit', '#PurchaseVatAddSupplier', function(e) {
    e.preventDefault();
    var FormData = {
        SupplierName: $('#SupplierName').val(),
        PanNo: $('#SupplierPanNo').val(),
        SupplierEmail: $('#SupplierEmail').val(),
        SupplierPhone: $('#SupplierPhone').val(),
        SupplierAddress: $('#SupplierAddress').val()
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/employee/add/vat/supplier',
        method: 'POST',
        data: FormData,
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
            // console.log(response);
            alert(response.message);
            // $('#modalLoading').attr('hidden', 'hidden');
            // $('#modalLoading').empty();
            location.reload(true);
        },
        error: function(jqXHR, status) {
            alert('Failed to register');
            // console.log(jqXHR);
            $('#modalLoading').attr('hidden', 'hidden');
            $('#modalLoading').empty();
            // location.reload(true);
        }
    });
});

$(document).on('click', '.inputHolder', function(e) {
    e.preventDefault();
        $("#listHolder").toggle();
});

$(document).on('click', '.mainCat', function(e){
    e.preventDefault();
    $(this).children(0).toggleClass('fa fa-minus')
    $(this).children(1).toggle();
});


