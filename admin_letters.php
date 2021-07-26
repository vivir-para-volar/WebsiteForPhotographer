<? if($_COOKIE['user'] == "admin"): ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/admin_style.css" type="text/css">
	<link rel="shortcut icon" href="img/Logo_icon.png" type="image/png">
	<link rel="stylesheet" href="slick/slick.css">
	<link rel="stylesheet" href="slick/slick-theme.css">
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
			<h1>Письма</h1>

			<?php
			$db = mysqli_connect("localhost", "root", "root", 'course');
			$sql = mysqli_query($db, "SELECT * FROM `message` ORDER BY Id DESC");

			while($result = mysqli_fetch_array($sql)){
				echo '<div class="letter">';
				echo '<p>' . date('d.m.Y : H.i.s', $result['data_message']) . '</p><br>';
				echo '<p>' . $result['lastname'] . ' ' . $result['firstname'] . '</p><br>';
				echo '<p>Номер телефона: ' . $result['phone'] . '</p>';
				echo '<p>Email: ' . $result['email'] . '</p><br>';
				echo '<p>' . $result['message_subject'] . '</p>';
				echo '<p>' . $result['message'] . '</p>';
				$Id = $result['Id'];?>
				<div class="a"><a href="processing/delete_letter.php?ID=<?=$Id?>"><?echo '<p>удалить</p></a></div>';
				echo '</div>';
			}

			$db -> close();
			?>
		</div>
	</section>
</body>
</html>
<? else: 
		echo "Авторизуйтесь как администратор.";
endif; ?>