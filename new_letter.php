<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

if(isset($_POST["email"])) {

	$result = $conn->query("SELECT * FROM users WHERE email='" . $_POST["email"] . "'");
    $user_n = mysqli_fetch_assoc($result);
}

if(isset($_POST["send"])) {
	echo "Письмо отправлено повторно!";
    
	$link = "<a href='http://shop-master.local/register.php?u_code=" . $user_n["confirm_mail"] . "'>Confirm</a>";
	mail($_POST["email"], 'Register', $link);
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>New Letter</title>
</head>
<body>
	<form method="POST">
	    <p>Email<br/>
		<input type="text" name="email">
	    </p>
        <button name="send" type="submit">Send</button>
	</form>

</body>
</html>