<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Título</title>
		<script language="javascript" type="text/javascript">
			function ajaxFunction(param){
				var ajaxRequest;  // The variable that makes Ajax possible!
				ajaxRequest = new XMLHttpRequest();
				ajaxRequest.onreadystatechange = function(){
					if(ajaxRequest.readyState == 4){
						var ajaxDisplay = document.getElementById('senha');
						ajaxDisplay.innerHTML = ajaxRequest.responseText;
					}
				}
				ajaxRequest.open("GET", "view/view_cliente.php", true);
				ajaxRequest.send(null);
			}
		</script>
	</head>
	<body>
		<form name="form_terminal" id="form_terminal" action="controller\contr_terminal.php" method="post">
			<input type="submit" name="opcao" value="Gerente"/>
			<br>
			<input type="submit" name="opcao" value="Cliente"/>
		</form>
	</body>
</html>