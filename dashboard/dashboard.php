<?php
  session_start();
  include "include/connection.php";
  include 'include/header.php';
  if (!isset($_SESSION['adminInfo'])){
    header("Location:index.php");
  }
  else{

    ?>
      <!-- Page Content -->
      <div class="container-fluid">
        <div class="content">
          <div class="statistics text-center">
            <div class="row">
              <div class="col-sm-6">
                <div class="statistic">
                  <?php
                    $query = "SELECT id FROM books";
                    $res = mysqli_query($con, $query);
                    $numOfBooks = mysqli_num_rows($res);
                  ?>
                  <h3><?php echo $numOfBooks; ?></h3>
                  <p>عدد الكتب</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="statistic">
                  <?php
                    $sql = "SELECT id FROM categories";
                    $result = mysqli_query($con, $sql);
                    $numOfCategories = mysqli_num_rows($result);
                  ?>
                  <h3> <?php echo $numOfCategories; ?> </h3>
                  <p>عدد التصنيفات</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /#page-content-wrapper -->

      </div>
      <!-- /#wrapper -->
      <?php
      include 'include/footer.php';
      ?>
  <?php
  }
  ?>