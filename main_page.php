
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="main_page1.css">

</head>

<body>
    <div class="CSMS">
        <h1>Movie ticket booking system</h1>
    </div>
    <!-- <form action="http://localhost/covid/main_page.php" method="POST">
    <div class="btn">
        <a class="login" href="\covid\login_page.php">customer-login</a>
        <a class="login" href="\covid\owner_login.php">owner-login</a>
    </div>
    </form> -->

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            login
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/covid/login_page.php">Customer</a></li>
            <li><a class="dropdown-item" href="/covid/owner_login.php">Owner</a></li>
            <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
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
</body>

</html>