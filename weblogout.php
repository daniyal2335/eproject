<?php
include('adminpanel/php/query.php');
unset($_SESSION['userEmail']);
unset($_SESSION['lawEmail']);
echo"<script>location.assign('index.php')</script>";
?>