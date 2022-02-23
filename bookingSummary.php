<?php 
include('header.php');
include('head_nav.php');
include('side_nav.php');
include('modules/notifyClass.php');
$newnotify = new usernotify;
$result=$newnotify->allnotify();


?>



<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User List</h4>
                  <label class="badge badge-success">Accept</label>
                  <label class="badge badge-danger">Cancel</label>
                  <label class="badge badge-info">Pending</label>
                   <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sl No.</th>
                          <th>Name</th>
                          <th>Phone No.</th>
                          <th>Pick Up</th>
                          <th>Drop Point</th>
                          <th>Date Time</th>
                          <th>Driver</th>
                          <th>View</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($result))
                        {
                        ?>
                        <tr>
                          <td><label class="<?php if($row[status]=='Pending') echo 'badge badge-info'; elseif($row[status]=='Cancelled') echo 'badge badge-danger'; elseif($row[status]=='Accepted') echo 'badge badge-success';?>"><?= $i?></lable></td>
                          <td><?= $row['name']?></td>
                          <td><?= $row['mobile']?></td>
                          <td><?= $row['pickup']?></td>
                          <td><?= $row['drop_point']?></td>
                          <td><?= $row['date']?></td>
                          <td><?= $row['driver_name']?></td>
                          <td style="font-size: 24px;color: #4b49ac;" align="center">
                            <a href="edit_booking.php?id=<?= $row['id']?>"><i class='mdi mdi-view-carousel'></i></a></td>
                          
                          
                        </tr>
                     
                        <?php
                        $i++; 
                      } 
                      ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
                </div>
              </div>
            </div>


  <?php
include('footer.php');
 ?>