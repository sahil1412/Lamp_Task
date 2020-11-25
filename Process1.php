<?php 
require_once('config.php');
if(isset($_POST['add'])){
    $CName=$_POST['CName'];
    $Sex=$_POST['Sex'];
    $DOB=$_POST['DOB'];
    $FatherName=$_POST['FatherName'];
    $MotherName=$_POST['MotherName'];
    $PState=$_POST['PState'];
    $District=$_POST['District'];
    $files=$_FILES['file'];
    //print_r($files);
    $filename=$files['name'];
    //print_r($filename);
    $fileerror=$files['error'];
    $filetemp=$files['tmp_name'];//tmp_file where temporary store
    $fileext=explode('.',$filename); //break file into two element
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg');

    if(in_array($filecheck,$fileextstored)){
        $destinationfile='upload/'.$filename;
        move_uploaded_file($filetemp,$destinationfile);
        $sql ="INSERT INTO child (CName, Sex, DOB, FatherName, MotherName, PState, District,CImage) values(?,?,?,?,?,?,?,?)";
    $stmtinsert=$db->prepare($sql);
    $result = $stmtinsert->execute([$CName, $Sex, $DOB, $FatherName, $MotherName, $PState, $District,$destinationfile]);
    #$result = mysqli_query($con,$sql);
    if($result)
    {
        header("location:register.php");
    }
    else{
        echo 'Error occurs in saving data';
    }
    }   
}

if(isset($_POST['addState'])){
    $StateName=$_POST['StateName'];
    $sql="INSERT INTO statelist (StateName) value(?)";
    $stmtinsert=$db->prepare($sql);
    $result = $stmtinsert->execute([$StateName]);
    if($result){
        header("location:state.php");
    }
}

if(isset($_POST['addDistrict'])){
    $DistrictName=$_POST['DistrictName'];
    $CState=$_POST['CState'];
    $sql="INSERT INTO Districtlist (DistrictName,CState) value(?,?)";
    $stmtinsert=$db->prepare($sql);
    $result = $stmtinsert->execute([$DistrictName,$CState]);
    if($result){
        header("location:district.php");
    }
}

?>

<?php
require_once('connection.php');

?>

