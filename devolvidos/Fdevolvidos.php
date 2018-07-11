
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php";
?>
<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/grid.css">
</head>

<?php
include $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/partials/head.php";
?>

<body>

<nav class="menu">
    <ul>
        <li>
            <a href="../index.php" class="iconMenu">Voltar</a>
        </li>
    </ul>
</nav>

<?php
include "../partials/modals.php"
?>

<div class="row formDevolucao">
    <div class="col l6 offset-l3 m8 offset-m2 s10 offset-s1">
        <form action="../itens/cadastroi.php" method="POST" id="formDevolucao">
            <input type="hidden" name="id" value= "<?php echo $_GET["id"] ?>">
            <input type="text" name="name" placeholder="Nome do solicitante" class="campo"><br>
            <input type="text" name="ident" placeholder="Matrícula/SIAPE" class="campo"><br>
            <input type="text" name="telefone" id="tel" placeholder="Telefone" class="campo"><br>
            <input type="email" name="email" placeholder="E-mail" class="campo"><br>
            <input type="submit" name="devolver" value="Devolver" class="botao">
        </form>
    </div>
</div>

</body>
</html>