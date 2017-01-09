

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
<?php mysqli_close($conn);?>
</body>
</html>