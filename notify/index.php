<audio id="audiobox">
	<source src="notify/notify.mp3" type="audio/mpeg">
	<source src="notify/notify.wav" type="audio/wav">
	<source src="notify/notify.ogg" type="audio/ogg">
</audio>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
	
setInterval(function(){	load();
},10000);
	function load(){
		jQuery.ajax({
			url:'getnotify.php',
			success:function(result){
				var data=jQuery.parseJSON(result);
				if(data.sound=="yes"){

					jQuery('#audiobox')[0].play();
				}
			}
		});
	}
</script>