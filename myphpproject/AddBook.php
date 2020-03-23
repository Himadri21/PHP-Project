<!DOCTYPE html>
<html>
    <head>
        <title>Add Book</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container navbar-brand">Library Management System</a></div>
                <a href="./logout.php" class="logout-button">Logout</a>
        </div>
        <h1>New Entry</h1>
        <div class="container">
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="AddBook.php">Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="AddStudent.php">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="AddFaculty.php">Faculty</a>
            </li>
            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="AddStudent.php">New Student</a>
                <a class="dropdown-item" href="AddBook.php">New Book</a>
                <a class="dropdown-item" href="AddFaculty.php">New Faculty</a>
                </div>
            </li>-->
            </ul>

        <form action="" method="POST">
            <div class="form-group">
                <label for="id" class="col-sm-2 col-form-label">Book ID </label>
                <input type="text" name='id' class="form-control" placeholder="Enter ID">
            </div>
            <div class=form-group>
                <label for="id" class="col-sm-2 col-form-label">Book Name </label>
                <input type="text" name='bname' class="form-control" placeholder="Name">
            </div>
            <div class=form-group>
                <label for="id" class="col-sm-2 col-form-label">Author </label>
                <input type="text" name='auth' class="form-control" placeholder="Author name">
            </div>
            <div class=form-group>
                <label for="id" class="col-sm-2 col-form-label">Publisher </label>
                <input type="text" name='pub' class="form-control" placeholder="Publisher name">
            </div>
            <div class=form-group>
                <label for="id" class="col-sm-2 col-form-label">Number of copies </label>
                <input type="text" name="copies" class="form-control" placeholder="Enter number of copies">
            </div>
            <div class=form-group>
                <label for="id" class="col-sm-2 col-form-label">Domain </label>
                <input type="text" name="dom" class="form-control" placeholder="Enter Domain">
            </div>
            <div class="submit-btn">
                <input class="btn-primary btn" type="submit" name="submit" class="form-control">
            </div>
        </form>
        </div>
        <table>
        <?php
            require 'connection.php';
            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $bname=$_POST['bname'];
                $auth=$_POST['auth'];
                $pub=$_POST['pub'];
                $copies=$_POST['copies'];
                $dom=$_POST['dom'];

                $query=mysqli_query($conn,"INSERT INTO Book VALUES('$id','$bname','$auth','$pub','$copies','$dom')");
                if($query)
                {
                    header("Location:"."ViewBooks.php");
                }
            }
            mysqli_close($conn);

        ?>
        </table>
    </body>
</html>
