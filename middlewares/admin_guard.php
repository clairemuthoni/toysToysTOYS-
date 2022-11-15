<?php

if(isset($_SESSION['admin']) && !empty($_SESSION['admin']) && $_SESSION['admin'] == true) {

 } else {
    header("Location: ..\login\login.php");
    exit();
}

?>