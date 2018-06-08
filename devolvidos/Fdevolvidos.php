
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php";
?>
<!DOCTYPE html>

<html>
<?php
include $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/partials/head.php";
?>
<body>
<form action="../itens/cadastroi.php" method="POST" id="formDevolucao">
	<input type="hidden" name="id" value= "<?php echo $_GET["id"] ?>">
	Nome:<input type="text" name="name"><br>
	Matrícula/Siape:<input type="text" name="ident"><br>
	Telefone:<input type="text" name="telefone" id="tel"><br>
	Email:<input type="email" name="email"><br>
	<input type="submit" name="devolver" value="Devolver">
</form>
</body>
</html>