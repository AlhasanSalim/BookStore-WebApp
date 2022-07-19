<?php
    session_start();
    include "include/connection.php";
    include 'include/header.php';
    if(!isset($_SESSION['adminInfo'])){
        header("Location:index.php");
    }
    else{
          if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $query = "SELECT * FROM books WHERE id='$id'";
            $result = mysqli_query($con, $query);
            $giveData = mysqli_fetch_array($result);
          }
            if (isset($_POST['edit'])){
                $book_title = htmlspecialchars($_POST['book_title']);
                $author_name = htmlspecialchars($_POST['author_name']);
                $book_categories = htmlspecialchars($_POST['book_categories']);
                $book_content = htmlspecialchars($_POST['book_content']);
    
                //Book Cover
                $book_cover = $_FILES['book_cover']['name'];
                $book_cover_tmp =  $_FILES['book_cover']['tmp_name'];
    
                //Book File
                $book = $_FILES['book']['name'];
                $book_tmp = $_FILES['book']['tmp_name'];
    
    
                if ($book_title == null || $author_name == null || $book_categories == null || $book_content == null){
                    $no_value = "<div class='alert alert-danger'>"."الرجاء ملء جميع الحقول أدناه"."</div>";
                    //header("REFRESH:2");
                }
                 elseif ($book_cover == null){
                    $no_value = "<div class='alert alert-danger'>"."الرجاء اختيار صورة مناسبة"."</div>";
                    //header("REFRESH:2");
                }
                 elseif ($book == null) {
                    $no_value = "<div class='alert alert-danger'>"."الرجاء اختيار ملف الكتاب"."</div>";
                    //header("REFRESH:2");
                }
                 else{
                    $book_img = rand(0, 1000)."_".$book_cover;
                    move_uploaded_file($book_cover_tmp, "../uploads/bookCovers/$book_img");
    
                    $book_file = rand(0, 1000)."_".$book;
                    move_uploaded_file($book_tmp, "../uploads/books/$book_file");
    
                    $sql = "UPDATE books SET book_title='$book_title', author_name='$author_name', book_categories='$book_categories', book_cover='$book_cover', book='$book', book_content='$book_content' WHERE id='$id'";
                    $resut = mysqli_query($con, $sql);
                    $is_value = "<div class='alert alert-info'>"."تمت إضافة التعديلات بنجاح"."</div>";
                    header("REFRESH:2");
                    
                }
            }       
        ?>

        <!-- Page Content -->
        <div class="container-fluid">
            <!-- Start new book -->
            <div class="new-book">
                <?php
                    if (isset($no_value)){
                        echo $no_value;
                    } 
                    elseif (isset($is_value)){
                        echo $is_value;
                    }
                ?>
                <form action="edit-book.php?id=<?php echo $giveData['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">عنوان الكتاب</label>
                        <input type="text" id="title" class="form-control" name="book_title" value="<?php echo $giveData['book_title']; ?>" style="width: 450px;">
                    </div>
                    <div class="form-group">
                        <label for="author">  إسم المؤلف</label>
                        <input type="text" id="author" class="form-control" name="author_name" value="<?php echo $giveData['author_name']; ?>" style="width: 450px;">
                    </div>
                    <div class="form-group">
                        <label for="title">التصنيف</label>
                        <select class="form-control" name="book_categories" style="width: 450px;" >
                            <option><?php echo $giveData['book_categories']; ?></option>
                                <?php
                                    $query = "SELECT categoryName FROM categories";
                                    $res = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($res)){
                                        ?>
                                            <option><?php echo $row['categoryName']; ?></option>
                                        <?php
                                    } 
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="img">غلاف الكتاب</label>
                        <input type="file" class="form-control" name="book_cover" style="width: 450px;" value="">
                    </div>
                    <div class="form-group">
                        <label for="img">ملف الكتاب</label>
                        <input type="file" class="form-control" name="book" style="width: 450px;" value="">
                    </div>
                    <div class="form-group">
                        <label for="img">نبذة عن الكتاب</label>
                        <textarea name="book_content" id="" cols="30" rows="5" class="form-control" style="width: 450px;" ><?php echo $giveData['book_content']; ?></textarea>
                    </div>

                    <button name="edit" class="custom-btn">تعديل الكتاب</button>
                </form>
            </div>
            <!-- End new book -->
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

