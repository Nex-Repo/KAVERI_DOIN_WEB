<?php 
include('header.php');
include('head_nav.php');
include('side_nav.php');
include('modules/userClass.php');
$newuser = new user;
$result=$newuser->getuser();


?>



<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User List</h4>
                   <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sl No.</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Phone No.</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($result))
                        {
                        ?>
                        <tr>
                          <td><?= $i?></td>
                          <td><?= $row['name']?></td>
                          <td><?= $row['address']?></td>
                          <td><?= $row['contact_no']?></td>
                          <td><?= $row['email']?></td>
                          
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