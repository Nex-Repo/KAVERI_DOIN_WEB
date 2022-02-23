<?php 
include('header.php');
include('head_nav.php');
include('side_nav.php');
?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">               
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tracker</h4>
               
                <div class="card-body" style="height: 1000px;" id="map"></div>
            </div>
        </div>
    </div>
</div>


    <script>

setInterval(function(){ initMap();
},100000);


      function initMap() {
 
  const api_data=httpGet('https://www.oneqlik.in/pullData/pullDataForUser1?token=eyJfaWQiOiI1ZjNiZGQxMjhlNjA4ZjQ1YmQ5Njk3MDIiLCJlbWFpbCI6Imt1YnVAZ21haWwuY29tIiwicGhuIjoiODk1NDg4NDkzMyIsImZuIjoiS3VidSIsImxuIjoiTG9naXN0aWNzIiwiZW1haWxfdmVyZmkiOnRydWUsInBob25lX3ZlcmZpIjp0cnVlLCJpc0RlYWxlciI6ZmFsc2UsIkRlYWxlcl9JRCI6eyJfaWQiOiI1ZDA0ZDRlZGY0MTU4OTRiYWU3ZDMxZGUiLCJmaXJzdF9uYW1lIjoicHJlY2lzZSB0ZWxlbWF0aWNzIiwibGFzdF9uYW1lIjoiJiB2ZW50dXJlcyBsbHAiLCJlbWFpbCI6Imdwc3dhbGVAZ21haWwuY29tIiwicGhvbmUiOiI4MzE5NDE0OTQzIiwiYWRkcmVzcyI6IkluZG9yZSJ9LCJpc09yZ2FuaXNhdGlvbiI6ZmFsc2UsImdyb3VwcyI6W10sImFjY291bnQiOiJhdHVsMTIzNCIsImV4cCI6MTYyNDk1NzY3Nywic2Nob29sIjoiTkEiLCJzdXBBZG1pbiI6IjVkMDRkNGVkZjQxNTg5NGJhZTdkMzFkZSIsInN0YXR1cyI6dHJ1ZSwiaXNTdXBlckFkbWluIjpmYWxzZSwiaXNPcGVyYXRvciI6ZmFsc2UsImltYWdlRG9jIjpbXSwiZnVlbF91bml0IjoiTElUUkUiLCJyZXBvcnRfcHJlZmVyZW5jZSI6eyJsb2FkaW5nX3VubG9hZGluZ190cmlwIjp7IkFzdGF0dXMiOmZhbHNlLCJSc3RhdHVzIjp0cnVlfSwiYWxlcnRfcmVwb3J0Ijp7IkFzdGF0dXMiOmZhbHNlLCJSc3RhdHVzIjp0cnVlfSwidXNlcl90cmlwX3JlcG9ydCI6eyJBc3RhdHVzIjpmYWxzZSwiUnN0YXR1cyI6dHJ1ZX0sImRyaXZlcl9wZXJmb3JtYW5jZV9yZXBvcnQiOnsiQXN0YXR1cyI6ZmFsc2UsIlJzdGF0dXMiOnRydWV9LCJhY19yZXBvcnQiOnsiQXN0YXR1cyI6ZmFsc2UsIlJzdGF0dXMiOnRydWV9LCJzb3NfcmVwb3J0Ijp7IkFzdGF0dXMiOmZhbHNlLCJSc3RhdHVzIjp0cnVlfSwicG9pX3JlcG9ydCI6eyJBc3RhdHVzIjpmYWxzZSwiUnN0YXR1cyI6dHJ1ZX0sImRpc3RhbmNlX3JlcG9ydCI6eyJBc3RhdHVzIjpmYWxzZSwiUnN0YXR1cyI6dHJ1ZX0sImlnbml0aW9uX3JlcG9ydCI6eyJBc3RhdHVzIjpmYWxzZSwiUnN0YXR1cyI6dHJ1ZX0sInN0b3BwYWdlX3JlcG9ydCI6eyJBc3RhdHVzIjpmYWxzZSwiUnN0YXR1cyI6dHJ1ZX0sInJvdXRlX3Zpb2xhdGlvbl9yZXBvcnQiOnsiQXN0YXR1cyI6ZmFsc2UsIlJzdGF0dXMiOnRydWV9LCJvdmVyc3BlZWRfcmVwb3J0Ijp7IkFzdGF0dXMiOmZhbHNlLCJSc3RhdHVzIjp0cnVlfSwiZ2VvZmVuY2VfcmVwb3J0Ijp7IkFzdGF0dXMiOmZhbHNlLCJSc3RhdHVzIjp0cnVlfSwic3VtbWFyeV9yZXBvcnQiOnsiQXN0YXR1cyI6ZmFsc2UsIlJzdGF0dXMiOnRydWV9LCJ0cmF2ZWxfcGF0aF9yZXBvcnQiOnsiQXN0YXR1cyI6ZmFsc2UsIlJzdGF0dXMiOnRydWV9LCJ0cmlwX3JlcG9ydCI6eyJBc3RhdHVzIjpmYWxzZSwiUnN0YXR1cyI6dHJ1ZX0sImZ1ZWxfY29uc3VtcHRpb25fcmVwb3J0Ijp7IkFzdGF0dXMiOmZhbHNlLCJSc3RhdHVzIjp0cnVlfSwiaWRsZV9yZXBvcnQiOnsiQXN0YXR1cyI6ZmFsc2UsIlJzdGF0dXMiOnRydWV9LCJmdWVsX3JlcG9ydCI6eyJBc3RhdHVzIjpmYWxzZSwiUnN0YXR1cyI6dHJ1ZX0sInNwZWVkX3ZhcmlhdGlvbiI6eyJBc3RhdHVzIjpmYWxzZSwiUnN0YXR1cyI6dHJ1ZX0sImRheXdpc2VfcmVwb3J0Ijp7IkFzdGF0dXMiOmZhbHNlLCJSc3RhdHVzIjp0cnVlfSwiZGFpbHlfcmVwb3J0Ijp7IkFzdGF0dXMiOmZhbHNlLCJSc3RhdHVzIjp0cnVlfX0sImRhc2hib2FyZF9jb2x1bW4iOnsiaWduaXRpb25Mb2NrIjp0cnVlLCJncHNfY29sdW1uIjp0cnVlLCJhY19jb2x1bW4iOnRydWUsInBvd2VyX2NvbHVtbiI6dHJ1ZSwiZ3NtX2NvbHVtbiI6dHJ1ZSwiaWduaXRpb25fY29sdW1uIjp0cnVlLCJleHRfdm9sdCI6ZmFsc2UsImRvb3JfY29sdW1uIjpmYWxzZSwidGVtcF9jb2x1bW4iOmZhbHNlLCJjaGFyZ2luZ19jb2x1bW4iOmZhbHNlfSwibGFuZ3VhZ2VfY29kZSI6ImVuIiwiZGV2aWNlX2FkZF9wZXJtaXNzaW9uIjp0cnVlLCJjdXN0X2FkZF9wZXJtaXNzaW9uIjp0cnVlLCJpYXQiOjE2MjQzNTI4Nzd9');
var data=JSON.parse(api_data);


  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: new google.maps.LatLng(20.5937, 78.9629),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  })

  var infowindow = new google.maps.InfoWindow({})

  var marker, i

  for (i = 0; i < data.devices.length; i++) {
    // alert(data.devices[i].last_location.long)
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(data.devices[i].last_location.lat, data.devices[i].last_location.long),
      icon: "http://maps.google.com/mapfiles/kml/shapes/cabs.png",
      map: map,
    })


    google.maps.event.addListener(
      marker,
      'click',
      (function (marker, i) {
        return function () {
          infowindow.setContent(data.devices[i].Device_Name)
          infowindow.open(map, marker)
        }
      })(marker, i)
    )
  }
}
function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfwo7C7-WLO8GU-bc6WmvqmsF8FKipzuE&callback=initMap">
    </script>
<!--  <script async defer
src=“https://maps.googleapis.com/maps/api/js?key=AIzaSyBSAmO9c7VwTtaFUwUykUmSn9TkEJEuEiw&callback=initMap”>
</script> -->
 <?php
include('footer.php');
 ?>