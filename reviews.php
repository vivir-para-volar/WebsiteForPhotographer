<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="shortcut icon" href="img/Logo_icon.png" type="image/png">
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

	<section class="reviews">
		<h1>Отзывы</h1>
		<p class="info_reviews">Ваши отзывы очень дороги для меня!<br>Ради ваших положительных эмоций я работаю, и очень благодарна за то, что вы нашли минутку написать пару слов о нашей съемке.<br>Большое спасибо!</p>

		<div class="rev_1">
			<div class="block_rev_1 double-border">
				<h2>Анна Кондратьева</h2>
				<p>Спасибо Вам огромное за Вашу работу! Это был потрясающий опыт. Фото прекрасные.<br>Мне супер-повезло, что я сразу попала на вас. Вы так все хорошо организовали. У меня вообще способностей нет, я прямо чувствовала, что я стою пустая совершенно. Но она все мне показала, настроила на нужную волну. Мне очень понравилось с Вами общаться, надеюсь, что в будущем еще доведется.<br>Теперь я хочу вернуться, арендовать студию побольше и на подольше, и опять поработать с Юлей. Пока почитаю про позирование.</p>
			</div>
			<img src="img/Anna_2.jpg" alt="" class="foto_1">
			<img src="img/Anna_4.jpg" alt="" class="foto_2">
			<img src="img/Anna_3.jpg" alt="" class="foto_3">
		</div>
		<div class="rev_2">
			<div class="block_rev_2 double-border">
				<h2>Екатерина Румянцева</h2>
				<p>Я с нетерпением ждала съемку, но, конечно, немного нервничала, потому что не знала, чего ожидать и что буду чувствовать в такой ситуации. Но меня с самого начала так хорошо приняли, что нервозность быстро прошла.<br>Съемка определенно превзошла мои ожидания, была такая приятная атмосфера, и я не чувствовал себя неловко. Это сильно укрепило мою уверенность в себе.<br>Фотографии оказались намного красивее, чем я представляла.<br>Я очень рада, что бескрайний интернет свёл нас! Уверена, что мы встретимся ещё не раз!!!<br>Спасибо за великолепную работу! </p>
			</div>
			<img src="img/Ira_3.PNG" alt="" class="foto_4">
			<img src="img/Ira_1.jfif" alt="" class="foto_5">
			<img src="img/Ira_2.PNG" alt="" class="foto_6">
		</div>

		<form method="POST" class="form_review_user">
			<h2>Оставить отзыв</h2>
			<? if($_COOKIE['user'] != ""): ?>
				<textarea name="text" class="textarea_review_user" placeholder="Ваш отзыв" required></textarea><br>
				<input type="submit" value="Отправить" class="button_contacts">  
				<input type="reset" value="Отменить" class="button_contacts"> 
			<? else: ?>
				<p>Оставить отзыв может только авторизованный пользователь. <a href="entance.php" class="a_purple">Авторизация</a></p>
			<? endif; ?>

			<?php 
				if(!empty($_REQUEST)){
					if($_REQUEST['text'] != null)
					{
						// Переменные с формы
						$id_user = $_COOKIE['user_id'];
						$text = $_REQUEST['text'];

						try {
							$db = mysqli_connect("localhost", "root", "root", 'course');
							if ($db == false){
								print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
							}

							$sql = mysqli_query($db, "INSERT INTO `reviews` (`id_user`, `text`, `data_review`) VALUES ('$id_user', '$text', '".time()."')");

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
		
		<div class="textarea_review">
			<div class="block_textarea_review">
				<?php
				$db = mysqli_connect("localhost", "root", "root", 'course');
				$sql = mysqli_query($db, 'SELECT * FROM `reviews` ORDER BY Id DESC');
				while ($result = mysqli_fetch_array($sql)) {
					$id = $result['id_user'];
					echo '<p>' . date('d.m.Y : H.i.s', $result['data_review']) . '</p>';
					$name = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = {$id}");
					$result_name = mysqli_fetch_array($name);
					echo '<p>' . $result_name['name'] . '</p>'; 
					echo '<p>' . $result['text'] . '</p>';
					echo '<br>';
				}
				$db -> close();
				?>
			</div>
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
</body>
</html>