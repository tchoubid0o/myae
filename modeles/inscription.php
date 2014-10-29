<?php
function inscription($auth, $prenom, $nom, $password, $verification, $email) {
	if(!isset($_SESSION['id'])) {
		if(isset($password) && isset($prenom) && isset($nom) && isset($verification) && isset($email)){

			$inscription['message_prenom'] = "";
			$inscription['message_nom'] = "";
			$inscription['message_email'] = "";
			$inscription['message_password'] = "";

			// Validation email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$inscription['message_email'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Vous devez entrer une adresse email valide.</div>";
			}
			if(empty($inscription['message_email'])) {
				$retour_check_email = $auth->prepare('SELECT COUNT(*) AS nb FROM user WHERE mail = :email');
				$retour_check_email->bindValue(':email', $email, PDO::PARAM_STR);
				$retour_check_email->execute();
				$nb_email = $retour_check_email->fetch();

				if($nb_email['nb'] != 0) {
					$inscription['message_email'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> L'adresse email que vous avez entré est déjâ utilisée.</div>";
				}
				else {
					$_SESSION['inscription_email'] = $email;
				}

				$retour_check_email->closeCursor();
			}

			// Validation mot de passe
			if($password != $verification) { $inscription['message_password'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Les deux mots de passe ne correspondent pas.</div>"; }
			if(empty($inscription['message_password'])) {
				if(strlen($password) < 4) {
					$inscription['message_password'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Votre mot de passe doit faire au moins 4 caractères.</div>";
				}
			}
			// Tout est bon, on ajoute dans la base de donnée et on affiche un message de succès
			if(empty($inscription['message_email']) && empty($inscription['message_password']) && empty($inscription['message_adresse'])) {
				$ip=$_SERVER["REMOTE_ADDR"];
				$req_insert = $auth->prepare("INSERT INTO user(`prenom`, `nom`, `mail`, `password`, `ip`, `adm`)
											VALUES (:prenom, :nom, :email, :password, :ip, 0);");
				$req_insert->bindValue(':prenom', $prenom, PDO::PARAM_STR);
				$req_insert->bindValue(':nom', $nom, PDO::PARAM_STR);
				$req_insert->bindValue(':email', $email, PDO::PARAM_STR);
				$req_insert->bindValue(':password', md5("web".(sha1($password))."site"), PDO::PARAM_STR);
				$req_insert->bindValue(':ip', $ip, PDO::PARAM_STR);
				$req_insert->execute();
				$req_insert->closeCursor();

				$id = $auth->lastInsertId();
				$_SESSION['id'] = $id;
				$_SESSION['mail'] = $email;
				$_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                $_SESSION['adm'] = 0;
				
				//Envoi du mail d'activation
				$destinataire = $email;
				$sujet = "Activer votre compte" ;
				$entete = "From: confirmation@makebooks.fr" ;
				 
				$message = 'Bienvenue sur MakeBooks.fr,
				 
--------------------------------------------------------------------------------------------------------------
Ceci est un mail automatique, Merci de ne pas y répondre.';
				 
				 
				mail($destinataire, $sujet, $message, $entete) ;

				$inscription['message_global'] = "<div class='alert alert-success' role='alert'><strong>Bravo,</strong> Votre compte a été créé, vous pouvez maintenant vous connecter!</div>";
				$inscription['ok'] = 1;
			}			
		}
		else {
			$inscription['message_global'] = "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Vous devez remplir tous les champs.</div>";
		}
	}
	else {
		$inscription['message_global'] = "<div class='alert alert-warning' role='alert'><strong>Erreur,</strong> Vous êtes déjâ inscrit !</div>";
	}
	return $inscription;
	
		
}
?>