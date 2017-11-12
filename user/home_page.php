<?php
	include "include_header.php";
?>
<div>
	<script type="text/javascript">
		$("#abc").submit(function(){
			var desk=$("#e").val();
			console.log(4);
			var http=new XMLHttpRequest();
			http.open("POST","chat.php",true);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 			http.send("desc="+desk);
		});
	</script>
			<input type="text" name="desc" id="e">
		<button id="abc"></button>
	
</div>
</body>
</html>