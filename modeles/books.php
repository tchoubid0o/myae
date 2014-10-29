<?php

function getFirstBook($auth){
    $getFirst = $auth->prepare('SELECT * FROM books WHERE category = 1 AND author = :author ORDER BY id ASC');
    $getFirst->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
    $getFirst->execute();
    $i=0;
    while($donnees = $getFirst->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['title'] = $donnees['title'];
        $data[$i]['date'] = $donnees['date'];

        $i++;
    }
    if(!empty($data)){
        return $data;
    }
}

function getBooksContent($auth, $idCategory){
    $content = $auth ->prepare('SELECT * FROM books WHERE category = :idCategory AND author = :author');
    $content->bindValue(":idCategory", $idCategory, PDO::PARAM_STR);
    $content->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
    $content->execute();
    $i=0;
    while($donnees = $content->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['title'] = $donnees['title'];
        $data[$i]['date'] = $donnees['date'];
        $data[$i]['story'] = $donnees['story'];

        $i++;
    }
    if(!empty($data)){
        return $data;
    }
}

function getBook($auth, $id, $idCat){
    $content = $auth ->prepare('SELECT * FROM books WHERE category = :idCat AND id = :id AND author = :author');
    $content->bindValue(":idCat", $idCat, PDO::PARAM_INT);
    $content->bindValue(":id", $id, PDO::PARAM_INT);
    $content->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
    $content->execute();
    $i=0;
    while($donnees = $content->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['title'] = $donnees['title'];
        $data[$i]['date'] = $donnees['date'];
        $data[$i]['story'] = $donnees['story'];

        $i++;
    }
    if(!empty($data)){
        return $data;
    }
}

function getCategories($auth){
    $categories = $auth->prepare('SELECT DISTINCT c.id, c.libelle FROM books b INNER JOIN category c ON b.category = c.id WHERE b.author = :author');
    $categories->bindValue(":author", $_SESSION['id'], PDO::PARAM_INT);
    $categories->execute();
    $i=0;
    while($donnees = $categories->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['libelle'] = $donnees['libelle'];
        $i++;
    }
    $categories->closeCursor();
    if(!empty($data)){
        return $data;
    }
}
?>