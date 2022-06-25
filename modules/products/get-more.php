<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
// переменная равна GET запросу
$page = $_GET["page"];
// при каждом новой странице выводить ещё 6 товаров 
$offset = $page * 6;
// запрос к таблице товаров с лимитом 6 товаров с добавлением последующих 6 с циклом повторения запроса к БД
$sql = "SELECT * FROM products LIMIT 6 OFFSET " . $offset;
$result = $conn->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
	include $_SERVER["DOCUMENT_ROOT"] . "/parts/product_card.php";       
}
 
?>