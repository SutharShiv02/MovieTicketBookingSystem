<?php  
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}
$flag = 0;
$flag1 = 1;
$failed = 0;
$discounted = 0;
$valid_once = 0;
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
$theatre_name = $_GET['theatre_name'];
$seats = $_GET['seats'];

session_start();
$city = $_SESSION['city'];
$type = $_SESSION['type'];
$cust_name = $_SESSION['Name'];
$c_id = $_SESSION['c_id'];
$timing = $_SESSION['timing'];

// session_start();
$_SESSION['m_id'] = $mid;
$_SESSION['movie_name'] = $movie;
$_SESSION['rating'] = $rating;
$_SESSION['price'] = $price;
$_SESSION['tid'] = $tid;
$_SESSION['theatre_name'] = $theatre_name;
$_SESSION['seats'] = $seats;

// $timestampstart = strtotime($startdate);
// $timestampend = strtotime($enddate);
// $sec = $timestampend-$timestampstart;
// $days = (int)($sec/86400);
$subtotal = $price*$seats;
$tax = $subtotal*0.05;
$pre_total = $tax+$subtotal;
$total = $tax+$subtotal;


if(isset($_POST['apply']))
{

    $coupon = $_POST['coupon'];
    $_SESSION['coupon'] = $coupon;
    $sql_query = "SELECT `discount_name`,`discount_percent` FROM `discount_list`;";
    $result = mysqli_query($conn,$sql_query);
    while ($row = $result->fetch_assoc()) {
        if(($row['discount_name'])==$coupon && $coupon != "NEWUSER50")
        {
            $flag = 1;
            if((($row['discount_percent'])*0.01*$pre_total)<100)
            {
                $total = $pre_total-($row['discount_percent'])*0.01*$pre_total;
                $discounted = ($row['discount_percent'])*0.01*$pre_total;
            }
            else
            {
                $total = $pre_total-100;
                $discounted = 100;
            }
        }
        else if(($row['discount_name'])==$coupon && $coupon == "NEWUSER50")
        {
            $sql_query1 = "SELECT `discount_name`,`customer_id` FROM `customer_discount`;";
            $result1 = mysqli_query($conn,$sql_query1);
            while ($row = $result1->fetch_assoc()){
                if(($row['customer_id'])==$c_id && ($row['discount_name'])==$coupon)
                {
                    $flag1 = 0;
                    $valid_once = 1;
                }
            }
            if($flag1 != 0)
            {
                $flag = 1;
                if((0.5*$pre_total)<100)
                {
                    $total = $pre_total-0.5*$pre_total;
                    $discounted = 0.5*$pre_total;
                }
                else
                {
                    $total = $pre_total-100;
                    $discounted = 100;
                }
            }
        }
    }
    if($flag == 0)
    {
        $failed = 1;
    }


    //  $coupon = $_POST['coupon'];
    // if($coupon == "NEWUSER50")
    // {
    //     if((0.5*$pre_total)<500)
    //     {
    //         $total = $pre_total-0.5*$pre_total;
    //     }
    //     else
    //     {
    //         $total = $pre_total-500;
    //     }
    //     $flag = 1;
    // }
    // else
    // {
    //     $flag1 = 2;
    // }
}
$_SESSION['total'] = $total; 
$_SESSION['flag'] = $flag;

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
    <!-- <title>Bootstrap Example</title> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="billing.css">
    <title>Document</title>
</head>

<body
    style="background-image : url('bg1.jpg'); background-size : cover; background-repeat : no-repeat;  backdrop-filter: blur(5px);overflow:scroll;">

    <div class="marginn" style="height:30px;"></div>

    <!-- old billing -->
    <div class="center" style="background:#ffebeb">
        <h1 style="border:black;color:darkblue  "><b style="font-size: xx-large;">INVOICE</b></h1>
        <p><?php echo "<b>Time: </b>".date("h:i:s A")?></p>
        <p><?php echo "<b>Date: </b>".date("d/m/y")?></p>
        <table class="table" style="border:black"> 
            <thead>
                <tr>
                    <th scope="col">Movie Name</th>
                    <th scope="col">Theatre Name</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Timing</th>
                    <th scope="col">No of Seats</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $movie; ?></td>
                    <td><?php echo $theatre_name; ?></td>
                    <td><?php echo $rating; ?></td>
                    <td><?php echo (new DateTime($timing))->format('Y-m-d H:i:s'); ?></td>
                    <td><?php echo $seats; ?></td>
                    <td><?php echo "₹".$price; ?></td>
                    <td><?php echo "<font color=darkblue size='4pt'><b>₹$subtotal</b></font>"; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="subtotal"  style="color:darkgreen;">Sub Total : <span style="color:grey;"><?php echo "₹".$subtotal; ?></span></div>
        <div class="tax" style="color:darkgreen;">Tax(5%) : <span style="color:grey;"><?php echo "₹".$tax; ?></span></div>
        <?php
            if($flag == 0)
            {
        ?>
        <div class="total" style="color:darkblue">Gross Total : <span style="color:grey;"><?php echo "₹".$pre_total; ?></span></div>
        <?php
            }
            else if($flag == 1)
            {
        ?>
        <div class="total" style="color:darkblue;">Gross Total : <span
                style="text-decoration: line-through;color:grey"><?php echo "₹".$pre_total; ?></span><span style="color:grey;"><?php echo " ₹".$total; ?></span>
            <div class="para" style="color:darkorange">You save ₹<?php echo $discounted ?> on this booking</div>
        </div>
        <?php
            }
            if($valid_once == 1)
            {
        ?>
        <div class="total">
            <div class="para" style="color:darkblue">Valid only once per User</div>
        </div>
        <?php
            }
        ?>
        <?php 
            if($failed == 1)
            {
        ?>
        <div class="total">
            <div class="para" style="color:darkblue">Coupon doesn't exist</div>
        </div>
        <?php
            }
        ?>


        <div class="container h-screen flex justify-center items-center" style="position: relative;height: auto;">
            <div class="relative">
                <form method="POST">
                    <input type="text" class="h-14 w-96 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                        name="coupon" required placeholder="COUPON CODE" style="max-width: 100vw;
    width: 68vw;">
                    <div class="absolute top-2 right-2">

                        <input type="submit" name="apply" value="Apply"
                            style="height:45px;width:130px;position: relative;left: -41px;">

                    </div>
                </form>
            </div>
        </div>

        <div class="flex justify-center">
            <!-- <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">50% OFF CODE : NEWUSER50</h5>
                <p class="text-gray-700 text-base mb-4">
                    New User Only<br>
                    Maximum discount upto ₹100 on this Rent
                    TERMS AND CONDITIONS APPLY
                </p>
            </div> -->
        </div>
        <div>
        <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm" style="    width: 68vw;
    /* background: blue; */
    /* color: grey; */
    max-width: 100vw;">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2" style="color:green">15% OFF USING : MOVIE15</h5>
                <!-- <p class="text-gray-700 text-base mb-4"> -->
                    <p style="font-family:roboto;font-weight:bolder">Maximum discount upto ₹100 on this BOOKING</p>
                    <p style="font-family:roboto;font-size:10px"><sup>*</sup>TERMS AND CONDITIONS APPLY</p>
                <!-- </p> -->
            </div>
        </div>
        </div>

        <div class="btn">
            <a
                href="book.php?mid=<?php echo $mid; ?>&movie_name=<?php echo $movie; ?>&rating=<?php echo $rating; ?>&price=<?php echo $price; ?>&tid=<?php echo $tid; ?>&seats=<?php echo $seats; ?>"><input
                    type="submit" name="book" value="book">
        </div>

    </div>
    <div class="marginn" style="height:30px;"></div>
        

</body>

</html>