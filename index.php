<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script src="jquery/jquery.min.js"></script>

	<script src="jquery_validate/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#adduser_form").validate({
				rules:{
					login:{
						rangelength:[8,32],
						remote:"remote.php"
					},
					name:{
						rangelength:[3,20]
					},
					lastname:{
						rangelength:[3,30]
					},
					password:{
						rangelength:[8,16]
					},
					password1:{
						equalTo:"#password"
					}
				}
			});
			
     function user_count()
     {
     	try {
       			request = new XMLHttpRequest();
     			} catch (trymicrosoft) {
      		try {
         		request = new ActiveXObject("Msxml2.XMLHTTP");
      		 } catch (othermicrosoft) {
         	try {
          	 	request = new ActiveXObject("Microsoft.XMLHTTP");
        	 } catch (failed) {
           		request = null;
         }
       }
     }
     	 request.open("GET",'user_count.php',true);
     	 request.onreadystatechange=updatepage;
     	 request.send(null);
     }
      function updatepage()
     	 {
     	 	if(request.readyState==4&&request.status==200)
     	 	{
     	 		var count=request.responseText;
     	 		$("#count").text(count);
     	 	}
     	 }
    	setInterval(user_count,1000);
		});
	</script>
	
</head>
<body>
	<div id="header_reg">
		<h1 id="header_index">Programer Company</h1>
	</div>
	<?php
		require "postgresql_require.php";
		session_start();
		if(isset($_SESSION['login']))
		{
			header("Location:home_page.php");
			exit;
		}
		if(isset($_GET['date']))
		{	
			echo "error in date";
		}
		if(isset($_GET['error']))
		{	
			echo "error in lastname or name or login";
		}
		if(isset($_GET['login']))
		{	
			echo "error in login";
		}
		if(isset($_GET['pinkod']))
		{	
			echo "error in kod";
		}
	?>
	<?php
		$result=pg_query("SELECT * from robot");
		$count=pg_num_rows($result);
		$i=rand(1,$count);
		$robot=pg_query("SELECT * from robot WHERE id=$i");
		$row=pg_fetch_assoc($robot);
		$numb=$row['number'];
		$error_count=0;
		if(isset($_POST['loginonline']))
		{
			$login=$_POST['login'];
			$password=crypt($_POST['password'],$login);
			$result_login=pg_query("SELECT * from user_info WHERE login='$login' AND password='$password'");
			if(isset($_POST['answer']))
			{
				$answer_url=$_GET['a'];
				$answer_user=$_POST['answer'];
				if(pg_num_rows($result_login)==1&&$answer_user==$answer_url)
				{
					pg_query("UPDATE online SET online='yes' WHERE user_login='$login'");
					header("Location:home_page.php");
					exit;
				}
				elseif($answer_user==$answer_url)
				{
					echo "<p id='reg_error'>error in password or login</p>";
					$error_count=1;
				}
				elseif(pg_num_rows($result_login)==1)
				{
					echo "<p id='reg_error'>error in kod</p>";
					$error_count=1;
				}
				else
				{
					echo "<p id='reg_error'>error in password or login and kod</p>";
					$error_count=1;
				}
			}
			else
			{	
				if(pg_num_rows($result_login)==1)
				{
					pg_query("UPDATE online SET online='yes' WHERE user_login='$login'");
					header("Location:home_page.php");
					exit;
				}
				else
				{
					echo "<p id='reg_error'>error in password or login</p>";
					$error_count=1;
				}
			}
		}
		
	?>
	<form action="index.php?a=<?php echo $numb?>"  method="post" id="reg_form">
		<label class="reg_label">Username</label><br>
		<input type="text" name="login" class="reg_input"><br><br>
		<label class="reg_label">Password</label><br>
		<input type="password" name="password" class="reg_input"><br><br>
		<?php
			if($error_count==1)
			{
				?>
				<img src="<?php echo 'images/'.$row['name']?>" style="width:100px;height:50px;" id="reg_img"><br>
				<input type="number" name="answer" class="reg_input" placeholder="answer"><br><br>
				<?php
			}
		?>
		<input type="submit" name="loginonline" id="reg_submit" value="Log In">
	</form>
	<form action="adduser_form.php?kod=<?php echo $numb?>" method="post" id="adduser_form">
		<input type="text" name="name" class="reg_input required" id="name" placeholder="name">
		<input type="text" name="lastname" class="reg_input required" id="lastname" placeholder="lastname"><br><br>		
		<input type="text" name="login" class="reg_input required" id="login" placeholder="username">
		<input type="radio" name="gender" value="male" checked> Male
  		<input type="radio" name="gender" value="female"> Female<br><br>
  		<label>Birthday</label>
  		<select id="year" name="year">
  			<option>2003</option>
  			<option>2002</option>
			<option>2001</option>
			<option>2000</option>
			<option>1999</option>
			<option>1998</option>
			<option>1997</option>
			<option>1996</option>
			<option>1995</option>
			<option>1994</option>
			<option>1993</option>
			<option>1992</option>
			<option>1991</option>
			<option>1990</option>
			<option>1989</option>
			<option>1988</option>
			<option>1987</option>
			<option>1986</option>
			<option>1985</option>
			<option>1984</option>
			<option>1983</option>
			<option>1982</option>
			<option>1981</option>
			<option>1980</option>
			<option>1979</option>
			<option>1978</option>
			<option>1977</option>
			<option>1976</option>
			<option>1975</option>
			<option>1974</option>
			<option>1973</option>
			<option>1972</option>
			<option>1971</option>
			<option>1970</option>
			<option>1969</option>
			<option>1968</option>
			<option>1967</option>
			<option>1966</option>
			<option>1965</option>
			<option>1964</option>
			<option>1963</option>
			<option>1962</option>
			<option>1961</option>
			<option>1960</option>
			<option>1959</option>
			<option>1958</option>
			<option>1957</option>
			<option>1956</option>
			<option>1955</option>
			<option>1954</option>
			<option>1953</option>
			<option>1952</option>
			<option>1951</option>
			<option>1950</option>
			<option>1949</option>
			<option>1948</option>
			<option>1947</option>
			<option>1946</option>
			<option>1945</option>
			<option>1944</option>
			<option>1943</option>
			<option>1942</option>
			<option>1941</option>
			<option>1940</option>
			<option>1939</option>
			<option>1938</option>
			<option>1937</option>
			<option>1936</option>		
		</select>
		<select id="month" name="month">
			<option value="January">January</option>
       	 	<option value="February">February</option>
        	<option value="March">March</option>
	        <option value="April">April</option>
	        <option value="May">May</option>
	        <option value="June">June</option>
	        <option value="July">July</option>
	        <option value="August">August</option>
	        <option value="September">September</option>
	        <option value="October">October</option>
	        <option value="November">November</option>
	        <option value="December">December</option>
		</select>
		<select id="day" name="day">
			<option>01</option>
			<option>02</option>
			<option>03</option>
			<option>04</option>      
			<option>05</option>      
			<option>06</option>      
			<option>07</option>      
			<option>08</option>      
			<option>09</option>      
			<option>10</option>      
			<option>11</option>      
			<option>12</option>      
			<option>13</option>      
			<option>14</option>      
			<option>15</option>      
			<option>16</option>      
			<option>17</option>      
			<option>18</option>      
			<option>19</option>      
			<option>20</option>      
			<option>21</option>      
			<option>22</option>      
			<option>23</option>      
			<option>24</option>      
			<option>25</option>      
			<option>26</option>      
			<option>27</option>      
			<option>28</option>      
			<option>29</option>      
			<option>30</option>      
			<option>31</option>      
		</select><br><br>
		<input type="password" name="password" class="reg_input required" id="password" placeholder="password">
		<input type="password" name="password1" class="reg_input" placeholder="confirm password"><br><br>
		<img src="<?php echo 'images/'.$row['name']?>" style="width:100px;height:50px;">
		<input type="number" name="number" class="reg_input required"placeholder="answer"><br><br>
		<input type="submit" name="add_user" id="subm">
	</form>
	<h1 id="count"></h1>
</body>
</html>