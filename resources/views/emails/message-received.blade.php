<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mensaje Recibido</title>
</head>
<body>
	<p>Recibiste un mensaje de: {{$msg['name']}} - {{$msg['email']}}</p>
	<p><strong>Asunto: </strong>{{$msg['subject']}}</p>
	<p><strong>Contenido: </strong>{{$msg['content']}}</p>
</body>
</html>