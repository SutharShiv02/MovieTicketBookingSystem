<?php
$flag=0;
$failed=1;
if(isset($_POST['save']))
{
$conn = mysqli_connect("localhost","root","","movie_ticket");
if(!$conn)
{
    die("conection failed !!!".mysqli_connect_error());
}
$username1 = $_POST['Username'];
$password1 = $_POST['Password'];
session_start();
$_SESSION['owner_name'] = $username1;
if(isset($_POST['save']))
{
    
    //$sql_query = "INSERT INTO `registrationn` ( `username`, `password`) VALUES ('$username1', '$password1');";
    $sql_query1 = "SELECT `own_id`,`owner_name`, `password` FROM `owner_signup` ;";
    $return1 = mysqli_query($conn,$sql_query1);
    
    while ($row = $return1->fetch_assoc()) {

        if($row['owner_name']==$username1 && $row['password']==$password1)
        {
            $owner_id = $row['own_id'];
            session_start();
            $_SESSION['owner_id'] = $owner_id;
            $flag=1;
            echo"login successfull!!!";
            header('location: /covid/owner_new.php');
            break;
        }
    
    }
    if($flag==0)
    {
        $failed=0;
        //echo"<script> alert('user not exists!!!! sign up first')</script>";
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
    <link rel="stylesheet" href="owner_login.css">
    <title>Owner login</title>
</head>
<body style="background-image : url('bg1.jpg'); background-size : cover; background-repeat : no-repeat;  backdrop-filter: blur(5px);">
    
<div class="center">
        <h1>Owner Login</h1>
        <div class="failed">
                <span>
                <?php
                    if($failed==0)
                    {
                        echo"user not exists!!!! sign up first";
                        $failed = 1;
                    }
                ?>
                </span>

            </div>
        <form action="http://localhost/covid/owner_login.php" method="POST">
            
            <div class="text_field">
                <input type="text"  required name="Username">
                <span></span>
                <label>User</label>
            </div>

            <div class="text_field">
                <input type="password" required  name="Password">
                <span></span>
                <label>password</label>
            </div>
            <div class="pass">forget password?</div>
            <input type="submit" name="save" value="login">
            <div class="signup">
                <!-- Not a member?<input type="submit" name="signup1" value="sign up"> -->
                Not a member?
                <a href="owner_signup_new.php" name="signup1">signup</a>
            </div>
        </form>
    </div>
    <div class="img">
        <!-- <img src="http://localhost/covid/logo_carRental.jpg" alt="not found" width="100px" height="80px"> -->
        
    </div>
</body>
</html>