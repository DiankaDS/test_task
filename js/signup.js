function signup(){
	$.ajax({
	url: 'php/signup.php',
	type: "POST",
	data: {
		email:           $('#signup #email').val(),
		login:           $('#signup #login').val(),
		real_name:       $('#signup #real_name').val(),
		password:        $('#signup #password').val(),
		repeat_password: $('#signup #repeat_password').val(),
		birth_date:      $('#signup #birth_date').val(),
		id_country:      $('#signup #country').val(),
		checkbox:        $('#signup #checkbox').val()
	},
	success: function(data){
		var source = $.parseJSON(data);
		
		if(source.success){
			$('#signup').removeClass('active');
			location.reload();
		}
		else{
			$('#signup .message').html(source.message);
			$('#signup #password').val('');
			$('#signup #repeat_password').val('');
		}
	},
	error: function(e){
		console.log(e);
	}
	});
}

function checkSignup(){
	
	$('#signup .error').removeClass('error');
	
	checkInput('#signup #email');
	checkInput('#signup #login');
	checkInput('#signup #real_name');
	checkInput('#signup #password');
	checkInput('#signup #repeat_password');
	checkInput('#signup #birth_date');
	checkInput('#signup #country');
	
	if($('#signup #password').val() !== $('#signup #repeat_password').val()){
		$('#signup #password').addClass('error');
		$('#signup #repeat_password').addClass('error');
		$('#signup .message').html('Repeat password');
		$('#signup #password').val('');
		$('#signup #repeat_password').val('');
	};
	if($('#checkbox').prop('checked') !== true) {
		$('#checkbox').addClass('error');
		$('#signup .message').html('Please, agree with terms and conditions');
	};
	
	if($('#signup .error').length==0) signup();
}