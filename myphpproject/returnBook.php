<?php
    require 'connection.php';
    if(isset($_POST['return']))
    {
        $bid = $_POST['bid'];
        $usn=$_POST['usn'];
        echo "<h1>$bid</h1>";
        $query = mysqli_query($conn,"UPDATE Book SET No_of_copies=No_of_copies+1 where Book_id='$bid'");
        $query1=mysqli_query($conn,"DELETE from Borrows_Book where Book_id='$bid' and Student_USN='$usn'");
        if($query && $query1)
            echo "<h2>Updated successfully</h2>";
        else
            echo "<h2>Error</h2>";
    }
?>
