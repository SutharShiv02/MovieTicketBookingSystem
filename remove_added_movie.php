<?php  
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}

$mid = $_GET['mid'];

    $sql_query1 = "DELETE FROM `movie` WHERE `movie`.`m_id` = '$mid'";
    $result1 = mysqli_query($conn,$sql_query1);
    // $sql_query = "DELETE FROM `book` WHERE `book`.`v_id` = '$vid'";
    // $result = mysqli_query($conn,$sql_query);
    echo "<script>alert('Deleted successfully!!!')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/covid/added_movie.php">
    <?php
  
mysqli_close($conn);

?>

