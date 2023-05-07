 <?php  
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}

//$seats = $_GET['seats'];
session_start();
$id = $_SESSION['c_id'];
// $seats = $_SESSION['no_of_seats'];


$sql_query = "SELECT `book`.`timing`,`book`.`b_id`,`movie`.`city`,`movie`.`type`,`movie`.`movie_name`,`movie`.`rating`,`movie`.`price`,`theatre`.`theatre_name`,`theatre`.`address` FROM `book`,`movie`,`theatre` WHERE `book`.`c_id` = '$id' and `book`.`t_id`=`theatre`.`t_id` and `book`.`m_id`=`movie`.`m_id`;";
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

    <link rel="stylesheet" href="booking_details1.css">
    <title>Document</title>
</head>

<body style="background-image : url('bg1.jpg'); background-size : cover; background-repeat : no-repeat;  backdrop-filter: blur(0px);">
    <div class="center" style="    background:lightblue">
        <h1 style="    background: rgb(31,37,51);
    color: white;">Booking Details</h1>

        <table class="table" style="border:black">
            <thead>
                <tr>
                    <!-- <th scope="col">sno</th>
                    <th scope="col">Name</th> -->
                    <th scope="col">City</th>
                    <th scope="col">Type</th>
                    <th scope="col">Movie Name</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Theatre Name</th>
                    <th scope="col">Theatre Address</th>
                    <th scope="col">Timing</th>
                    <th scope="col">Price</th>
                    <th scope="col">Cancel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                
                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                ?>  
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['movie_name']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                    <td><?php echo $row['theatre_name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo (new DateTime($row['timing']))->format('Y-m-d H:i:s'); ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="cancel.php?bid=<?php echo $row['b_id']; ?>" > <input type="submit" name="cancel" value="cancel" style="background:rgb(31,37,51)"></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>