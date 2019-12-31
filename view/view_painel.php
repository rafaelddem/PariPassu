<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<title>Painel</title>
	</head>
	<body>
		<form name="form_painel" id="form_painel" action="..\controller\contr_home.php" method="post">
			<table id = "botoes" border>
				<tr>
					<th>
						<input type="submit" name="opcao" value="Reiniciar"/>
					</th>
					<th>
						<input type="submit" name="opcao" value="Chamar próxima"/>
					</th>
				</tr>
				<tr>
					<th>
						<input type="submit" name="opcao" value="Reiniciar Senhas"/>
					</th>
					<th>
						<input type="submit" name="opcao" value="Chamar próxima senha"/>
					</th>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
?>