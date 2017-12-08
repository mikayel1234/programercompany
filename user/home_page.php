<?php
	include "include_header.php";
?>
<div>
	
			<input type="text" name="desc" id="e" >
			<input type="text" name="desc1" id="dbc">
		<button id="abc">Send</button>
		<form>
			<select>
				<option>fr_ch</option>
				<?php
					session_start();
					$log=$_SESSION['login'];
					$res=pg_query("SELECT * from user_info WHERE login='$log'");
					$y=pg_fetch_assoc($res);
					$id=$y['id'];
					$result=pg_query("SELECT * from friend_answer WHERE id=$id ");
					while ( $row=pg_fetch_assoc($result)) {
						?>
						<option><?php echo $row['login']?></option>
						<?php
					}
					$result=pg_query("SELECT * from friend_answer WHERE login='$log' ");

					while ( $row=pg_fetch_assoc($result)) {
			
						$id=$row['fr_id'];
						echo $id;
						$res=pg_query("SELECT * from user_info WHERE id=$id");
						echo pg_num_rows($res);
						$y=pg_fetch_assoc($res);
						$id1=$y['login'];
						?>
						<option><?php echo $id1?></option>
						<?php
					}
				?>
			</select>
		</form>
	<script type="text/javascript">
		$("option").click(function(){
			$("#abc").click(function(){
			var desk=$("#e").val();
			var desk1=$(this).val();
			var http=new XMLHttpRequest();
			http.open("POST","chat.php",true);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 			http.send("desc="+desk+"&desk1="+desk1);
 			console.log("desc="+desk+"&desk1="+desk1);
 			$("#e").val("");
 			$("#dbc").val("");
			});
		});
		
	</script>
	<div id="sd">
		
	</div>
	<script type="text/javascript">
		function a()
		{
			var http1=new XMLHttpRequest();
			http1.open("GET","zap.php",true);
			http1.onreadystatechange=function(){
				if(http1.status==200&&http1.readyState==4)
				{
					console.log(12);
					var tex=JSON.parse(http1.responseText);
					console.log(tex);
					$("#sd").empty();
					for(var i in tex)
					{

						var ov=$("<p/>").text(tex[i]).css({"fontSize":"25px"}).prependTo("#sd");
					}
					
					
				}
			};
 			http1.send();
		}
		setInterval(a,500);
	</script>
</div>
</body>
</html>