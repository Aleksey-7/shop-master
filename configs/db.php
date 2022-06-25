<?php
// Данные для подключения БД
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
//создаём подключение
$conn = new mysqli($servername, $username, $password, $dbname);
//проверка на подключение
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
//устанавливаем кодировку
$conn->set_charset("utf8");

?>