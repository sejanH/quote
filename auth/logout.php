<?php
session_start();

if(!isset($_SESSION['user']))
{session_destroy();
 header("Location: /quote/index.php");
}
else if(isset($_SESSION['user'])!="")
{session_destroy();
 header("Location: /quote/index.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['user']);
 header("Location: /quote/index.php");
}
?>