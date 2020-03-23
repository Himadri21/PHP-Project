<!DOCTYPE html>
<html>
    <head>
        <title>Add Student</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!--<h1>New Student Entry</h1>
        <form action="" method="POST">
            Enter Student USN : <input type="text" name='usn'>
            <br>
            Enter Student Name : <input type="text" name='sname'>
            <br>
            Enter Semester : <input type="text" name='sem'>
            <br>
            Enter Department : <input type="text" name='dept'>
            <br>
            Enter Section : <input type="text" name="sec">
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
                <a class="nav-link active" data-toggle="tab" href="AddStudent.php">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="AddFaculty.php">Faculty</a>
            </li>
            </ul>
        </div>
        <form action="" method="POST">
            <div class="form-group">
                <label for="usn" class="col-sm-2 col-form-label">Student USN </label>
                <input type="text" name='usn' class="form-control" placeholder="Enter USN">
            </div>
            <div class=form-group>
                <label for="sname" class="col-sm-2 col-form-label">Student Name </label>
                <input type="text" name='sname' class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                  <label for="sem" class="col-sm-2 col-form-label">Semester</label>
                  <select class="form-control" id="sem" name="sem">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                  </select>
            </div>
            <div class="form-group">
                  <label for="dept" class="col-sm-2 col-form-label">Department</label>
                  <select class="form-control" id="dept" name="dept">
                    <option>CSE</option>
                    <option>ISE</option>
                    <option>ECE</option>
                    <option>EEE</option>
                    <option>MECH</option>
                    <option>CIVIL</option>
                    <option>EIE</option>
                  </select>
            </div>
            <div class="form-group">
                  <label for="sec" class="col-sm-2 col-form-label">Section</label>
                  <select class="form-control" id="sec" name="sec">
                    <option>A</option>
                    <option>B</option>
                  </select>
            </div>
            <div class="submit-btn">
                <input class="btn-primary btn" type="submit" name="submit" class="form-control">
            </div>
        </form>
        <table>
        <?php
            require 'connection.php';
            if(isset($_POST['submit']))
            {
                $usn=$_POST['usn'];
                $sname=$_POST['sname'];
                $sem=$_POST['sem'];
                $dept=$_POST['dept'];
                $sec=$_POST['sec'];

                $query=mysqli_query($conn,"INSERT INTO Student VALUES('$usn','$sname','$sem','$dept','$sec')");
                if($query)
                {
                    header("Location:"."ViewStudents.php");
                }
            }
            mysqli_close($conn);
        ?>
        </table>
    </body>
</html>
