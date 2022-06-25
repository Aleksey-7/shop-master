<?php

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_COOKIE["basket"])) {
    	$basket = json_decode($_COOKIE["basket"], true);

        for($i = 0; $i < count($basket["basket"]); $i++) {
        	if($basket["basket"][$i]['product_id'] == $_POST["id"]) {
        		unset($basket["basket"][$i]);
        		sort($basket["basket"]);
        	}
        }

        // преобразование массива в JSON формат
	    $jsonProduct = json_encode($basket);
		// обнуляем куки
		setcookie("basket", "", 0, "/");
		// добавляем куки
		setcookie("basket", $jsonProduct, time() + 60*60, "/");
	    // преобразование массива количества записей в корзине в JSON формат 
		echo $jsonProduct;

    }
    

}





?>