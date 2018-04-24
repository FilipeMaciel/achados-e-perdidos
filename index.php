<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/models/Usuario.php";
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>ações</th>
    </tr>
    </thead>
    <tbody>
<?php
    if(isset($_COOKIE["id"])){
        $usuarios = Usuario::findAll();
        foreach ($usuarios as $row):

            ?>

        <tr>
            <td><?php echo $row->id;  ?></td>
            <td><?php echo $row->nome;  ?></td>
            <td><?php echo $row->email ?></td>
            <td><?php echo '<a href="index.php?action=delete&id=' . $row->id.'">Editar</a>' ?></td>
        </tr>

        <?php

            endforeach;

    }

?>
    </tbody>
</table>
<br><br>
<!-- Formulário de login -->
        <form method="POST" action="login.php">
            Email:<input type="text" name="email"><br>
            Senha:<input type="password" name="senha"><br>
            <input type="submit" name="login" value="Logar">

        </form>

        <br><br><br>
<!-- Formulário para cadastro -->
        <form method="POST" action="cadastro.php">
            Nome:<input type="text" name="nome"><br>
            Email:<input type="text" name="email"><br>
            Senha:<input type="password" name="senha"><br>
            Telefone:<input type="text" name="telefone" ><br>
            Tipo:<input type="number" name="tipo" max=1 min=0 ><br>
            <input type="submit" name=cadastrar value="cadastrar">
        </form>
</body>
</html>
