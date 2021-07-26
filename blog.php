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
				<a href="processing/exit.php" class="menu_5">Выход</a>
			<? endif; ?>
		</div>
	</header>

	<section class="blog">
		<h1>Блог</h1>
		<div class="blog_text"><p>В своем блоге я показываю отрывки из прошлых съемок, делюсь своими мыслями о фотографии и стараюсь ответить на все ваши вопросы.</p></div>
		<?php
		$db = mysqli_connect("localhost", "root", "root", 'course');
		$sql = mysqli_query($db, 'SELECT `Id`, `title`, `img`, `data_blog` FROM `blog` ORDER BY Id DESC');
		$count = 0;?>
		<div class="slider_2">
		<?while ($result = mysqli_fetch_array($sql)) {
			if($count % 2 == 0 && $count != 0){
				echo '</div>';
				echo '</div>';
			}
			if($count % 2 == 0){
				echo '<div class="slider_item">';
				echo '<div class="slider_item_plus">';
			}?>
					<div class="blog_item">
						<?php
						$Id = $result['Id'];
						$img = $result['img'];
						echo '<img src="' . $img . '">';?>
						<a href="blog_item.php?ID=<?=$Id?>"><h2><?=$result['title']?></h2></a>
						<?echo '<p>' . date('d.m.Y : H.i.s', $result['data_blog']) . '</p>';
						?>
					</div>
					<?
			$count += 1;
		}
		echo '</div>';
		echo '</div>';
		$db -> close();?>
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