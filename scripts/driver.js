function checkreq() {

	var msg='';


	if (document.getElementById('name').value.length == 0) 
	{
		msg +='Please enter the Driver Name \n';
	}


	if (document.getElementById('vehicle').value.length == 0) 
	{
		msg +='Please enter the Vehicle No. \n';
	}

		if (document.getElementById('add1').value.length == 0) 
	{
		msg +='Please enter the Address \n';
	}

		if (document.getElementById('phone').value.length == 0) 
	{
		msg +='Please enter the Phone No. \n';
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

