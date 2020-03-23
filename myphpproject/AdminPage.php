<?php
namespace Phppot;

use \Phppot\Member;

if (! empty($_SESSION["userId"])) {
    require_once __DIR__ . '/Member.php';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if(!empty($memberResult[0]["display_name"])) {
        $displayName = ucwords($memberResult[0]["display_name"]);
    } else {
        $displayName = $memberResult[0]["user_name"];
    }
}
?>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" href="style.css">
<style>
    .link
    {
        margin-left: 2rem;
        display: block;
        margin-bottom: 2.5rem;
    }
</style>
</head>
<body>
    <div>
        <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container navbar-brand">Library Management System</div>
                <a href="./logout.php" class="logout-button">Logout</a>
        </div>
    </div>
    <h2>Admin</h2>
    <div class="dashboard">
            <!--<div class="member-dashboard">Welcome <b><?php echo $displayName; ?></b>, You have successfully logged in!<br>-->
            <p class='link'><a class="btn btn-primary" href="ViewBooks.php">Books</a></p>

            <p class='link'><a class="btn btn-primary" href="ViewFaculty.php">Teachers</a></p>

            <p class='link'><a class="btn btn-primary" href="ViewStudents.php">Students</a></p>
    </div>
</body>
</html>
