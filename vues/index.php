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
            	<li><a href="settings.html">Mes Options</a></li>
            	<li><a href="books.html">Mes Livres</a></li>
            	<li><a href="write.html">Rédiger un livre</a></li>
            	<li class="divider"></li>
            	<li><a href="deconnexion.html">Déconnexion</a></li>
        		</ul>
    			</li>
    			<?php
    			}
    			?>
				</ul>
				<section class="row" style="margin-left: 0px; margin-top: 15px;">
					<div class="col-md-3 col-xs-3" style="padding-left: 0px;">
						<!-- place class scrollable-menu in order to enable scrollable menu -->
						<div class="list-group" id="listGroup">
							<?php 
								$i = 0;
								foreach ($datas as $data) {
									if($i == 0){?>
									<a href="#" class="list-group-item active readBook" data-id="<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a>
									<?php 
									}else{?>
										<a href="#" class="list-group-item readBook" data-id="<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a>
										<?php
									} 
									$i++;
								}
							?>
						</div>
					</div>
					<div class="col-md-9 col-xs-9" id="textFromBook">
						<?php echo nl2br($datas[0]['story']); ?>  
					</div>
				</section>
				<ul class="pagination">
					<li class="disabled"><a href="#">&laquo;</a></li>
					<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>

				<script>
					var ROOTPATH ="/CreateYourOwnBooks2/";

					$(document.body).on( "click", ".readBook", function() {
						event.preventDefault();
						$("#listGroup > a").removeClass("active");
						$(this).addClass("active");
						$.post(ROOTPATH+'index.html',{bookId: $(this).data("id"), idCat: $("#listCategories > li.active").data("idcategory")}, function(data){
								$("#textFromBook").html(data[0].story);
							}, 'json');
					});


					$(document.body).on( "click", ".bookCategory", function() {
						event.preventDefault();
						$("#listCategories > li").removeClass("active");
						$(this).addClass("active");
						//console.log($(this));
						$.post(ROOTPATH+'index.html',{idcategory: $(this).data("idcategory")}, function(data){
								if (data) { 
									console.log(data);
									for (var i = 0; i < data.length; ++i) {
										if (i==0) {
											var newContent = '<a href="#" class="list-group-item active readBook" data-id="'+ data[i].id +'">'+ data[i].title +'</a>';
										}else{
											newContent += '<a href="#" class="list-group-item readBook" data-id="'+ data[i].id +'">'+ data[i].title +'</a>';
										}
									}
								}
								$("#listGroup").html(newContent);
								$("#textFromBook").html(data[0].story);
							}, 'json');
					});
				</script>