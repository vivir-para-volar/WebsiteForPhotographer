<?php 
if(!empty($_REQUEST)){
	if($_REQUEST['title'] != null)
	{
		// Переменные с формы
		$title = $_REQUEST['title'];
		$text = $_REQUEST['text'];
		$img = $_REQUEST['img'];
		$img_1 = $_REQUEST['img_1'];
		$img_2 = $_REQUEST['img_2'];
		$img_3 = $_REQUEST['img_3'];
		$img_4 = $_REQUEST['img_4'];
		$img_5 = $_REQUEST['img_5'];

		$ID = $_REQUEST['id'];

		if(!empty($title)){
			$db = mysqli_connect("localhost", "root", "root", 'course');
			$sql = mysqli_query($db, "UPDATE `blog` SET `title` = '$title',`text` = '$text',`img` = '$img',`img_1` = '$img_1',`img_2` = '$img_2',`img_3` = '$img_3',`img_4` = '$img_4',`img_5` = '$img_5' WHERE `Id` = '$ID'");
			if (!$sql) {
				echo "<p>Произошла ошибка: " . mysqli_error($db) . '</p>';
			}
			$db -> close();
		}
	}

	header('Location: /admin.php');
}
?>