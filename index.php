<?php 
require_once 'header.php';
require_once 'auth/login.php';
require_once 'auth/register.php';

 $rec_limit = 8;
         $sql = "SELECT count(quoteId) FROM userposts ";
         $retval = mysqli_query( $conn , $sql );
         
         if(! $retval ) {
            die('Could not get data: ' . mysqli_error());
         }
         $row = mysqli_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'page'} ) ) {
            $page = $_GET{'page'}-1 ;
            $offset = $rec_limit * $page ;
         }
         else {
            $page = 1;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT * ". 
            "FROM userposts order by quoteId DESC ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysqli_query($conn, $sql);
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
 ?>
 <div class="column"><?php
 $i=0; 
 while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {    ?>   
	 
<div class="col-md-6">
  <div class="<?php if($i%2==0)echo 'card view2'; else echo 'card view'; ?>">
      <div class="quotes_container overlay hm-white-slight">
           <!--quote-->
          <h2 class="quotes">"<?php echo stripslashes($row['postbody']); ?>".  </h3>
      </div>
          <!--Author-->
        <h3 class="author_name_gray">  <?php echo stripslashes($row['quoteby']); ?></h4>
  </div>
</div>
 
<?php 
  $i++;   
}


?>
</div>
<hr/><div class="column">
<footer>

 <center>

<a href="#Top"  title="Back to Top"> <span><img style="border: 1px solid black;padding:6px;" src="img/up.svg"/></span></a>
 
</center>

<br/>
 <center>
 <ul class="pagination "><?php 
   for($i=1;$i<= ceil($rec_count/$rec_limit) ;$i++)
   {//echo $_SERVER["REQUEST_URI"];
   ?>
 <li class="<?php if(($_SERVER["REQUEST_URI"]=="/index.php?page=$i" || $_SERVER["REQUEST_URI"]=="/?page=$i") && $i>1) echo "active";elseif(($_SERVER["REQUEST_URI"]=="/index.php" || $_SERVER["REQUEST_URI"]=="/" || $_SERVER["REQUEST_URI"]=="/?page=1") && $i==1) echo "active"; else echo ""; ?>"><?php   echo "<a href='?page=$i'>$i</a>";?></li><?php 
   }
       //  mysql_close($conn);
  
 ?>
 
</ul>
</center><br/>

<?php 
include('footer.php');
//$conn->close();
?>
