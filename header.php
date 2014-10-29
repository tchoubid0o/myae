<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title><?php echo TITRESITE; ?></title> 
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
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">RUPP Michaël</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li <?php if($page == "index"){echo 'class="active"';} ?>><a href="index.html"><span class="glyphicon glyphicon-home" data-original-title="" title=""></span>&nbsp; Accueil</a></li>
            <li <?php if($page == "devis"){echo 'class="active"';} ?>><a href="devis.html"><span class="glyphicon glyphicon-edit" data-original-title="" title=""></span>&nbsp; Mes Devis</a></li>
            <li <?php if($page == "factures"){echo 'class="active"';} ?>><a href="factures.html"><span class="glyphicon glyphicon-euro" data-original-title="" title=""></span>&nbsp; Mes Factures</a></li>
            <li class="dropdown <?php if($page == "missions"){echo 'class="active"';} ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Missions <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">En cours <span class="badge pull-right">42</span></a></li>
                <li class="divider"></li>
                <li><a href="#">Terminées <span class="badge pull-right">75</span></a></li>
                <li class="divider"></li>
                <li><a href="#">Annulées <span class="badge pull-right">0</span></a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </div><!-- /.container -->
  </nav>