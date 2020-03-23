<html>
    <head>
        <title>View Books</title>
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
            <div class="container navbar-brand">Library Management System</div>
                <a href="./logout.php" class="logout-button">Logout</a>
        </div>
        <h2>Books</h2>
        <table>
            <tr>
                <th scope="col">Book ID</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Publisher</th>
                <th scope="col">No. of Copies</th>
                <th scope="col">Domain</th>
            </tr>
        <?php
            require 'connection.php';
            $query=mysqli_query($conn,"SELECT * from Book");
            if($query)
            {
                while($row=mysqli_fetch_assoc($query))
                {
                        echo "<tr>";
                        echo "<td>" .$row['Book_id']. "</td>";
                        echo "<td>".$row['Book_Name']."</td>";
                        echo "<td>".$row['Author']."</td>";
                        echo "<td>".$row['Publisher']."</td>";
                        echo "<td>".$row['No_of_copies']."</td>";
                        echo "<td>".$row['Domain']."</td>";
                        echo "</tr>";
                }
            }
        ?>
        </table>
        <br>
        <a class="btn btn-primary" href="AddBook.php">Add New</a>
    </body>
</html>
