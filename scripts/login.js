function check() {
	var msg='';

	if (document.getElementById('username').value.length == 0) 
	{
		msg +='Please enter the Username \n';
	}


	if (document.getElementById('password').value.length == 0) 
	{
		msg +='Please enter the Password \n';
	}

	if(msg.length ==0)
	{
		// alert('here');
		return true;
	}
	else{
		alert(msg);
		return false;
	}
}