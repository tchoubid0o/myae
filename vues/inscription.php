<?php if (!isset($_SESSION['id'])) {
	?>

	<ul class="nav nav-tabs" role="tablist">
		<li><a href="index.html">CreateUrOwnBooks</a></li>
		<li><a href="connexion.html">Connexion</a></li>
		<li class="active"><a href="inscription.html">Inscription</a></li>
	</ul>

	<?php
	if(isset($inscription['ok'])) {
		echo '<br/><center><div class="registerm">' . $inscription['message_global'] . '<br /><br />
		Accueil : <a class="red" href="' . ROOTPATH . '/index.html">Cliquez ici</a>.<br /></div></center>';
	}
	else {
		if(isset($_SESSION['id'])) {
			echo '<br/><center><div class="registerm"><span class="red">Vous &ecirc;tes d&eacute;j&agrave; inscrit !</span><br /><br /> 
			Se d&eacute;connecter : <a class="red" href="' . ROOTPATH . '/deconnexion.html">Cliquez ici</a>.<br /></div></center>';
		}
		else {
			?>

			<section class="row" style="margin-right: 0px; margin-left: 0px; margin-top: 15px;">
				<div class="bs-example">

					<?php
					if(!empty($inscription['message_global'])) { echo "<center>".$inscription['message_global']."</center>"; }
					if(!empty($inscription['message_password'])) { echo "<center>".$inscription['message_password']."</center>"; }
					if(!empty($inscription['message_email'])) { echo "<center>".$inscription['message_email']."</center>"; }
					if(!isset($inscription['ok'])) {
						?>

						<form class="form-horizontal" action="<?php echo ROOTPATH; ?>/inscription.html" method="post">
							<legend>Inscription</legend>
							<div class="form-group row">
								<label for="inputNom" class="col-sm-3">Nom</label>
								<div class="col-sm-9">
									<input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPrenom" class="col-sm-3">Prénom</label>
								<div class="col-sm-9">
									<input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail" class="col-sm-3">Email</label>
								<div class="col-sm-9">
									<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3">Password</label>
								<div class="col-sm-9">
									<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPasswordVerif" class="col-sm-3">Confirmez votre mot de passe</label>
								<div class="col-sm-9">
									<input type="password" name="verification" class="form-control" id="inputPasswordVerif" placeholder="Password" required>
								</div>
							</div>
							<input type="hidden" name="inscription" value="1" />
							<button type="submit" class="btn btn-primary">Inscription</button>
						</form>
				</div>
			</section><?php
				}
			}
	}
}else {
	echo "<script>document.location.href='".ROOTPATH."/index.html'</script>";
}?>
