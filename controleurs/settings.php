<?php

require_once('./modeles/settings.php');

	$user = getUserinfo($auth);
	if(isset($_POST['editUserSettings'])){
		$save = saveSettings($auth, $_POST['prenom'], $_POST['nom'], $_POST['mail'], $_POST['password'], $_POST['password2']);
	}

if ((strstr($_SERVER['HTTP_ACCEPT'], "html") == TRUE)) {
	require_once('./vues/settings.php');
}

?>