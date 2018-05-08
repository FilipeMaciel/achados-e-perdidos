<?php
    include_once $_SERVER['DOCUMENT_ROOT']."achados-e-perdidos/classes/models/Item.class.php";
    include_once $_SERVER['DOCUMENT_ROOT']."achados-e-perdidos/classes/Crud.php";
    //include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/models/Item.class.php";
#funções
        /*if(isset($_GET['action']) == 'delete'){
            $itemdel = new Item();

            $itemdel->delete($_GET['id']);
               }if (isset($_GET['action']) =='update'){
            $item = new Item();
            
        }
       */
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
        if (isset($_GET['action']) && $_GET['action'] =='update'):

        $item = Crud::findItens($_GET['id'])
        ?>
           <form enctype="multipart/form-data" method="POST" action="itens/cadastroi.php">
                Nome do item:<input type="text" name="nome" 
                value="<?php echo $item->nome_item ?>"><br>
                
                Quem encontrou:<input type="text" name="nome_pessoa"
                value="<?php echo $item->nome_pessoa ?>"><br>
                
                Local:<input type="text" name="local" value="<?php echo $item->local_encontrado ?>"><br>
                
                Descrição:<input type="text" name="descricao" value="<?php echo $item->descricao ?>"><br>
                    <div >
                        <img style="width:50px; height: 50px; " src="upload/<?php echo $item->imagem ?>">
                    </div>
                Imagem:<input type="file" name="userfile" placeholder="imagem"><br>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

                <input type="submit" name="update" value="Altualizar">

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

<!--*****************************************************************  -->
<!--    LISTAGEM DE ITEM     -->
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>PESSOA</th>
        <th>local</th>
        <th>descrição</th>
        <th>data</th>
        <th>status</th>
        <th>Imagem</th>

    </tr>
    </thead>

<tbody>
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

        </tr>
 
        <?php endforeach;

        } ?>
</tbody>
</table>
</body>
</html>