<?php
		@$idtel=$_POST["idtel"];
		@$iddiplomee=$_POST["iddiplomee"];
		@$idorga=$_POST["idorga"] ;
		@$numero=$_POST["numero"];
		@$done=$_POST["done"];
		$D="";
			if(isset($done))
			{
				if(empty($numero)) 
				$D="<li>Numero invalide!</li>";
			
				elseif(empty($D))
				{
					include("cnxbd.php");
					if(!empty($iddiplomee))
					{
						$inss=$pdo->prepare("INSERT INTO telephone(iddiplomee,numero) VALUES (?,?)");
						$inss->execute(array($iddiplomee,$numero));
					}
					if(!empty($idorga))
					{
						$inss=$pdo->prepare("INSERT INTO telephone(idorga,numero) VALUES (?,?)");
						$inss->execute(array($idorga,$numero));
					}
			
			header("Location:pageinitiale.php");
				}

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
			<div class="dip1"><br>Ajout tel</br></div>
			<br><div class="form0"></br>
			<div class="label">Id diplomee</div>
			<input type="text" name="iddiplomee" value="<?php echo $iddiplomee?>" />
			<div class="label">Id organisme</div>
			<input type="text" name="idorga" value="<?php echo $idorga?>" />
			<div class="label">Numero</div>
			<input type="text" name="numero" value="<?php echo $numero?>" />
			<input type="submit" class="pepe" name="done" value="validation"/>
			<?php if(!empty($D)){ ?>
			<div id="erreur">
				<?php echo $D ?>
			</div>
			<?php } ?>
			</div>
			</form>
			
</body>
</html>
