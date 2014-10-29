<?php

require_once('./modeles/write.php');

	$types = getAllTypes($auth);
	if(isset($_POST['writeBook'])){
		$save = saveBook($auth, $_POST['type'], $_POST['otherType'], $_POST['title'], $_POST['story']);
	}

if ((strstr($_SERVER['HTTP_ACCEPT'], "html") == TRUE)) {
	require_once('./vues/write.php');
}

?>