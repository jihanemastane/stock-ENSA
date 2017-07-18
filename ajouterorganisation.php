<?php
		@$nomorga=$_POST["nomorga"];
		@$done=$_POST["done"];
		$B="";
			if(isset($done))
			{
				if(empty($nomorga)) 
				$B="<li>Nom invalide!</li>";
			if(empty($B))
				header("Location:pageinitiale.php");

		}
		if(empty($B)){
			include("cnxbd.php");
				$inss=$pdo->prepare("INSERT INTO organisme(nomorga) VALUES (?)");
				$inss->execute(array($nomorga));
				

				
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
			<div class="label">Nom Organisation</div>
			<input type="text" name="nomorga" value="<?php echo $nomorga?>" />
			<input type="submit" class="pepe" name="done" value="validation"/>
			<?php if(!empty($B)){ ?>
			<div id="erreur">
				<?php echo $B ?>
			</div>
			<?php } ?>
			</div>
			</form>
			
</body>
</html>
