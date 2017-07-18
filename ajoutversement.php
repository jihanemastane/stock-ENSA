<?php
	@$montant=$_POST["montant"];
	@$datevers=$_POST["datevers"];
	@$cotisation=$_POST["cotisation"];
	@$idsolicite=$_POST["idsolicite"];
	@$valider=$_POST["valider"];
	$E="";

		if(isset($valider)){
				if(empty($montant)) 
					$E="<li>Montant manquant!</li>";
				if(empty($cotisation))
					$E.="<li>Vous devez specifier ce champ: 1 si cotisation 0 si contribution!</li>";
				if(empty($idsolicite)) 
					$E.="<li>id du soliciteur manquant!</li>";
				if (empty($E))
					header("Location:pageinitiale.php");
			}

		if(empty($E)){
			include("cnxbd.php");
				$ins=$pdo->prepare("INSERT INTO versement(montant,datevers,cotisation,idsolicite) VALUES (?,?,?,?)");
				$ins->execute(array($montant,$datevers,$cotisation,$idsolicite));
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
		<header>Versement</header>
		<form name="fo" method="post" action="" >
		<div class="form0">
			<div class="label">Montant</div>
			<input type="text" name="montant" value="<?php echo $montant?>" />
			<div class="label">Date du versement</div>
			<input type="date" name="datevers" value="<?php echo $datevers?>" />
			<div class="label">Cotisation/contribution</div>
			<input type="text" name="cotisation" value="<?php echo $cotisation?>" />
			<div class="label">Id du soliciteur</div>
			<input type="text" name="idsolicite" value="<?php echo $idsolicite?>"/>
			<input type="submit" class="pepe" name="valider" value="S'inscrire"/>
			<?php if(!empty($E)){ ?>
			<div id="erreur">
				<?php echo $E ?>
			</div>
			<?php } ?>
			</div>
		</form>

		</body>
</html>
