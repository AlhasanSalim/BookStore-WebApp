<?php 
   session_start();
   include "include/connection.php"; 
   //Check if SESSION isset
   if (isset($_SESSION['adminInfo'])){
     header("Location:dashboard.php");
   }
   else{
   
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>تسجيل الدخول</title>
            <!-- Bootstrap and Bootstrap Rtl -->
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/bootstrap-rtl.css">
            <!-- Custom css -->
            <link rel="stylesheet" href="css/dashboard.css">

        <style>
          .login{
            width: 300px;
            margin: 80px auto;
            font-family: janna lt;
          }
          .login h5{
            color: #555;
            margin-bottom: 30px;
            margin-top: 10px;
            text-align: center;
          }
          .login button{
            margin-right: 80px;
            padding: 5px;
            width: 140px;
            background: #00b593;
            border: 1px solid #00b593;
            color: #fff;
          }
        </style>

        </head>

        <h>

          <div class="login">
        <!-- Log to dashboard  -->
          <?php
            if (isset($_POST['log'])){
              $adminInfo = $_POST['adminInfo'];
              $adminPassword = $_POST['password'];

              //Check if iputs not empty

              if (empty($adminInfo) || empty($adminPassword)){
                echo "<div class='alert alert-danger'>"."الرجاء ملء الحقول أدناه"."</div>";
                header("REFRESH:2");
              }
              //Check if value at textInput same at Database
              else{
                $query = "SELECT * FROM admin WHERE ( adminName='$adminInfo' OR adminEmail='$adminInfo') AND adminPassword='$adminPassword'";
                $result = mysqli_query($con,$query);
                $row = mysqli_num_rows($result);

                if($row > 0){
                  $_SESSION['adminInfo'] = $adminInfo;
                  header("Location:dashboard.php");
              }
              else{
                echo "<div class='alert alert-danger'>"."البيانات غير متطابقة الرجاء المحاولة مرة أخرى"."</div>";
              }
            }
          }
          ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <h5>تسجيل الدخول</h5>
              <div class="form-group">
                <label for="mail"> إسم المستخدم أو البريد الإلكتروني</label>
                <input type="text" class="form-control"  id="mail" name="adminInfo"/>
              </div>
              <div class="form-group">
                <label for="pass">كلمة السر</label>
                <input type="password" class="form-control"  id="pass" name="password"/>
              </div>
              <button class="custom-btn" name="log">تسجيل الدخول</button>
            </form>
          </div>

          <?php
            include 'include/footer.php';
          ?>
  <?php
   }
  ?>
  
