<?php
	include "include_header.php";
?>
<div>
	<script type="text/javascript">
		$("#abc").click(function(){
			var desk=$("#e").val();
			var http=new XMLHttpRequest();
			http.open("POST","chat.php",true);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 			http.send("desc="+desk);
		});
	</script>
	<form >
		<input type="text" name="desc" id="e">
		<input type="submit" name="add" id="abc">
	</form>
</div>
</body>
</html>