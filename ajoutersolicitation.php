<?php
		@$idsoli=$_POST["idsoli"];
		@$datesoli=$_POST["datesoli"];
		@$idorga=$_POST["idorga"];
		@$idsoliciteur=$_POST["idsoliciteur"];
		@$idsolicite=$_POST["idsolicite"];
		@$done=$_POST["done"];
		$C="";
			if(isset($done))
			{
				
			if(empty($idsoliciteur)) 
				$C.="<li>id invalide </li>";
			
			elseif(empty($C)){
			include("cnxbd.php");
					if(!empty($idorga)){
						$inss=$pdo->prepare("INSERT INTO solicitation (datesoli,idorga,idsoliciteur) VALUES (?,?,?)");
					$inss->execute(array($datesoli,$idorga,$idsoliciteur));
				}
				if(!empty($idsolicite)){
					$inss=$pdo->prepare("INSERT INTO solicitation (datesoli,idsoliciteur,idsolicite) VALUES (?,?,?)");
				$inss->execute(array($datesoli,$idsoliciteur,$idsolicite));
						
				}	
			}
			if(empty($C))
				header("Location:pageinitiale.php");
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
			<div class="dip1"><br>Solicitation</br></div>
			<br><div class="form0"></br>
			<div class="label">Date de solicitation</div>
			<input type="date" name="datesoli" value="<?php echo $datesoli?>" />
			<div class="label">id de l'organisation</div>
			<input type="text" name="idorga" value="<?php echo $idorga?>" />
			<div class="label">Id du soliciteur</div>
			<input type="text" name="idsoliciteur" value="<?php echo $idsoliciteur?>" />
			<div class="label">id du solicité</div>
			<input type="text" name="idsolicite" value="<?php echo $idsoliciteur?>" />
			<input type="submit" class="pepe" name="done" value="validation"/>
			<?php if(!empty($C)){ ?>
			<div id="erreur">
				<?php echo $C ?>
			</div>
			<?php } ?>
			</div>
			</form>
			
</body>
</html>
