<?php
require_once 'auth/dbconn.php';

if(isset($_SESSION['user'])=="")
  {
    session_start();
  }

  $GLOBALS['s'] =basename($_SERVER['SCRIPT_NAME'],".php");

?>


<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="A personal site that contains some quotes of famous people that might be enough to inspire our way of life">
<meta name="robots" content="index, nofollow">

	<title><?php if($s=="index"){echo "Home";}else{echo ucwords($s);} ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8_unicode_ci" />
	<meta property="og:image" content="http://i.imgur.com/ZesI3AT.jpg"/>
	<meta property="og:url" content="http://sejan.xyz" />
	<!--fonts-->
	<link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Play:700,400' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<!--fonts-->
	
	<link rel="icon" href="img/favicon.ico"/>
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/mdb.css" >
	<link rel="stylesheet" href="css/style.css" >
	<link rel="stylesheet" href="css/parallax.css" > 

	<!--scripts-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script-->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<!-- JQuery -->
    <!--script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
<script src="js/parallax.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
	<script src="js/smoothPageScroll.js"></script><!-- 
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/modal.css"/> -->
	 
<style type="text/css">
 .navbar{
  min-height: 40px;
  font-family: Play;
  border-radius: 0px;
  margin: 0;
  padding: 0;
  font-weight: bold;
 }
 .navbar-right{
   float: right !important;
    margin-right: 0;
 }
 
</style>
<!-- Modal -->
<div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Logout?</h4>
      </div>
      <div class="modal-body">
      Are You Sure You Want To Logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No! No!! Abort Abort</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='auth/logout.php'">Yes I am fucking sure</button>
      </div>
    </div>
  </div>
</div>

</head>
	
<body>
	
<a name="Top"></a>


<header>
	<!--Navbar-->
<nav class="navbar navbar-dark navbar-fixed-top scrolling-navbar" style="padding: 0px;margin: 0;">

    <!-- Collapse button-->
    <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#collapseEx">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container-fluid">
        <!--Collapse content-->
        <div class="collapse navbar-toggleable-sm" id="collapseEx">
            <!--Navbar Brand-->
    <a class="navbar-brand" href="index.php" style="padding-left: 0; color: hotpink;">
<b>Q u o t e s </b> <span class="sr-only">(current)</span>
    </a>
            <!--Links-->
            <ul class="nav navbar-nav">
                  <?php
      if(isset($_SESSION['user'])!="")
      {
        ?>  
                <li class="nav-item">
                    <a class="nav-link" href="new.php" style="color: hotpink;">Add New</a>
                </li>
        <?php
      }
      ?>
                <li class="nav-item">
                    <a class="nav-link" href="about.php" style="color: hotpink;">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" style="color: hotpink;">Contact</a>
                </li>
         </ul>
              
                <ul class="nav navbar-nav" style="float: right;">
            <?php
      if(isset($_SESSION['user'])=="")
      {
        ?>  
      <li class="nav-item">
        <a class="nav-link" href="#register" id="myBtn2" style="color: hotpink;"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="#login" id="myBtn" style="color: hotpink; "><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </li>
        <?php 
      }
      else{?>
      <li class="nav-item active">
        <a class="nav-link" style="color: hotpink;"><?php echo 'Hello '.$_SESSION['user'];?></a>
      </li>
    <li class="nav-item">
    <a style="color: hotpink;" class="nav-link" data-toggle="modal" id="logout" href="#logout" title="Logout">  <span class="glyphicon glyphicon-off"></span> </a>
    </li>
    <?php  }
    ?>
    
      </ul>
        </div>
        <!--Collapse content-->

    </div>

</nav>
<!--Navbar-->
</header>
<br/> <br/>