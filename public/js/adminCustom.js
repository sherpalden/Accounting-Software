
      // callAjax function
function sendAjax(option, callback=''){
  var url = option.url?option.url:'/';
  var method = option.method?option.method:'GET';
  var data = option.data?option.data:{};
  $.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  });
  $.ajax({
    url:url,
    method: method,
    data:data,
    success: function(response){
      if(typeof(callback) != 'string'){
        callback(response);
      }
    }
  });
}
      // js function to open insert modal
function openModal(url){
  $('#myModal').modal();
  sendAjax({url:url}, function(data){
    $('#adminmodalbody').html(data);
  });
}


// add new product save button
$(document).ready(function(){
  $(document).on('click', '#AddNewProductSave', function(e){
    e.preventDefault();
    var ProductName = $.trim($('#ProductName').val());
    var BatchCode = $.trim($('#BatchCode').val());
    var ProductPrice = $.trim($('#ProductPrice').val());
    var ProductImage = $.trim($('#ProductImage').val());
    if(ProductName == ''){
      alert('Enter Product Name');
      $('#ProductName').focus();
    }
    else if(BatchCode == ''){
      alert('Enter Batch Code');
      $('#BatchCode').focus();
    }
    else if(ProductPrice == ''){
      alert('Enter Product Price');
      $('#ProductPrice').focus();
    }
    else if(ProductImage == ''){
      alert('Enter Product Image');
      $('#ProductImage').focus();
    }
    else{

      var ProductImageSize = $('#ProductImage')[0].files[0].size;
      if(ProductImageSize > 3149222){
        alert('Image Size Exceeded 3Mb'); 
      }
      else{
        var form = $('#AdminAddNewProductForm')[0];
        var formData = new FormData(form);
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({
            url:"/admin/add/new/product",
            method:"POST",
            data:formData,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
              $('#disablee').attr('disabled','disabled');
              $('#AjaxLoading').removeAttr('hidden');
              $('#JumbotornDiv').addClass('DisableColor');
            },
            success:function(data){
              var a = Object.values(data)[0];
              $('#ProductName').val('');
              $('#BatchCode').val('');
              $('#ProductPrice').val('');
              $('#AjaxLoading').attr('hidden','hidden');
              $('#JumbotornDiv').removeClass('DisableColor');
              $('#disablee').removeAttr('disabled');
              $('#ProductImage').val();
              alert(a);
            },
            error:function(data){
              alert('Failed');
            }
        });
      }
      
    }
  });
});



// show image before inserting in add product
  var ShowPhoto = function(event) {
    var ProductImagePreview = document.getElementById('ProductImagePreview');
    $('#ProductImagePreview').css({'height':'120px', 'width':'120px', 'box-shadow':'0px 5px 8px 2px rgba(178,172,171,0.97)'});
    ProductImagePreview.src = URL.createObjectURL(event.target.files[0]);
  };

  // open ajax add new product form
$(document).on('click', '#AddNewProductSidebarMenu', function(e){
  e.preventDefault();
  sendAjax({
      url: '/admin/form/AddNewProduct',
      method: 'post'
    },function(data){
      $('#DashboardTitle').html('Product');
      $('#JumbotornDiv').html(data);
    });
});

  // open ajax Dealer Product Purchase Form
$(document).on('click', '#DealerProductPurchaseForm', function(e){
  e.preventDefault();
  sendAjax({
    url: '/admin/form/DealerProductPurchaseForm',
    method: 'post'
  }, function(data){
    $('#DashboardTitle').html('Dealer New Order');
    $('#JumbotornDiv').html(data);
  });
});

  // product purchase form input on key up calculation
  $(document).on('keyup', '.ProductPurchaseInput', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var price = $('#a'+id).attr('data-id');
    var qty = $(this).val();
    if (qty >= 0){
    var total = qty * price;
    $('#a'+id).html(total);
    var GrandTotal = 0;
    $('.ProductTotal').each(function(){
      GrandTotal += parseFloat($(this).text());
    $('#ProductPurchaseGrandTotal').html(GrandTotal);
    });
    }
    else{
      alert('Invalid Negative Number');
      var qty = $(this).val('');
    $('#a'+id).html('0');
    }
  });


  // Print Purchase
  $(document).on('click', '#PrintPurchase', function(e){
    e.preventDefault();
    $('#PrintDiv').printThis();
  });


  // Tax Purchase Form function
  function taxpurchaseform(){
    sendAjax({
      url: '/admin/form/tax/purchase',
      method: 'post'
    }, function(data){
      $('#DashboardTitle').html('Purchase');
      $('#JumbotornDiv').html(data);
      
    });
  }

  // Tax Purchase
  $(document).on('click', '#TaxPurchase', function(e){
    e.preventDefault();
    taxpurchaseform();
  });



    // add new supplier form
    function addnewsupplierform(){
      sendAjax({
        url: '/admin/form/add/new/supplier',
        method: 'post'
      }, function(data){
        $('#DashboardTitle').html('Add New supplier');
        $('#JumbotornDiv').html(data);
      });
    }


    // AddNew Supplier Save Button
    $(document).on('click', '#AddNewSupplierSaveButton', function(e){
      e.preventDefault();
      var SupplierName = $('#SupplierName').val();
      var PanNo = $('#PanNo').val();
      var SupplierEmail = $('#SupplierEmail').val();
      var SupplierPhoneNumber = $('#SupplierPhoneNumber').val();
      var SupplierAddress = $('#SupplierAddress').val();

      if(SupplierName == ''){
        alert('Please Enter Supplier Name');
        $('#SupplierName').focus();
      }
      else if(PanNo == ''){
        alert('Please Enter Pan Number');
        $('#PanNo').focus();
      }
      else{
        var supplier = $('#AddNewSupplierForm').serializeArray();
        // console.log(supplier);
        $.ajax({
            url:'/admin/form/add/detail/Supplier',
            method:'POST',
            data: supplier,
            beforeSend:function(){
              $('#disablee').attr('disabled','disabled');
              $('#AjaxLoading').removeAttr('hidden');
              $('#JumbotornDiv').addClass('DisableColor');
            },
            success:function(data){
              var a = Object.values(data)[0];
              // $('#ProductName').val('');
              // $('#BatchCode').val('');
              // $('#ProductPrice').val('');
              $('#AjaxLoading').attr('hidden','hidden');
              $('#JumbotornDiv').removeClass('DisableColor');
              $('#disablee').removeAttr('disabled');
              // $('#ProductImage').val();
              alert(a);
              taxpurchaseform();
            },
            error:function(data){
              alert('Failed');
            }
        });
      }
    });


    // supplier choose select option
    $(document).on('change', '#SelectSupplier', function(e){
      e.preventDefault();
      // var dataId = $(this).attr('data-id');
      // alert(dataId);
      var selected = $(this).find('option:selected');
       var extra = selected.data('id');
      if ($('#SelectSupplier').val()=='AddNewSupplier'){
        addnewsupplierform();
      }
      else{
        $('#PanNoId').html(extra);
        $('#DateInvoicePanDiv').removeAttr('hidden');
      }
    });

    // choose purchase type
    $(document).on('change', '#PurchaseType', function(e){
      e.preventDefault();
      var a = $('#PurchaseType').val();
      if (a==1) {
        $('#CurrentDiv').removeAttr('hidden');
        $('#FixedPurchaseDiv').attr('hidden','hidden');
        $('#IntangibleDiv').attr('hidden','hidden');
      }
      if (a==2) {
        $('#FixedPurchaseDiv').removeAttr('hidden');
        $('#CurrentDiv').attr('hidden','hidden');
        $('#IntangibleDiv').attr('hidden','hidden');
      }
      if (a==4) {
        $('#CurrentDiv').attr('hidden','hidden');
        $('#FixedPurchaseDiv').attr('hidden','hidden');
        $('#IntangibleDiv').removeAttr('hidden');
      }
    });

    // fixed assets type
    $(document).on('change','#FixedAssetsTypeChange',function(e){
        e.preventDefault();
      var value = $('#FixedAssetsTypeChange').val();
      if (value == 33) {
      $('#PropertyandEquipmentType').removeAttr('hidden');
      }
      else{
       $('#PropertyandEquipmentType').attr('hidden','hidden'); 
      }
    });


    // Taxable Purchase Tax Calculation
    $(document).on('keyup', '#TaxPurchaseTaxablePurchase', function(e){
      e.preventDefault();
      var tp = $('#TaxPurchaseTaxablePurchase').val();
      var t = tp * 0.13;
      var tpt = tp-t;
      $('#TaxPurchaseTaxAmount').html(t);
      $('#TaxPurchaseTotalWithTax').html(tpt);
    });


    // tax purchase save button
    $(document).on('click', '#TaxPurchaseSaveBtn', function(e){
      e.preventDefault();
      var SupplierId = $('#SelectSupplier').val();
      var date = $('#TaxPurchaseDate').val();
      var Invioce = $('#TaxPurchaseInvioce').val();
      var TotalPurchaseAmount = $('#TaxPurchaseTotalPurchaseAmount').val();
      var TaxPurchaseSwitchData = $('#TexPurchaseSwitchBtn').is(':checked')? 1 : 0;
      if(SupplierId == ''){
        alert('Select a Dealer');
        $('#SelectSupplier').focus();
      }
      else if(date == ''){
        alert('Enter Date');
        $('#TaxPurchaseDate').focus();
      }
      else if(Invioce == ''){
        alert('Enter Invoice Number');
        $('#TaxPurchaseInvioce').focus();
      }
      else if(TotalPurchaseAmount == ''){
        alert('Enter Total Purchase Amount');
        $('#TaxPurchaseTotalPurchaseAmount').focus();
      }
      else if(PaymentType == ''){
        alert('Select Payment Type');
      }
      // else if(TaxPurchaseSwitchData == 1){
      //   $.ajax({
      //       url:'/admin/form/add/purchase/',
      //       method:'POST',
      //       data: data,
      //       beforeSend:function(){
      //         $('#disablee').attr('disabled','disabled');
      //         $('#AjaxLoading').removeAttr('hidden');
      //         $('#JumbotornDiv').addClass('DisableColor');
      //       },
      //       success:function(data){
      //         var a = Object.values(data)[0];
      //         // $('#ProductName').val('');
      //         // $('#BatchCode').val('');
      //         // $('#ProductPrice').val('');
      //         $('#AjaxLoading').attr('hidden','hidden');
      //         $('#JumbotornDiv').removeClass('DisableColor');
      //         $('#disablee').removeAttr('disabled');
      //         alert(a);
      //         // taxpurchaseform();
      //       },
      //       error:function(data){
      //         alert('Failed');
      //       }
      //   });
      // }
      else{
        var data = $('#TaxPurchaseData').serializeArray();
        $.ajax({
            url:'/admin/form/add/purchase',
            method:'POST',
            data: data,
            beforeSend:function(){
              $('#disablee').attr('disabled','disabled');
              $('#AjaxLoading').removeAttr('hidden');
              $('#JumbotornDiv').addClass('DisableColor');
            },
            success:function(data){
              var a = Object.values(data)[0];
              $('#SelectSupplier').val('');
              $('#TaxPurchaseDate').val('');
              $('#TaxPurchaseInvioce').val('');
              $('#PanNoId').empty();
              $('#TaxPurchaseTotalPurchaseAmount').val('');
              $('#TaxPurchaseExemptedPurchase').val('');
              $('#TaxPurchaseTaxablePurchase').val('');
              $('#TaxPurchaseTaxAmount').empty();
              $('#TaxPurchaseTotalWithTax').empty();
              $('#TaxPurchaseImportAmount').val('');
              $('#TaxPurchaseVatOnImport').val('');
              $('#TaxPurchaseCapitalPurchase').val('');
              $('#TaxPurchaseCapitalVat').val('');
              $('#PaymentType').val('');
              $('#TexPurchaseSwitchBtn').removeAttr('checked');
              $('#AjaxLoading').attr('hidden','hidden');
              $('#JumbotornDiv').removeClass('DisableColor');
              $('#disablee').removeAttr('disabled');
              alert(a);
              // taxpurchaseform();
            },
            error:function(data){
              alert('Failed');
            }
        });
      }
    });


    // Tax Purchase Switch on Change
    $(document).on('change', '#TexPurchaseSwitchBtn', function(e){
      e.preventDefault();
      var TaxPurchaseSwitchData = $('#TexPurchaseSwitchBtn').is(':checked')? 1 : 0;
      if(TaxPurchaseSwitchData == 1){
        $('#DynamicAddPurchaseDetails').css({'display' : ''});
        // $('#DynamicAddPurchaseDetails').html('KJKHKJKJHKH');
        sendAjax({
          url: '/admin/form/add/purchase/decription',
          method: 'post'
        }, function(data){
          $('#DynamicAddPurchaseDetails').html(data);
        });
      }
      if(TaxPurchaseSwitchData == 0){
        $('#DynamicAddPurchaseDetails').empty();
        $('#DynamicAddPurchaseDetails').css({'display' : 'none'});
      }
    });




// Add New Leader
  $(document).on('click', '#AddLeader', function(e){
    e.preventDefault();
    sendAjax({
          url: '/admin/form/AddNewLeader',
          method: 'post'
        }, function(data){
          $('#DashboardTitle').html('Add New Leader');
          $('#JumbotornDiv').html(data);
        });
  });


// Add New Dealer
$(document).on('click', '#AddDealer', function(e){
  e.preventDefault();
  sendAjax({
          url: '/admin/form/AddNewDealer',
          method: 'post'
        }, function(data){
          $('#DashboardTitle').html('Add New Dealer');
          $('#JumbotornDiv').html(data);
        });
});






// show image before citizenship photo upload
  var ShowCitizenshipPhoto = function(event) {
    if($('#CitizenshipPhoto').val().trim() == "") {
      $('#CitizenshipPreview').removeAttr('src');
      $('#CitizenshipPreview').css({'height':'0px', 'width':'0px', 'box-shadow':'0px 5px 8px 2px rgba(178,172,171,0.97)'});

    }
    else {
      $('#CitizenshipPreview').attr('src','');
      var ShowCitizenshipPhotos = document.getElementById('CitizenshipPreview');
      $('#CitizenshipPreview').css({'height':'120px', 'width':'120px', 'box-shadow':'0px 5px 8px 2px rgba(178,172,171,0.97)'});
      ShowCitizenshipPhotos.src = URL.createObjectURL(event.target.files[0]);
    }
  };

  // show leader image before upload
  var showLeaderPhotoPreview = function(event) {
    if($('#LeaderPhoto').val().trim() == '') {
      $('#LeaderPhotoPreview').removeAttr('src');  
      $('#LeaderPhotoPreview').css({'height':'0px', 'width':'0px', 'box-shadow':'0px 5px 8px 2px rgba(178,172,171,0.97)'});
    }
    else {
      $('#LeaderPhotoPreview').attr('src','');  
      var showLeaderPhotoPreview = document.getElementById('LeaderPhotoPreview');
      $('#LeaderPhotoPreview').css({'height':'120px', 'width':'120px', 'box-shadow':'0px 5px 8px 2px rgba(178,172,171,0.97)'});
      showLeaderPhotoPreview.src = URL.createObjectURL(event.target.files[0]);
    }
  };


 // show beneficiary citizenship image before upload
  var showBeneficiaryCitizenshipPreview = function(event) {
    if($('#BeneficiaryCitizenshipPhoto').val().trim() == '') {
      $('#BeneficiaryPhotoPreview').removeAttr('src');  
      $('#BeneficiaryPhotoPreview').css({'height':'0px', 'width':'0px', 'box-shadow':'0px 5px 8px 2px rgba(178,172,171,0.97)'});
    }
    else {
      $('#BeneficiaryPhotoPreview').attr('src','');  
      var showBeneficiaryPhotoPreview = document.getElementById('BeneficiaryPhotoPreview');
      $('#BeneficiaryPhotoPreview').css({'height':'120px', 'width':'120px', 'box-shadow':'0px 5px 8px 2px rgba(178,172,171,0.97)'});
      showBeneficiaryPhotoPreview.src = URL.createObjectURL(event.target.files[0]);
    }
  };


// add new Leader
$(document).on('submit','#AdminAddNewLeader', function(e){
  e.preventDefault();
  if($('#LeaderFirstName').val().trim() == ''){
      alert('Enter First Name');
      $('#LeaderFirstName').focus();
    }
    else if($('#LeaderLastName').val().trim() == ''){
      alert('Enter Last Name');
      $('#LeaderLastName').focus();
    }
    else if($('#LeaderGender').val().trim() == ''){
      alert('Select Gender');
      $('#LeaderGender').focus();
    }
    else if($('#LeaderDOB').val().trim() == ''){
      alert('Enter Date of Birth');
      $('#LeaderDOB').focus();
    }
    else if($('#LeaderCitizenshipNumber').val().trim() == ''){
      alert('Enter Leader Citizenship Number');
      $('#LeaderCitizenshipNumber').focus();
    }
    else if($('#CitizenshipPhoto').val().trim() == ''){
      alert('Select Leader Citizenship Photo');
      $('#CitizenshipPhoto').focus();
    }
    else if($('#LeaderFatherName').val().trim() == ''){
      alert('Enter Father name');
      $('#LeaderFatherName').focus();
    }
    else if($('#LeaderPhoneNumber').val().trim() == ''){
      alert('Enter Phone Number');
      $('#LeaderPhoneNumber').focus();
    }
    else if($('#LeaderPermanentAdderss').val().trim() == ''){
      alert('Enter Permanent Address');
      $('#LeaderPermanentAdderss').focus();
    }
    else if($('#LeaderTemporaryAdderss').val().trim() == ''){
      alert('Enter Temporary Address');
      $('#LeaderTemporaryAdderss').focus();
    }
    else if($('#LeaderPhoto').val().trim() == ''){
      alert('Enter Photo');
      $('#LeaderPhoto').focus();
    }
    else if($('#LeaderGeneration').val().trim() == ''){
      alert('Select Generation');
      $('#LeaderGeneration').focus();
    }
    else if($('#LeaderBeneficiary').val().trim() == ''){
      alert('Enter Beneficiary Name');
      $('#LeaderBeneficiary').focus();
    }
    else if($('#BeneficiaryCitizenshipNo').val().trim() == ''){
      alert('Enter Beneficiary Citizenship No.');
      $('#BeneficiaryCitizenshipNo').focus();
    }
    else if($('#BeneficiaryRelationship').val().trim() == ''){
      alert('Enter Beneficiary Relationship');
      $('#BeneficiaryRelationship').focus();
    }
    else{
      var addnewleaderform = $('#AdminAddNewLeader')[0];
        var formData = new FormData(addnewleaderform);
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({
            url:"/admin/add/new/leader",
            method:"POST",
            data:formData,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
              $('#disablee').attr('disabled','disabled');
              $('#AjaxLoading').removeAttr('hidden');
              $('#JumbotornDiv').addClass('DisableColor');
            },
            success:function(data){
              var a = Object.values(data)[0];
              // $('#LeaderFirstName').val('');
              // $('#BatchCode').val('');
              // $('#ProductPrice').val('');
              // $('#AjaxLoading').attr('hidden','hidden');
              // $('#JumbotornDiv').removeClass('DisableColor');
              // $('#disablee').removeAttr('disabled');
              // $('#ProductImage').val();
              alert(a);
            },
            error:function(data){
              alert('Failed');
            }
        });
    }
});
