

<footer class="footer">
<center>

<span style="font-family: Vollkorn; font-weight: bold; font-size: 13px; color: cyan">&copy; Mominul Haque Sejan 2014-<?php echo date('Y') ?></span>
</center>
</footer>

<script type="text/javascript">
  $(document).ready(function(){
    $("#logout").click(function(){
      $("#logoutmodal").modal();
    });
  });
</script>

<script type="text/javascript">
var uid = '18222';
var wid = '241180';
</script>
<script type="text/javascript" src="//cdn.popcash.net/pop.js"></script>
<?php mysqli_close($conn);?>
</body>
</html>