<?php
require_once 'dbconn.php';

if(isset($_POST['btn-login']))
{

 $username = mysqli_real_escape_string($conn, $_POST['username']);
 $pass = mysqli_real_escape_string($conn, $_POST['pass']);
 $pass = md5($pass);
 $query = "SELECT * FROM userinf WHERE username='$username' AND pass='$pass'";
 $res= mysqli_query($conn, $query) or die(mysqli_error());
 $row=mysqli_fetch_array($res);
 $count=mysqli_num_rows($res);
 if($count == 1)
 {
 	//session_start();
  $_SESSION['userid'] = $row['uid'];
  $_SESSION['user'] = $row['username'];
  echo '<script>window.location.href="index.php";</script>';
 }
 else
 {
    echo '
    <center>
      <div class="container alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Wrong Login details. Check your <i>Username</i>&nbsp;&nbsp;and <i>Password</i>&nbsp;&nbsp;then Try again</strong>
      </div>
    </center>';
 }
 
}
?>
<center>

<!--login-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 60%">
        <div class="modal-header" style="padding:15px 30px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:20px 40px;">
          <form method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" placeholder="Enter username" required/>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Enter password" required/>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block" name="btn-login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
          </form>
        </div>
      </div>
      
    </div>
  </div> 
  </center>
  <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>