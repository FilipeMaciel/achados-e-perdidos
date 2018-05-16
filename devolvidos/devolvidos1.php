<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Itens Devolvidos</title>
</head>
<body>
<form action="devolvidos.php" method="POST" >
	<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
	Nome:<input type="text" name="name"><br>
	Matrícula/Siape:<input type="text" name="id" max=14><br>
	Telefone:<input type="text" name="telefone"><br>
	Email:<input type="email" name="email"><br>
	Data:<input type="date" name="date"><br>
	<input type="submit" name="devolver" value="Devolver">


</form>
</body>
</html>