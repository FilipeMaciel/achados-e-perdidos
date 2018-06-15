<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <?php 
  include "../classes/models/Usuario.php";
  $usuario = Usuario::find($_GET["id"]);
  
  //var_dump($usuario);
  ?>

<form  method="POST" action="../cadastro.php" > 
    <input type="hidden" name=id value="<?php echo($_GET["id"]);?>">
    Nome:<input type="text" name="nome" value="<?php echo($usuario->nome);?>"><br>
    Email:<input type="text" name="email" value="<?php echo($usuario->email);?>" ><br>
    Senha:<input type="password" name="senha" value="<?php echo($usuario->senha);?>"><br>
    Repita a senha:<input type="password" name="senha2" ><br>
    Telefone:<input type="text" name="telefone" value="<?php echo($usuario->telefone);?>" ><br>
    Tipo:<input type="number" name="tipo" max=1 min=0 value="<?php echo($usuario->tipo);?>" ><br>
    <input type="submit" name=atualizar value="Atualizar"waves-effect waves-light btn cursor">
</form>
</body>
</html>


