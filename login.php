<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
    
    $password = md5($_POST["password"]);
    
    if(isset($_POST["username"]) && isset($password) && isset($_POST["username"]) != "" && isset($password) != "") {
        $sql = "SELECT * FROM users WHERE login LIKE '" . $_POST["username"] . "' AND password LIKE '$password' AND 'verifided' LIKE '1'";

        $result = $conn->query($sql);
        $user_n = mysqli_num_rows($result);
        if ($user_n == 1) {
        	echo "Пользователь авторизован";
        }else{
        	header("Location: /new_letter.php");
        }
    }
}
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST">
        <p>Username<br/>
		<input type="text" name="username">
	    </p>
	    
	    <p>Password<br/>
		<input type="password" name="password">
		</p>
        <button type="submit">Log_in</button>
	</form>

</body>
</html>