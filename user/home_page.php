<?php
	include "include_header.php";
?>
<div>
	
			<input type="text" name="desc" id="e">
		<button id="abc"></button>
	<script type="text/javascript">
		$("#abc").click(function(){
			var desk=$("#e").val();
			
			var http=new XMLHttpRequest();
			http.open("POST","chat.php",true);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 			http.send("desc="+desk);
 			$("#e").val("");
		});
	</script>
	<p id="sd">
		
	</p>
	<script type="text/javascript">
		function a()
		{
			var http1=new XMLHttpRequest();
			http1.open("GET","zap.php",true);
			http1.onreadystatechange=function(){
				if(http1.status==200&&http1.readyState==4)
				{
					console.log(12);
					var tex=http1.responseText;

					$("sd").text(tex);
				}
			};
 			http1.send();
		}
		setInterval(a,500);
	</script>
</div>
</body>
</html>