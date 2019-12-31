<?php

echo"
<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel='stylesheet' type='text/css' href='../css/style.css' />
		<title>Gerente</title>
	</head>
	<body>
		<form name='form_gerente' id='form_gerente' action='..\controller\contr_gerente.php' method='post'>
			<table id = 'botoes'>
				<tr>
					<th>
						<input type='submit' name='opcao' value='Reiniciar Senhas'/>
					</th>
					<th>
						<input type='submit' name='opcao' value='Chamar próxima senha'/>
					</th>
				</tr>
				<tr>
					<th>
					</th>
					<th>
						Atendendo:
					</th>
				</tr>
				<tr>
					<th>
					</th>
					<th>
						
					</th>
				</tr>
			</table>
		</form>
	</body>
</html>
";
?>