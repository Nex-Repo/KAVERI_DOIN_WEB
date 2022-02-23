<?php 
include('header.php');
?>

<?php
include('head_nav.php');
include('side_nav.php');
?>


<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">               
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ADD DRIVER	</h4> <div class="card-title" align="right">
          <!-- <p class="page-header"><input type ="file" name = "UploadFileName" id="file" >
          </i></p> -->
          <a href="Sample/sample.csv"> <button id="myBtn1" class="btn btn-primary " style="margin-top: 30px;"><i class="fa fa-download" align="right" style="font-size:15px"> Download CSV</i></button> </a>
          <!-- <button id="myBtn" class="btn  btn-success rounded-circle" style="margin-top: 30px;"><i class="fa fa-upload" align="right" style="font-size:15px"> Upload CSV</i></button> -->
          <button  class="btn  btn-success " data-toggle="modal" data-target="#exampleModal" style="margin-top: 30px;" ><i class="fa fa-upload" align="right" style="font-size:15px"> Upload CSV</i></button>

          <form method="POST" action="modules/processupload.php" enctype="multipart/form-data">
  
<div class="modal fade modal" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 align="center"  class="modal-title" id="exampleModalLabel">Please select CSV file</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="row">
      <div class="col-lg-10">
      <div class="form-group">
      
      <input type ="file" name = "UploadFileName" id="file" required="required">
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
    <!-- <input type="submit" calss="btn btn-primary" name="submit" value="Upload"> -->
        <button type="submit" class="btn btn-primary" name="submit">Upload</button>
      </div>
    </div>
  </div>
</div>


</div></div></div></form></div>

                <form  action="controller/processDriver.php" method="POST" class="form-sample">
                    <p class="card-description">
                      Personal info
                    </p>




                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Full Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name">
                          </div>
                        </div>
                      </div>






                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Vehicle No</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="vehicle" name="vehicle"/>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 1</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="add1" name="add1" rows="4" cols="50"></textarea>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 2</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="add2" name="add2" rows="4" cols="50"></textarea>
                          </div>
                        </div>
                      </div>
					</div>

					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone No.</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone">
                          </div>
                        </div>
                      </div>






                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alt Mobile</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="mobile" name="mobile"/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="gender">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                      </div>                 
                    </div>

                     <button type="submit" class="btn btn-primary mb-2" onclick="return checkreq()">Submit</button>

                      </div>
                    </div>
                    <input type="hidden" name="page" value="addDriver">
                  </form>
                </div>
              </div>
            </div>       
          </div>
        </div></strong>

  <script type="text/javascript" src="scripts/driver.js"></script>

<script type="text/javascript">
  var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
  <?php
include('footer.php');
 ?>