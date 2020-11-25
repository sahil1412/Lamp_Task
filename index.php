<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Login Form in PHP With Session</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body >

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class=" mt-5">
                    <div class="card-title  text-white mt-5">
                    <img src="logo1.jpg" >
                        <h3 class="text-center py-3">Login  </h3>
                    </div>

                    <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>
                    <?php
                        }
                    ?>

                    <div class="card-body">
                        <form action="process.php" method="post">
                            <input type="text" name="UName" placeholder=" User Name" class="form-control mb-3">
                            <input type="password" name="Password" placeholder=" Password" class="form-control mb-3">
                            <button class="btn btn-success mt-3" name="Login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>