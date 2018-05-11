
<?php  
	include_once $_SERVER['DOCUMENT_ROOT']."achados-e-perdidos/classes/Crud.php";
 ?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body >
<form enctype="multipart/form-data" method="POST" action="cadastroi.php">
	Nome do item:<input type="text" name="nome"><br>
	Quem encontrou:<input type="text" name="nome_pessoa"><br>
	Local:<input type="text" name="local"><br>
	Descrição:<input type="text" name="descricao"><br>
	<select name="categorias">
		<option disabled selected>Categoria</option>
		<?php
			$categorias = Crud::findAllCategoria();

			foreach ($categorias as $cat):
				
		?>
		<option value="<?php echo $cat->id ?>" ><?php echo $cat->nome?> </option>
		<?php
			endforeach;
		?>	
	</select>
		
	Imagem:<input type="file" name="userfile" placeholder="imagem"><br>
	<input type="submit" name="cadastro" value="Casdastrar item">

</form>
</body>
</html>