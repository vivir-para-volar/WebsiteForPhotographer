<? if($_COOKIE['user'] == "admin"): ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/admin_style.css" type="text/css">
	<link rel="shortcut icon" href="img/Logo_icon.png" type="image/png">
	<title>Irina Tooru - Admin</title>
</head>
<body>
		
	<section class="admin">
		<div class="menu">
			<a href="index.php" class="logo"><img src="img/Logo.png" alt=""></a>
			<div class="menu_element"><a href="admin.php"><p>Блог</p></a></div>
			<div class="menu_element"><a href="admin_letters.php"><p>Письма</p></a></div>
			<div class="menu_element"><a href="admin_reviews.php"><p>Отзывы</p></a></div>
			<div class="menu_element"><a href="processing/exit.php"><p>Выход</p></a></div>
		</div>
		<div class="column_2">
			<h1>Блог</h1>

			<form method="POST">
				<h2>Добавить статью</h2>

				<p>Заголовок</p><br>
				<input type="text" name="title" class="text_input" required><br>
				<br><p>Текст</p><br>
				<textarea name="text" class="big_text_input" required></textarea><br>

				<br><p>Главное изображение</p><br>
				<input type="text" name="img" class="text_input" required><br>
				<br><p>Изображения</p><br>
				<input type="text" name="img_1" class="text_input" required><br><br>
				<input type="text" name="img_2" class="text_input" required><br><br>
				<input type="text" name="img_3" class="text_input"><br><br>
				<input type="text" name="img_4" class="text_input"><br><br>
				<input type="text" name="img_5" class="text_input"><br><br>

				<input type=submit value="Добавить" class="button_form">  
				<input type=reset value="Отменить" class="button_form"> 

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

						try {
							$db = mysqli_connect("localhost", "root", "root", 'course');
							if ($db == false){
								print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
							}

							$sql = mysqli_query($db, "INSERT INTO `blog` (`title`, `text`, `img`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `data_blog`) VALUES ('$title', '$text', '$img', '$img_1', '$img_2', '$img_3', '$img_4', '$img_5', '".time()."')");

							if (!$sql) {
								echo '<p>Произошла ошибка: ' . mysqli_error($db) . '</p>';
							}

							$db -> close();
						} 
						catch (PDOException $e) {
							print "Ошибка!: " . $e->getMessage() . "<br/>";
						}
					}
				}
				?>

			</form>

			
			<br><br><br>
			<h2>Удалить статью</h2>
			<?php
			$db = mysqli_connect("localhost", "root", "root", 'course');
			$sql = mysqli_query($db, 'SELECT `Id`, `title`, `data_blog` FROM `blog` ORDER BY Id DESC');
			echo '<table>';
			echo '<tr><td><p>Заголовок</p></td><td><p>Дата</p></td><td><p>Удалить</p></td></tr>';
				while ($result = mysqli_fetch_array($sql)) {
					$Id = $result['Id'];
					echo '<tr><td>';?><a href="processing/change_blog.php?ID=<?=$Id?>"><?echo '<p>' . $result['title'] . '</p></a></td><td><p>' . date('d.m.Y : H.i.s', $result['data_blog']) . '</p></td><td>';?><a href="processing/delete_blog.php?ID=<?=$Id?>"><?echo '<p>удалить</p></a></td></tr>';
				}
			echo '</table>';
			$db -> close();
			?>
		</div>
	</section>

</body>
</html>
<? else: 
		echo "Авторизуйтесь как администратор.";
endif; ?>