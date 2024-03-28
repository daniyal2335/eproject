<?php
session_start();
if(isset($_SESSION['adminEmail'])){
unset($_SESSION['adminEmail']);
echo "<script>
location.assign('../../index.php');</script>";
}
else if(isset($_SESSION['lawEmail'])){
    unset($_SESSION['lawEmail']);
    echo "<script>
    location.assign('../../index.php');</script>";
}
?>