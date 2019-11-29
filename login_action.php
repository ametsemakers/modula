<?php
if (isset($_POST['envoyer']))
{
	$login = $_POST['login'];
	$mdp = $_POST['mdp'];

	include 'connexion.php';

	// ici, il faudra encrypter le mot de passe pour pouvoir le comparer en situation réelle

	$request = $pdo->prepare("select * from user where login=:login and password=:mdp");
  
	$request->execute(array(':login'=>$login, ':mdp'=>$mdp));
    
    session_start();

	if ($request->rowCount()==0)
	{
        $_SESSION['login_error_msg'] = "Désolé, le nom ou mot de passe n'est pas valide.";
        header('Location: login.php');
        exit();
	}
	else
	{ 
		$ligne_tab = $request->fetch();
		$_SESSION['login']=$login;

		header('location: admin.php'); 
	}
	
	$request->closeCursor();
}
else
{
    $_SESSION['login_error_msg'] = "Il y a une erreur dans la matrice, essayez ulterieurement.";
	header("Location: login.php");
    exit();
}
?>
