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
		</div>
		<div class="column_2">
			<h1>Отзывы</h1>

			<h2>Удалить отзыв</h2>
			<?php
			$db = mysqli_connect("localhost", "root", "root", 'course');
			$sql = mysqli_query($db, 'SELECT * FROM `reviews` ORDER BY Id DESC');
			echo '<table>';
			echo '<tr><td><p>Дата/Имя</p></td><td><p>Отзыв</p></td><td><p>Удалить</p></td></tr>';
			while ($result = mysqli_fetch_array($sql)) {
				$Id = $result['Id'];
				$name = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = {$Id}");
				$result_name = mysqli_fetch_array($name);
				echo '<tr><td><p>' . date('d.m.Y : H.i.s', $result['data_review']) . '/' . $result_name['name'] . '</p></td><td><p>' . $result['text'] . '</p></td><td>';?><a href="processing/delete_review.php?ID=<?=$Id?>"><?echo '<p>удалить</p></a></td></tr>';
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