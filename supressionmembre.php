<?php
	@$iddiplomee=$_POST["iddiplomee"];
	@$valider=$_POST["valider"];
	$F="";
	if(isset($valider)){
		if(empty($iddiplomee)) 
			$F="<li>ID invalide!</li>";
		}

		if(empty($F) && isset($valider)){
			include("cnxbd.php");
				$stmt=$pdo->prepare("DELETE FROM diplomee WHERE iddiplomee = ?");
				$stmt->execute(array($iddiplomee));
				$diplomee = $stmt->fetch();

				
				 
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
		<header>Suppression d'un membre</header>
		<form name="fo" method="post" action="" >
		<div class="form0"></br></br></br></br></br>
			<div class="label">Id du membre à Supprimer</div>
			<input type="text" name="iddiplomee" value="<?php echo $iddiplomee?>" />
			
			<input type="submit" class="pepe" name="valider" value="Supprimer"/>
			<?php if(!empty($F)){ ?>
			<div id="erreur">
				<?php echo $F ?>
			</div>
			<?php } ?>
			</div>
		</form>

		</body>
</html>
