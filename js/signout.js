function signout(){
	$.ajax({
	url: 'php/session/endSession.php',
	type: "POST"
	});
	
	location.reload();
}