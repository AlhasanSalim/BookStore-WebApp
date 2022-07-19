<?php
    session_start();
    include "include/connection.php";
    include 'include/header.php';
    if (!isset($_SESSION['adminInfo'])){
        header("Location:index.php");
    }
    else{

        if (isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $sql = "DELETE FROM books WHERE id='$id'";
            $total = mysqli_query($con, $sql);
        }
        ?>

            <div class="container-fluid">
                <div class="show-books">
                    <?php
                        $sql = "SELECT * FROM books";
                        $result = mysqli_query($con, $sql);
                        $serialNumber = 0;
                    ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">الرقم</th>
                                <th scope="col">عنوان الكتاب</th>
                                <th scope="col">المؤلف</th>
                                <th scope="col">التصنيف</th>
                                <th scope="col">تاريخ الإضافة</th>
                                <th scope="col">الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    while ($allBooks = mysqli_fetch_array($result)){
                                        $serialNumber++;
                                        ?>
                                            <tr>
                                                <td><?php echo $serialNumber; ?></td>
                                                <td><?php echo $allBooks['book_title']; ?></td>
                                                <td><?php echo $allBooks['author_name']; ?></td>
                                                <td><?php echo $allBooks['book_categories']; ?></td>
                                                <td><?php echo $allBooks['book_date']; ?></td>
                                                <td>
                                                    <a href="edit-book.php?id=<?php echo $allBooks['id']; ?>" class="custom-btn">تعديل</a>
                                                    <a href="books.php?id=<?php echo $allBooks['id']; ?>" class="custom-btn confirm">حذف</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            </div>
            <?php
            include 'include/footer.php';
            ?>


        <?php
        }
        ?>
