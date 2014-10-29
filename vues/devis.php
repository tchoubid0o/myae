<div class="container" style="margin-top: 15px;">
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Vos Devis</div>

    <!-- Table -->
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Date devis</th>
          <th>Statut</th>
          <th>Client</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach($datas as $data){?>
        <tr>
          <td><b class="id_devis" data-id="<?php echo $data['id_devis']; ?>"><?php echo $data['id_devis']; ?></b></td>
          <td><?php echo $data['date']; ?></td>
          <td><?php if($data['statut'] == 1){echo "<span class='label label-success'>Enregistré</span>";}elseif ($data['statut'] == 2) {
            echo "<span class='label label-warning'>En attente</span>";
          }else{
            echo "<span class='label label-danger'>Annulé</span>";
          } ?></td>
          <td><?php if($data['sexe'] == 1){echo "M. ";}else{echo "Mme. ";} echo $data['nom']." ".$data['prenom']; ?></td>
          <td><?php echo $data['total']; ?>&nbsp;€</td>
        </tr>
        <?php
      }
      ?>
    </tbody>
    <tr>
      <td colspan="4" style="text-align: right;">Total des devis</td>
      <td><b><?php echo $sum[0]; ?>&nbsp;€</b></td>
    </tr>
  </table>
</div>

<ul class="pagination">
  <?php 
  if(!isset($_GET['act'])){
    $_GET['act'] = 1;
  }
  if($nbPage>1){
    if(isset($_GET['act']) && $_GET['act'] > 1){
      $previous = $_GET['act'] - 1;
      echo '<li><a href="devis-'. $previous .'.html"><span>&laquo;</span></a></li>';
    }
  }
  for ($i=1; $i <= $nbPage; $i++) {
    if($i == $_GET['act']){
      echo '<li class="active"><a href="devis-'. $i .'.html"><span>'. $i .' <span class="sr-only">(current)</span></span></a></li>';
    }
    else{
      echo '<li><a href="devis-'. $i .'.html">'. $i .'</a></li>';
    }
  }
  if($_GET['act'] < $nbPage){
    $next = $_GET['act'] + 1;
    echo '<li><a href="devis-'. $next .'.html">&raquo;</a></li>';
  }
  ?>
  
</ul>

<div id="iframe_pdf" style="display: none;"></div>

</div>
<script>
$(".id_devis").click(function(){
  var id = $(this).data("id");
  $("#iframe_pdf").html('<iframe src="devis/Devis_'+ id +'.pdf" style="width: 100%; height: 900px;"width="900" height="600"></iframe>');
  $("#iframe_pdf").show();
  $('html, body').animate({
    scrollTop: $("#iframe_pdf").offset().top
  }, 2000);
});
</script>