<?php
    include 'layout/include/header.php';
?>
<!-- Start banar  -->
<div class="banar">
    <div class="overlay"></div>
    <div class="lib-info text-center">
        <h4>حمّل عشرات الكتب مجاناً </h4>
        <p>من أجل نشر المعرفة والثقافة، وغرس حب القراءة بين المتحدثين باللغة العربية</p>
    </div>
</div>
<!-- End banar -->

<!-- Start Books -->
<div class="books">
    <div class="container">
        <div class="row">
            <?php
                $mysql = "SELECT * FROM books ORDER BY id DESC";
                $res = mysqli_query($con, $mysql);
                if (mysqli_num_rows($res) > 0){
                    while ($row = mysqli_fetch_array($res)){
                        ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card text-center" style="border-radius: 30px;">
                                    <div class="img-cover" style="border-radius: 30px;">
                                        <a href="book.php?id=<?php echo $row['id']; ?> && category=<?php echo $row['book_categories']; ?>">
                                            <img src="uploads/bookCovers/<?php echo $row['book_cover']; ?>" alt="Book Cover" class="card-img-top">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['book_categories']; ?>"><?php echo $row['book_title']; ?></a>
                                        </h4>
                                        <p class="card-text"> <?php echo mb_substr($row['book_content'], 0, 150, "UTF-8"); ?> </p>
                                        <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['book_categories']; ?>">
                                            <button class="custom-btn" style="border-radius: 30px;">تحميل الكتاب</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }
                else{
                    ?>
                        <div class="text-center">
                            لا توجد أي كتب في قاعدة البيانات
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
    </div>
</div>
<!-- End Books -->

<!-- Start Footer -->
<?php
include 'layout/include/footer.php';
?>
