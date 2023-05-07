<?php  
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}

session_start();
$id = $_SESSION['owner_id'];

$sql_query = "SELECT * FROM `movie` WHERE `owner_id` = '$id'";
$result = mysqli_query($conn,$sql_query);
    mysqli_close($conn);

?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="added_movie.css">
    <title>Document</title>
</head>

<body style="background-image : url('t1.jpeg'); background-size : cover; background-repeat : no-repeat;  backdrop-filter: blur(1px);">
    <div class="center" style="background : lightblue">
        <h1 style = "display: flex;
    background: rgb(31,37,51);
    color: white;
    text-align: center;
    height: 11vh;
    justify-content: center;
    align-content: center;
    align-items: center;">Movie Details</h1>

        <table class="table" style="border-color:black">
            <thead>
                <tr>
                    <!-- <th scope="col">sno</th>
                    <th scope="col">Name</th> -->
                    <th scope="col">Type</th>
                    <th scope="col">Movie Name</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Price</th>
                    <th scope="col">Added Date</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                
                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                ?>  
                    <!-- <th scope="row">1</th> -->
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['movie_name']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo (new DateTime($row['DOP']))->format('Y-m-d H:i:s'); ?></td>
                    <td><a href="remove_added_movie.php?mid=<?php echo $row['m_id']; ?>" ><input type="submit" name="cancel" value="Remove"></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>