<html>
    <head>
        <title>View Students</title>
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
                background-color: #17a2b8;
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
            <div class="container navbar-brand">Library Management System</div>
                <a href="./logout.php" class="logout-button">Logout</a>
        </div>
        <h2>Students</h2>
        <table>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email ID</th>
            </tr>
        <?php
            require 'connection.php';
            $query=mysqli_query($conn,"SELECT * from Faculty");
            if($query)
            {
                while($row=mysqli_fetch_assoc($query))
                {
                        echo "<tr>";
                        echo "<td>" .$row['Faculty_id']. "</td>";
                        echo "<td>".$row['Faculty_Name']."</td>";
                        echo "<td>".$row['Email_id']."</td>";
                        echo "</tr>";
                }
            }
        ?>
        </table>
        <br>
        <a class="btn btn-primary" href="AddFaculty.php">Add New</a>
    </body>
</html>
