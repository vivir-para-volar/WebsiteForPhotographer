<?
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	$pass = md5($pass);

	if($login == 'admin' && $pass == md5('admin'))
	{
		setcookie('user', 'admin', time() + 3600, "/");
		setcookie('user_id', 1, time() + 3600, "/");
		header('Location: /admin.php');
		exit();
	}

	$db = mysqli_connect("localhost", "root", "root", 'course');
	$sql = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '$login' and `password` = '$pass'");

	$count = 0;
	while ($result = mysqli_fetch_array($sql)) {
		$count++;

		setcookie('user', $result['name'], time() + 3600, "/");
		setcookie('user_id', $result['id'], time() + 3600, "/");
	}

	if($count == 0){
		echo "Такой пользователь не найден";
		exit();
	}

	$db->close();

	header('Location: /');
?>