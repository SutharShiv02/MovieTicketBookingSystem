<?php  
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}

session_start();
$id = $_SESSION['owner_id'];

$sql_query = "SELECT * FROM `theatre` WHERE `owner_id` = '$id'";
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

<body style="background-image : url('t1.jpeg'); background-size : cover; background-repeat : no-repeat;  backdrop-filter: blur(0px);">
    <div class="center">
        <h1 style = "color:rgb(51, 53, 69)">Theatre Details</h1>

        <table class="table">
            <thead>
                <tr>
                    <!-- <th scope="col">sno</th>
                    <th scope="col">Name</th> -->
                    <th scope="col">City</th>
                    <th scope="col">Type</th>
                    <th scope="col">Theatre Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">No of Seats</th>
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
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['theatre_name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['no_of_seats']; ?></td>
                    <td><?php echo (new DateTime($row['DOP']))->format('Y-m-d H:i:s'); ?></td>
                    <td><a href="remove_provided_theatre.php?tid=<?php echo $row['t_id']; ?>" ><input type="submit" name="cancel" value="Remove"></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>