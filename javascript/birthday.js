$(document).ready(function(){
			$("#subm").click(function(){
				var year=$("#year").val();
			var month=$("#month").val();
			var day=$("#day").val();
			var name=$("#name");
			var lastname=$("#lastname");
			var login=$("#login");
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
			if(name.indexOf("<")==-1)
			{
				return false;
			}
			if(lastname.indexOf("<")==-1)
			{
				return false;
			}
			if(login.indexOf("<")==-1)
			{
				return false;
			}
			});
	});