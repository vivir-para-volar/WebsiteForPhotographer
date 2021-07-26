<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="shortcut icon" href="img/Logo_icon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<title>Irina Tooru</title>
</head>
<body>
	<header>
		<a href="index.php" class="logo"><img src="img/Logo.png" alt=""></a>
		<div class="menu">
			<a href="index.php" class="menu_1">На главную</a>
			<a href="blog.php" class="menu_2">Блог</a>
			<a href="reviews.php" class="menu_3">Отзывы</a>
			<a href="contacts.php" class="menu_4">Контакты</a>
			<? if($_COOKIE['user'] == ""): ?>
				<a href="entance.php" class="menu_5">Вход</a>
			<? else: ?>
				<a href="processing/exit.php">Выход</a>
			<? endif; ?>
		</div>
	</header>

	<section class="article">
		<?php
		$db = mysqli_connect("localhost", "root", "root", 'course');
		$sql = mysqli_query($db, "SELECT * FROM `blog` WHERE `Id` = {$_GET['ID']}");

		$result = mysqli_fetch_array($sql);
		$img = $result['img'];
		echo '<p>' . date('d.m.Y : H.i.s', $result['data_blog']) . '</p>';
		echo '<h1>' . $result['title'] . '</h1>';
		?>
		<div class="slider">
			<div class="slider_item">
				<div class="photo" style="background-image: url(<?=$result['img']?>);"></div>
			</div>
			<?
			if($result['img_1'] != null){
				echo 
				'<div class="slider_item">
					<div class="photo" style="background-image: url(' . $result['img_1'] . ');"></div>
				</div>';
			}
			if($result['img_2'] != null){
				echo 
				'<div class="slider_item">
					<div class="photo" style="background-image: url(' . $result['img_2'] . ');"></div>
				</div>';
			}
			if($result['img_3'] != null){
				echo 
				'<div class="slider_item">
					<div class="photo" style="background-image: url(' . $result['img_3'] . ');"></div>
				</div>';
			}
			if($result['img_4'] != null){
				echo 
				'<div class="slider_item">
					<div class="photo" style="background-image: url(' . $result['img_4'] . ');"></div>
				</div>';
			}
			if($result['img_5'] != null){
				echo 
				'<div class="slider_item">
					<div class="photo" style="background-image: url(' . $result['img_5'] . ');"></div>
				</div>';
			}?>
		</div>
		<?echo '<p>' . $result['text'] . '</p>';
		$db -> close();?>

		<form method="POST" class="form_review_user">
			<h2>Оставить комментарий</h2>

			<? if($_COOKIE['user'] != ""): ?>
				<textarea name="comment" class="big_input" placeholder="Ваш комментарий" required></textarea><br>
				<input type="submit" value="Отправить" class="button_contacts">  
				<input type="reset" value="Отменить" class="button_contacts"> 
			<? else: ?>
				<p>Оставить комментарий может только авторизованный пользователь. <a href="entance.php" class="a_purple">Авторизация</a></p>
			<? endif; ?>

			<?php 
			if(!empty($_REQUEST)){
				if($_REQUEST['comment'] != null)
				{
					$id_user = $_COOKIE['user_id'];
					$comment = $_REQUEST['comment'];
					$ID = $_GET['ID'];

					try 
					{
						$db = mysqli_connect("localhost", "root", "root", 'course');
						if ($db == false){
							print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
						}

						$sql = mysqli_query($db, "INSERT INTO `comments` (`id_blog`, `id_user`, `comment`, `data`) VALUES ('$ID', '$id_user', '$comment', '".time()."')");

						if (!$sql) {
							echo '<p> Произошла ошибка: ' . mysqli_error($db) . '</p>';
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

		<div class="block_comments">
			<?php
			$db = mysqli_connect("localhost", "root", "root", 'course');
			$sql = mysqli_query($db, "SELECT * FROM `comments` WHERE `id_blog` = {$_GET['ID']} ORDER BY id DESC");
			while ($result = mysqli_fetch_array($sql)) {
				$id = $result['id_user'];
				echo '<p>' . date('d.m.Y - H:i', $result['data']) . '</p>';
				$name = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = {$id}");
				$result_name = mysqli_fetch_array($name);
				echo '<p>' . $result_name['name'] . '</p>'; 
				echo '<p>' . $result['comment'] . '</p>';
				echo '<br>';
			}
			$db -> close();
			?>
		</div>
	</section>


	<footer>
		<div class="logo_footer">
			<a href="index.php" class="img_logo"><img src="img/Logo.png" alt=""></a>
			<span class="subscribe_title">Irina Tooru</span>
		</div>
		<div class="follow_us">
			<a href="https://www.instagram.com/irinatooru/"><img src="img/icon-instagram.png" alt=""></a>
			<a href="https://vk.com/imprint_me"><img src="img/icon-vk.png" alt=""></a>
		</div>
	</footer>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="slick/slick.min.js"></script>
	<script src="js/script.js"></script>

</body>
</html>