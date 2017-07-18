<?php
		@$type=$_POST["type"];
		@$anneeobtention=$_POST["anneeobtention"];
		@$faculte=$_POST["faculte"];
		@$departement=$_POST["departement"];
		@$iddiplomee=$_POST["iddiplomee"];
		@$done=$_POST["done"];
		$A="";
			if(isset($done))
			{
				if(empty($type)) 
				$A="<li>Diplome invalide!</li>";
			if(empty($anneeobtention)) 
				$A.="<li>Année d'obtention invalide!</li>";
			if(empty($faculte)) 
				$A.="<li>Faculté invalide </li>";
			if(empty($departement)) 
				$A.="<li>Departement invalide!</li>";
			if(empty($A))
				header("Location:pageinitiale.php");

		}
		if(empty($A)){
			include("cnxbd.php");
				$inss=$pdo->prepare("INSERT INTO diplome (type,faculte,departement,anneeobtention) VALUES (?,?,?,?)");
				$inss->execute(array($type,$faculte,$departement,$anneeobtention));
				$iddiplome = $pdo->lastInsertId();
				$insss=$pdo->prepare("INSERT INTO obtention (iddiplomee,iddiplome) VALUES (?,?)");
				$insss->execute(array($iddiplomee,$iddiplome));

				
			}
		?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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

			<form name="fo" method="post" action="" >
			<div class="dip1"><br>Diplomes obtenus</br></div>
			<br><div class="form0"></br>
			<div class="label">type</div>
			<input type="text" name="type" value="<?php echo $type?>" />
			<div class="label">Année obtention</div>
			<input type="text" name="anneeobtention" value="<?php echo $anneeobtention?>" />
			<div class="label">Faculté</div>
			<input type="text" name="faculte" value="<?php echo $faculte?>" />
			<div class="label">Departement</div>
			<input type="text" name="departement" value="<?php echo $departement?>" />
			<div class="label">iddiplomee</div>
			<input type="text" name="iddiplomee" value="<?php echo $iddiplomee?>" />
			<input type="submit" class="pepe" name="done" value="validation"/>
			<?php if(!empty($A)){ ?>
			<div id="erreur">
				<?php echo $A ?>
			</div>
			<?php } ?>
			</div>
			</form>
			
</body>
</html>
