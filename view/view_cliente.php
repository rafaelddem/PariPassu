<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<title>Cliente</title>
	</head>
	<body>
		<form name="form_cliente" id="form_cliente" action="..\controller\contr_terminal.php" method="post">
			<table id = "botoes">
				<tr>
					<th>
						<input type="submit" name="opcao" value="Gerar Nova Senha (Atend. Normal)"/>
					</th>
					<th>
						<input type="submit" name="opcao" value="Gerar Nova Senha (Atend. Preferencial)"/>
					</th>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php
?>