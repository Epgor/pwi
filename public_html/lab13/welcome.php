<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Lab13 welcome</title>
</head>

<body>
<form action="logout.php">
    <input type="submit" value="wyloguj sie" />
</form>
<?php

    echo "<p>Witaj:  ".$_SESSION['user']."</p>";
    echo "<p><b>Drewno</b>: ".$_SESSION['drewno'];
	echo " | <b>Kamień</b>: ".$_SESSION['kamien'];
	echo " | <b>Zboże</b>: ".$_SESSION['zboze']."</p>";
	echo "<br /><b>Armia</b>: ".$_SESSION['armia']."</p>";


	
?>

</body>
</html>