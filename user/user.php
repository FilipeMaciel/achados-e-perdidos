<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
</head>


<body>

<nav  class="menu">
    <ul>
        <li>
            <a href="../index.php" class="iconMenu">Voltar</a>
        </li>
    </ul>
</nav>

        <span class="titulo-secao"> Listagem de Usuários</span>

<table>
	<tr class="line-color1">
	    <td class="titulo">Id</td>
	    <td class="titulo">Nome</td>
	    <td class="titulo">E-mail</td>
	    <td class="titulo">Tipo</td>
	    <td colspan="2" class="titulo">Ações</td>
	</tr>
<?php 
include "../classes/models/Usuario.php";

    $usuario = Usuario::findAll();
    foreach ($usuario as $row):
?>
    		
    		<tr class="line-color2">
    			<td><?php echo $row->id;?></td>
    			<td><?php echo $row->nome;?></td>
    			<td><?php echo $row->email;?></td>
    			<td><?php echo $row->tipo;?></td>
						
    			<td class="center"><?php echo '<a href="../user/user.php?action=delete&id=' . $row->id.'">Excluir </a>' ?></td>
    			<td  class="center"><?php echo '<a href="../user/userAtualizacao.php?action=update&id=' . $row->id.'">Atualizar</a> '?></td>
    			
    		</tr>
    	<?php endforeach;?>
    </table>
    </body>
</html>
<?php

if (isset($_GET['action']) && $_GET['action'] =='delete'){
    $user = new Usuario();
    $user->delete($_GET['id']);
    header("Location: user.php");
}  
if (isset($_GET['action']) && $_GET['action'] =='atualizar'){
	$user = new Usuario();
    $user->update($id, $nome, $email, $senha, $telefone, $tipo);
} 
if (isset($_GET['action']) && $_GET['action'] =='inserir'){
    $user = new Usuario();
    $user->insert($nome, $email, $senha, $telefone, $tipo);
} 

 ?>
