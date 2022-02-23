<?php 
include('header.php');
include('head_nav.php');
include('side_nav.php');
include('modules/notifyClass.php');
$newnotify = new usernotify;
$id=$_REQUEST['id'];
$result=$newnotify->fetchBook($id);
$row=mysqli_fetch_array($result);
$driver=$newnotify->fetchDriver();

?>

<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">               
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Booking	</h4>
                <form  action="controller/processNotify.php" method="POST" class="form-sample">
                    <p class="card-description">
                      Booking info
                    </p>




                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Full Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" readonly="readonly" value="<?= $row['name']?>"> 
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Patient Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="patient_name" readonly="readonly" value="<?= $row['patient_name']?>"> 
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="date" readonly="readonly" value="<?= $row['date']?>"> 
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mobile No.</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="mobile" readonly="readonly" value="<?= $row['mobile']?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pick Up</label>
                          <div class="col-sm-9">
                            <textarea rows="4" cols="50" name="pickup" id="pickup" class="form-control" <?php if($row['status'] !='Pending') echo "readonly";?>><?= $row['pickup']?> </textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Drop Point</label>
                          <div class="col-sm-9">
                            <textarea rows="4" cols="50" name="drop_point" id="drop_point" class="form-control" <?php if($row['status'] !='Pending') echo "readonly";?>><?= $row['drop_point']?></textarea> 
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Driver</label>
                          <div class="col-sm-9">
                            <select class="form-control" <?php if($row['status'] !='Pending') echo "disabled";?> name="driver" id="driver">
                              <option value=''>Please Select Driver</option>
                            <?php 
                            while ($drive_row=mysqli_fetch_array($driver)) {
                              // print_r($drive_row);exit;
                            ?>
                              <option value="<?php echo $drive_row[0].'|'.$drive_row[1].'|'.$drive_row[2];?>" <?php if($row['driver_id']==$drive_row[0]) echo 'selected';?>><?= $drive_row[1]?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>           
                      <div class="col-md-6">
                        <div class="form-group row">
                          <!-- <label class="col-sm-3 col-form-label">Status</label> -->
                          <div class="col-sm-9" id="status">
                            <!-- <select class="form-control"  name="status" id="status">
                              <option value="Accepted" <?php //if($row['status']=='Accepted') echo 'selected';?>>Accepted</option>
                              <option value="Cancelled" <?php //if($row['status']=='Cancelled') echo 'selected';?>>Cancelled</option> -->
                              <?php if($row['status'] !='Pending')
                              {
                                $cond='disabled';
                              }
                              else{
                                $cond='';
                              }?>
                            <!-- </select> -->
                    <input  type="radio" id="Accepted" name="status" value="Accepted" style="width: 30px; height: 53px;" <?php if($row['status'] =='Accepted') echo "checked";?> <?= $cond?>> &nbsp
                    <label for="Accepted" class="col-sm-3 col-form-label">Accept</label>&nbsp&nbsp
                    <input  type="radio" id="Cancelled" name="status" value="Cancelled" style="width: 30px; height: 53px;" <?php if($row['status'] =='Cancelled') echo "checked";?> <?= $cond?>>&nbsp
                    <label for="Cancelled" class="col-sm-3 col-form-label">Cancel</label><br>
                          </div>
                        </div>
                      </div>                 
                    </div>
                    <?php if($row['status'] == 'Pending')
                    {?>
                     <button type="submit" class="btn btn-primary mb-2" onclick="return checkstatus()">Update</button>
                   <?php }?>
                      </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $id?>">
                    <input type="hidden" name="user_num" value="<?= $row[contact_no]?>">
                    <input type="hidden" name="pagename" value="editbooking">

                  </form>
                </div>
              </div>
            </div>       
          </div>
        </div></strong>

  <script type="text/javascript" src="scripts/booking.js"></script>

  <?php
include('footer.php');
 ?>