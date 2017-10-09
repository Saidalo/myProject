$('.submit-button').on('click', function(){
	var username = $('input[name=u]').val();
	var password = $('input[name=p]').val();
	$.ajax({url: "?controller=login&action=ajaxSignIn&username=" + username + "&password=" + password, dataType: 'json', success: function(result){
        if(result.status == 'success') {
			$.cookie("login", true, { expires: 7 });
			window.location.replace("?controller=main&action=show");
		} else if(result.status == 'fail') {
			$("#myModal").modal();
		}
    }});
	return false;
})