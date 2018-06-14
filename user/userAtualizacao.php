<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <?php 
  include "../classes/models/Usuario.php";
  $usuario = Usuario::findAll();
  foreach ($usuario as $row ) {
   } 
  ?>

<form  method="POST" action="../cadastro.php" > 
    <input type="hidden" name=id value="<?php echo($_GET["id"]);?>">
    Nome:<input type="text" name="nome" value="<?php echo($row->nome);?>"><br>
    Email:<input type="text" name="email" value="<?php echo($row->email);?>" ><br>
    Senha:<input type="password" name="senha" value="<?php echo($row->senha);?>"><br>
    Repita a senha:<input type="password" name="senha2" ><br>
    Telefone:<input type="text" name="telefone" value="<?php echo($row->telefone);?>" ><br>
    Tipo:<input type="number" name="tipo" max=1 min=0 value="<?php echo($row->tipo);?>" ><br>
    <input type="submit" name=atualizar value="Atualizar"waves-effect waves-light btn cursor">
</form>
</body>
</html>


