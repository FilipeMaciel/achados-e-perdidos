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

<?php 
  include "partials/head.php";
?>

<body>

<?php
   include "partials/header.php";
?>


<?php
  include "partials/modals.php"
?>


<!--    LISTAGEM DE ITEM     -->

    <div class="row">
<?php
    //if(isset($_COOKIE["id"])){
        $itens = Item::findAllItens();
        foreach ($itens as $row):
            
        include "partials/cards_achados.php";

            ?>

  
            <div class="col l3 m6 s12 card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="upload/<?php echo $row->imagem ?>">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4"><?php echo $row->nome_item;  ?><i class="material-icons right">more_vert</i></span>
                    <input type="hidden" class="id-card" value="<?php echo $row->id ?>">
                </div>
                <div class="card-action">
                        <?php echo '<a href="index.php?action=delete&id=' . $row->id.'">Excluir</a>' ?>

                        <a href="#" class="botaoAtualizar modal-atualizar">Atualizar</a>

                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><?php echo $row->nome_item;  ?>
                      <i class="material-icons right">close</i>
                  </span>
                    <p>Descrição: <?php echo $row->descricao ?></p>
                    <p>Local Encontrado: <?php echo $row->local_encontrado ?></p>
                    <p>Data: <?php echo $row->data_encontrado ?></p>
                    
                </div>
            </div>
           

        <?php 

        
    endforeach;
         
      ?>
 </div>


</body>
</html>