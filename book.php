<?php
    include 'layout/include/header.php';
    if (isset($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);
    }
        
?>

<!-- Start show book -->
<div class="books">
    <div class="container">
        <div class="book">
            <div class="row">
                <?php
                    $query = "SELECT * FROM books WHERE id='$id'";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($result);    
                ?>
                <div class="col-md-4">
                    <div class="book-cover" style="border-radius: 30px;">
                        <img src="uploads/bookCovers/<?php echo $row['book_cover']; ?>" alt=" Book cover">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="book-content">
                        <h4> <?php echo $row['book_title']; ?> </h4>
                        <br>
                        <h5>المؤلف : <a href="author.php?author=<?php echo $row['author_name']; ?>"><?php echo $row['author_name']; ?></a></h5>
                        <br>
                        <hr>
                        <p><?php echo $row['book_content']; ?></p>
                        <button class="custom-btn" style="width: 160px; border-radius: 30px;">
                            <a href="uploads/books/<?php echo $row['book']; ?>" download>تحميل الكتاب</a>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End show book -->

<!-- Start Related Books -->
<div class="related-books">
    <div class="container">
        <h4>كتب ذات صلة</h4>
        <hr>
        <div class="row">
            <?php
                if (isset ($_GET['category'])){
                    $id = intval($_GET['id']);
                    $book_categories = htmlspecialchars($_GET['category']);
                }
                $query = "SELECT * FROM books WHERE book_categories = '$book_categories' && id != '$id'";
                $res = mysqli_query($con, $query);
                while ($getSameBooks = mysqli_fetch_array($res)){
                    ?>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="related-book text-center" style="border-radius: 30px;">
                                <div class="cover" >
                                    <a href="book.php?id=<?php echo $getSameBooks['id'];?> && category=<?php echo $getSameBooks['book_categories'];?>">
                                        <img src="uploads/bookCovers/<?php echo $getSameBooks['book_cover'];?>" alt="Book Cover" style="border-radius: 30px;">
                                    </a>
                                </div>
                                <div class="title">
                                    <h5>
                                        <a href="book.php?id=<?php echo $getSameBooks['id'];?> && category=<?php echo $getSameBooks['book_categories'];?>"><?php echo $getSameBooks['book_title']; ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>                   
                    <?php
                }
            ?>
         </div>
    </div>
</div>
<!-- End Related Books -->

<!-- Start Footer -->
<?php
include 'layout/include/footer.php';
?>
