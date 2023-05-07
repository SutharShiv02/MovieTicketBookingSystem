<?php
$flag = 0;
session_start();
$Name = $_SESSION['Name'];
$c_id = $_SESSION['c_id'];
if(isset($_POST['go']))
{
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}
$city = $_POST['city'];
$type = $_POST['type'];
$timing = $_POST['timing'];
$seats = $_POST['no_of_seats'];


session_start();
$_SESSION['city'] = $city;
$_SESSION['type'] = $type;
$_SESSION['timing'] = $timing;
$_SESSION['no_of_seats'] = $seats;


if(isset($_POST['go']))
{
    
    
    // $sql_query = "INSERT INTO `book` (`customer_name`, `c_id`, `city`, `type`, `Startdate`, `Enddate`) VALUES ('$Name', '$c_id', '$city', '$type', '$Startdate', '$Enddate');";
    // mysqli_query($conn,$sql_query);
    $flag =1;
    //echo"<script> alert('booked successfull!!!')</script>";
    header('location: /covid/available_movie.php');
    mysqli_close($conn);
}
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
    <link rel="stylesheet" href="toBook1.css">
    <title>Customer main page</title>
</head>

<body
    style="background-image : url('t1.jpeg'); background-size : cover; background-repeat : no-repeat;  backdrop-filter: blur(1px);">

    <div class="center" >
        <h1>Book Movie</h1>
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
        <form action="http://localhost/covid/toBook.php" method="POST">

            <!-- <div class="selectlocation">
                <span class="label">CITY: </span>
                <select name="city" id="">
                    <option value="Bangalore">Bangalore</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Hyderabad">Hyderabad</option>
                </select>
            </div> -->

            <div class="flex justify-center" >
            <span class="label" style = "justify-content: center;display: flex;font-size: large;font-weight: bold;" >CITY </span>
                <div class="mb-3 xl:w-96">
                    <select class="form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                     bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="city">
                        <option value="Bangalore">Bangalore</option>
                        <option value="Chennai">Chennai</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Hyderabad">Hyderabad</option>
                        <option value="Delhi">Delhi</option>
                    </select>
                </div>
            </div>


            <!-- <div class="selectvehicle">
                <span class="label">TYPE: </span>
                <select name="type" id="">
                    <option value="car">car</option>
                    <option value="bike">bike</option>
                    <option value="Cycle">Cycle</option>
                </select>
            </div> -->

            <div class="flex justify-center">
            <span class="label" style = "justify-content: center;display: flex;font-size: large;font-weight: bold;" >Screen Type </span>
                <div class="mb-3 xl:w-96">
                    <select class="form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                     bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="type">
                        <option value="2d">2-D</option>
                        <option value="3d">3-D</option>
                        <option value="4k">4K</option>
                        <option value="4kdolbyatmos">4K With Dolby Atmos</option>
                    </select>
                </div>
            </div>


            <div class="text_field">
                <input type="text" required name="no_of_seats">
                <span></span>
                <label>No of Seats</label>
            </div>

            <div class="startdate">
                <span class="label">Choose Timing: </span>
                <input type="datetime-local" id="meeting-time" name="timing" value="<?php echo date('Y-m-d'); ?>"
                    min="2020-06-07T00:00" max="2023-06-14T00:00">
            </div>
            <input type="submit" name="go" value="Search" style="background:RGB(31,37,51)">
    </div>
    </form>
    </div>
</body>

</html>