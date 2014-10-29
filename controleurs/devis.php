<?php

require_once('./modeles/devis.php');
	
	if(empty($_GET['act'])){
		$_GET['act'] = 1;
	}
	$datas = getDevisOnPage($auth, $_GET['act']);
	$nbPage = getNbPage($auth, 10);
	$sum = getTotalEstimate($auth);

require_once('./vues/devis.php');

?>