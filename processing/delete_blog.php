<?
$db = mysqli_connect("localhost", "root", "root", 'course');
$sql = mysqli_query($db, "DELETE FROM `blog` WHERE `Id` = {$_GET['ID']}");
$sql_1 = mysqli_query($db, "DELETE FROM `comments` WHERE `id_blog` = {$_GET['ID']}");
if ($sql) {
	header('Location: /admin.php');
} 
else {
	echo '<p>Произошла ошибка: ' . mysqli_error($db) . '</p>';
}
$db -> close();
?>