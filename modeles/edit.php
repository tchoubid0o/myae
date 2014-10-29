<?php

function getYourBook($auth, $id){
    $check = $auth->prepare('SELECT * FROM books WHERE id = :id AND author = :author');
    $check->bindValue(":id", $id, PDO::PARAM_INT);
    $check->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
    $check->execute();
    $i=0;
    while($donnees = $check->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['title'] = $donnees['title'];
        $data[$i]['category'] = $donnees['category'];
        $data[$i]['date'] = $donnees['date'];
        $data[$i]['story'] = $donnees['story'];

        $i++;
    }
    if(!empty($data)){
        return $data;
    }
}

function getAllTypes($auth){
    $types = $auth->query('SELECT * FROM category');
    $i=0;
    while($donnees = $types->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['libelle'] = $donnees['libelle'];
        $i++;
    }
    return($data);
}

function checkAuthor($auth, $id){
    $check = $auth->prepare('SELECT COUNT(*) AS nb FROM books WHERE id = :id AND author = :author');
    $check->bindValue(":id", $id, PDO::PARAM_INT);
    $check->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
    $check->execute();
    $nb = $check->fetch();
    if(!empty($nb)){
        return $nb;
    }
}

function editBook($auth, $type, $otherType, $title, $story, $bookId){
    $edit['message'] = "";
    $check = checkAuthor($auth, $bookId);
    var_dump($check);
    if($check['nb'] > 0){
    if(isset($type) && !empty($type)){
        if($type == -1){
            if(empty($otherType)){
                $edit['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> La catégorie du livre n'a pas été renseignée.</div>";
            }
        }
        if(empty($edit['message'])){
            if(isset($title) && !empty($title)){
                if(isset($story) && !empty($story)){
                    //Everything is OK, we can edit the book in the DB
                    if($type != -1){
                        $insert = $auth->prepare('UPDATE `books` SET `title` = :title, `category` = :type, `story` = :story WHERE author = :author AND id = :id');
                        $insert->bindValue(":title", $title, PDO::PARAM_STR);
                        $insert->bindValue(":type", $type, PDO::PARAM_INT);
                        $insert->bindValue(":story", $story, PDO::PARAM_STR);
                        $insert->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
                        $insert->bindValue(":id", $bookId, PDO::PARAM_INT);
                        $insert->execute();

                        $edit['message'] .= "<div class='alert alert-success' role='alert'><strong>Bravo,</strong> Le livre: \"<strong>" . $title . "</strong>\" a correctement été édité.</div>";
                    }
                    else{
                        //First we have to create another type
                        $newCat = $auth->prepare('INSERT INTO `category`(`libelle`) VALUES (:libelle)');
                        $newCat->bindValue(":libelle", htmlspecialchars($otherType), PDO::PARAM_STR);
                        $newCat->execute();
                        $idCat = $auth->lastInsertId();

                        $insert = $auth->prepare('UPDATE `books` SET `title` = :title, `category` = :type, `story` = :story WHERE author = :author AND id = :id');
                        $insert->bindValue(":title", $title, PDO::PARAM_STR);
                        $insert->bindValue(":type", $idCat, PDO::PARAM_INT);
                        $insert->bindValue(":story", $story, PDO::PARAM_STR);
                        $insert->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
                        $insert->bindValue(":id", $bookId, PDO::PARAM_INT);
                        $insert->execute();

                        $edit['message'] .= "<div class='alert alert-success' role='alert'><strong>Bravo,</strong> Le livre: \"<strong>" . $title . "</strong>\" a correctement été édité.</div>";
                    }
                }
                else{
                    $edit['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> veuillez rédiger du contenu.</div>";
                }
            }else{
                $edit['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Le titre du livre n'a pas été renseigné.</div>";
            }
        }
    }
    else{
        $edit['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> La catégorie du livre n'a pas été renseignée.</div>";
    }
    }
    else{
        $edit['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Vous n'êtes pas l'auteur de ce livre.</div>";
    }
    return($edit);
}

?>