<?php include_once("header.php"); ?>

  <div class="content-wrapper">
    <?php
      $conn = mysqli_connect("localhost", "root", "", "project");
      $qry = "Select * from pcategory";
      $result = $conn -> query($qry);
      $tbl = "<section class='content'><div class='container-fluid'><div class='row'><div class='col-12'><div class='card'><div class='card-body table-responsive p-0' style='height: 84vh;'><table class='table table-head-fixed text-nowrap'><thead><tr><th>Name</th><th></th><th></th></tr></thead>";
      while ($row = $result->fetch_assoc()) {
        $id = $row["pcatid"];
        $name = $row["pcname"];
        $tbl .= "<tbody><tr><td>$name</td><td><a href='productCategoryUpdate.php?id=$id'><input type='submit' class='update' name='update'value='Update'></a></td><td><a href='productCategoryDelete.php?id=$id'><input type='submit' class='delete' name='delete' value='Delete'></a></td></tr></tbody>";
      }
      $tbl .= "</table></div><!-- /.card-body --></div><!-- /.card --></div></div><!-- /.row --></div><!-- /.container-fluid --></section><!-- /.content --></div>";
      echo "<br>" . $tbl;
    ?>                  
  
<?php include_once("footer.php"); ?>