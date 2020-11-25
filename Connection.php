<?php

    $con=mysqli_connect('localhost','root','','lamp_task');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>