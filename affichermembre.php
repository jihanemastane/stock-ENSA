<?php
	@$iddiplomee=$_POST["iddiplomee"];
	@$valider=$_POST["valider"];
	$F="";
	if(isset($valider)){
		if(empty($iddiplomee)) 
			$F="<li>ID invalide!</li>";
		}

		if(empty($F)){
			include("cnxbd.php");
				$stmt=$pdo->prepare("SELECT * FROM diplomee WHERE iddiplomee = ?");
				$stmt->execute(array($iddiplomee));
				$diplomee = $stmt->fetch();

				$stmt=$pdo->prepare("SELECT * FROM obtention LEFT JOIN diplome ON obtention.iddiplome = diplome.iddiplome WHERE obtention.iddiplomee = ?");
				$stmt->execute(array($iddiplomee));
				$diplomes = $stmt->fetchAll();

				$stmt=$pdo->prepare("SELECT * FROM diplomee JOIN versement ON diplomee.iddiplomee = versement.idsolicite  WHERE diplomee.iddiplomee = ?");
				$stmt->execute(array($iddiplomee));
				$versements = $stmt->fetchAll();

// pour affiche les infos du membre, 
				// echo $diplomee['nom'];
				// echo $diplomee['prenom'];
				// echo $diplomee['Datedenaissance'];
				// echo $diplomee['adressedomicile'];
				// echo $diplomee['adressetravail'];
				//  les diplomes 	
				 // foreach ($diplomes as $diplome) {
					// 	echo $diplome['type'];
					// 	echo $diplome['faculte'];
					// 	echo $diplome['departement'];
					// 	echo $diplome['anneeobtention'];


				 // }

				 //pour les vesements
				 
			}

		?>
	<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
		*{
			margin-top: 50px;
		}
		body {
			font-size: 20pt;
			margin-top: 50;
			display: block;
			color: #2F4F4F;
			text-align: center;

		}
		table
		{
			font-size: 20pt;
			margin-top: 50;
			color: #2F4F4F;
			margin-left: 30%;
		}
		.pepe:hover{
			opacity: 0.3;
		}
		.dip1{
			text-align: center;
			font-family: verdana;
			color: grey;
		}
		
		body{
			background-color: #FFFACD;
		}
	</style>
	</head>
	<body>
		<header>Recherche d'un membre</header>
		<form name="fo" method="post" action="" >
		<div class="form0"></br></br></br></br></br>
			<div class="label">Id du membre à afficher</div>
			<input type="text" name="iddiplomee" value="<?php echo $iddiplomee?>" />
			
			<input type="submit" class="pepe" name="valider" value="Recherche"/>
			<?php if(!empty($F)){ ?>
			<div id="erreur">
				<?php echo $F ?>
			</div>
			<?php } ?>
			</div>
		</form>


		<?php if(isset($diplomee) && empty($F) &&isset($valider)): ?>
			<h4>Diplomé</h4>
		<table class="table" border="1">
			<thead>
				<tr>
					<th>nom</th>
					<th>prénom</th>
					<th>date naissance</th>
					<th>adresse domicile</th>
					<th>adresse travail</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?=$diplomee['nom'];?></td>
					<td><?=$diplomee['prenom'];?></td>
					<td><?=$diplomee['Datedenaissance'];?></td>
					<td><?=$diplomee['adressedomicile'];?></td>
					<td><?=$diplomee['adressetravail'];?></td>
			</tbody>
		</table>

		<h4>Diplomes</h4>
		<table class="table" border="1">
			<thead>
				<tr>
					<th>Type</th>
					<th>Faculté</th>
					<th>Département</th>
					<th>Année d'obtention</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				</br>
				 <?php foreach ($diplomes as $diplome): ?>
				 	<tr>
						<td><?=$diplome['type']?></td>
						<td><?=$diplome['faculte']?></td>
						<td><?=$diplome['departement']?></td>
						<td><?=$diplome['anneeobtention']?></td>
					<tr/>
				 <?php endforeach; ?>
				</tr>
			</tbody>
		</table>
		<h5>Versement</h5>
		<table class="table" border="1">
			<thead>
				<tr>
					<th>Montant</th>
					<th>Date du versement</th>
					<th>Cotisation</th>
					
				</tr>
			</thead>
			<tbody>
				<tr>
				 <?php foreach ($versements as $versement): ?>
						<td><?=$versement['montant']?></td>
						<td><?=$versement['datevers']?></td>
						<td><?=$versement['cotisation']?></td>
				 <?php endforeach; ?>
				</tr>
			</tbody>
		</table>

		<?php endif; ?>

		</body>
</html>
