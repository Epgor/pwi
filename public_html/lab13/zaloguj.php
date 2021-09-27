<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: login.php');
		
		exit();
	}

	require_once "connect.php";

	$conn = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($conn->connect_errno!=0)
	{
		echo "Error: ".$conn->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($result = @$conn->query(
		sprintf("SELECT * FROM Plamiona WHERE login='%s'",
		mysqli_real_escape_string($conn,$login))))
		{
			$users_count = $result->num_rows;
			if($users_count>0)
			{
				$wiersz = $result->fetch_assoc();
				if (password_verify($haslo, $wiersz['password']))
				{
				$_SESSION['zalogowany'] = true;
				$_SESSION['user'] = $wiersz['login'];
				$_SESSION['haslo'] = $wiersz['password'];
				$_SESSION['drewno'] = $wiersz['wood'];
                $_SESSION['kamien'] = $wiersz['stone'];
	            $_SESSION['zboze'] = $wiersz['wheat'];
	            $_SESSION['armia'] = $wiersz['manpower'];
				unset($_SESSION['blad']);
				$result->free_result();
				header('Location: welcome.php');
				}
				else{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: login.php');
				}
			} else {
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: login.php');
			}
		}
		$conn->close();
	}
	
?>