<?php
    if(isset($_SESSION['id'])){
?>
<ul class="nav nav-tabs" id="listCategories" role="tablist">
<li><a href="index.html">Accueil</a></li>
<li class="active"><a href="#">Rédiger</a></li>
<li class="dropdown pull-right">
	<a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-user" data-original-title="" title=""></span> Mon Compte <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li><a href="settings.html">Mes Options</a></li>
		<li><a href="books.html">Mes Livres</a></li>
		<li><a href="write.html">Rédiger un livre</a></li>
		<li class="divider"></li>
		<li><a href="deconnexion.html">Déconnexion</a></li>
	</ul>
</li>
</ul>
<?php 
    if(isset($_GET['act']) && $check['nb'] > 0){
?>
<?php 
    if(isset($save['message'])){echo $save['message'];}
?>
<section class="row" style="margin-right: 0px; margin-left: 0px; margin-top: 15px;">
    <div class="bs-example">
        <form class="form-horizontal" action="<?php echo ROOTPATH; ?>/edit-<?php echo $_GET['act']; ?>.html" method="post">
            <legend>Editer un livre</legend>
            <div class="form-group row">
                <label for="inputType" class="col-sm-2">Catégorie du livre : </label>
                <div class="col-sm-10">
                	<select name="type" id="inputType" class="form-control" onchange="CheckTypes(this.value);">
                		<option value="0">Choisissez une catégorie</option>
					  <?php 
					  	foreach($types as $type){?>
					  		<option value="<?php echo $type['id'];?>" <?php if($type['id'] == $myBook[0]['category']){echo "selected"; } ?>><?php echo $type['libelle']; ?></option>
					  	<?php
					  	}
					  ?>
					  <option value="-1" <?php if($type['id'] == $myBook[0]['category']){echo "selected"; } ?>>Autre</option>
					</select>
					
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                	<input type="text" class="form-control" name="otherType" id="otherType" placeholder="Veuillez renseigner la catégorie." style='display:none;'/>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTitle" class="col-sm-2">Titre du livre : </label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Titre du livre" value="<?php echo $myBook[0]['title']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputStory" class="col-sm-2">Histoire : </label>
                <div class="col-sm-10">
                	<textarea class="form-control" name="story" id="inputStory" rows="3"><?php echo $myBook[0]['story']; ?></textarea>
                </div>
            </div>
            <input type="hidden" name="bookId" value="<?php echo $_GET['act']; ?>" />
            <input type="hidden" name="editBook" value="1" />
            <button type="submit" class="btn btn-primary pull-right">Valider</button>
            <script>
                CKEDITOR.replace( 'inputStory' );
                function CheckTypes(val){
				 var element=document.getElementById('otherType');
				 if(val == 'Choisissez une catégorie' || val == '-1')
				   element.style.display='block';
				 else  
				   element.style.display='none';
				}
            </script>
        </form>
    </div>
</section>
<?php
}
else{
    echo "<div class='alert alert-danger' role='alert'><strong>Erreur,</strong> Vous n'êtes pas l'auteur de ce livre.</div>";
}
}
?>