// d../ynamic description row addition start
var counter = 0;
var nam = $('.resp' + counter);
var myClass = "resp0";
var classNameOnFocus = "resp0";

$(document).on('keyup', nam, function(e) {
    e.preventDefault();
    var description = $('#SupplierSelect' + counter).val().trim();
    var quantity = $('#Quantity' + counter).val().trim();
    var rate = $('#Rate' + counter).val().trim();
    var amount = $('#Amount' + counter).val().trim();

    if (description != '' && quantity != '' && rate != '' && amount != '') {
        counter += 1;
        nam = 'resp' + counter;
        $('#elements').append('<div class="row staticRow dynamicRow' + counter + '" style="margin-top: 1%;">\
                <div class="col-sm-1 text-right" style="padding-top: 1.5%;">\
                  <label class="bmd-label-floating" id="label' + counter + '">' + (counter + 1) + '.</label>\
                </div>\
                <div class="col-sm-3">\
                <div class="form-group">\
                  <select id="SupplierSelect' + counter + '" class="form-control ' + nam + '">\
                    <option value="" hidden></option>\
                    <option >Spirulina</option>\
                    <option value="AddNewSupplier">Cordceps</option>\
                    <option value="AddNewSupplier">Noni</option>\
                    <option value="AddNewSupplier">Braun Rice</option>\
                  </select>\
                </div>\
                </div>\
                <div class="col-sm-3">\
                  <div class="form-group">\
                  <div class="input-group">\
                    <label class="bmd-label-floating">Qty</label>\
                    <input type="Number" id="Quantity' + counter + '" name="quantity' + counter + '" class="form-control ' + nam + '" placeholder="Qty">\
                    <div class="input-group-append">\
                    <input size="5" type="text" id="Unit' + counter + '" name="unit' + counter + '" class="form-control ' + nam + '" placeholder="Unit">\
                  </div>\
                  </div>\
                  </div>\
                </div>\
                <div class="col-sm-2">\
                  <div class="form-group">\
                    <label class="bmd-label-floating">Rate</label>\
                    <input type="Number" id="Rate' + counter + '" name="rate' + counter + '" class="form-control ' + nam + '">\
                  </div>\
                </div>\
                <div class="col-sm-3">\
                  <div class="form-group">\
                    <label class="bmd-label-floating">Amount</label>\
                    <input type="text" id="Amount' + counter + '" name="amount' + counter + '" class="form-control ' + nam + '" disabled>\
                  </div>\
                </div>\
                </div>');
    }
});

$(document).on('blur', '.staticRow', function(e) {
    e.preventDefault();
    var myClassName = e.target.className;
    var classArr = myClassName.split(" ");
    myClass = classArr[classArr.length - 1];
    var arr = myClass.split(/([0-9]+)/);
    var ID = arr[1];
    var val_1 = $('#Description' + ID).val().trim();
    var val_2 = $('#Quantity' + ID).val().trim();
    var val_3 = $('#Rate' + ID).val().trim();
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
                        document.getElementById('Quantity' + (i + 1)).name = 'quantity' + i;
                        document.getElementById('Rate' + (i + 1)).name = 'rate' + i;
                        document.getElementById('Amount' + (i + 1)).name = 'amount' + i;

                        document.getElementById('Description' + (i + 1)).id = 'Description' + i;
                        document.getElementById('Quantity' + (i + 1)).id = 'Quantity' + i;
                        document.getElementById('Rate' + (i + 1)).id = 'Rate' + i;
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
    updateAmount(ID);
});
//function to insert comma in the numbers...
function insertComma(number){

    strArr = number.toString();
    //grand total split for adding comma formatting in numbers 
    var numberArr = strArr.split('.');
    var numAfterpoint = numberArr[1];
    if(typeof numAfterpoint == 'undefined'){
        numAfterpoint = '';
    }
    var numberBeforepoint = numberArr[0];
    var lastThree = numberBeforepoint.substring(numberBeforepoint.length-3);
    var otherNumbers = numberBeforepoint.substring(0,numberBeforepoint.length-3);
    if(otherNumbers != '')
        lastThree = ',' + lastThree;
    if(numAfterpoint != ''){
        var numWithComma = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + '.' + numAfterpoint;
    }
    else{
        var numWithComma = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
    }    
    return numWithComma;
}

//function to update the amount automatically...
function updateAmount(id){
    $(document).on('change', '.resp'+id, function(){
        var val_2 = $('#Quantity' + id).val().trim();
        var val_3 = $('#Rate' + id).val().trim();
        if(val_2 == ''){
            val_2 = 0;
        }
        if(val_3 == ''){
            val_3 = 0;
        }
        var amount = val_2*val_3;
        var amountstr = insertComma(amount);
        $('#Amount'+id).val(amountstr);
        var total = 0;
        for (var i = 0; i < counter; i++){
            var amt = $("#Amount"+i).val();
            amt = amt.replace(/\,/g,'');//removes comma from numbers...
            amt = parseFloat(amt);
            total += amt;   
        }
        var firstTotal = insertComma(total);
        $('#totalAmount').val(firstTotal);

        var total_1 = $('#totalAmount').val();
        total_1 = total_1.replace(/\,/g,'');//removes commas from the string number..
        total_1 = parseFloat(total_1);
        var discAmt = 0.01*$('#DiscPercent').val()*total_1;
        var discAmtStr = insertComma(discAmt);
        $('#DiscountAmt').val(discAmtStr);
        var taxableAmt = total_1-discAmt;
        var taxableAmtStr = insertComma(taxableAmt);
        $('#TaxableAmt').val(taxableAmtStr);
        var vatamt = 0.13*taxableAmt;
        var vatamtStr = insertComma(vatamt);
        $('#VatAmt').val(vatamtStr);
        var grandtotal = taxableAmt + vatamt;
        if(grandtotal>1){
            var grandtotalStr = insertComma(grandtotal)
            $('#GrandTotal').val(grandtotalStr);
            var roundedGrandTotal = Math.round(grandtotal);
            var amtInWords = amountInWords(roundedGrandTotal);
            var amtInWords = amtInWords + " rupees only.";
            $('#AmtInWords').val(amtInWords);
        }else{
            $('#GrandTotal').val("");
            $('#AmtInWords').val("");
        }
    });
}

//function to convert amount n numbers into words in Nepali Format....
function amountInWords(amount){
    var words = new Array();
    words[0] = 'Zero';words[1] = 'One';words[2] = 'Two';words[3] = 'Three';words[4] = 'Four';words[5] = 'Five';words[6] = 'Six';words[7] = 'Seven';words[8] = 'Eight';words[9] = 'Nine';words[10] = 'Ten';words[11] = 'Eleven';words[12] = 'Twelve';words[13] = 'Thirteen';words[14] = 'Fourteen';words[15] = 'Fifteen';words[16] = 'Sixteen';words[17] = 'Seventeen';words[18] = 'Eighteen';words[19] = 'Nineteen';words[20] = 'Twenty';words[30] = 'Thirty';words[40] = 'Forty';words[50] = 'Fifty';words[60] = 'Sixty';words[70] = 'Seventy';words[80] = 'Eighty';words[90] = 'Ninety';var op;
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if(n_length <= 9){
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++){
        received_n_array[i] = number.substr(i, 1);}
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++){
        n_array[i] = received_n_array[j];}
        for (var i = 0, j = 1; i < 9; i++, j++){
        if(i == 0 || i == 2 || i == 4 || i == 7){
        if(n_array[i] == 1){
        n_array[j] = 10 + parseInt(n_array[j]);
        n_array[i] = 0;}}}
        value = "";
        for (var i = 0; i < 9; i++){
        if(i == 0 || i == 2 || i == 4 || i == 7){
        value = n_array[i] * 10;} else {
        value = n_array[i];}
        if(value != 0){
        words_string += words[value] + " ";}
        if((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)){
        words_string += "Crores ";}
        if((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)){
        words_string += "Lakhs ";}
        if((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)){
        words_string += "Thousand ";}
        if(i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)){
        words_string += "Hundred and ";} else if(i == 6 && value != 0){
        words_string += "Hundred ";}}
        words_string = words_string.split(" ").join(" ");
    }
    return words_string;
}
// dynamic description row addition ends......


// add new supplier ajax view
$(document).on('change', '#SupplierSelect', function(e) {
    e.preventDefault();
    var selected = $('#SupplierSelect').val();
    if (selected == 'AddNewSupplier') {
        // $('.card-body').empty();
        $.ajax({
            url: '/board/vat/supplier',
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
        url: '/board/add/vat/supplier',
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






//  unhide description enty form:
$(document).on('change', '#SupplierSelect', function(){
    var id = $('#SupplierSelect').val();
    var data_id = $('#pan'+id).attr('data-id')
    if(id != ''){
        $('#afterSupplierSelection').removeAttr('hidden');
        $('#PanNoInput').val(data_id);
    }
});




//purchase form data sending to controller.....

$(document).on('submit', '#PurchaseVat', function(e) {
   e.preventDefault();
   //vendor data....
   var RowData = $('#PurchaseVat').serializeArray();
   RowData.shift();//delete first element of array
   RowData.splice(RowData.length-6,6);//delete last five elements of array..

   var PurchaseEntryData = { 
       VendorID: $('#SupplierSelect').val(),
       InvoiceNumber: $('#InvoiceNo').val(),
       TrnscDate: $('#nepaliDate2').val(),
       Row: RowData,
       Discount: $('#DiscPercent').val(),
       Tax: $('#VatPercent').val(),
       PaymentMode: $('#paymentTypeSelect').val(),
       Added_By: $('#submitID').attr("data-userid"),

   }
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/board/accounting/add/PurchaseEntry',
        method: 'POST',
        data: PurchaseEntryData,
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
            // alert(response.message);
            // $('#addNewCategoryModel').modal('hide');
            $('#modalLoading').attr('hidden', 'hidden');
            $('#modalLoading').empty();
            // LoadServicesCategory();
            // location.reload(true);
        },
        error: function(jqXHR, status) {
            alert('Failed to Add!!!');
            // console.log(jqXHR);
            $('#modalLoading').attr('hidden', 'hidden');
            $('#modalLoading').empty();
            // location.reload(true);
        }
    }); 
});




//*********Dropdown tree for category and account selection ends....

//*****adding account_category type data from Database ***********
// $(document).on('click', '#Account0', function(e) {
//    e.preventDefault();
//     $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         $.ajax({
//             url: '/board/accounting/get/CategoryData',
//             method: 'GET',
//             beforeSend: function() {
//                 $('#modalLoading').html('<div class="spinner-grow text-muted"></div>\
//                         <div class="spinner-grow text-primary"></div>\
//                         <div class="spinner-grow text-success"></div>\
//                         <div class="spinner-grow text-info"></div>\
//                         <div class="spinner-grow text-warning"></div>\
//                         <div class="spinner-grow text-danger"></div>\
//                         <div class="spinner-grow text-secondary"></div>\
//                         <div class="spinner-grow text-dark"></div>\
//                         <div class="spinner-grow text-light"></div>');
//                 // $('#PurchaseVat :input').prop("disabled", true);
//                 $('#modalLoading').removeAttr('hidden');
//             },
//             success: function(response) {
//                 console.log(response);
//                 $('#modalLoading').attr('hidden', 'hidden');
//                 $('#modalLoading').empty();
//                 // location.reload(true);

//             },
//             error: function(jqXHR, status) {
//                 alert('Failed to Load category from server');
//                 $('#modalLoading').attr('hidden', 'hidden');
//                 $('#modalLoading').empty();
//                 // location.reload(true);
//             }
//         });
// });

//Dropdown tree for category and account selection starts....
// let myInput = document.querySelector('#Account0');
// let listHolder = document.querySelector('#listHolder');
// document.addEventListener('click', (e) => {
//   e.preventDefault();
//   if (e.target == myInput) {
//     if (listHolder.style.display == 'block') {
//       listHolder.style.display = 'none';
//     }
//     else {
//       listHolder.style.display = 'block';
//     }
//   }
//   if (e.target.classList.contains('mainCat') ) {
//     let listIcon=e.target.children[0];
//     let subCategory = e.target.children[1];
//     if (subCategory.style.display==='block') {
//       subCategory.style.display='none';
//       listIcon.classList.remove("fa-minus");
//       listIcon.classList.add("fa-plus");
//     }
//     else{
//       subCategory.style.display='block';
//       listIcon.classList.remove("fa-plus");
//       listIcon.classList.toggle('fa-minus');
//     }
//   }
//   if (e.target.classList.contains('item')) {
//     myInput.value = e.target.textContent;
//   }

// });



//  unhide assest combo box.........
// $(document).on('change', '#Description0', function(){
//     var val_1 = $('#Description0').val();
//     var val_2 = $('#Quantity0').val();
//     var val_3 = $('#Rate0').val();

//     if( val_1 == '' && val_2 == '' && val_3 == '' ){
//         $('#assetDiv').attr('hidden', 'hidden');
//     }
//     if(val_1 != '' && val_2 != '' && val_3 != ''){
//         $('#assetDiv').removeAttr('hidden');
//     }
    
// });


// function LoadServicesCategory(){
//     var purchaseType = $('#purchaseTypeSelect').val();
//     $('#categoryType').val($("#categoryType option:first").val());
//     if(purchaseType == "Ast"){
//         $('#categoryLabel').html('Assets Category');
//         $('#addNewCategoryOption').html('Add new assets category');
//         $('#addNewCategoryOption').val('Add new assets category');
        
//     }
//     if(purchaseType == "Gds"){
//         $('#categoryLabel').html('Goods Category');
//         $('#addNewCategoryOption').html('Add new goods category');
//         $('#addNewCategoryOption').val('Add new goods category');
//     }
//     if(purchaseType == "Srv"){
//         $('#categoryLabel').html('Services Category');
//         $('#addNewCategoryOption').html('Add new services category');
//         $('#addNewCategoryOption').val('Add new services category');
//     }
//     if(purchaseType == "Misc"){
//         $('#categoryLabel').html('Miscellaneous');
//         $('#addNewCategoryOption').html('Add new miscellaneous category');
//         $('#addNewCategoryOption').val('Add new miscellaneous category');
//     }

//     //header token pathako to backend...
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.ajax({
//         url: '/board/vat/PurchaseSales/category/'+purchaseType,
//         method: 'GET',
//         beforeSend: function() {
//             $('#modalLoading').html('<div class="spinner-grow text-muted"></div>\
//                     <div class="spinner-grow text-primary"></div>\
//                     <div class="spinner-grow text-success"></div>\
//                     <div class="spinner-grow text-info"></div>\
//                     <div class="spinner-grow text-warning"></div>\
//                     <div class="spinner-grow text-danger"></div>\
//                     <div class="spinner-grow text-secondary"></div>\
//                     <div class="spinner-grow text-dark"></div>\
//                     <div class="spinner-grow text-light"></div>');
//             // $('#PurchaseVat :input').prop("disabled", true);
//             $('#modalLoading').removeAttr('hidden');
//         },
//         success: function(response) {
//             // console.log(response);
//             // alert(response.message);
//             // console.log(response.message);
//             // console.log(response.message[0].type);
//             // console.log(response.message.length);
//              $('#modalLoading').attr('hidden', 'hidden');
//              $('#modalLoading').empty();
//             // location.reload(true);

//             var numOfRows = response.message.length;
//             $('#categoryType').find('option').not(':eq(0), :eq(1)').remove();
//             for(var i = 0;i<numOfRows;i++){
//                 var rowType = response.message[i].type;
//                 var rowCategory = response.message[i].category;
//                 if( rowType == "assets"){
//                    $('#categoryType').append(new Option(rowCategory, rowCategory));
//                 }
//                 if( rowType == "goods"){
//                    $('#categoryType').append(new Option(rowCategory, rowCategory));
//                 }
//                 if( rowType == "services"){
//                    $('#categoryType').append(new Option(rowCategory, rowCategory));
//                 }
//                 if( rowType == "miscellaneous"){
//                    $('#categoryType').append(new Option(rowCategory, rowCategory));
//                 }
//             }
//         },
//         error: function(jqXHR, status) {
//             alert('Failed to Load category from server');
//             // console.log(jqXHR);
//             $('#modalLoading').attr('hidden', 'hidden');
//             $('#modalLoading').empty();
//             // location.reload(true);
//         }
//     });
// }

// // Assets type and goods and services selections....


// $(document).on('change', '#purchaseTypeSelect', function(){
//     LoadServicesCategory();
// });

// // to autofocus always on input field of add category modal..
// $('#addNewCategoryModel').on('shown.bs.modal', function(){
//     $('#addNewCategory').focus();
// });
// $(document).on('blur','#addNewCategory',function(){
//     $(this).focus();
// });

// // Add goods and services options in the select Box..
// $(document).on('change', '#categoryType', function(){
//     var option = $('#categoryType').val();
//     if(option == "Add new assets category"){
//         $('#Ast_Gds_Srv_Msc').html("assets");
//         $('#addNewCategoryModel').modal('toggle');
//         $('#addNewCategory').removeAttr('data_id');
//         $('#addNewCategory').attr('data-id', 'ast');
//     }
//     if(option == "Add new goods category"){
//         $('#Ast_Gds_Srv_Msc').html("goods");
//         $('#addNewCategory').removeAttr('data_id');
//         $('#addNewCategory').attr('data-id', 'gds');
//         $('#addNewCategoryModel').modal('toggle');
//     }
//     if(option == "Add new services category"){
//         $('#Ast_Gds_Srv_Msc').html("services");
//         $('#addNewCategory').removeAttr('data_id');
//         $('#addNewCategory').attr('data-id', 'srvs');
//         $('#addNewCategoryModel').modal('toggle');
//     }
//     if(option == "Add new miscellaneous category"){
//         $('#Ast_Gds_Srv_Msc').html("miscellaneous");
//         $('#addNewCategory').removeAttr('data_id');
//         $('#addNewCategory').attr('data-id', 'mscs');
//         $('#addNewCategoryModel').modal('toggle');
//     }
// });

// //event to send add category data to the database at backend....
// $(document).on('submit', '#addNewCategoryForm', function(e) {
//     e.preventDefault();
//     var addCategoryData = {
//         Type: $('#addNewCategory').attr('data-id'),
//         Category: $('#addNewCategory').val(),
//         Added_by: $('#addNewCategory').attr("data-userid")
//     }
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         url: '/board/add/vat/PurchaseSalesCategory',
//         method: 'POST',
//         data: addCategoryData,
//         beforeSend: function() {
//             $('#modalLoading').html('<div class="spinner-grow text-muted"></div>\
//                     <div class="spinner-grow text-primary"></div>\
//                     <div class="spinner-grow text-success"></div>\
//                     <div class="spinner-grow text-info"></div>\
//                     <div class="spinner-grow text-warning"></div>\
//                     <div class="spinner-grow text-danger"></div>\
//                     <div class="spinner-grow text-secondary"></div>\
//                     <div class="spinner-grow text-dark"></div>\
//                     <div class="spinner-grow text-light"></div>');
//             $('#modalLoading').removeAttr('hidden');
//         },
//         success: function(response) {
//             // console.log(response.message);
//             alert(response.message);
//             $('#addNewCategoryModel').modal('hide');
//             $('#modalLoading').attr('hidden', 'hidden');
//             $('#modalLoading').empty();
//             LoadServicesCategory();
//             // location.reload(true);
//         },
//         error: function(jqXHR, status) {
//             alert('Failed to Add!!!');
//             // console.log(jqXHR);
//             $('#modalLoading').attr('hidden', 'hidden');
//             $('#modalLoading').empty();
//             // location.reload(true);
//         }
//     });
// });