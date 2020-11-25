<?php
    session_start();

    if(isset($_SESSION['User']))
    {
        echo'<a href="Welcome.php?home">home</a>';
        echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        header("location:index.php");
    }

?>