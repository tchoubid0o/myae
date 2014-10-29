<?php
function getNbPage($auth, $nbEltPerPage){
	$nbPages = $auth->query('SELECT COUNT(*) AS nb FROM devis');
	$nbPage = $nbPages->fetch();
	$nbPages->closeCursor();

	return ceil($nbPage['nb'] / $nbEltPerPage);
}

function getDevisOnPage($auth, $actualPage){
	$firstDevis = 10 * ($actualPage - 1); // +1 Offset du LIMIT commencent à 0 et non à 1.
	$elts = $auth->prepare('SELECT * FROM devis d INNER JOIN clients c ON d.client = c.id ORDER BY d.id ASC LIMIT :first, 10');
	$elts->bindValue(":first", $firstDevis, PDO::PARAM_INT);
	$elts->execute();
	$i=0;
	while($donnees = $elts->fetch()){
		$data[$i]['id'] = $donnees['id'];
		$data[$i]['id_devis'] = $donnees['id_devis'];
		$data[$i]['date'] = $donnees['date'];
		$data[$i]['statut'] = $donnees['statut'];
		$data[$i]['client'] = $donnees['client'];
		$data[$i]['total'] = $donnees['total'];
		$data[$i]['nom'] = $donnees['nom'];
		$data[$i]['sexe'] = $donnees['sexe'];
		$data[$i]['prenom'] = $donnees['prenom'];
		$data[$i]['adresse'] = $donnees['adresse'];
		$data[$i]['cp'] = $donnees['cp'];
		$data[$i]['ville'] = $donnees['ville'];
		$data[$i]['pays'] = $donnees['pays'];

		$i++;
	}
	if(!empty($data)){
		return $data;
	}
}

function getTotalEstimate($auth){
	$sum = $auth->query('SELECT SUM(total) FROM devis');
	$sum = $sum->fetch();
	return $sum;
}
?>