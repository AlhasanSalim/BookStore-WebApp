<?php
    session_start();  
    include "include/connection.php";
    include 'include/header.php';

    if (!isset($_SESSION['adminInfo'])){
      header('Location:index.php');
    }
    else{

    
          ?>

            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->

              <div class="container-fluid">

              <!-- get a store value from database -->
                <?php
                  $query = "SELECT * FROM admin";
                  $result = mysqli_query($con, $query);
                  $row = mysqli_fetch_array($result);

                  $_SESSION['id'] = $row['id']

                ?>

                <!-- Update value at database -->
                <?php
                  if(isset($_POST['edit']) && $_SESSION['id'] == 1){
                    $adminName = $_POST['adminName'];
                    $adminEmail = $_POST['adminEmail'];
                    $adminPassword = $_POST['adminPassword'];

                    if(empty($adminName) || empty($adminEmail) || empty($adminPassword)){
                      echo "<div class='alert alert-danger'>"."الرجاء ملء جميع الحقول أدناه"."</div>";
                    }
                    else{
                      $query = "UPDATE admin SET adminName = '$adminName', 
                                                adminEmail = '$adminEmail',
                                                adminPassword = '$adminPassword' WHERE id = $_SESSION[id]";
                      $result = mysqli_query($con, $query);
                      header("REFRESH:2");
                      exit();                 
                    }            
                  }
                ?>
                <div class="profile">
                    <form action="profile.php" method="POST">
                        <div class="form-group">
                            <label for="name">الإسم</label>
                            <input type="text" class="form-control" id="name" value="<?php echo $row['adminName']; ?>" name="adminName" style="width: 450px;">
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="text" class="form-control" id="email"  value="<?php echo $row['adminEmail']; ?>" name="adminEmail" style="width: 450px;">
                        </div>
                        <div class="form-group">
                            <label for="password"> كلمة السّر </label>
                            <input type="text" class="form-control" id="password"  value="" name="adminPassword" style="width: 450px;">
                        </div>
                        <button class="custom-btn" name="edit">تعديل البيانات</button>
                    </form>
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
