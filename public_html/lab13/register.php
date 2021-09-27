<?php
    session_start();
    if (isset($_POST['login']))
    {
    $flag=true;
            
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if ((strlen($login)<3) || (strlen($login)>30))
    {
        $flag=false;
        $_SESSION['e_login']="login musi posiadać od 3 do 30 znaków!";
    }

    if ((strlen($pass)<6) || (strlen($pass)>30))
    {
        $flag=false;
        $_SESSION['e_pass']="Hasło musi posiadać od 6 do 30 znaków!";
    }

    if (ctype_alnum($login)==false)
	{
			$flag=false;
			$_SESSION['e_login']="login może składać się tylko z liter i cyfr (bez polskich znaków)";
    }
    $haslo_hash = password_hash($pass, PASSWORD_DEFAULT);
    $_SESSION['fr_login'] = $login;
	$_SESSION['fr_pass'] = $pass;

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try 
		{
			$conn = new mysqli($host, $db_user, $db_password, $db_name);
			if ($conn->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				

			
				$result = $conn->query("SELECT login FROM Plamiona WHERE login='$login'");
				
				if (!$result) throw new Exception($conn->error);
				
				$ile_takich_loginow = $result->num_rows;
				if($ile_takich_loginow>0)
				{
					$flag=false;
					$_SESSION['e_login']="Ten login jest już zajęty";
				}
				
				if ($flag==true)
				{
					if ($conn->query("INSERT INTO Plamiona VALUES ('$login', '$haslo_hash', 1000, 1000, 1000, 10)"))
					{
						$_SESSION['info'] = '<span style="color:green">Nowy użytkownik dodany</span>';
					}
					else
					{
						throw new Exception($conn->error);
					}
					
				}
				
				$conn->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera!</span>';
		}

    }


?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Lab13 rejestracja</title>
    <style>
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	
	<form action="login.php">
    <input type="submit" value="Login" />
    </form>
	
    <form  method="post">
	
		Podaj Login: <br /> <input type="text" name="login" /> <br />
        <?php
			if (isset($_SESSION['e_login']))
			{
				echo '<div class="error">'.$_SESSION['e_login'].'</div>';
				unset($_SESSION['e_login']);
			}
		?>

		Podaj Hasło: <br /> <input type="password" name="pass" /> <br />

        <?php
			if (isset($_SESSION['e_pass']))
			{
				echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
				unset($_SESSION['e_pass']);
			}
		?>		
		
		<input type="submit" value="Załóż konto" />
	
    </form>
	
    <?php
	if(isset($_SESSION['info']))	{
        echo $_SESSION['info'];
        unset($_SESSION['info']);}?> 

</body>
</html>