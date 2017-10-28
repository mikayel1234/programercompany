<?php
	include "include_header.php";
	require '../postgresql_require.php';
	session_start();
	$login=$_SESSION['login'];
	if(isset($_POST['add_1_img']))
	{
		if(@getimagesize($_FILES['img_1_u']['tmp_name']))
		{
			$image = $_FILES["img_1_u"];
			$image_filename = $image['name'];
			$image_info = getimagesize($image['tmp_name']);
			$image_mime_type = $image_info['mime'];
			$image_size = $image['size'];
			$image_data =  pg_escape_bytea(file_get_contents($image['tmp_name']));
			echo $image_data;
			$insert_1_img=pg_query("INSERT INTO user_1_photo(login,mimage_name,image_size,image_mime,image_data) VALUES('$login','$image_filename',$image_size,'$image_mime_type','$image_data')");
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