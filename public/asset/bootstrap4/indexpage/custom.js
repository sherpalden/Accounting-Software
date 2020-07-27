//// JavaScript Document
//	$(document).ready(function(){
//		$('body').on('click',function(){
//			alert("I am clicked");
//		});
//	});



function contactData(name) {
	var data = [];
	var validate = false;
	$('#' + name).find('input, textarea, select').each(function (index, value) {
		if ($(this).val() == "" || $(this).val() == null) {
			$(this).css('border', '1px solid red');
			validate = true;
		} else {
			$(this).css('border', '');
			$('#put').append($(this).attr("name").toUpperCase() + " : " + $(this).val() + "<br>");
		}
		data.push({
			[$(this).attr("name")]: $(this).val()
		});
	});
	$('#put').append("<br><br>");
	if (!validate) {
		console.log(data);
		return data;
	}
}



// product page search bar


// end product page search bar


// contact submit button
$(document).on('submit', '#contactform', function(e){
	e.preventDefault();
	alert('Construction going on');
});