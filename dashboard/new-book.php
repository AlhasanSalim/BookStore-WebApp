<?php
    session_start();
    include "include/connection.php";
    include 'include/header.php';
    if (!isset($_SESSION['adminInfo'])){
        header("Location:index.php");
    }
    else{

        ?>

        <?php
            if (isset($_POST['submit'])){
                $book_title = htmlspecialchars($_POST['book_title']);
                $author_name = htmlspecialchars($_POST['author_name']);
                $book_categories = htmlspecialchars($_POST['book_categories']);
                $book_content = htmlspecialchars($_POST['book_content']);

                // Book Cover
                $book_cover = $_FILES['book_cover']['name'];
                $book_cover_tmp = $_FILES['book_cover']['tmp_name'];

                // Book file
                $book_name = $_FILES['book_name']['name'];
                $book_name_tmp = $_FILES['book_name']['tmp_name'];
                

                if ($book_title == null || $author_name == null || $book_categories == null || $book_content == null){
                    $no_value = "<div class='alert alert-danger'>"."الرجاء ملء جميع الحقول أدناه"."</div>";
                    //header("REFRESH:2");
                }
                elseif ($book_cover == null){
                    $no_value = "<div class='alert alert-danger'>"."الرجاء اختيار صورة مناسبة"."</div>";
                    //header("REFRESH:2");
                }
                elseif ($book_name == null){
                    $no_value = "<div class='alert alert-danger'>"."الرجاء اختيار ملف الكتاب"."</div>";
                    //header("REFRESH:2");
                }
                else{
                    // add book cover
                    $img_send = rand(0, 1000)."_".$book_cover;
                    move_uploaded_file($book_cover_tmp, "../uploads/bookCovers/$img_send");

                    // add book file
                    $file_send = rand(0, 1000)."_".$book_name;
                    move_uploaded_file($book_name_tmp, "../uploads/books/$file_send");

                    $sql = "INSERT INTO books(book_title, author_name, book_categories, book_cover, book, book_content)VALUES('$book_title', '$author_name', '$book_categories', '$book_cover', '$book_name', '$book_content')";
                    $result = mysqli_query($con, $sql);
                    $is_value = "<div class='alert alert-info'>"."تمت إضافة الكتاب بنجاح"."</div>";
                    header("REFRESH:2");
                }
            }
        ?>
            <div class="container-fluid">
                <div class="new-book">
                    <?php
                    /* الرجاء اختيار صورة مناسبة
                    الرجاء ملء جميع الحقول أدناه
                    */
                        if (isset($no_value)){
                            echo $no_value;
                        } 
                        // تمت إضافة الكتاب بنجاح
                        elseif (isset($is_value)){
                            echo $is_value;
                        }
                    ?>
                    <form action="new-book.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title"> عنوان الكتاب :</label>
                            <input type="text" id="title" class="form-control" style="width: 450px;" name="book_title" value="<?php if (isset($book_title)){echo $book_title;} ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">اسم المؤلف :</label>
                            <input type="text" id="title" class="form-control" style="width: 450px;" name="author_name" value="<?php if (isset($author_name)){echo $author_name;} ?>">
                        </div>

                        <div class="form-group">
                            <label for="title"> التصنيف :</label>
                            <select class="form-control" style="width: 450px;"  name="book_categories">
                                <option></option>
                                <?php
                                    $sql = "SELECT categoryName FROM categories";
                                    $result = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_array($result)){
                                        ?>
                                            <option><?php echo $row['categoryName']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="img">غلاف الكتاب</label>
                            <input type="file" class="form-control" style="width: 450px;" name="book_cover">
                        </div>

                        <div class="form-group">
                            <label for="img">ملف الكتاب</label>
                            <input type="file" class="form-control" style="width: 450px;" name="book_name">
                        </div>

                        <div class="form-group">
                            <label for="img">نبذة عن الكتاب :</label>
                            <textarea class="form-control" cols="30" rows="5" style="width: 450px;" name="book_content"><?php if (isset($book_content)){echo $book_content;} ?></textarea>
                        </div>
                        <button name="submit" class="custom-btn">نشر الكتاب</button>
                    </form>
                </div>
            </div>
            <?php
            include 'include/footer.php';
            ?>
<?php
}
?>