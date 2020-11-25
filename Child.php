<?php
include_once('connection.php');
mysqli_select_db($con,'pagination');

$results_per_page= 10;

$query="SELECT * FROM child";
$result=mysqli_query($con,$query);
$number_of_result=mysqli_num_rows($result);
$number_of_pages=ceil($number_of_result/$results_per_page);

if(!isset($_GET['page'])){
  $page=1;
}else{
  $page=$_GET['page'];
}
$this_page_first_result=($page-1)*$results_per_page;


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
<div class="add-btn"> 
<button type="button" class="btn btn-success"><a href="register.php">Add Child</a></button>
</div>
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
<div class=" table-center">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Sex</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Father's Name</th>
      <th scope="col">Mother's Name</th>
      <th scope="col">State</th>
      <th scope="col">District</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
        while($rows=mysqli_fetch_assoc($result))
        {
      ?>
    <tr>
      <td><?php echo $rows['CName']; ?></td>
      <td><?php echo $rows['Sex']; ?></td>
      <td><?php echo $rows['DOB']; ?></td>
      <td><?php echo $rows['FatherName']; ?></td>
      <td><?php echo $rows['MotherName']; ?></td>
      <td><?php echo $rows['PState']; ?></td>
      <td><?php echo $rows['District']; ?></td>
      <td>
          <form method="get" action="profile.php">
            
              
              <?php  
              echo '<input type="hidden" name="Id" value='.$rows['Id'].'>'?>
              <button name="view" class="btn btn-light">View</button></form>
            
            </td>
              </tr>
    <?php 
        }
        ?>
  </tbody>
</table>
<?php
for($page=1;$page<=$number_of_pages;$page++){
  echo '<a href="child.php?page='.$page.'">'.$page.'</a>';
}
?>
</div>

</body>

</html>