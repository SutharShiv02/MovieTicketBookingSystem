<?php
$flag = 0;
$failed  = 1;
if(isset($_POST['register']))
{
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}
$username = $_POST['Username'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$password = $_POST['Password'];
$address = $_POST['address'];
$driving_lic = $_POST['driving_licence'];

if(isset($_POST['register']))
{
    
    $sql_query = "INSERT INTO `customer_signup` (`customer_name`, `address`, `email`, `phone`, `driving_licence`, `password`, `DOJ`) VALUES ('$username', '$address', '$email', '$phone', '$driving_lic', '$password', current_timestamp());";
    $sql_query1 = "SELECT `customer_name`, `password` FROM `customer_signup`";
    $return1 = mysqli_query($conn,$sql_query1);
    $flag=0;
    while ($row = $return1->fetch_assoc()) {

        if($row['customer_name']==$username && $row['password']==$password)
        {
            // echo"<script> alert('user exists!!!')</script>";
            $flag=1;
            break;
        }
    
    }
    if($flag==0)
    {
        $failed = 0;
        mysqli_query($conn,$sql_query);
        echo"<script> alert('registration successfull!!!')</script>";
    }
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
    <link rel="stylesheet" href="signup_page.css">
    <title>Document</title>
</head>
<body >
    <div class="center">
        <h1>Signup</h1>
        <div class="failed">
                <span>
                <?php
                    if($flag==1)
                    {
                        echo"user exists!!!";
                    }
                ?>
                </span>
                <p>
                <?php
                    if($failed==0)
                    {
                        echo"registration successfull!!!";
                    }
                ?>
                </p>

            </div>
        <form action="http://localhost/covid/signup_page.php" method="POST">
         
            <div class="text_field">
                <input type="text" required name="Username">
                <span></span>
                <label>Full Name</label>
            </div>

            <div class="text_field">
                <input type="text" required name="Email">
                <span></span>
                <label>Email</label>
            </div>

            <div class="text_field">
                <input type="text" required name="Phone">
                <span></span>
                <label>Phone</label>
            </div>

            <div class="text_field">
                <input type="text" required name="address">
                <span></span>
                <label>Address</label>
            </div>

            <div class="text_field">
                <input type="text" required name="driving_licence">
                <span></span>
                <label>Driving Lic.</label>
            </div>

            <div class="text_field">
                <input type="password" required name="Password">
                <span></span>
                <label>password</label>
            </div>


            <!-- <div class="pass">forget password?</div> -->
            <input type="submit" name="register" value="register">
            <div class="login">
                Already a member? <a href="login_page.php">login</a>
            </div>
        </form>
    </div>
</body>
</html>