function signin(){
	$.ajax({
	url: 'php/signin.php',
	type: "POST",
	data: {
		login: $('#signin #login').val(),
		password: $('#signin #password').val()
	},
	success: function(data){
		var source = $.parseJSON(data);
		if(source.success){
			$('#signin').removeClass('active');
			location.reload();
		}
		else{
			$('#signin .message').html(source.message);
			$('#signin #password').val('');
		}
	},
	error: function(e){
		console.log(e);
	}
	});
}

function checkLogin(){
	$('#signin .error').removeClass('error');
	checkInput('#signin #login');
	checkInput('#signin #password');
	if($('#signin .error').length==0) signin();
}