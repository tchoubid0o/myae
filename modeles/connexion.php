<?php
function connexion($auth, $mail, $password, $remember) {
    if(!isset($_SESSION['id'])) {
        if(isset($mail) && !empty($mail) && isset($password) && !empty($password)) {
            $connexion['message_mail'] = "";
            $connexion['message_password'] = "";
            $connexion['message_actif'] = "";
            if($remember){
                $year = time() + 31536000;
                setcookie('remember_me', $mail, $year);
            }
            // On vérifie si le mail existe dans la bdd
            if(empty($connexion['message_pseudo'])) {
                $retour_check_pseudo = $auth->prepare('SELECT COUNT(*) AS nb FROM user WHERE mail = :mail');
                $retour_check_pseudo->bindValue(':mail', $mail, PDO::PARAM_STR);
                $retour_check_pseudo->execute();
                $nb_mail = $retour_check_pseudo->fetch();

                if($nb_mail['nb'] != 1) {
                    $connexion['message_mail'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong>Le mail entr&eacute; n'existe pas.</div>";
                }
                else {
                    if(empty($connexion['message_password'])) {
                        $retour_check_pass = $auth->prepare('SELECT * FROM user WHERE mail = :mail');
                        $retour_check_pass->bindValue(':mail', $mail, PDO::PARAM_STR);
                        $retour_check_pass->execute();
                        $mdp = $retour_check_pass->fetch();
                           if($mdp['password'] != md5("web".(sha1($password))."site")) {
                                $connexion['message_password'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong>Vous avez entré un mauvais mot de passe!</div>";
                            }
                            else {
                                // On remplit les sessions du joueur. 
                                $connexion['ok'] = 1;
                                $connexion['message_global'] = "<div class='alert alert-success' role='alert'><strong>Bravo,</strong>Vous êtes maintenant connecté !</div>";
                                $_SESSION['id'] = $mdp['id'];
                                $_SESSION['mail'] = $mail;
                                $_SESSION['prenom'] = $mdp['prenom'];
                                $_SESSION['nom'] = $mdp['nom'];
                                $_SESSION['adm'] = 0;
                            }

                            $retour_check_pass->closeCursor();
                        }
                }

                $retour_check_pseudo->closeCursor();
            }

            
        }
        else {
            $connexion['message_global'] = "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong>Vous devez remplir tous les champs.</div>";
        }
    }
    else {
        $connexion['message_global'] = "<div class='alert alert-warning' role='alert'><strong>Erreur,</strong>Vous &ecirc;tes d&eacute;j&agrave; connect&eacute; !</div>";
    }
    return $connexion;
}
?>