<?php

require_once 'dbconn.php';


if(isset($_POST['btn-signup']))
{
 $username = mysql_real_escape_string($_POST['username']);
 $pass = mysql_real_escape_string($_POST['pass']);
 $email = mysql_real_escape_string($_POST['email']);
 $FullName = mysql_real_escape_string($_POST['fname']);
$res=mysql_query("INSERT INTO userinf(username,pass,email,FullName) VALUES('$username','$pass','$email','$FullName')");
//$row=mysql_fetch_array($res);
 //$count=mysql_num_rows($res);
 if($res)
 {
  ?>
        <script>alert('Successfully registered ');</script>
        <script>window.location.href="/quote/index.php";</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('Error while registering you...');</script>
        <?php
 }
}
?>


<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
<div class="modal-content">
        <div class="modal-header" style="padding: 5px 20px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-folder-open"></span>  Signup</h4>
        </div>
        <div class="modal-body" style="padding:0px 70px;">
<form method="post">
<div class="form-group">
    <label><span class="glyphicon glyphicon-user"></span> Username</label>
<input class="form-control" class="form-control" type="text" name="username" placeholder="User Name" required />
 </div>
 <div class="form-group">
  <label><span class="glyphicon glyphicon-eye-open"></span> Password</label>
<input class="form-control" type="password" name="pass" placeholder="Your Password" required />
<div class="form-group">
              <label><span class="glyphicon glyphicon-envelope"></span> Email</label>
 <input class="form-control" type="email" name="email" placeholder="Your Email" />
 </div>
<div class="form-group">
    <label><span class="glyphicon glyphicon-user"></span>  Full Name</label>
    <input class="form-control" type="text" name="fname" placeholder="Your Full Name" />
    </div>
    <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
<button class="btn btn-info" type="submit" name="btn-signup">Sign Me Up</button>
</form>
</div>
</div>
      </div>
      </div>

<script>
$(document).ready(function(){
    $("#myBtn2").click(function(){
        $("#myModal2").modal();
    });
});
</script>