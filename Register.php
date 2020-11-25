<?php
include_once('connection.php');
$query="SELECT * FROM statelist";
$query1="SELECT * FROM districtlist";
$result=mysqli_query($con,$query);
$rslt=mysqli_query($con,$query1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body style="background-color:#f8f9fa">
<br>
 <nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="#">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="welcome1.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="state.php">State</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="district.php">District</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="child.php">Child</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="logout.php?logout">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
<br>
 <?php
    session_start();

    if(isset($_SESSION['User']))
    {
        #echo ' Name : ' . $_SESSION['User'].'<br/>';
        #echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        header("location:index.php");
    }

?>


<div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card  mt-5">
                    <div class="card-title text-white mt-5">
                        <span><a href="child.php"><img class="back-btn"src="back1.jpg"></a></span>
                        <span><h3 class="text-center py-3"> Add Child  </h3></span>
                    </div>

                    

                    <div class="card-body">
                        <form action="process1.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="CName" placeholder="Name" class="form-control-1 mb-3" required> 
                            <select name="Sex" class="form-control-1 mb-3" required>
                                <option value="">Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>                            
                            <input type="text" name="DOB" placeholder="Date of Birth" class="form-control-1 mb-3" required>
                            <input type="text" name="FatherName" placeholder="Father's Name" class="form-control-1 mb-3" required>
                            <input type="text" name="MotherName" placeholder="Mother's Name" class="form-control-1 mb-3" required>
                            <select name="PState" class="form-control-1 mb-3" required>
                               <option value="">State</option>
                               <?php
        while($rows=mysqli_fetch_assoc($result))
        {
      ?>
      <option value="<?php echo $rows['StateName']; ?>"><?php echo $rows['StateName']; ?></option>
<?php
        }
        ?>              </select>

        <select name="District" class="form-control-1 mb-3" required>
           <option value="">District</option>
<?php
        while($row=mysqli_fetch_assoc($rslt))
        {
      ?>
      <option value="<?php echo $row['DistrictName']; ?>"><?php echo $row['DistrictName']; ?></option>
<?php
        }
        ?>

    </select>                
    <input type="file" name="file" id="file" class="form-control-1 mb-3">                                         
                            <button class="btn btn-success mt-3 form-control-1" name="add">Add</button>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>
