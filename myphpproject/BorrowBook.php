<!DOCTYPE html>
<html>
    <head>
        <title>Borrow book</title>
        <link rel=stylesheet href="style.css">
        <style>
            form
            {
                margin-top:5rem;
                margin-left:2rem;
                margin-bottom: 1rem;
            }
            .form-input
            {
                width: 30%;
                height:30px;
                padding: 0.25rem 0.7rem;
                font-size: 1.063rem;
                font-weight: 400;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: 0.25rem;
                margin-bottom: 2%;
                display: block;
            }
            .ignore-css
            {
                all:unset;
            }
        </style>
    </head>
    <body>
        <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container navbar-brand">Library Management System
            </div>
        </div>
        <form action="" method="POST">
            <!--<label for="bid">ID</label>
            <select name="bid" id="bid">
                <?php
                /*require 'connection.php';
                $result=mysqli_query($conn,"SELECT * from Book");
                while($row=mysqli_fetch_array($result))
                {
                    $bookid=$row['Book_id'];
                    echo "<option value=".$bookid.">".$bookid."</option>";
                }*/
                ?>
            </select><br>-->

            <label for="usn" class="col-sm-2 col-form-label">Select Student</label>
            <select name='usn' id='usn' class="form-control">
                <?php
                require 'connection.php';
                $resul=mysqli_query($conn,"SELECT * from Student");
                while($row=mysqli_fetch_array($resul))
                {
                    $susn=$row['Student_USN'];
                    $sname=$row['Student_Name'];
                    echo "<option value=".$susn.">".$sname."</option>";
                }
                ?>
            </select><br>
            <label for="bdate" class="col-sm-2">Borrow Date </label>
                <input type="date" name='bdate' class="form-input">
            <label for="rdate" class="col-sm-2">Return Date </label>
                <input type="date" name='rdate' class="form-input">
            <input type="submit" name="submit" class="btn btn-primary">
        </form>
        <?php
            require 'connection.php';
            if(isset($_POST['submit']) && isset($_GET['borrow']))
            {
                $bid=$_GET['bid'];
                $usn=$_POST['usn'];
                $bdate=$_POST['bdate'];
                $rdate=$_POST['rdate'];
                /*$checkQuery=mysqli_query($conn,"SELECT No_of_copies from Book where Book_id='$bid'");
                $row=$checkQuery->fetch_assoc();
                $nc=intval($row['No_of_copies']);
                if(nc>=0)
                {*/
                    $updateQuery=mysqli_query($conn,"INSERT into Borrows_Book VALUES('$bid','$usn','$bdate','$rdate')");
                    if($updateQuery==true)
                    {
                        $update1Query=mysqli_query($conn,"UPDATE Book SET No_of_copies=No_of_copies-1 WHERE Book_id='$bid'");
                        if($update1Query==true)
                        {
                            echo "<script type='text/javascript'>alert('Book issued successfully!')</script>";
                        }
                    }
                    else
                    {
                        echo "<script type='text/javascript'>alert('Cannot issue!')</script>";
                    }
                    $sname=mysqli_query($conn,"Select Student_Name from Student where Student_USN='$usn'");
                    $row=mysqli_fetch_object($sname);
                    $bname=mysqli_query($conn,"Select Book_Name from Book where Book_id='$bid'");
                    $row1=mysqli_fetch_object($bname);
                    echo "<p style='margin-left:2rem;'>".$row->Student_Name." has issued Book ".$row1->Book_Name."</p>";
                    echo "<form action='StudentBorrow.php' method='POST' class='ignore-css'><input type=hidden name='usn' value=".$usn.">";
                    echo "<p style='margin-left:2rem;'>Click here to see all books borrowed by ".$row->Student_Name."<input type='submit' name='susn' class='btn btn-primary' value='More'></form></p>";
                /*}
                else
                    echo "<script type='text/javascript'>alert('Book not available')</script>";*/
            }
        ?>
    </body>
</html>
