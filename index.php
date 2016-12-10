<?php 
require_once 'header.php';
require_once 'auth/login.php';
    
?>


 <?php 

 $rec_limit = 8;
         $sql = "SELECT count(quoteId) FROM userposts ";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysql_fetch_array($retval, MYSQL_NUM );
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
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
 ?>
 <div class="co lumn"><?php
 while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {     ?>   
	 
<div class="col-md-6">
  <!--Card-->
  <div class="card view">
      <!--Card image-->
      <div class="quotes_container overlay hm-white-slight">
           <!--Text-->
          <h3 class="quotes">"<?php echo stripslashes($row['postbody']); ?>".  </h3>
      </div>
      <!--/.Card image-->
      <!--Card content-->
      
          <!--Author-->
          <h4 class="quotes_container">  <?php echo stripslashes($row['quoteby']); ?></h4>
     
      <!--/.Card content-->
  </div>
  <!--/.Card-->
</div>
 
<?php 
     
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

<footer class="footer">
<center>

<span style="font-family: Vollkorn; font-weight: bold; font-size: 13px; color: cyan">&copy; Mominul Haque Sejan 2014-<?php echo date('Y') ?></span>
</center></div>
<!--center>
<iframe src="https://www.tinfoilsecurity.com/badge_iframe/75e0f67248c18c0bccb0f2827f117c81a4f368dc?type=b&size=2" sandbox="allow-popups" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:115px; height:35px;"></iframe>
</center-->
</footer>

<script type="text/javascript">  var vglnk = { key: '10c2c20ff1a85ae82743c340636512aa' };  (function(d, t) {    var s = d.createElement(t); s.type = 'text/javascript'; s.async = true;    s.src = '//cdn.viglink.com/api/vglnk.js';    var r = d.getElementsByTagName(t)[0]; r.parentNode.insertBefore(s, r);  }(document, 'script'));</script>
</body>
</html>
