<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>MakeUrOwnBooks</title> 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <!-- Géo Meta Tag -->
  <meta name="geo.region" content="FR-75" />
  <meta name="geo.placename" content="Lille" />
  <meta name="geo.position" content="50.62925;3.057256" />
  <meta name="ICBM" content="50.62925, 3.057256" />
  <!-- Auteur de la page -->
  <meta name="author" content="Michaël RUPP" />
  <!-- Description de la page -->
  <meta name="description" content="MakeUrOwnBooks" />
  <!-- Mots-clés de la page -->
  <meta name="keywords" content="MakeUrOwnBooks" />
  <!-- Adresse de contact -->
  <meta name="reply-to" content="" />
  <meta http-equiv="content-language" content="fr-FR" />
  <meta name="language" content="fr-FR" />
  <!-- Empêcher la mise en cache de la page par le navigateur -->
  <meta http-equiv="pragma" content="no-cache" />
  <!-- Lien vers le style de la page -->
  <link rel="stylesheet" media="screen" type="text/css" title="Design" href="<?php echo ROOTPATH; ?>/design.css" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="//cdn.ckeditor.com/4.4.5/standard/ckeditor.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <!-- Permet le Live Edit dans Sublime Text -->
  <!--<script src='scripts/webloader.js'></script> -->
</head>

<body>
  <div class="container">
    <ul class="nav nav-tabs" id="listCategories" role="tablist">
      <?php
      if(!isset($_POST['idCategory'])){
        $_POST['idCategory'] = 1;
      }
      foreach ($categories as $category) {
        if($_POST['idCategory'] == $category['id']){
          ?>
          <li class="bookCategory active" data-idcategory="<?php echo $category['id']; ?>"><a href="#"><?php echo $category['libelle']; ?></a></li>
          <?php
        }else{
          ?>
          <li class="bookCategory" data-idcategory="<?php echo $category['id']; ?>"><a href="#"><?php echo $category['libelle']; ?></a></li>
          <?php
        }
      }
      if(!isset($_SESSION['id'])){
        ?>
        <li><a href="connexion.html">Connexion</a></li>
        <li><a href="inscription.html">Inscription</a></li>
        <?php
      }else{
        ?>
        <li class="dropdown pull-right">
          <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-user" data-original-title="" title=""></span> Mon Compte <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Mes Options</a></li>
            <li><a href="#">Mes Livres</a></li>
            <li><a href="write.html">Rédiger un livre</a></li>
            <li class="divider"></li>
            <li><a href="deconnexion.html">Déconnexion</a></li>
          </ul>
        </li>
        <?php
      }
      ?>
    </ul>
    <?php echo page2title($page); ?>