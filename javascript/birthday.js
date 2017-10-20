$(document).ready(function(){
			$("#subm").click(function(){
				var year=$("#year").val();
			var month=$("#month").val();
			var day=$("#day").val();
			var name=$("#name").val().indexOf("<");
			var lastname=$("#lastname").val().indexOf("<");
			var login=$("#login").val().indexOf("<");
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
			if(name!=-1||lastname!=-1||login!=-1)
			{
				return false;
			}
		
			});
	});