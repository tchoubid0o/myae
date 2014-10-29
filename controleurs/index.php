<?php

require_once('./modeles/index.php');
	$idFirstBook = getFirstBook($auth);
	$datas = getBooksContent($auth, 1);
	$categories = getCategories($auth);
	if(isset($_POST['bookId'])){
		if( (strstr($_SERVER['HTTP_ACCEPT'], "html") == FALSE ) && ($_SERVER['REQUEST_METHOD'] == 'POST') ){
			$bookData = getBook($auth, $_POST['bookId'], $_POST['idCat']);
			echo json_encode($bookData);
		}
	}

	if(isset($_POST['idcategory'])){
		if( (strstr($_SERVER['HTTP_ACCEPT'], "html") == FALSE ) && ($_SERVER['REQUEST_METHOD'] == 'POST') ){
			$categories = getBooksContent($auth, $_POST['idcategory']);
			echo json_encode($categories);
		}
	}

if ((strstr($_SERVER['HTTP_ACCEPT'], "html") == TRUE)) {
	require_once('./vues/index.php');
}

?>