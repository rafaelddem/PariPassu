<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title>Título</title>
	</head>
	<body>
			<header><h2>Home</h2></header>
		<section>
			<form name="form_home" id="form_home" action="controller\contr_home.php" method="post">
				<table id = "botoes">
					<tr>
						<th>
							<input type="submit" name="opcao" value="Painel"/>
						</th>
						<th>
							<input type="submit" name="opcao" value="Terminal"/>
						</th>
					</tr>
				</table>
			</form>
		</section>
			<footer><p>Footer</p></footer>
	</body>
</html>

<?php
?>