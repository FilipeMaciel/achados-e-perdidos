<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<table border="1" style="width: 100%">
	<tr>
	    <td>id</td>
	    <td>Nome</td>
	    <td>Email</td>
	    <td>Tipo</td>
	    <td colspan="2">Ações</td>
	</tr>
<?php 
    include "../classes/models/Usuario.php";
    $usuario = Usuario::findAll();
    foreach ($usuario as $row):
?>
    		
    		<tr>
    			<td><?php echo $row->id;?></td>
    			<td><?php echo $row->nome;?></td>
    			<td><?php echo $row->email;?></td>
    			<td><?php echo $row->tipo;?></td>
						
    			<td ><?php echo '<a href="../user/user.php?action=delete&id=' . $row->id.'">Excluir </a>' ?></td>
    			<td ><?php echo '<a href="../user/userAtualizacao.php?action=update&id=' . $row->id.'">Atualizar</a> '?></td>
    			
    		</tr>
    	<?php endforeach;?>
    	</table>   
</html>
<?php
    $user = new Usuario();
    if (isset($_GET['action']) && $_GET['action'] =='delete'){
        $user->delete($_GET['id']);
        header("Location: user.php");
    }  
    if (isset($_GET['action']) && $_GET['action'] =='atualizar'){
        $user->update($id, $nome, $email, $senha, $telefone, $tipo);
    } 
    if (isset($_GET['action']) && $_GET['action'] =='inserir'){
        $user->insert($nome, $email, $senha, $telefone, $tipo);
    } 
 ?>
