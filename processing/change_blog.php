<? if($_COOKIE['user'] == "admin"): ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/admin_style.css" type="text/css">
	<link rel="shortcut icon" href="../img/Logo_icon.png" type="image/png">
	<title>Irina Tooru - Admin</title>
</head>
<body>
	<? $ID = $_GET['ID'];?>
	<section class="admin">

		<div class="menu">
			<a href="index.php" class="logo"><img src="../img/Logo.png" alt=""></a>
			<div class="menu_element"><a href="../admin.php"><p>Блог</p></a></div>
			<div class="menu_element"><a href="../admin_letters.php"><p>Письма</p></a></div>
			<div class="menu_element"><a href="../admin_reviews.php"><p>Отзывы</p></a></div>
		</div>

		<div class="column_2">
			<h1>Блог</h1>

			<form action="change.php" method="POST">
				<h2>Изменить статью</h2>

				<?
				$db = mysqli_connect("localhost", "root", "root", 'course');
				$sql = mysqli_query($db, "SELECT * FROM `blog` WHERE `Id` = {$ID}");

				$result = mysqli_fetch_array($sql);
				$title = $result['title'];
				$text = $result['text'];
				$img = $result['img'];
				$img_1 = $result['img_1'];
				$img_2 = $result['img_2'];
				$img_3 = $result['img_3'];
				$img_4 = $result['img_4'];
				$img_5 = $result['img_5'];

				$db -> close();
				?>
				<p>Заголовок</p><br>
				<input type="text" name="title" class="text_input" value="<?=$title?>" required><br>
				<br><p>Текст</p><br>
				<textarea name="text" class="big_text_input" required><?=$text?></textarea><br>

				<br><p>Главное изображение</p><br>
				<input type="text" name="img" class="text_input" value="<?=$img?>" required><br>
				<br><p>Изображения</p><br>
				<input type="text" name="img_1" class="text_input" value="<?=$img_1?>" required><br><br>
				<input type="text" name="img_2" class="text_input" value="<?=$img_2?>" required><br><br>
				<input type="text" name="img_3" class="text_input" value="<?=$img_3?>"><br><br>
				<input type="text" name="img_4" class="text_input" value="<?=$img_4?>"><br><br>
				<input type="text" name="img_5" class="text_input" value="<?=$img_5?>"><br><br>

				<input type="text" name="id" class="text_input" value="<?=$ID?>" style="display: none"><br>

				<input type=submit value="Изменить" class="button_form">  
				<input type=reset value="Отменить" class="button_form"> 
			</form>

			<br><br><br>
			<div class="table_change_news">
				<h2>Удалить комментарий</h2>
				<?php
				$db = mysqli_connect("localhost", "root", "root", 'course');
				$sql = mysqli_query($db, "SELECT * FROM `comments` WHERE `id_blog` = {$_GET['ID']} ORDER BY id DESC");
				echo '<table>';
				echo '<tr><td><p>Дата/Имя</p></td><td class="com"><p>Комментарий</p></td><td><p>Удалить</p></td></tr>';
				while ($result = mysqli_fetch_array($sql)) {
					$id = $result['id'];
					echo '<tr><td><p>' . date('d.m.Y - H:i', $result['data']) . ' / '. $result['name'] . '</p></td><td class="com"><p>' . $result['comment'] . '</p></td><td>';?><a href="delete_comment.php?ID=<?=$id?>"><?echo '<p>удалить</p></a></td></tr>';
				}
				echo '</table>';
				$db -> close();
				?>
			</div>

		</div>
	</section>
</body>
</html>
<? else: 
		echo "Авторизуйтесь как администратор.";
endif; ?>