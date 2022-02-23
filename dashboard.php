<?php 
include('header.php');
include('head_nav.php');
include('side_nav.php');
include('modules/dashboardClass.php');
$newdash = new dashboard;
$total=$newdash->getTotBooking();
$tot=mysqli_fetch_row($total);
$today=$newdash->getTodayBooking();
$day=mysqli_fetch_row($today);
$vehicle=$newdash->getVehicle();
$vehic=mysqli_fetch_row($vehicle);
$client=$newdash->getClient();
$clint=mysqli_fetch_row($client);
$data=$newdash->getWeekData();
$acc_week=array();
$canc_week=array();
while($row=mysqli_fetch_row($data)){
if($row[2]=='Accepted')
{
  array_push($acc_week,$row[0]);
}
else if($row[2]=='Cancelled')
{
  array_push($canc_week,$row[0]);
}
}
print_r($canc_week);
print_r($acc_week);
?>


    
    
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?= $_SESSION['name']?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Today’s Bookings</p>
                      <p class="fs-30 mb-2"><?= $day[0]?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Total Cancelled Bookings</p>
                      <p class="fs-30 mb-2"><?= $tot[1]?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Bookings</p>
                      <p class="fs-30 mb-2"><?= $tot[0]+$tot[1]?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Vehicles</p>
                      <p class="fs-30 mb-2"><?= $vehic[0]?></p>
                      
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card badge-success">
                    <div class="card-body">
                      <p class="mb-4">Number of Clients</p>
                      <p class="fs-30 mb-2"><?= $clint[0]?></p>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-lg-6 grid-margin grid-margin-lg-0 ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pie chart</h4>
                  <canvas id="doughnutChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Bar chart</h4>
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        
<script type="text/javascript">
  $(function() {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';
  var data = {
    labels: ["2013", "2014", "2014", "2015", "2016", "2017","2018"],
    datasets: [{
      label: 'Accepted',
      data: [10, 19, 3, 5, 2, 3,15],
      backgroundColor: [
        'rgba(54, 162, 235, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(54, 162, 235, 0.5)'
    
      ],
      borderColor: [
      'rgba(54, 162, 235, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(54, 162, 235, 1)'
        
        
      ],
      borderWidth: 1,
      fill: false
    },{label: 'Canc',
      data: [8, 19, 3, 5, 2, 3],
      backgroundColor: [
        // 'rgba(54, 162, 235, 0.5)',
        'rgba(255, 99, 132, 0.5)',
        'rgba(255, 99, 132, 0.5)',
        'rgba(255, 99, 132, 0.5)',
        'rgba(255, 99, 132, 0.5)',
        'rgba(255, 99, 132, 0.5)',
        'rgba(255, 99, 132, 0.5)',
        'rgba(255, 99, 132, 0.5)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(255, 99, 132, 1)'
        
      ],
      borderWidth: 1,
      fill: false}]
  };
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };
  var doughnutPieData = {
    datasets: [{
      data: [<?= $tot[0]?>, <?= $tot[1]?>],
      backgroundColor: [
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 99, 132, 0.5)',

        'rgba(255,99,132,1)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(54, 162, 235, 1)',
        'rgba(255, 99, 132, 0.5)',

        'rgba(255,99,132,1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
      'Accepted',
      'Cancelled'
    ]
  };
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
  
  if ($("#doughnutChart").length) {
    var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

if ($("#barChart").length) {
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: data,
      options: options
    });
  }
});

</script>
 <?php
include('footer.php');
 ?>
