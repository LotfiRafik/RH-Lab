
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400" type="text/css" />
	<link rel="stylesheet" href="public/css/style-conges.css" type="text/css" />





<h6 class="titre"> Planning des congés </h6>
<div class="holidaysm">
	<a  href="#" data-toggle="modal" data-target="#erasemodal" data-backdrop="static" data-keyboard="false" class="btn btn-info btn-circle btn-lg"style="position:relative;top:-10px;"><i style="position:relative;left:1px;top:5px;" class="fa fa-calendar-plus fa-2x"></i></a>
	<h4 style="position:relative;top:-60px;left:80px;"> Nouveau titre de congé </h4>

	<div id="nav">
		<div class="row">
		<div id="fastaccess" style="position:relative;top:30px;left:100px">
		<?php

		$tablenom = $array["listnom"];
		unset($array["listnom"]);
			// LIST Nav Buttons first or last 6 months of year - according to recent date year
			$requYear = substr($array[0],0,4);
			$requMonth = substr($array[0],5,2);
			$monthr = $requMonth<7 ? 1 : 7;
			$timestamp = $requYear.'-'.$monthr;

			$monthOut = array();
			$c = 0;
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +1 month')); // next month
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +1 month'));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +2 month'));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +2 month'));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +3 month'));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +3 month'));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +4 month'));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +4 month'));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +5 month'));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +5 month'));
			$c = 0;
			$timestamp = $requYear.'-'.$requMonth;
			$yearOut[$c][0] = date('Y-m',strtotime($timestamp));
			$yearOut[$c++][1] = strftime('%Y', strtotime($timestamp));
			$c_out = 0;
			if(isset($_GET['id']))
			{
		?>
			<a class="navpre btn btn-secondary" title="mois précedent" href="?p=calender&m=<?php echo date('Y-m', strtotime($array[0].' -1 month')); ?>&id=<?php echo $_GET['id']; ?>">&laquo;</a>
			<a class="btn btn-secondary" <?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>&id=<?php echo $_GET['id']; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="btn btn-secondary"<?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>&id=<?php echo $_GET['id']; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="btn btn-secondary"<?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>&id=<?php echo $_GET['id']; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="btn btn-secondary"<?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>&id=<?php echo $_GET['id']; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="btn btn-secondary"<?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>&id=<?php echo $_GET['id']; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="btn btn-secondary"<?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>&id=<?php echo $_GET['id']; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="navfwd btn btn-secondary" title="Prochain mois" href="?p=calender&m=<?php echo date('Y-m', strtotime($array[0].' +1 month'));?>&id=<?php echo $_GET['id'];?>">&raquo;</a>
			<?php $c_out = 0; ?>
			<div style="position:relative; left:250px; margin-top:10px; margin-bottom:-10px; ">
			<a class="navpre btn btn-secondary" title="année précedent" href="?p=calender&m=<?php echo date('Y-m', strtotime($array[0].' -1 year')); ?>&id=<?php echo $_GET['id']; ?>">&laquo;</a>
			<a class="btn btn-secondary" <?php echo (substr($array[0],0,7)==$yearOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $yearOut[$c_out][0]; ?>&id=<?php echo $_GET['id']; ?>"><?php echo $yearOut[$c_out++][1]; ?></a>
			<a class="navfwd btn btn-secondary" title="Prochaine année" href="?p=calender&m=<?php echo date('Y-m', strtotime($array[0].' +1 year'));?>&id=<?php echo $_GET['id'];?>">&raquo;</a>
		</div>
			<?php
			}
			else
			{
			?>
			<a class="navpre btn btn-secondary" title="mois précedent" href="?p=calender&m=<?php echo date('Y-m', strtotime($array[0].' -1 month')); ?>">&laquo;</a>
			<a class="btn btn-secondary"  <?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>" >   <?php echo $monthOut[$c_out++][1]; ?>    </a>
			<a class="btn btn-secondary" <?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="btn btn-secondary" <?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="btn btn-secondary"<?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="btn btn-secondary"<?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="btn btn-secondary"<?php echo (substr($array[0],0,7)==$monthOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a>
			<a class="navfwd btn btn-secondary" title="Prochain mois" href="?p=calender&m=<?php echo date('Y-m', strtotime($array[0].' +1 month')); ?>">&raquo;</a>
			<?php $c_out = 0; ?>
			<div style="position:relative; left:250px; margin-top:10px; margin-bottom:-10px; ">
			<a class="navpre btn btn-secondary" title="année précedente" href="?p=calender&m=<?php echo date('Y-m', strtotime($array[0].' -1 year')); ?>">&laquo;</a>
			<a class="btn btn-secondary" <?php echo (substr($array[0],0,7)==$yearOut[$c_out][0])? 'style="background:#428bca;" ' : '' ?>href="?p=calender&m=<?php echo $yearOut[$c_out][0]; ?>"><?php echo $yearOut[$c_out++][1]; ?></a>
			<a class="navfwd btn btn-secondary" title="Prochaine année" href="?p=calender&m=<?php echo date('Y-m', strtotime($array[0].' +1 year'));?>">&raquo;</a>
		</div>
			<?php
			}
			?>


		</div>
		<h5 style="position:relative;top:37px;left:150px"> Filtrer </h5>
		<div style="position:relative;top:30px;left:160px">
			<form method='get' >
				<input type='hidden' name='p' value='calender'>
		  <select id="filtre" name='id' class="form-control">
		 	 <option value=''>Tous les employés</option>
			 <?php
				foreach ($tablenom as $nom)
				{
					?>
					<option value="<?php echo filter_var($nom, FILTER_SANITIZE_NUMBER_INT);?>" <?php if(isset($_GET['id'])){ if(filter_var($nom, FILTER_SANITIZE_NUMBER_INT)==$_GET['id']){echo 'selected="selected"';}}?>><?= $nom ?></option>
					<?php
				}
				?>
		  </select>
			<button type="submit" class="btn btn-default" style="position:relative;top:-38px;left:233px;">OK</button>
		</form>
		</div>
	</div>

		<br/>



	</div>
			<?php
			//condition pour colorer type de congé : class free CSS
				echo $other[0];
			?>


</div>
<h5 style="position:relative;top:35px;"> Congé payé </h5>
<button class="btn" style="background:#72F46B ;width:30px;height:30px; cursor:default;position:relative;left:115px;" ></button>
<h5 style="position:relative;top:-26px;left:185px;"> Congé maladie </h5>
<button class="btn" style="background:#8B80DD;width:30px;height:30px; cursor:default;position:relative;top:-61px;left:335px;" ></button>
<h5 style="position:relative;top:-88px;left:405px;"> Congé sans solde </h5>
<button class="btn" style="background:#FD6F7C;width:30px;height:30px; cursor:default;position:relative;top:-124px;left:577px;" ></button>


<div class="modal fade" id="erasemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Générer titre de congé</h4>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>


			<div class="modal-body">
				<form class="form-control" id="modal_post2_id" method="post" action="javascript:void(0)">
					<div class="form-group">
						<label for="identemp">Identifiant employé</label>
						<select  id="identemp"class="form-control">
							<?php
							foreach ($tablenom as $nom)
							{
								?>
								<option> <?= $nom ?> </option>
								<?php
							}
							?>
						</select>
					</div>
				<div class="form-group ">
					<label for="debutcong">Date de début de congé</label>
					<input  type="date" class="form-control" id="debutcong" required></input>
			</div>
			<div class="form-group ">
				<label for="fincong">Date de fin de congé</label>
				<input   type="date" class="form-control" id="fincong" required ></input>
			</div>
			<div class="form-group ">
				<label for="typecong">Type de Congé</label>
				<select  id="typecong"class="form-control">
					<option value="p">Congé payé</option>
					<option value="m">Congé maladie</option>
					<option value="s">Congé sans solde</option>
				</select>
			</div>
	<button type="submit" class="btn btn-info" style="position:relative;top:78px;left:350px;"> Enregistrer </button>
	</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" type="button" data-dismiss="modal" style="position:relative;right:110px;">Quitter</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="public/js/conges.js"></script>
<script type="text/javascript" src="public/js/modal_post2.js"></script>
