<?php
$flag = 0;
session_start();
$Name = $_SESSION['owner_name'];
$owner_id = $_SESSION['owner_id'];
if(isset($_POST['book']))
{
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}
// $city = $_POST['city'];
// $type = $_POST['type'];
// $Startdate = $_POST['Startdate'];
// $Enddate = $_POST['Enddate'];

// if(isset($_POST['book']))
// {
    
//     $sql_query = "INSERT INTO `rent_vehicle_customer` (`Name_id`,`city`,`name`, `type`, `Startdate`, `Enddate`) VALUES ('$c_id','$city','$Name','$type','$Startdate','$Enddate');";
//     mysqli_query($conn,$sql_query);
//     $flag =1;
//     //echo"<script> alert('booked successfull!!!')</script>";
//     mysqli_close($conn);
// }
}
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
    <link rel="stylesheet" href="customer.css">
    <title>Customer main page</title>
</head>

<body>

    <div class="CSMS">
        <h1>Movie ticket booking system</h1>
    </div>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
                echo"Hi, $Name";
            ?>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/covid/provide_vehicle.php">Add a Movie</a></li>
            <li><a class="dropdown-item" href="/covid/added_vehicles.php">provided theatre</a></li>
            <li><a class="dropdown-item" href="/covid/logout.php">logout</a></li>
        </ul>
    </div>

    <div class="flex">
        <a class="home" href="">Home</a>
        <a class="contact" href="\covid\contact1.html">Contact</a>
        <a class="AboutUs" href="">AboutUs</a>
        <a class="Blog" href="">Blog</a>
    </div>

    <div class="img">
        <img src="http://localhost/covid/logo_carRental.jpg" alt="not found" width="250px" height="170px">
    </div>


    <!-- <div class="center">
        <h1>Rent a Vehicle</h1>
        <div class="failed">
            <span>
                <?php
                    if($flag==1)
                    {
                        echo"Booked successfully!!!";
                    }
                ?>
            </span>

        </div>
        <form action="http://localhost/covid/customer.php" method="POST">

            <div class="selectlocation">
                <span class="label">CITY: </span>
                <select name="city" id="">
                    <option value="Bangalore">Bangalore</option>
                    <option value="Chennai">Chennai</option>
                </select>
            </div>
            <div class="selectvehicle">
                <span class="label">TYPE: </span>
                <select name="type" id="">
                    <option value="car">car</option>
                    <option value="bike">bike</option>
                </select>
            </div>
            <div class="startdate">
                <span class="label">Choose Start Date: </span>
                <input type="datetime-local" id="meeting-time" name="Startdate" value="2018-06-12T19:30"
                    min="2020-06-07T00:00" max="2023-06-14T00:00">
            </div>
            <div class="enddate">
                <span class="label">Choose End Date: </span>
                <input type="datetime-local" id="meeting-time" name="Enddate" value="2018-06-12T19:30"
                    min="2020-06-07T00:00" max="2023-06-14T00:00">
            </div>
            <div class="amount">
                <span class="label">Price: </span>

                <span class="show"> $418/KM</span>
            </div>
            <input type="submit" name="book" value="Book">
    </div>
    </form>
    </div> -->
</body>

</html>