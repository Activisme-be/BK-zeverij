<!DOCTYPE html>
<html>
	<head>
		<title> {{ $this->config->item('app_name') }} | reset wachtwoord </title>
		<style type="text/css">
		      p { color: #000; }
		</style>
	</head>
	<body>
 		<p> Geachte, </p>

 		<p>
 			Wij hebben uw wachtwoord gereset. U vind de gegevens hieronder.
 		</p>

 		<table>
 			<tr>
 				<td> <strong> Wachtwoord: </strong> </td>
				<td> {{ $pass }} </td>
 			</tr>
 		</table>

 		<hr>
		<p>
			Deze mail notificatie is afkomstig van <a href="http://www.activisme.be/index/">Activisme.be</a> <br>
		</p>

	</body>
</html>
