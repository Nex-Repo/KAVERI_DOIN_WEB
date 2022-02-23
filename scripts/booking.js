function checkstatus()
{
	// alert(document.getElementsByName('status')[0].checked);
	

	var msg='';

	if (document.getElementById('pickup').value.length == 0) 
	{
		msg +='Please enter the Pick up Point \n';
	}


	if (document.getElementById('drop_point').value.length == 0) 
	{
		msg +='Please enter the Drop Point \n';
	}

	if (document.getElementById('driver').value.length == 0 && document.getElementsByName('status')[0].checked == true) 
	{
		msg +='Please Select Driver if booking is accepted \n';
	}

	
	if(msg.length ==0)
	{
		// alert('here');
		return false;
		// return true;
	}
	else{
		alert(msg);
		return false;
	}
}