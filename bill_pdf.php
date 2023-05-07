<?php

$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}

session_start();
$city = $_SESSION['city'];
$type = $_SESSION['type'];
$cust_name = $_SESSION['Name'];
$c_id = $_SESSION['c_id'];
$timing = $_SESSION['timing'];
$tid = $_SESSION['tid'];
//from billing.php
$mid = $_SESSION['m_id'];
$movie = $_SESSION['movie_name'];
$rating = $_SESSION['rating'];
$price = $_SESSION['price'];
$seats = $_SESSION['seats'];
// $priceperKM = $_SESSION['priceperKM'];
$total_after = $_SESSION['total'];
$flag = $_SESSION['flag'];
if($flag == 1)
{
    $coupon = $_SESSION['coupon'];
}


// $timestampstart = strtotime($startdate);
// $timestampend = strtotime($enddate);
// $sec = $timestampend-$timestampstart;
// $days = (int)($sec/86400);
$subtotal = $price*$seats;
$tax = $subtotal*0.05;
$total = $tax+$subtotal;


$sql_query5 = "UPDATE `theatre` SET `no_of_seats` = `no_of_seats`-$seats WHERE `theatre`.`t_id` = $tid;";
$result5 = mysqli_query($conn,$sql_query5);

$sql_query = "SELECT `b_id` FROM `book` WHERE `c_id` = '$c_id' AND `m_id` = '$mid' ;";
$result = mysqli_query($conn,$sql_query);
while ($row = $result->fetch_assoc()) {
    $book_id = $row['b_id'];
}

$sql_query1 = "SELECT `owner_id` FROM `movie` WHERE `m_id` = '$mid' ;";
$result1 = mysqli_query($conn,$sql_query1);
while ($row = $result1->fetch_assoc()) {
    $owner_id = $row['owner_id'];
}

// adding to billing table
$sql_query2 = "INSERT INTO `billing` (`book_id`,`amount`,`bill_date`,`owner_id`,`cust_id`) VALUES ('$book_id','$total_after',current_timestamp(),'$owner_id','$c_id');";
$result2 = mysqli_query($conn,$sql_query2);

// adding to customer_discount table
if($flag == 1)
{
$sql_query4 = "SELECT `discount_name` FROM `discount_list`;";
$result4 = mysqli_query($conn,$sql_query4);
while ($row = $result4->fetch_assoc()) {
    if(($row['discount_name'])==$coupon)
    {
        $sql_query3 = "INSERT INTO `customer_discount` (`discount_name`,`customer_id`) VALUES ('$coupon','$c_id');";
        $result3 = mysqli_query($conn,$sql_query3);
    }
}
}
require("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();

$pdf -> SetFont("Arial","",12);
$pdf -> Cell(0,10,"INVOICE-BILL",1,1,'C');

$pdf -> Cell(20,10,"Time : ".date("h:i:s A"),0,0);
$pdf -> Cell(158,10,"#TICKET-ID : ".$book_id,0,1,'R');
$pdf -> Cell(20,5,"Date : ".date("d/m/y"),0,1);

$pdf -> Cell(30,10,"Movie Name",1,0);
$pdf -> Cell(30,10,"Rating",1,0);
// $pdf -> Cell(25,10,"Start Date",1,0);
// $pdf -> Cell(25,10,"End Date",1,0);
$pdf -> Cell(30,10,"No of Seats",1,0);
$pdf -> Cell(30,10,"Price/seats",1,0);
// $pdf -> Cell(30,10,"Price",1,0);
$pdf -> Cell(60,10,"Sub Total",1,1);

$pdf -> Cell(30,10,"$movie",1,0);
$pdf -> Cell(30,10,"$rating",1,0);
// $pdf -> Cell(25,10,"$startdate",1,0);
// $pdf -> Cell(25,10,"$enddate",1,0);
$pdf -> Cell(30,10,"$seats",1,0);
$pdf -> Cell(30,10,"$price",1,0);
// $pdf -> Cell(30,10,"$subtotal",1,0);
$pdf -> Cell(60,10,"$subtotal",1,1);

$pdf -> Cell(182,15,"Sub Total :   Rs.".$subtotal,0,1,'R');
$pdf -> Cell(179.5,1,"Tax :   Rs.".$tax,0,1,'R');
$pdf -> Cell(181.8,15,"Gross Total :   Rs.".$total,0,1,'R');
$pdf -> Cell(179.5,1,"Discount :   Rs.".($total-$total_after),0,1,'R');
$pdf -> Cell(181.5,15,"Net Total :   Rs.".($total_after),0,1,'R');


$pdf->output();

?>