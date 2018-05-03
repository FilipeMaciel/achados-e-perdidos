<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/models/Usuario.php";

#funções
    if(isset($_GET['action']) == 'delete'){
        $user = new Usuario();

        $user->delete($_GET['action']);
    }if (isset($_GET['action']) =='insert')
        //$user = new Usuario();

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <link rel="stylesheet" type="text/css" href="css/slider.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script type="text/javascript" src="js/funcaoMenu.js"></script>
     <script type="text/javascript" src="js/slider.js" async></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>
<body>

<header>
    <input type="checkbox" id="bt_menu">
    <label for='bt_menu'>&#9776;</label>
    <nav class="menu">
        <ul>
            <li>
                <label class="logar">Logar</label>
            </li>
            <li>
                <label class="cadastrar">Cadastrar</label>
            </li>
        </ul>
    </nav>

        <?php
        if (isset($_GET['action']) =='update'):

        $user = Crud::find($_GET['id'])


        ?>
            <form method="POST" action="cadastro.php">
                Nome:<input type="text" name="nome" value="<?php echo $user->nome  ?>"><br>
                Email:<input type="text" name="email" value="<?php echo $user->email  ?>"><br>
                Senha:<input type="password" name="senha" ><br>
                Telefone:<input type="text" name="telefone" value="<?php echo $user->telefone  ?>"><br>
                Tipo:<input type="number" name="tipo" max=1 min=0 ><br>
                <input type="submit" name=cadastrar value="atualizar">
            </form>

        <?php endif ?>

         <div class="bg-modal conteiner-modal">
            <div >
                <div class="modal modal-logar">
                     <form method="POST" action="login.php"> 
                         <div  class="formConfig"> 
                                            PARA LOGAR <br>
                             Email:<input type="text" name="email" width="100%"><br>
                             Senha:<input type="password" name="senha"><br>
                             <input type="submit" name="login" value="Logar">
                             <label class="fechar">X</label>
                         </div>
                     </form>
                </div>     
            </div>


            <div>
                <div class="modal modal-cadastrar">
              <!-- Formulário para cadastro -->

                    <form method="POST" action="cadastro.php"> 
                         <div  class="formConfig"> 
                                            PARA CADASTRO <br>
                             Nome:<input type="text" name="nome"><br>
                            Email:<input type="text" name="email"><br>
                            Senha:<input type="password" name="senha"><br>
                            Telefone:<input type="text" name="telefone" ><br>
                            Tipo:<input type="number" name="tipo" max=1 min=0 ><br>
                            <input type="submit" name=cadastrar value="cadastrar">
                             <label class="fechar">X</label>

                         </div>
                     </form>
                </div>
           </div>
        </div>   

<div class="slide">
    <div class="slide_nav">
        <div class="slide_nav_item go"> ▶ </div>
        <div class="slide_nav_item back"> ◀ </div>
    </div>

    <?php 
      for($i = 1; $i <= 4; $i++):
        $slide = str_pad($i, 2, 0, STR_PAD_LEFT);
        $first = ($i == 1 ? 'first' : '');
        
     ?>
     
     <article class="slide_item <?= $first; ?>">
        <img src="imagens/<?= $slide; ?>.jpg" alt="[SLIDE <?= $slide; ?>]" title="SLIDE <?= $slide; ?>">
        <div class="slide_item_desc">
           <h1>Este é meu slide <?= $slide; ?> é sadflhsajdhsajkdhsajk sdakld jksa askd jkl</h1>
           <p>sdjaslkjdklsa s klajdlksaj asklakls jdklsajdkas kdl jsad jsa a ksdk kas jlkjdskljsdkldjas k asjdksaj kd</p>
        </div>   
     </article>
   <?php endfor;?> 
</div>
</header>


















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
            <td><?php echo '<a href="index.php?action=delete&id=' . $row->id.'">Excluir</a>' ?></td>
            <td><?php echo '<a href="index.php?action=update&id='. $row->id.'">Atualizar</a>'?></td>

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

</body>
</html>
