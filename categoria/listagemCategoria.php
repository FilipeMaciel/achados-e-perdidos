<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<table border="1" style="width: 100%">
	<tr>
	    <td>id</td>
	    <td>Nome</td>
	    <td colspan="2">Ações</td>
	</tr>
<?php 
    include "../classes/models/Categoria.class.php";

    $cat = Crud::findAllCategoria();
    foreach ($cat as $row):
?>
    		
    		<tr>
    			<td><?php echo $row->id;?></td>
    			<td><?php echo $row->nome;?></td>
    			
    			<td ><?php echo '<a href="../categoria/listagemCategoria.php?action=delete&id=' . $row->id.'">Excluir </a>' ?></td>
    			<td ><?php echo '<a href="../categoria/updateCategoria.php?action=update&id=' . $row->id.'">Atualizar </a>' ?></td>
    			
    		</tr>
    	<?php endforeach;?>
    	</table>   
</html>
<?php
    $categoria = new Categoria();
    if (isset($_GET['action']) && $_GET['action'] =='delete'){
        $categoria->delete($_GET['id']);
        header("Location: listagemCategoria.php");
    }  
 ?>
