<?php
  session_start();
  include "include/connection.php";
  include 'include/header.php';

  if (!isset($_SESSION['adminInfo'])){
    header('Location:index.php');
  }
  else{

      ?>
        <!-- Page Content -->

        <!-- Start Delete Categories -->
        <?php
          if (isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "DELETE FROM categories WHERE id='$id'";
            $delete = mysqli_query($con, $sql);
          }
        ?>
        <!-- End Delete Categories -->
        <?php
          if($_SERVER['REQUEST_METHOD'] == "POST"){
            $categoryName = $_POST['categoryName'];
            if(empty($categoryName)){
              $cat_error = "<div class='alert alert-danger'>"."الرجاء ملء الحقل أدناه"."</div>";
              header("REFRESH:2");
            }
            else{
              $query = "INSERT INTO categories(categoryName)VALUES('$categoryName')";
              $result = mysqli_query($con, $query);
              if(isset($result)){
                $cat_success = "<div class='alert alert-info'>"."تم إضافة التصنيف بنجاح"."</div>";
                header("REFRESH:2");
              }
            }
          }  
        ?>
        <div class="container-fluid">
          <!-- Start categories section -->
          <div class="categories">
            <?php
              if (isset($cat_error)){
                echo $cat_error;
              } 
              if (isset($cat_success)){
                echo $cat_success;
              }
            ?>
            <div class="add-cat">
              <form action="categories.php" method="POST">
                <div class="form-group">
                  <label for="category">إضافة تصنيف</label>
                  <input type="text" id="category" class="form-control" name="categoryName" style="width: 450px;">
                </div>
                <button class="custom-btn">إضافة</button>
              </form>
            </div>
            <div class="show-cat">
              <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">الرقم</th>
                      <th scope="col">عنوان التصنيف</th>
                      <th scope="col">تاريخ الإضافة</th>
                      <th scope="col">الإجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Fetsh categories from database -->
                    <?php
                      if (isset($_GET['page'])){
                        $page = $_GET['page'];
                      }
                      else{
                        $page = 1;
                      }
                      // عدد التصنيفات في كل صفحة
                      $limit = 4;
                      //معادلة حسابية تحسب بداية التصنيات يبدأ من أي رقم وهذا يعتمد على ترتيبهم في قاعدة البيانات 
                      $start = ($page - 1) * $limit;
                      $sql = "SELECT * FROM categories ORDER BY id DESC LIMIT $start, $limit";
                      $result = mysqli_query($con, $sql);
                      $serialNumber = 0;
                      while($row = mysqli_fetch_array($result)){
                        $serialNumber++;
                          ?>
                            <tr>
                              <td><?php echo $serialNumber; ?></td>
                              <td><?php echo $row['categoryName']; ?></td>
                              <td><?php echo $row['categoryDate']; ?></td>
                              <td>
                                  <a href="edit-cat.php?id=<?php echo $row['id'] ?>" class="custom-btn">تعديل</a>
                                  <a href="categories.php?id=<?php echo $row['id']; ?>" class="custom-btn confirm">حذف</a>
                              </td>
                            </tr>
                          <?php
                            }
                          ?>
                  </tbody>
                </table>
                <!--Start Pegination-->
                <?php
                  $query = "SELECT * FROM categories";
                  $result = mysqli_query($con, $query);
                  $total_cat = mysqli_num_rows($result);
                  $total_pages = ceil($total_cat / $limit);
                ?>
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="categories.php?page=<?php if(($page - 1) > 0){echo $page - 1;}else{echo $page = 1;} ?>">السّابق</a></li>
                    <?php
                      for($i = 1; $i <= $total_pages; $i++){
                        ?>
                          <li class="page-item"><a class="page-link" href="categories.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                      }
                    ?>
                    <li class="page-item"><a class="page-link" href="categories.php?page=<?php if(($page + 1) <= $total_pages){echo $page + 1;} else{echo $page = $total_pages;} ?>">التالي</a></li>
                  </ul>
              </nav>
                <!--End Pegination-->
            </div>
          </div>
          <!-- End categories section -->
        </div>
        </div>
        <!-- /#wrapper -->
        <?php
        include 'include/footer.php';
        ?>

  <?php
  }
  ?>      