<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_page1.css">
    <title>Document</title>
</head>
<body >
    <div class="center">
        <h1>Login</h1>
       
        
        <form action="http://localhost/covid/login_page.php" method="POST">
            <? php
            if($flag==1)
            {
            <p>user not exists!!!</p>
            }
        ?>
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
                Not a member?<input type="submit" name="signup1" value="sign up">
            </div>
        </form>
    </div>
    <div class="img">
        <img src="http://localhost/covid/logo_carRental.jpg" alt="not found" width="600px" height="400px">
    </div>
</body>
</html>