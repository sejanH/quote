<?php

require_once '../auth/dbconn.php';
session_start();
if(isset($_SESSION['user']))
{
	$res=mysql_query("SELECT * FROM userinf WHERE uid=".$_SESSION['user']);
	$un=mysql_fetch_array($res);


if(isset($_POST['btn-submit']))
{
 $quote = mysql_real_escape_string($_POST['quoteText']);
 $source = mysql_real_escape_string($_POST['source']);
 $uname= $un['username'];

$res=mysql_query("INSERT INTO userposts(username,postbody,quoteby) VALUES('$uname','$quote','$source')");
//$row=mysql_fetch_array($res);
 //$count=mysql_num_rows($res);
 if($res)
 {
  ?>
        <script>alert('Successfully added ');</script>
        <?php
        session_destroy();
 }
 else
 {
  ?>
        <script>alert('Error occured while adding new quote..');</script>
        <?php
		 
      //  session_destroy();
 }
}

}
?>



<!DOCTYPE html>
<html>
<head>
<title>Add New Quote</title>
<?php include('applayout.php'); ?>
<div class="col-sm-2 ">
<?php	
echo "Logged In as ". strtoupper( $un['username'])." ";	?>
</span>
</div>
	<div class="col-sm-7" >
	

<form method="post">
<table align="center" width="60%" border="0">
<tr>
<td style="color:hotpink;" >Quote&nbsp;&nbsp;</td>
<td><textarea style="width:100%;height: 200px" type="text" name="quoteText" placeholder="Enter the Quote" required ></textarea>
</td>
</tr>
<tr>
<td style="color:hotpink;">Quote From &nbsp;&nbsp;</td>
<td><input style="width:100%;" type="text" name="source" placeholder="Quote Source" required /></td>
</tr>
<tr>
<td style="padding-left: 60% auto;"></td>
<td><button class="btn btn-primary" type="submit" name="btn-submit">Add</button></td>
</tr>

</table>
</form>
</div>
<p>
<?php
$after=mysql_query("SELECT * FROM `userposts`");

$arr = Array();
while($row= mysql_fetch_assoc($after))
{
	$arr[]= $row['postbody'];
}

for($i=0;$i< $count=mysql_num_rows($after);$i++)
echo $arr[$i],"<br/>";

?>
</p>

</body>
</html>