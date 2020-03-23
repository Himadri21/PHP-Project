<!DOCTYPE html>
<html>
    <head>
        <title>Add Book</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!--<h1>Add a new Faculty</h1>
        <form action="" method="POST">
            Enter Faculty id: <input type="text" name='fid'>
            <br>
            Enter Faculty Name : <input type="text" name='fname'>
            <br>
            Enter Email id : <input type="text" name='email'>
            <br>
            <br>
            <input class="submit" type="submit" name="submit">
        </form>-->
        <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container navbar-brand">Library Management System</div>
                <a href="./logout.php" class="logout-button">Logout</a>
        </div>
        <h1>New Entry</h1>
        <div class="container">
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="AddBook.php">Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="AddStudent.php">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="AddFaculty.php">Faculty</a>
            </li>
            </ul>

        <form action="" method="POST">
            <div class="form-group">
                <label for="id" class="col-sm-2 col-form-label">Faculty ID </label>
                <input type="text" name='fid' class="form-control" placeholder="Enter ID">
            </div>
            <div class=form-group>
                <label for="id" class="col-sm-2 col-form-label">Faculty Name </label>
                <input type="text" name='fname' class="form-control" placeholder="Name">
            </div>
            <div class=form-group>
                <label for="id" class="col-sm-2 col-form-label">Email ID </label>
                <input type="text" name='email' class="form-control" placeholder="Email ID">
            </div>
            <div class=submit-btn>
            <input class="btn-primary btn" type="submit" name="submit" class="form-control">
            </div>
        </form>
        <table>
        <?php
            require 'connection.php';
            if(isset($_POST['submit']))
            {
                $fid=$_POST['fid'];
                $fname=$_POST['fname'];
                $email=$_POST['email'];

                $query=mysqli_query($conn,"INSERT INTO Faculty(Faculty_id,Faculty_Name,Email_id) VALUES('$fid','$fname','$email')");
                if($query)
                {
                    header("Location:"."ViewFaculty.php");
                }
            }
            mysqli_close($conn);

        ?>
        </table>
    </body>
</html>
