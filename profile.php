<?php
include_once('connection.php');
if(isset($_GET['view'])){
    $Id=$_GET['Id'];
    $sql="SELECT * FROM `child` WHERE id=$Id";
    $result=mysqli_query($con,$sql);
        
}
?>
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

<body style="background-color:#f8f9fa">
<br>
 <nav class="navbar navbar-expand-lg navbar-light">
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
<?php
        $rows=mysqli_fetch_assoc($result);
        
      ?>
<div class="text-center-1">
<a href="child.php"><img class="back-btn" src="back1.jpg"></a>
<img src="<?php echo $rows['CImage']; ?>" class="profile-img ">
<div>
<table class="table-1">
  <tbody>
    <tr>
      <th scope="row">Name :</th>
      <td><?php echo $rows['CName']; ?></td>
      <th scope="row">Sex :</th>
      <td><?php echo $rows['Sex']; ?></td>
      <th scope="row">Date of Birth :</th>
      <td><?php echo $rows['DOB']; ?></td>
      
    </tr>
    <tr>
      <th scope="row">Father's Name :</th>
      <td><?php echo $rows['FatherName']; ?></td>
      <th scope="row">Mother's Name :</th>
      <td><?php echo $rows['MotherName']; ?></td>
      <th scope="row">State :</th>
      <td><?php echo $rows['PState']; ?></td>
    </tr>
    <tr>
      <th scope="row">District :</th>
      <td><?php echo $rows['District']; ?></td>
      
    </tr>
    
  </tbody>
</table>
</div>
</div>
  </body>

</html>