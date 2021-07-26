<?
setcookie('user', $result['name'], time() - 3600, "/");
setcookie('user_id', $result['id'], time() - 3600, "/");
setcookie('admin', 'admin', time() - 3600, "/");
header('Location: /');
?>