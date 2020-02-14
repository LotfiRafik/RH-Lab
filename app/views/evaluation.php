    <link href="public/css/tableaustyle.css" rel="stylesheet">
    <div class="col-md-9">
    <h6 class="titre" style="margin-bottom:20px;"> Evaluations des employés</h6>
    <div style="margin-top:60px;"class="ttable">
    <table class="table ">
    <thead class="entet" style ="background-color:#5BC0DE;">
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Poste</th>
      <th scope="col">prochaine évaluation</th>
    </tr>
  </thead>
  <tbody>
    <?php
  		foreach($array as $ligne)
  		{
        ?>
    <tr onclick="location.href='?p=eva&amp;id=<?php echo $ligne->id?>'" style="cursor: pointer ; " class="lien" >
      <th scope="row"><?php echo $ligne->id?></th>
      <td><?php echo $ligne->nom?></td>
      <td><?php echo $ligne->prenom?></td>
      <td><?php echo $ligne->poste?></td>
      <td><?php echo $ligne->next_eva ?></td>
      <?php
        }

      ?>


  </tbody>
  <tfoot>
    <tr>
    </tr>
  </tfoot>
</table>
</div>
</div>
