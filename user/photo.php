<?php
	include "include_header.php";
	require '../postgresql_require.php';
	session_start();
	$login=$_SESSION['login'];
	if(isset($_POST['add_1_img']))
	{
		if(@getimagesize($_FILES['img_1_u']['tmp_name']))
		{
			$user_1_img=$_FILES['img_1_u']['name'];
			$time=time();
			while(file_exists($upload_1_img="photo_1/".$time."-".$user_1_img))
			{
				$time++;
			}
			echo $upload_1_img;
			if(@move_uploaded_file($_FILES["img_1_u"]["tmp_name"],$upload_1_img))
				echo "string";
		}
	}
	$img_1_user=pg_query("SELECT * from user_img WHERE login='$login'");
	$img_1_href=pg_fetch_assoc($img_1_user);
?>
<div>
	<h1>photo</h1>
	<img src="<?php echo $img_1_href['href']?>">
	<form action="photo.php" method="post" enctype="multipart/form-data">
		<input type="text" name="comment">
		<input type="file" name="img_1_u">
		<input type="submit" name="add_1_img">

	</form>
</div>
</body>
</html>