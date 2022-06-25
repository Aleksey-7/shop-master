<?php

include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
include $_SERVER["DOCUMENT_ROOT"] . "/configs/configs.php";
include $_SERVER["DOCUMENT_ROOT"] . "/modules/telegram/send-message.php";

if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {

    $sql = "SELECT * FROM users WHERE phone LIKE " . $_POST["phone"];
    
    $user_id = 0;
    
    $result = $conn->query($sql);
    
    
    if($result->num_rows > 0) {
    	$user = mysqli_fetch_assoc($result);
    	$user_id = $user["id"];
    }else{
    	$sql = "INSERT INTO users(login, phone) VALUES ('" . $_POST["username"] . "', '" . $_POST["phone"] . "')";
    

        if($conn->query($sql)) {
        	echo "User added!";
        	$user_id = $conn->insert_id;
        }else{
            echo "error";
        }
    }
    
    if(isset($_COOKIE["basket"])) { 
        $status = "new";
        $sql = "INSERT INTO orders ( user_id, products, address, status) VALUES ('" . $user_id . "', '" . $_COOKIE["basket"] . "', '" . $_POST["address"] . "', '" . $status . "')";

        if ($conn->query($sql)) {
        	// обнуляем куки
	        setcookie("basket", "", 0, "/");
        	echo "Заказ оформлен!<br/><a href='/'>На главную</a>";
            message_to_telegram('New order!');
        } 
    }
}	

?>