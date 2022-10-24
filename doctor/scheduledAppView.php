<?php include_once("header.php"); ?>

<div class="content-wrapper">
  <?php
  $conn = mysqli_connect("localhost", "root", "", "project");
  $qry = "Select aid, fullname, status, petname, bname, appdate from appointment, breed where appointment.bid = breed.bid and did = '$id' and status = '1'";
  $result = $conn->query($qry);
  $count = mysqli_num_rows($result);
  if ($count > 0) {
    $tbl = "<section class='content'><div class='container-fluid'><div class='row'><div class='col-12'><div class='card'><div class='card-body table-responsive p-0' style='height: 84vh;'><table class='table table-head-fixed text-nowrap'><thead><tr><th>Name</th><th>Pet Name</th><th>Breed</th><th>Date of Appointment</th><th>Status</th><th></th><th></th></tr></thead>";
    while ($row = $result->fetch_assoc()) {
      $aid = $row['aid'];
      $name = $row["fullname"];
      $pname = $row["petname"];
      $bname = $row["bname"];
      $date = $row["appdate"];
      $status = $row["status"];

      if ($status == 0) {
        $status = 'Pending';
      } else if ($status == 1) {
        $status = 'Accepted';
      } else if ($status == 2) {
        $status = 'Declined';
      } else if ($status == 3) {
        $status = 'Done';
      }

      $tbl .= "<tbody><tr><td>$name</td><td>$pname</td><td>$bname</td><td>$date</td><td>$status</td><td><a href='scheduledAppDetails.php?id=$id'><input type='submit' class='view' name='btnView' value='View'></a></td><td><a href='scheduledAppDone.php?id=$aid'><input type='submit' class='done' name='btnDone' value='Done'></a></td></tr></tbody>";

      if (isset($_POST['btnDone'])) {
        $qry = "Update appointment set status='3',vdatetime=now() where aid='$aid' AND did='$did'";
        $result = $cnn->query($qry);
      }
    }
    $tbl .= "</table></div><!-- /.card-body --></div><!-- /.card --></div></div><!-- /.row --></div><!-- /.container-fluid --></section><!-- /.content --></div>";
    echo "<br>" . $tbl;
  } else {
    echo "<h2 style='text-align : center; padding-top: 20px;'>No Appointments Today !!</h2>";
  }
  ?>

  <?php include_once("footer.php"); ?>