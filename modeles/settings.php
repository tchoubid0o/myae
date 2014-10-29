<?php

function getUserinfo($auth){
    $datas = $auth->prepare('SELECT * FROM user WHERE id = :id');
    $datas->BindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
    $datas->execute();
    $i=0;
    while($donnees = $datas->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['prenom'] = $donnees['prenom'];
        $data[$i]['nom'] = $donnees['nom'];
        $data[$i]['mail'] = $donnees['mail'];

        $i++;
    }
    if(!empty($data)){
        return $data;
    }
}

function saveSettings($auth, $prenom, $nom, $mail, $password, $password2){
    $save['message'] = "";
    
    if($password == $password2){
        if(strlen($password) < 4) {
            $save['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Votre mot de passe doit faire au moins 4 caractères.</div>";
        }
        else{
            $edit = $auth->prepare('UPDATE `user` SET `mail` = :mail, `password` = :password WHERE id = :id');
            $edit->bindValue(":mail", $mail, PDO::PARAM_STR);
            $edit->bindValue(':password', md5("web".(sha1($password))."site"), PDO::PARAM_STR);
            $edit->execute();
            $save['message'] .= "<div class='alert alert-success' role='alert'><strong>Bravo,</strong> Votre compte a bien été modifié.</div>";
        }
    }else{
        $save['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Les deux mots de passes ne correspondent pas.</div>";
    }
    if(!empty($save)){
        return($save);
    }
}


?>