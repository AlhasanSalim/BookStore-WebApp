<?php
    session_start();
    include "include/connection.php";
    include 'include/header.php';
    if(!isset($_SESSION['adminInfo'])){
        header('Location:index.php');
    }
    else{
        ?>
            <!-- Page Content -->


            <!-- Fetch categoryName from database by id -->
            <?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];

                    $query = "SELECT * FROM categories WHERE id='$id'";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($result);

                }
            ?>

            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST"){
                     $edit_category = $_POST['edit_category'];
                     if (empty($edit_category)){
                         $no_edit = "<div class='alert alert-danger'>"."الرجاء ملء الحقل أدناه"."</div>";
                         header("REFRESH:2");
                     }
                     else{
                        $sql = "UPDATE categories SET categoryName='$edit_category' WHERE id='$id'";
                        $res = mysqli_query($con, $sql);
                        header("Location:categories.php");
                        exit();

                     }
                    
                }
            ?>

            <div class="container-fluid">
                <div class="edit-cat">
                <?php
                    if (isset($no_edit)){
                        echo $no_edit;
                    }
                ?>
                    <form action="edit-cat.php?id=<?php echo $row['id']; ?>" method="POST">
                        <div class="form-group">
                            <label for="cat">تعديل التصنيف</label>
                            <input type="text" class="form-control" id="cat" value="<?php echo $row['categoryName']; ?>" name="edit_category" style="width: 450px;">
                        </div>
                        <button class="custom-btn" name="edit">تعديل</button>
                    </form>
                </div>
            </div>
            <?php
            include 'include/footer.php';
            ?>
    <?php
    } 
    ?>            
