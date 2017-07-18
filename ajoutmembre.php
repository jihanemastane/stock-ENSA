<?php
	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
	@$datedenaissance=$_POST["date_de_naissance"];
	@$adressedomicile=$_POST["adresse_domicile"];
	@$adressetravail=$_POST["Adresse_travail"];
	@$valider=$_POST["valider"];
	$erreur="";

	if(isset($valider)){
		if(empty($nom)) 
			$erreur="<li>Nom invalide!</li>";
		if(empty($prenom)) 
			$erreur.="<li>Prénom invalide!</li>";
		
		
		if(empty($adressedomicile)) 
			$erreur.="<li>Adresse domicile invalide!</li>";
		if(empty($adressetravail)) 
			$erreur.="<li>Adresse travail invalide!</li>";
		if (empty($erreur))
			
		
			header("Location:pageinitiale.php");

		}
		

		if(empty($erreur)){
			include("cnxbd.php");
				$ins=$pdo->prepare("INSERT INTO diplomee (nom,prenom,datedenaissance,adressedomicile,adressetravail) VALUES (?,?,?,?,?)");
				$ins->execute(array($nom,$prenom,$datedenaissance,$adressedomicile,$adressetravail) );
			}

		?>
	<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
		*{
			margin-top: 50px;
		}
		body{
			font-size: 20pt;
			margin-top: 50;
			display: block;
			color: #2F4F4F;
			text-align: center;

		}
		.pepe:hover{
			opacity: 0.3;
		}
		header{
			text-align: center;
			font-family: verdana;
			color: grey;
		}
		.pepe{
			border-radius: 10%;
			background-color: lightpink;
			border:none;
			color: black;
		}
		body{
			background-color: #FFFACD;
		}
	</style>
	</head>
	<body>
		<header>Inscription à l'association des ANCIENS DIPLOMES D'ENSA MARAKECH</header>
		<form name="fo" method="post" action="" >
		<div class="form0">
			<div class="label">Nom</div>
			<input type="text" name="nom" value="<?php echo $nom?>" />
			<div class="label">Prénom</div>
			<input type="text" name="prenom" value="<?php echo $prenom?>" />
			<div class="label">date de naissance</div>
			<input type="date" name="date de naissance" value="<?php echo $datedenaissance?>" />
			<div class="label">adresse domicile</div>
			<input type="text" name="adresse domicile" value="<?php echo $adressedomicile?>"/>
			<div class="label">Adresse travail</div>
			<input type="text" name="Adresse travail" value="<?php echo $adressetravail?>"/>
			<input type="submit" class="pepe" name="valider" value="S'inscrire"/>
			<?php if(!empty($erreur)){ ?>
			<div id="erreur">
				<?php echo $erreur ?>
			</div>
			<?php } ?>
			</div>
			</div>

		</form>

		</body>
</html>
