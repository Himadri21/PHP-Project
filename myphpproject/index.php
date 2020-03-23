<?php
session_start();
$id=$_SESSION["userId"];
if((!empty($_SESSION["userId"])) && ($id == 1)) {
    //require_once '/Applications/XAMPP/xamppfiles/htdocs/myphpproject/AdminPage.php';
    header("Location: AdminPage.php");
    exit;
} else  if((!empty($_SESSION["userId"])) && ($id != 1)){
    header("Location: SearchBook.php");
}
else
{
    require_once '/Applications/XAMPP/xamppfiles/htdocs/myphpproject/login.php';
}
?>
