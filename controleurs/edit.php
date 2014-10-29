<?php

require_once('./modeles/edit.php');

	if(isset($_POST['editBook'])){
		$save = editBook($auth, $_POST['type'], $_POST['otherType'], $_POST['title'], $_POST['story'], $_POST['bookId']);
	}

	$check = checkAuthor($auth, $_GET['act']);
	$myBook = getYourBook($auth, $_GET['act']);
	$types = getAllTypes($auth);

if ((strstr($_SERVER['HTTP_ACCEPT'], "html") == TRUE)) {
	require_once('./vues/edit.php');
}

?>