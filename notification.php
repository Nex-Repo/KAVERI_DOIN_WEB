
<?php 
include('modules/notifyClass.php'); 
$newnotify = new usernotify;

$result=$newnotify->getnotify();
$count=mysqli_num_rows($result);

if($count > 0)
{
// echo "$count";
while($notify=mysqli_fetch_array($result))
{

  $time_elapsed = $newnotify->timeAgo($notify['date']); 


?>




  <a href="controller/processNotify.php?pagename=notification" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New Booking</h6>
                  <p class="font-weight-normal small-text mb-0 ">
                    <b>pickup:</b><?= $notify['pickup']?> <b>drop:</b><?= $notify['drop_point']?>
                  </p>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    <?= $time_elapsed?>
                  </p>
                </div>
  </a>

<?php
}
}
else
{
  echo "<script>document.getElementsByClassName('count-indicator').className='nav-link dropdown-toggle'</script>";
  echo "<div class='dropdown-item preview-item'><p class='font-weight-light small-text mb-0 text-muted'>
          No New Notification
                  </p></div>";
}
echo "<input type='hidden' name='pagename' value='notification'>";
?>  
