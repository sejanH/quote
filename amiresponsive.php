<?php require_once 'auth/dbconn.php'; ?>
<html>
<head>
	<title>Responsive?</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css"/>
	<style type="text/css">
h1{
	font-family: "Verdana";
	text-align: center;
	color: red;
	background-color: #252525;
	margin: 0;
	height: 60px;
}
body{
	display: block;
}
.border{
	border: 6px solid black;
	border-radius: 4px;
	width: 100% auto;
	height: 100% auto;
}
.device-details{
	color: grey;
	font-weight: italic;
	font-family: "Arial";
}
.devices{
}

</style>

</head>
<body>
<h1>Check If your site is responsive or not</h1>
<center>Enter Your Sites URL below:
<form method="post">
<input class="form-control" type="url" name="url" style="width: 400px; " placeholder="Enter URL here"></input>
<input class="btn btn-success form-control" name="btn-submit" type="submit" value="check" style="width: 80px;"></input>

</form>
</center>
<center>
<?php //session_start();
 if(isset($_POST['btn-submit']))
 {
 	$site_url= mysql_real_escape_string($_POST['url']);
 }
//session_destroy();
 ?>
 <div class="devices">
 <div class="device-details">Device: 1024 x 768 (iPad - Landscape)</div>
<iframe sandbox="allow-same-origin allow-forms allow-scripts" class="border"  height= "768px" width="1024px " src="<?php echo $site_url; ?>"></iframe>
<div class="device-details">Device: 768 x 1024 (iPad - Portrait)</div>
<iframe sandbox="allow-same-origin allow-forms allow-scripts" class="border"  width="768px auto" height="1024px auto" src="<?php echo $site_url; ?>"></iframe>
<table >
<tr>
<td style="padding: 100px;">
<div class="device-details">Device: 480 x 640 (Small Tablet)</div>
	<?php isset($_POST['btn-submit']) ?>
	<iframe sandbox="allow-same-origin allow-forms allow-scripts" class="border" width="480px auto" height="640px auto" src="<?php echo $site_url; ?>"></iframe>
	</td>
	<td>
	<div class="device-details">Device: 320 x 480 (iPhone)</div>
	<?php isset($_POST['btn-submit']) ?>
	<iframe sandbox="allow-same-origin allow-forms allow-scripts" class="border" width="320px auto" height="480px auto" src="<?php echo $site_url; ?>"></iframe>
	</td>
	</tr>
	</table>
</div>
</center>
</body>
</html>