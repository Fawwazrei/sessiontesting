<?php

session_start();
session_unset();
session_destroy();

echo "<script>alert('Anda Telah Logout Sebagai Administrator');document.location='menulogin.php' </script>";