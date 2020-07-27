$(document).on('click','.row',function(){
    var val_1 = $('#accountSelect').val();
    var val_2 = $('#monthSelect').val();
    if(val_1 != '' && val_2 != ''){
        $('#displayLedger').removeAttr('hidden');
    }
});