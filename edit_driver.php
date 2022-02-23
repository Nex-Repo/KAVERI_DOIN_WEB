<?php 
include('header.php');
include('head_nav.php');
include('side_nav.php');
include('/modules/driverClass.php');
$newdriver = new driver;
$id=$_REQUEST['id'];
$result=$newdriver->fetchDriver($id);
$row=mysqli_fetch_array($result);

?>

<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">               
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit DRIVER	</h4>
                <form  action="controller/processDriver.php" method="POST" class="form-sample">
                    <p class="card-description">
                      Personal info
                    </p>




                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Full Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $row['name']?>">
                          </div>
                        </div>
                      </div>






                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Vehicle No</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="vehicle" name="vehicle" value="<?= $row['vehicle']?>"/>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 1</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="add1" name="add1" rows="4" cols="50"><?= $row['address1']?></textarea>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 2</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="add2" name="add2" rows="4" cols="50"><?= $row['address2']?></textarea>
                          </div>
                        </div>
                      </div>
					</div>

					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone No.</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone" value="<?= $row['phone']?>">
                          </div>
                        </div>
                      </div>






                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alt Mobile</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $row['mobile']?>" />
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
                              <option value="Male" <? if($row['gender'] == 'Male') echo "selected"?>>Male</option>
                              <option value="Female" <? if($row['gender'] == 'Female') echo "selected"?>>Female</option>
                            </select>
                          </div>
                        </div>
                      </div>                 
                    </div>

                     <button type="submit" class="btn btn-primary mb-2" onclick="return checkreq()">Update</button>

                      </div>
                    </div>
                    <input type="hidden" name="page" value="editDriver">
                    <input type="hidden" name="id" value="<?= $id?>">

                  </form>
                </div>
              </div>
            </div>       
          </div>
        </div></strong>


  <script type="text/javascript" src="scripts/driver.js"></script>

  <?php
include('footer.php');
 ?>