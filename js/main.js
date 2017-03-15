function loadCountries(){
	$('#signup #country').empty();
	$('#signup #country').append("<option value=''>Choose the country</option>");
	$('#signup .popupBox').addClass('loading');
	
	$.ajax({
		url: 'php/countries.php',
		type: "POST",
		success: function(data){
			var source = $.parseJSON(data);
			
			for(var i=0; i<source.length; i++){
				$('#signup #country').append("<option value='"+source[i].id+"'>"+source[i].country+"</option>");
			}
			$('#signup .popupBox').removeClass('loading');
		},
		error: function(e){
			console.log(e);
		}
		});	
}

function showPopup(id){
	$(id).addClass('active');
	$(id+' input').val('');
	$(id+' select').val('');
	$(id+' .message').html('');
	$(id+' .error').removeClass('error');
}

function clearPopups(e){
	if($(e.target).hasClass('popup'))
		$(e.target).removeClass('active');
}

function checkInput(inp){
	if($(inp).val()==''){
		$(inp).addClass('error');
	}
}