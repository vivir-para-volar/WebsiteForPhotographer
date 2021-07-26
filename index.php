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

	<section class="main">
		<div class="block">
			<p>Photography</p>
			<h1>Irina Tooru</h1>
			<div class="main_button">
				<a href="contacts.php" class="border-button">Отправить запрос</a>
			</div>
		</div>
		<img src="img/main.png" alt="">
	</section>

	<div class="gradient"></div>

	<section class="phrase">
		<img src="img/foto_phrase.png" alt="" class="foto_phrase">
		<div class="block_phrase double-border">
			<h2>Чтобы показать себя перед камерой, нужна смелость</h2>
			<p>Слишком много людей избегают фотографироваться. Они привыкли разочаровываться и чувствовать себя некомфортно, когда на них направляют камеру. Но что, если бы фотосессия могла бы стать для вас вдохновляющим опытом, и вы могли бы испытывать гордость и радость, глядя на свои фотографии?</p>
		</div>
		<img src="img/foto_2_phrase.png" alt="" class="foto_1_phrase">
	</section>

	<div class="gradient_back_1"></div>

	<section class="about_me">
		<div class="block_about_me double-border">
			<h2>Позвольте мне сделать ваши лучшие фотографии, которые вы когда-либо видели</h2>
			<p>Меня зовут Ирина, я фотограф из Владимира, Россия. Я фотографирую людей, которые хотят испытать опыт, чтобы найти себя, и людей, которые уже точно знают, кто они и что их стоит отметить.<br><br>Мы сами себе величайшие критики и так строги к себе, как никогда бы ни к кому другому. Ваша фотосессия связана с тем, что вам нравится в себе, а не с тем, что, по вашему мнению, вам нужно изменить. Однако дело не в том, чтобы превратиться в другого человека. Скорее цель состоит в том, чтобы показать вам, как красиво вы выглядите, если смотреть глазами, которые не судят вас и видят в вас только лучшее.</p>
		</div>
		<img src="img/Ira.jfif" alt="" class="Ira_1">
		<img src="img/Irina_T.jfif" alt="" class="Ira_2">
		<img src="img/Irina.jfif" alt="" class="Ira_3">
	</section>	

	<div class="gradient"></div>

	<section class="way">
		<h2 class="way_title">Ваш путь к фотографиям, которые будут снова и снова напоминать вам о вашей красоте</h2>
		<div class="way_1">
			<div class="number">
				<p class="double-border">1</p>
			</div>
			<h3>запрос</h3>
			<p>После того, как вы свяжетесь со мной, мы назначим встречу для необязательной консультации, во время которой мы еще раз обсудим все детали и поговорим о том, как ВЫ хотели бы сфотографироваться.</p>
		</div>
		<div class="way_2">
			<div class="number">
				<p class="double-border">2</p>
			</div>
			<h3>фотосессия</h3>
			<p>В студии вас оформят профессионально. После этого я расскажу вам о позе за позой в течение двух с половиной часов фотосессии. Не волнуйтесь, вам не нужен опыт работы с камерой - я здесь для этого.</p>
		</div>
		<div class="way_3">
			<div class="number">
				<p class="double-border">3</p>
			</div>
			<h3>заказ</h3>
			<p>Через 2-3 недели после фотосессии вы приходите ко мне в студию на прием. Здесь вы можете увидеть свои готовые фотографии и решить, какую из них вы хотите купить.</p>
		</div>
		<div class="way_button">
			<a href="contacts.php" class="border-button black">Отправить запрос</a>
		</div>
	</section>
	
	<div class="gradient_back_2"></div>

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