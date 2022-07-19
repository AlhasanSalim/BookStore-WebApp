<?php
    include 'layout/include/header.php';
    if (isset($_GET['author'])){
        $author_name = htmlspecialchars($_GET['author']);
    }

?>
<!--    End navbar    -->

    <div class="books">
        <div class="container">
            <div class="author-info bg-secondary text-white p-2 mb-3" style="border-radius: 15px;">
            <span>جميع كتب المؤلف : </span>
            <span><?php echo $author_name; ?></span>
        </div>
            <div class="row">
            <?php
                $sql = "SELECT * FROM books WHERE author_name = '$author_name'";
                $result = mysqli_query($con, $sql);
                while ($getData = mysqli_fetch_array($result)){
                    ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center" style="border-radius: 30px;">
                                <div class="img-cover" style="border-radius: 30px;">
                                    <a href="book.php?id=<?php echo $getData['id'] ?> && category=<?php echo $getData['book_categories'];?>">
                                        <img src="uploads/bookCovers/<?php echo $getData['book_cover']; ?>" alt="Book Cover" class="card-img-top">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="book.php?id=<?php echo $getData['id'];?> && category=<?php echo $getData['book_categories'];?>">
                                            <?php echo $getData['book_title']; ?>
                                        </a>
                                    </h4>
                                    <p class="card-text"> <?php echo mb_substr($getData['book_content'], 0, 150 , "UTF-8"); ?> </p>
                                    <a href="">
                                        <button class="custom-btn" style="border-radius: 30px;">تحميل الكتاب</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                }
              ?>
            </div>
        </div>
    </div>

<!-- Start Footer -->
<?php
include 'layout/include/footer.php';
?>
