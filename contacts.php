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

	<section class="contacts">
		<h1>Контакты</h1>
		<p class="info_contacts">Есть вопросы?<br>Думаете о бронировании частной фотоссесии?<br>Не стесняйтесь обращаться по любой причине - по электронной почте, звонку, в социальныx сетях или просто заполните форму ниже и нажмите «Отправить».<br>Email: irina.tooru@yandex.ru<br>Телефон: 8-920-569-08-54</p>
		<form method="POST" class="form_contacts" id="form_contacts">
				<h2>Форма для заполнения</h2>

				<p>Имя</p><br>
				<input type="text" name="firstname" placeholder="Имя" class="text_input" required>
				<input type="text" name="lastname" placeholder="Фамилия" class="text_input" required><br>
				
				<br><p>Пол</p><br>
				<p>
					<input type=radio name="gender" value="male" class="radio_input" required>М
					<input type=radio name="gender" value="female" class="radio_input" required>Ж
				</p>

				<br><p>Контактные данные</p><br> 
				<input type="tel" name="phone" placeholder="Телефон" class="text_input" required>
				<input type="email" name="email" placeholder="Электронная почта" class="text_input" required><br>
				
				<br><p>Тема сообщения</p><br> <input type="text" name="message_subject" class="text_input" required><br>
				<br><p>Сообщение</p><br><textarea name="message" class="message_input" required></textarea><br>
				
				<input type=submit value="Отправить запрос" class="button_contacts">  
				<input type=reset value="Отменить" class="button_contacts"> 
				
				<?php 
				if(!empty($_REQUEST)){
					if($_REQUEST['firstname'] != null)
					{
						// Переменные с формы
						$firstname = $_REQUEST['firstname'];
						$lastname = $_REQUEST['lastname'];
						$gender = $_REQUEST['gender'];
						$phone = $_REQUEST['phone'];
						$email = $_REQUEST['email'];
						$message_subject = $_REQUEST['message_subject'];
						$message = $_REQUEST['message'];

						try {
							$db = mysqli_connect("localhost", "root", "root", 'course');
							if ($db == false){
								print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
							}

							$sql = mysqli_query($db, "INSERT INTO `message` (`firstname`, `lastname`, `gender`, `phone`, `email`, `message_subject`, `message`, `data_message`) VALUES ('$firstname', '$lastname', '$gender', '$phone', '$email', '$message_subject', '$message', '".time()."')");
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



