<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
// если есть выбранный запрос POST и данные сервера равны запросу
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	// выводим товар с таблицы товаров где id равен запросу
	$sql = "SELECT * FROM products WHERE id=" . $_POST["id"];
	$result = $conn->query($sql);
	$product = mysqli_fetch_assoc($result);
	
	// если есть выбранный куки корзины
    if (isset($_COOKIE["basket"])) {
    	// преобразуем JSON в массив данных
    	$basket = json_decode($_COOKIE["basket"], true);
    	
    	$issetProduct = 0;
        for($i = 0; $i < count($basket["basket"]); $i++) {
            if($basket["basket"][$i]["product_id"] == $product['id']) {
            	$basket["basket"][$i]['count']++;
            	$issetProduct = 1;
            }
        
        }

        if($issetProduct != 1) {
            $basket["basket"][] = [
	    		"product_id" => $product['id'],
	    		"count" => 1
    	];
        }
    	
    	

    } else {
    	// иначе выводим id всех последующих продуктов в корзине, если корзина пустая
    	$basket = [ "basket" => [
    	 ["product_id" => $product['id'],
    		"count" => 1] 
    	] ];
    
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
?>

