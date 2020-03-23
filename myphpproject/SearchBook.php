<html>
    <head>
        <title>Searching Book</title>
    </head>
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
            .form
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
            }
            .button
            {
                font-weight: 400;
                color: #343a40;
                text-align: center;
                vertical-align: middle;
                background-color: transparent;
                border: 1px solid transparent;
                font-size: 0.875rem;
                line-height: 1.5;
            }
    </style>
    <body>
        <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container navbar-brand">Library Management System</div>
                <a href="./logout.php" class="logout-button">Logout</a>
        </div>
        <form action="" method="POST" style="margin-top:5rem; margin-left:2rem; margin-bottom: 1rem;">
                <label for="usn" class="col-sm-2">Book Name/Domain </label>
                <input type="text" name='book' class="form" placeholder="Enter Name/Domain">
            <input class="btn btn-primary" type="submit" name="submit" style="margin-left:2%;">
        </form>
        <table>
        <?php
            require 'connection.php';
            if(isset($_POST['submit']))
                {
                    $book=$_POST['book'];
                    $result=mysqli_query($conn,"Select * from Book where (Book_name LIKE '%$book%' OR Domain LIKE '%$book%')");
                    if($result){
                    echo "<tr>
                            <th>Book ID</th>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Domain</th>
                            <th></th>
                          </tr>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" .$row['Book_id']. "</td>";
                        echo "<td>".$row['Book_Name']."</td>";
                        echo "<td>".$row['Author']."</td>";
                        echo "<td>".$row['Domain']."</td>";
                        echo "<td><form action='BorrowBook.php' method='GET'>
                        <input type=hidden name='bid' value=".$row["Book_id"]." >
                        <input type=submit class='button' value=Borrow name='borrow'>
                        </form>
                        </td>
                        </tr>";
                    }
                 }
            }
            else
            {
                $query1=mysqli_query($conn,"Select * from Book");
                if($query1)
                {
                    echo "<tr>
                            <th>Book ID</th>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Domain</th>
                            <th></th>
                          </tr>";
                    while($row=mysqli_fetch_assoc($query1))
                    {
                        echo "<tr>";
                        echo "<td>" .$row['Book_id']. "</td>";
                        echo "<td>".$row['Book_Name']."</td>";
                        echo "<td>".$row['Author']."</td>";
                        echo "<td>".$row['Domain']."</td>";
                        echo "<td><form action='BorrowBook.php' method='GET'>
                        <input type=hidden name='bid' value=".$row["Book_id"]." >
                        <input type=submit class='button' value=Borrow name='borrow' >
                        </form>
                        </td>
                        </tr>";
                    }
                }
            }
        ?>
        </table>
</html>
