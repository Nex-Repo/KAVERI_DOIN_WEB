<?php 
include('header.php');
include('head_nav.php');
include('side_nav.php');
include('modules/driverClass.php');
$newdriver = new driver;
$result=$newdriver->getDriver();


?>



<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Driver List</h4>
                   <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sl No.</th>
                          <th>Name</th>
                          <th>Vehicle No.</th>
                          <th>Phone No.</th>
                          <th>Edit / Delete</th>
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
                          <td><?= $row['vehicle']?></td>
                          <td><?= $row['phone']?></td>
                          <td style="font-size: 24px;color: #4b49ac;">
                            <a href="edit_driver.php?id=<?= $row['id']?>"><i class='mdi mdi-tooltip-edit'></i></a><i style="padding-right: 20px !important"></i><a href="delete_driver.php?id=<?= $row['id']?>"><i class=" mdi mdi-delete-forever" style="color: #ff2424;"></i></a></td>
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