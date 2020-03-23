<?php
    $conn=new mysqli('localhost','root','Haaand@21','Library');
    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
?>
