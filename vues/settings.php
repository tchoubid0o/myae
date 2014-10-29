<?php
    if(isset($_SESSION['id'])){
?>
<ul class="nav nav-tabs" id="listCategories" role="tablist">
<li><a href="index.html">Accueil</a></li>
<li class="active"><a href="#">Mes Options</a></li>
<li class="dropdown pull-right">
	<a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-user" data-original-title="" title=""></span> Mon Compte <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li class="active"><a href="#">Mes Options</a></li>
		<li><a href="books.html">Mes Livres</a></li>
		<li><a href="write.html">Rédiger un livre</a></li>
		<li class="divider"></li>
		<li><a href="deconnexion.html">Déconnexion</a></li>
	</ul>
</li>
</ul>

<section class="row" style="margin-right: 0px; margin-left: 0px; margin-top: 15px;">
    <div class="bs-example">
        <?php 
            if(!empty($save['message'])){
                echo $save['message'];
            }
        ?>
        <form class="form-horizontal" action="<?php echo ROOTPATH; ?>/settings.html" method="post">
            <legend>Options du compte</legend>
            <div class="form-group row">
                <label for="inputPrenom" class="col-sm-2">Prénom : </label>
                <div class="col-sm-10">
                    <input type="text" name="prenom" class="form-control" id="inputPrenom" value="<?php if(!empty($user[0]['prenom'])){echo $user[0]['prenom'];} ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputNom" class="col-sm-2">Nom : </label>
                <div class="col-sm-10">
                	<input type="text" class="form-control" name="nom" id="inputNom" value="<?php if(!empty($user[0]['nom'])){echo $user[0]['nom'];} ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputMail" class="col-sm-2">Mail : </label>
                <div class="col-sm-10">
                    <input type="text" name="mail" class="form-control" id="inputMail" value="<?php if(!empty($user[0]['mail'])){echo $user[0]['mail'];} ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2">Password : </label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword2" class="col-sm-2">Retaper votre Password : </label>
                <div class="col-sm-10">
                    <input type="password" name="password2" class="form-control" id="inputPassword2" value="" required>
                </div>
            </div>
            <input type="hidden" name="editUserSettings" value="1" />
            <button type="submit" class="btn btn-primary pull-right">Valider</button>
        </form>
    </div>
</section>
<?php
}
?>