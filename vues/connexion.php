<?php if (!isset($_SESSION['id'])) {
    ?>
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="index.html">CreateUrOwnBooks</a></li>
        <li class="active"><a href="#">Connexion</a></li>
        <li><a href="inscription.html">Inscription</a></li>
    </ul>
      <section class="row" style="margin-right: 0px; margin-left: 0px; margin-top: 15px;">
        <div class="bs-example">
            <form class="form-horizontal" action="<?php echo ROOTPATH; ?>/connexion.html" method="post">
                <legend>Identifiez-Vous</legend>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="mail" class="form-control" id="inputEmail" placeholder="Email" value="<?php if(isset($_COOKIE['remember_me']) && !empty($_COOKIE['remember_me'])){echo $_COOKIE['remember_me'];} ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                    </div>
                </div>
                <input type="hidden" name="connexion" value="1" />
                <div class="checkbox">
                    <label><input type="checkbox" name="remember" value="1"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <?php if(!empty($connexion['message_password'])){
            echo $connexion['message_password'];
        }
        if(!empty($connexion['message_mail'])){
            echo $connexion['message_mail'];
        }
        if(!empty($connexion['message_global'])){
            echo $connexion['message_global'];
        } ?>
      </section>
    <?php
} else {
    echo "<script>document.location.href='".ROOTPATH."/index.html'</script>";
}?>