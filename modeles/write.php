<?php

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

function saveBook($auth, $type, $otherType, $title, $story){
    $save['message'] = "";
    if(isset($type) && !empty($type)){
        if($type == -1){
            if(empty($otherType)){
                $save['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> La catégorie du livre n'a pas été renseignée.</div>";
            }
        }
        if(empty($save['message'])){
            if(isset($title) && !empty($title)){
                if(isset($story) && !empty($story)){
                    //Everything is OK, we can save the book in the DB
                    if($type != -1){
                        $insert = $auth->prepare('INSERT INTO `books`(`title`, `category`, `author`, `date`, `story`) VALUES (:title,:type,:author,NOW(),:story)');
                        $insert->bindValue(":title", $title, PDO::PARAM_STR);
                        $insert->bindValue(":type", $type, PDO::PARAM_INT);
                        $insert->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
                        $insert->bindValue(":story", $story, PDO::PARAM_STR);
                        $insert->execute();
                    }
                    else{
                        //First we have to create another type
                        $newCat = $auth->prepare('INSERT INTO `category`(`libelle`) VALUES (:libelle)');
                        $newCat->bindValue(":libelle", htmlspecialchars($otherType), PDO::PARAM_STR);
                        $newCat->execute();
                        $idCat = $auth->lastInsertId();

                        $insert = $auth->prepare('INSERT INTO `books`(`title`, `category`, `author`, `date`, `story`) VALUES (:title,:type,:author,NOW(),:story)');
                        $insert->bindValue(":title", $title, PDO::PARAM_STR);
                        $insert->bindValue(":type", $idCat, PDO::PARAM_INT);
                        $insert->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
                        $insert->bindValue(":story", $story, PDO::PARAM_STR);
                        $insert->execute();
                    }
                }
                else{
                    $save['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> veuillez rédiger du contenu.</div>";
                }
            }else{
                $save['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Le titre du livre n'a pas été renseigné.</div>";
            }
        }
    }
    else{
        $save['message'] .= "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> La catégorie du livre n'a pas été renseignée.</div>";
    }

    return($save);
}

?>