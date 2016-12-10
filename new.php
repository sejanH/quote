<?php

require_once 'auth/dbconn.php';
session_start();
if(isset($_SESSION['user']))
{
	$res=mysql_query("SELECT * FROM userinf WHERE uid=".$_SESSION['userid']);
	$un=mysql_fetch_array($res);
	$_SESSION["me"]= $un;


if(isset($_POST['btn-submit']))
{
 $quote = mysql_real_escape_string($_POST['quoteText']);
 $source = mysql_real_escape_string($_POST['source']);
 $uname= $un['username'];
 $quote=mb_convert_encoding($quote, "HTML-ENTITIES", 'UTF-8');

$res=mysql_query("INSERT INTO userposts(username,postbody,quoteby) VALUES('$uname','$quote','$source')");
//$row=mysql_fetch_array($res);
 //$count=mysql_num_rows($res);
 if($res)
 {
  ?>
        <script>alert('successfully added ');</script>
        <?php
       // session_destroy();
		$_SESSION['btn_submit']='NULL';
 }
 else
 { 
  ?>
        <script>alert('Failed to add new quote');</script>
        <?php
        
 }
}

}
else
{
?>
<script>alert('You must login first');</script>
<script>window.location.href="index.php";</script>
<?php

}
?>



<!DOCTYPE html>
<html>
<head>
<title>Add New Quote</title>
<?php include('applayout.php'); ?> 

	<div class="col-md-6" >
<form method="post">
<table align="center" class="table-responsive table">
<tr>
<th style="color:hotpink;" ><b>Quote</b></th>
<td><textarea class="form-control" rows="10" type="text" name="quoteText" placeholder="Enter the Quote" required ></textarea>
</td>
</tr>
<tr>
<th style="color:hotpink;"><b>Quote From</b></th>
<td><input class="form-control" style="width:100%;" type="text" name="source" placeholder="Quote Source" required /></td>
</tr>
<tr>
<td></td>
<td><button class="btn btn-primary btn-block" type="submit" name="btn-submit">Add</button></td>
</tr>

</table>
</form>
</div>
<div class="col-md-5">
<?php
$me= $un['username'];
echo "Posts made by user (", $me ,"):", "<br/><br/>";
$after=mysql_query("SELECT postbody,quoteby FROM userposts where username='$me' ");

$arr = Array();
$arr2 = Array();
$arr3 = Array();
while($row= mysql_fetch_array($after))
{
	$arr[]= $row['postbody'];
	$arr2[]= $row['quoteby'];
}

for($i=0;$i< $count=mysql_num_rows($after);$i++)
{if($i%2==0){?>
<b><?php echo $i+1," ) ",$arr[$i],"<br/>";?></b>
	<i><?php
	echo $arr2[$i],"<hr/>";?></i><?php
}
else{?>
<div style="background-color: rgba(0,0,0,0.2);">
	<b><?php echo $i+1," ) ",$arr[$i],"<br/>";?></b>
	<i><?php
	echo $arr2[$i],"<hr/>";?></i>
	</div><?php
}
}
?>
</div>

</body>
</html>