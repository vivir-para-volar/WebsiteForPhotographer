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

	<section class="estance">
		<div class="block_ectance">
			<div class="reg">
				<h1>Форма авторизации</h1>
				<form action="processing/processind_authorization.php" method="POST">
					<input type="text" class="text_input" name="login" placeholder="Введите логин" required><br><br>
					<input type="password" class="text_input" name="pass" placeholder="Введите пароль" required><br><br>

					<input type=submit value="Войти" class="button_contacts">  
					<input type=reset value="Отменить" class="button_contacts"> 
				</form>
				<br>
				<p>У вас нет аккаунта? <a href="registration.php" class="a_purple">Регистрация</a></p>
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