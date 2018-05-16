<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/models/Item.class.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php";

        if (isset($_GET['action']) && $_GET['action'] =='delete'){
        $itens = new Item();
        $itens->delete($_GET['id']);
        }
    

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>    
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
                <a href="itens/cadastro.php" class="iconMenu">Cadastrar Item</a>
            </li>
            <li>
                <a href="#" class="logar iconMenu">Logar</a>
            </li>
            <li>
                <a href="#" class="cadastrar iconMenu">Cadastrar</a>
            </li>
        </ul>
    </nav>


        <?php
        if (isset($_GET['action']) && $_GET['action'] =='update'):

        $item = Crud::findItens($_GET['id'])
        ?>
           <form enctype="multipart/form-data" method="POST" action="itens/cadastroi.php">
                Nome do item:<input type="text" name="nome" value="<?php echo $item->nome_item ?>"><br>
                
                Quem encontrou:<input type="text" name="nome_pessoa" value="<?php echo $item->nome_pessoa ?>"><br>
                
                Local:<input type="text" name="local" value="<?php echo $item->local_encontrado ?>"><br>
                
                Descrição:<input type="text" name="descricao" value="<?php echo $item->descricao ?>"><br>
                    <div >
                        <img style="width:50px; height: 50px; " src="upload/<?php echo $item->imagem ?>">
                    </div>
                Imagem:<input type="file" name="userfile" placeholder="imagem" value="upload/<?php echo $item->imagem ?>"><br>
                
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

                <input type="submit" name="update" value="Altualizar">

            </form>

        <?php 
        
        $imagem= Crud::findItens($_GET['id'])->imagem;
        var_dump($imagem);
        
    endif; ?>
       

         <div class="bg-modal conteiner-modal">
            <div >
                <div class="modal-content modal-logar">
                     <form class=" black-text" method="POST" action="login.php"> 
                        

                          <div class="input-field col s12">
                             <label for="email">Email</label>
                             <input type="text" name="email" width="100%" id="email"><br>
                          </div>
                          <div class="input-field col s12">
                             <label for="senha">Senha</label>
                             <input type="password" name="senha" id="senha"><br>
                          </div>
                           
                             
                             <input type="submit" name="login" value="Logar">
                             <label class="fechar">X</label>
                         
                     </form>
                </div>     
            </div>


            <div>
                <div class="modal-content modal-cadastrar">
              <!-- Formulário para cadastro -->

                    <form method="POST" action="cadastro.php"> 
                         <div  class="formConfig">     
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

        
        <div id="slider">
            <a href="#" id="prev"> < </a>
            <a href="#" id="next"> > </a>

            <ul>
                <li class="one"></li>
                <li class="two"></li>
                <li class="three"></li>
            </ul>
        </div>

</header>

<!--*****************************************************************  -->
<!--    LISTAGEM DE ITEM     -->

    <div class="row">
<?php
    if(isset($_COOKIE["id"])){
        $itens = Item::findAllItens();
        foreach ($itens as $row):

            ?>

        <tr>
            <td><?php echo $row->id;  ?></td>
            <td><?php echo $row->nome_item;  ?></td>
            <td><?php echo $row->nome_pessoa ?></td>
            <td><?php echo $row->local_encontrado  ?></td>
            <td><?php echo $row->descricao ?></td>
            <td><?php echo $row->data_encontrado ?></td>
            <td><?php echo $row->status ?></td>
            <td><?php echo $row->imagem ?></td>
            <td><?php echo Crud::find($row->id_usuarios)->nome ?></td>
            <td><?php echo '<a href="index.php?action=delete&id=' . $row->id.'">Excluir</a>' ?></td>
            <td><?php echo '<a href="index.php?action=update&id='. $row->id.'">Atualizar</a>'?></td>
            <td><?php echo '<a href="devolvidos/devolvidos1.php?action=devolver&id='. $row->id.'">Devolver</a>'?></td>

        </tr>

            <div class="col l3 m6 s12 card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="upload/<?php echo $row->imagem ?>">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4"><?php echo $row->nome_item;  ?><i class="material-icons right">more_vert</i></span>

                </div>
                <div class="card-action">
                        <?php echo '<a href="index.php?action=delete&id=' . $row->id.'">Excluir</a>' ?>
                        <a href="index.php?action=update&id=<?php echo $row->id ?>">Atualizar</a>

                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><?php echo $row->nome_item;  ?><i class="material-icons right">close</i></span>
                    <p>Descrição: <?php echo $row->descricao ?></p>
                    <p>Local Encontrado: <?php echo $row->local_encontrado ?></p>
                    <p>Data: <?php echo $row->data_encontrado ?></p>
                    
                </div>
            </div>
           
        
     

        <?php 
        
    endforeach;
         
        } ?>
 </div>


</body>
</html>