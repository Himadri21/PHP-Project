<!DOCTYPE html>
<html>
    <head>
        <title>Student Record</title>
    </head>
    <body>
        <form action="" method="POST">
            Enter Student USN : <input type="text" name='usn'>
            <br>
            <br>
            <input class="submit" type="submit" name="submit">
        </form>
        <br>
        <br>
        <table>
        <?php
            require 'connection.php';
            if(isset($_POST['delete']))
            {
                $bid = $_POST['bid'];
                $usn=$_POST['usn'];
                $query = mysqli_query($conn,"UPDATE Book SET No_of_copies=No_of_copies+1 where Book_id='$bid'");
                $query1=mysqli_query($conn,"DELETE from Borrows_Book where Book_id='$bid' and Student_USN='$usn'");
                $result=mysqli_query($conn,"SELECT BB.Book_id,B.Book_Name,BB.Student_USN,S.Student_Name from Borrows_Book BB,Book B,Student S where BB.Book_id=B.Book_id and BB.Student_USN=S.Student_USN and BB.Student_USN='$usn'");
                if($result){
                echo "<script type='text/javascript'>alert('Book returned successfully!')</script>";
                echo "<tr>
                        <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Student USN</th>
                        <th>Student Name</th>
                        <th></th>
                      </tr>";
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>" .$row['Book_id']. "</td>";
                    echo "<td>".$row['Book_Name']."</td>";
                    echo "<td>".$row['Student_USN']."</td>";
                    echo "<td>".$row['Student_Name']."</td>";
                    echo "<td><form action='' method='POST'>
                    <input type=hidden name='bid' value=".$row["Book_id"]." >
                    <input type=hidden name='usn' value=".$row["Student_USN"]." >
                    <input type=submit value=Return name='return' >
                    </form>
                    </td>
                    </tr>";
                }
            }
            }
            if(isset($_POST['submit']))
            {
                $usn=$_POST['usn'];
                $result=mysqli_query($conn,"SELECT BB.Book_id,B.Book_Name,BB.Student_USN,S.Student_Name from Borrows_Book BB,Book B,Student S where BB.Book_id=B.Book_id and BB.Student_USN=S.Student_USN and BB.Student_USN='$usn'");
                if($result){
                echo "<tr>
                        <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Student USN</th>
                        <th>Student Name</th>
                        <th></th>
                      </tr>";
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>" .$row['Book_id']. "</td>";
                    echo "<td>".$row['Book_Name']."</td>";
                    echo "<td>".$row['Student_USN']."</td>";
                    echo "<td>".$row['Student_Name']."</td>";
                    echo "<td><form action='' method='POST'>
                    <input type=hidden name='bid' value=".$row["Book_id"]." >
                    <input type=hidden name='usn' value=".$row["Student_USN"]." >
                    <input type=submit value=Return name='return' >
                    </form>
                    </td>
                    </tr>";
                }
             }
        }
        ?>
        </table>
    </body>
</html>
