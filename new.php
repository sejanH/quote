<?php
//header files
require_once('header.php'); 
require_once 'auth/login.php';
require_once 'auth/register.php';
//header files end

if(isset($_SESSION['user']))
{
	$res=mysqli_query($conn,"SELECT * FROM userinf WHERE uid=".$_SESSION['userid']);
	$un=mysqli_fetch_array($res);
	$_SESSION["me"]= $un;


if(isset($_POST['btn-submit']))
{
 $quote = mysqli_real_escape_string($conn, $_POST['quoteText']);
 $source = mysqli_real_escape_string($conn, $_POST['source']);
 $uname= $un['username'];
 $quote=mb_convert_encoding($quote, "HTML-ENTITIES", 'UTF-8');
 $quote = strip_tags($quote);
$res=mysqli_query($conn,"INSERT INTO userposts(username,postbody,quoteby) VALUES('$uname','$quote','$source')");
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

if (isset($_POST['btn-delete'])) {
	$qid = mysqli_real_escape_string($conn, $_POST['qid']);
	$query = "delete from userposts where quoteId=$qid";
	if(mysqli_query($conn,$query))
	{
		echo "<script>alert('$query');</script>";
	}
	//
}
if(isset($_POST['btn-edit']))
{
	echo '<script>alert("Sorry didn\'t get the chance to write code for this button");</script>';
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
<style type="text/css">
.myPosts{
	background: rgba(0,0,0,0.1);
	//color: ghostwhite;
}
</style>
<div>
<center>
<div class="col-md-5">
<form method="post">
<table class="table table-md" style="width: 100% !important">
<tr>
<th style="color:hotpink;"><b>Quote</b></th>
<td ><textarea class="form-control textarea md-textarea" rows="6" type="text" name="quoteText" placeholder="Enter the Quote" required ></textarea>
</td>
</tr>
<tr>
<th style="color:hotpink;"><b>Quote From</b></th>
<td ><input class="form-control" type="text" name="source" placeholder="Quote Source" required /></td>
</tr>
<tr>
<td></td>
<td><button class="btn btn-lg btn-mdb btn-block overlay hm-green-slight" type="submit" name="btn-submit">Add</button></td>
</tr>
</table>
</form><br>
<script type="text/javascript">
	atOptions = {
		'key' : 'd0cdc3b5a195110617834bf46ff32d41',
		'format' : 'iframe',
		'height' : 60,
		'width' : 468,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bnserving.com/invoke.js"></scr' + 'ipt>');
</script>
<script type='text/javascript' src='//pl8212800.puserving.com/11/9d/4e/119d4e8c441ed56f1a8a2dff84da1882.js'></script>
<script type='text/javascript' src='//pl8212799.puserving.com/dd/87/e0/dd87e0d92f96702bf7cba66aa4d3d810.js'></script>
</div>
</center>

<div class="col-md-7 myPosts">
<?php
$me= $un['username'];
echo "Posts made by user (", $me ,"):", "<br/><br/>";
$after=mysqli_query($conn,"SELECT quoteId,postbody,quoteby FROM userposts where username='$me' ");

$arr = Array();
$arr2 = Array();
$arr0 = Array();
$i=1;
while($row= mysqli_fetch_array($after))
{
	?>
	<form method="post">
	<input type="hidden" name="qid" value="<?php echo $row['quoteId'];?>"></input>

	<table>
	<tr>
	<b><?php echo $i," ) ",$row['postbody'],"<br/>";?></b>
	</tr>
	<tr>
	<td width="80%">
	<i><?php echo $row['quoteby'],"<hr/>";?></i>
	</td>
	<td>
	<button class='btn btn-sm btn-outline-default' name="btn-edit">Edit</button>
	</td>
	<td>
	<button class='btn btn-sm btn-outline-danger waves-effect' name="btn-delete">Delete</button>
	</td>
	</tr>
	</table>
		</form>
		<?php
		$i++;
}
?>
</div>

</div>

<br/><br/>
<script type="text/javascript">
  $(document).ready(function(){
    $("#logout").click(function(){
      $("#logoutmodal").modal();
    });
  });
</script>
<?php mysqli_close($conn);?>
</body>
</html>