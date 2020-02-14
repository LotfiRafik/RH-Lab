    <link href="public/css/tableaustyle.css" rel="stylesheet">
    <link href="public/css/formulairestyle.css" rel="stylesheet">

    <div class="row">
    <div class="col-md-10">
      <h6 class="titre"> Historique évaluation de <?=$other[0]->nom?> <?=$other[0]->prenom?></h6>
    <div class="ttable">
    <table class="table table-hover ">
    <thead class="entet">
    <tr>
      <th scope="col">Date</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    <?php
     //lister et trier les fichiers xlsx par date
    if($dossier = @opendir('public/Evaluation/'.$_GET['id']))
    {
      $i = 0;
      while(false !== ($fichier = readdir($dossier)))
      {
        if($fichier != '.' AND $fichier != '..')
        {
          $nom[$i]=$fichier;
          $date[$i]=str_replace('.xlsx', '', $nom[$i]);
          $tab[$date[$i]]=$nom[$i];
          $i++;
        }
      }
      if($i != 0)
      {
        krsort($tab);
        closedir($dossier);
        foreach ($tab as $fichier)
        {

    ?>

    <tr>
      <th scope="row"><?php echo $fichier?></th>
        <td><a href="?p=Etelecharger&amp;id=<?php echo $_GET['id']; ?>&amp;f=<?php echo $fichier ?>">Télécharger</a></td>
      <?php
      if($array['last_date'].'.xlsx' == $fichier)
      {
      ?>
      <td id='exist'><a  href="?p=Eafficher&amp;id=<?php echo $_GET['id']; ?>&amp;f=<?php echo $fichier ?> ">Modifier</a></td>
      <td><a href="?p=Edelete&amp;id=<?php echo $_GET['id']; ?>&amp;f=<?php echo $fichier ?>">Supprimer</a></td>
      <?php
    }?>

    </tr>
    <?php
  }
}
}?>

  </tbody>

</table>
</div>
</div>
<div class="col-md-2" id="ajout">
    <a id="click" href="#" class="btn btn-outline-success btn-xl btn-circle"><i class="fa fa-pencil fa-2x icon"></i></a>
  <h5> Nouvelle fiche</h5>

</div>

<h5 style="margin-left:15px;"> Charger nouvelle fiche </h5>
<div class="col-md-12">
<form  method="post" action=<?php echo'?p=Echarger&id='.$_GET['id']?>  enctype="multipart/form-data">
<input type="file" name="fichier" class="form-control col-md-5" style=" cursor:pointer;">
<button type="submit"id="click2"   <?php  if($array['last_date'] != NULL){ echo 'disabled'; }?> class="btn btn-info" style="margin-top:15px;position:relative;left:80px;">Enregistrer</button>
</form>
<a href="?p=evaluation"><button class="btn btn-default"  style="margin-top:15px;position:relative;top:-52px;">Retour</button></a>
</div>
</div>

<script>
  if (document.getElementById("exist")== null)
  {
    $("#ajout").empty();
    $("#ajout").append('<a id="click" href="?p=Enew&amp;id=<?php echo $_GET['id'] ?>" class="btn btn-outline-success btn-xl btn-circle"><i class="fa fa-pencil fa-2x icon"></i></a>')
    $("#ajout").append('<h5> Nouvelle fiche</h5>')
  }
  $("#click").click(function () {
    if (document.getElementById("exist")!= null) alert('Veuillez Valider La Fiche d\'évaluation précédente avant de creer une nouvelle.')
  })

</script>
