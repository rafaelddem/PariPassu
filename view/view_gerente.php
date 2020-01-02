<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Gerente</title>
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
				ajaxRequest.open("GET", "../controller/Contr_gerente.php?param="+param, true);
				ajaxRequest.send(null);
			}
		</script>
	</head>
	<body>
		<form name='form_gerente' id='form_gerente'>
			<input type='button' onclick='ajaxFunction("reiniciar")' value='Reiniciar Senhas'/>
			<br>
			<input type='button' onclick='ajaxFunction("proxima")' value='Chamar próxima senha'/>
			<br>
			Atendendo:
		</form>
		<div id='senha'><script>ajaxFunction("atual");</script></div>
	</body>
</html>