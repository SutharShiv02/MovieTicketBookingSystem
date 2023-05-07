<?php  
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}

session_start();
// $id = $_SESSION['owner_id'];
$city = $_SESSION['city'];
$type = $_SESSION['type'];
$cust_name = $_SESSION['Name'];
$c_id = $_SESSION['c_id'];
$timing = $_SESSION['timing'];
$seats = $_SESSION['no_of_seats'];

$sql_query = "SELECT `movie`.`city` ,`movie`.`type` ,`movie`.`m_id`,`movie`.`movie_name` , `movie`.`DOP` ,`movie`.`price` ,`movie`.`rating` ,`theatre`.`theatre_name`, `theatre`.`t_id`, `theatre`.`no_of_seats` FROM `movie`,`theatre` WHERE `movie`.`city` = '$city' and `movie`.`type` = '$type' and `theatre`.`city` = '$city' and `theatre`.`type` = '$type' and `theatre`.`no_of_seats` >= '$seats'";
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

    <link rel="stylesheet" href="available_movie.css">
    <title>Document</title>
</head>

<body style="background-image : url('t1.jpeg'); background-size : cover; background-repeat : no-repeat;  backdrop-filter: blur(0px);">
    <div class="center" style="background:lightblue">
        <h1 style="    background: rgb(31,37,51);
    color: white;">Available Movies</h1>

        <table class="table" style="border:black">
            <thead>
                <tr>
                    <!-- <th scope="col">sno</th>
                    <th scope="col">Name</th> -->
                    <th scope="col">City</th>
                    <th scope="col">Type</th>
                    <th scope="col">Movie Name</th>
                    <th scope="col">Movie Price</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Added Date</th>
                    <th scope="col">Theatre Name</th>
                    <th scope="col">Book</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                        // $v_id = $row['v_id'];
                        
                ?>
                    <!-- <th scope="row">1</th> -->
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['movie_name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                    <td><?php echo (new DateTime($row['DOP']))->format('Y-m-d H:i:s'); ?></td>
                    <td><?php echo $row['theatre_name']; ?></td>
                    <td><a href="billing.php?mid=<?php echo $row['m_id']; ?>&movie_name=<?php echo $row['movie_name']; ?>&rating=<?php echo $row['rating']; ?>&price=<?php echo $row['price']; ?>&tid=<?php echo $row['t_id']; ?>&theatre_name=<?php echo $row['theatre_name']; ?>&seats=<?php echo $seats; ?>" ><input type="submit" name="book" value="bill" style="background:rgb(31,37,51)"></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>