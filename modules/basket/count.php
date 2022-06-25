<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
// если есть выбранный запрос POST и данные сервера равны запросу
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
     // если есть выбранный куки корзины
    if (isset($_COOKIE["basket"])) {
       
        $basket = $_COOKIE["basket"];
        $basket = json_decode($_COOKIE["basket"], true);
        // цикл вывода названия и айди выбранных товаров в корзине
        for ($i = 0; $i < count($basket["basket"]); $i++) {

        	if($basket["basket"][$i]["product_id"] == $_POST["id"]) {

        	 	$basket["basket"][$i]["count"] = $_POST["count"];
            }
        }

	    // преобразование массива в JSON формат
	    $jsonProduct = json_encode($basket);
		// обнуляем куки
		setcookie("basket", "", 0, "/");
		// добавляем куки
		setcookie("basket", $jsonProduct, time() + 60*60, "/");
	    // преобразование массива количества записей в корзине в JSON формат 
		echo json_encode([
	        "count" => count($basket["basket"])
		]);
	}
}