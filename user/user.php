
<?php 
include "/Usuario.php";

    $usuario = Usuario::findAll();
    foreach ($usuario as $row):
?>
    	<table border="1" style="width: 100%">
    		<tr>
    			<td>id</td>
    			<td>Nome</td>
    			<td>Email</td>
    			<td>Tipo</td>
    			<td ><?php echo '<a href="../partials/modals.php" class="conteiner-modalheader modal-cadastrar"' . $row->id.'">Cadastrar +</a>'?></td>
    
    		</tr>
    		<tr>
    			<td><?php echo $row->id;?></td>
    			<td><?php echo $row->email;?></td>
    			<td><?php echo $row->telefone;?></td>
    			<td><?php echo $row->tipo;?></td>
						
    			<td ><?php echo '<a href="../user/user.php?action=delete&id=' . $row->id.'">Excluir </a>' ?></td>
    			<td ><?php echo '<a href="#" class="botaoAtualizar modal-atualizar">Atualizar</a> '?></td>
    			
    		</tr>
    	</table>
    	

<?php             
 endforeach;
if (isset($_GET['action']) && $_GET['action'] =='delete'){
    $user = new Usuario();
    $user->delete($_GET['id']);
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