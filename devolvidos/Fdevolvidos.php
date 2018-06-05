<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<form action="../itens/cadastroi.php" method="POST">
	<input type="hidden" name="id" value= "<?php echo $_GET["id"] ?>">
	Nome:<input type="text" name="name"><br>
	Matrícula/Siape:<input type="text" name="ident" max="14"><br>
	Telefone:<input type="text" name="telefone"><br>
	Email:<input type="email" name="email"><br>
	<input type="submit" name="devolver" value="Devolver">
</form>
</body>
</html>
