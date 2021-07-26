<?
$db = mysqli_connect("localhost", "root", "root", 'course');
$sql = mysqli_query($db, "DELETE FROM `reviews` WHERE `Id` = {$_GET['ID']}");
if ($sql) {
	header('Location: /admin_reviews.php');
} 
else {
	echo '<p>Произошла ошибка: ' . mysqli_error($db) . '</p>';
}
$db -> close();
?>