<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cliente</title>
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
				ajaxRequest.open("GET", "../controller/Contr_cliente.php?param="+param, true);
				ajaxRequest.send(null);
			}
		</script>
	</head>
	<body>
		<form name="form_cliente" id="form_cliente">
			<input type='button' onclick='ajaxFunction("normal")' value="Gerar Nova Senha (Atend. Normal)"/>
			<br>
			<input type='button' onclick='ajaxFunction("preferencial")' value="Gerar Nova Senha (Atend. Preferencial)"/>
			<br>
		</form>
		Sua senha:
		<div id='senha'></div>
	</body>
</html>