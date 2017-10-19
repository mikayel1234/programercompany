<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="jquery/jquery.min.js"></script>

	<script src="jquery_validate/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#adduser_form").validate({
				rules:{
					email:{
						email:true,
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
		});
	</script>
	<script type="text/javascript">
		
		$(document).ready(function(){
var year=$("#year").val();
			var month=$("#month").val();
			var day=$("#day").val();
			if(year%4!=0&&month=="February"&&day==29||year%4!=0&&month=="February"&&day==30||year%4!=0&&month=="February"&&day==31)
			{
				return false;
			}
			if(year%4==0&&month=="February"&&day==30||year%4!=0&&month=="February"&&day==31)
			{
				return false;
			}
			if(month=="April"&&day==31)
			{
				return false;
			}
			if(month=="June"&&day==31)
			{
				return false;
			}
			if(month=="September"&&day==31)
			{
				return false;
			}
			if(month=="November"&&day==31)
			{
				return false;
			}
	});
	</script>
</head>
<body>
	<?php
		require "postgresql_require.php";
		session_start();
		if(isset($_SESSION['email']))
		{
			header("Location:home_page.php");
			exit;
		}
	?>
	<form action="adduser_form.php" method="post" id="adduser_form">
		<label>Name</label>
		<input type="text" name="name" class="required">
		<label>Lastname</label>
		<input type="text" name="lastname" class="required">
		<label>email</label>
		<input type="email" name="email" class="required" >
		<input type="radio" name="gender" value="male" checked> Male<br>
  		<input type="radio" name="gender" value="female"> Female<br>
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
		</select>
		<label>password</label>
		<input type="password" name="password" class="required" id="password">
		<label>confirm password</label>
		<input type="password" name="password1">
		<input type="submit" name="add_user">
	</form>
</body>
</html>