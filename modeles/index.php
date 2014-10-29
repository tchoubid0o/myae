<?php

function getFirstBook($auth){
    $getFirst = $auth->query('SELECT * FROM books WHERE category = 1 ORDER BY id ASC');
    $i=0;
    while($donnees = $getFirst->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['title'] = $donnees['title'];
        $data[$i]['date'] = $donnees['date'];

        $i++;
    }
    return($data);
}

function getBooksContent($auth, $idCategory){
    $content = $auth ->prepare('SELECT * FROM books WHERE category = :idCategory');
    $content->bindValue(":idCategory", $idCategory, PDO::PARAM_STR);
    $content->execute();
    $i=0;
    while($donnees = $content->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['title'] = $donnees['title'];
        $data[$i]['date'] = $donnees['date'];
        $data[$i]['story'] = $donnees['story'];

        $i++;
    }
    return $data;
}

function getBook($auth, $id, $idCat){
    $content = $auth ->prepare('SELECT * FROM books WHERE category = :idCat AND id = :id');
    $content->bindValue(":idCat", $idCat, PDO::PARAM_INT);
    $content->bindValue(":id", $id, PDO::PARAM_INT);
    $content->execute();
    $i=0;
    while($donnees = $content->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['title'] = $donnees['title'];
        $data[$i]['date'] = $donnees['date'];
        $data[$i]['story'] = $donnees['story'];

        $i++;
    }
    return $data;
}

function getCategories($auth){
    $categories = $auth->query('SELECT * FROM category');
    $i=0;
    while($donnees = $categories->fetch()){
        $data[$i]['id'] = $donnees['id'];
        $data[$i]['libelle'] = $donnees['libelle'];
        $i++;
    }
    $categories->closeCursor();
    return $data;
}
?>