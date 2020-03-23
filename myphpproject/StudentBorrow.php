<html>
    <head>
        <title>Student Borrow</title>
        <link rel="stylesheet" href="style.css">
        <style>
            table
            {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 70%;
                margin-left: 2%;
            }
            td, th
            {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            tr:nth-child(even)
            {
                background-color:#17a2b8;
                color: white;
            }
            a
            {
                margin-left: 2%;
            }
        </style>
    </head>
    <body>
        <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container navbar-brand">Library Management System
            </div>
        </div>
        <?php
            require 'connection.php';
            if(isset($_POST['susn']))
            {
                $usn=$_POST['usn'];
                echo "<h2>Books Borrowed :".$usn."</h2>";
        ?>
        <table>
            <tr>
                <th scope="col">Book ID</th>
                <th scope="col">Student USN</th>
                <th scope="col">Date of return</th>
                <th scope="col">Date of issue</th>
            </tr>
        <?php
                $query=mysqli_query($conn,"SELECT * from Borrows_Book where Student_USN='$usn'");
                if($query)
                {
                    while($row=mysqli_fetch_assoc($query))
                    {
                            echo "<tr>";
                            echo "<td>" .$row['Book_id']. "</td>";
                            echo "<td>".$row['Student_USN']."</td>";
                            echo "<td>".$row['Date_of_return']."</td>";
                            echo "<td>".$row['Date_of_issue']."</td>";
                            echo "</tr>";
                    }
                }
            }
        ?>
        </table>
        <br>
        <a class="btn btn-primary" href="SearchBook.php">Done</a>
    </body>
</html>
