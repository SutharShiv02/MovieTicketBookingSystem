<?php  
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}

// session_start();
// $city = $_SESSION['city'];
// $type = $_SESSION['type'];
// $cust_name = $_SESSION['Name'];
// $c_id = $_SESSION['c_id'];
// $startdate = $_SESSION['startdate'];
// $enddate = $_SESSION['enddate'];
// $model = $_SESSION['model_name'];
// $reg = $_SESSION['reg'];
// $base_price = $_SESSION['base_price'];
// $priceperKM = $_SESSION['priceperKM'];

$mid = $_GET['mid'];
$movie = $_GET['movie_name'];
$rating = $_GET['rating'];
$price = $_GET['price'];
$tid = $_GET['tid'];
$seats = $_GET['seats'];

session_start();
$city = $_SESSION['city'];
$type = $_SESSION['type'];
$cust_name = $_SESSION['Name'];
$c_id = $_SESSION['c_id'];
$timing = $_SESSION['timing'];
$seats = $_SESSION['seats'];
$_SESSION['tid'] = $tid;

// session_start();
// $_SESSION['model_name'] = $model;
// $_SESSION['reg'] = $reg;
// $_SESSION['base_price'] = $baseprice;
// $_SESSION['priceperKM'] = $priceperKM;

// echo $vid;
$sql_query1 = "INSERT INTO `book` (`customer_name`, `c_id`, `m_id`, `t_id`,`timing`) VALUES ('$cust_name', '$c_id', '$mid', '$tid','$timing');";
$result1 = mysqli_query($conn,$sql_query1);
// $sql_query = "UPDATE `vehicle` SET `booked` = 'yes' WHERE `vehicle`.`v_id` = '$vid';";
// $result = mysqli_query($conn,$sql_query);



if($result1)
{
    echo "<script>alert('booked successfully!!!')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/covid/bill_pdf.php">
    <?php
}
  
mysqli_close($conn);

?>

