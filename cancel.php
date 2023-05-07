<?php  
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}

$bid = $_GET['bid'];
//$seats = $_GET['seats'];
// session_start();
// $seats = $_SESSION['no_of_seats'];

// echo $vid;
// $sql_query = "UPDATE `theatre` INNER JOIN book ON book.t_id = theatre.t_id SET `no_of_seats` = `no_of_seats`+$seats WHERE `book`.`b_id`=$bid;";
// $result = mysqli_query($conn,$sql_query);

$sql_query1 = "DELETE FROM `book` WHERE `book`.`b_id` = '$bid'";
$result1 = mysqli_query($conn,$sql_query1);


if($result1)
{
    echo "<script>alert('cancelled successfully!!!')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/covid/booking_details.php">
    <?php
}
  
mysqli_close($conn);

?>

