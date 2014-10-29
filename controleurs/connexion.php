<?php
require_once('./modeles/connexion.php');

if(isset($_POST['connexion'])) {
	if(empty($_POST['remember'])){
		$_POST['remember'] = -1;
	}
	$connexion = connexion($auth, $_POST['mail'], $_POST['password'], $_POST['remember']);
}

require_once('./vues/connexion.php');
?>