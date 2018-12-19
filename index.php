<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/models/Item.class.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php";
        try{
            if (isset($_GET['action']) && $_GET['action'] == 'delete'){
                $itens = new Item();
                $itens->delete($_GET['id']);
            } 
        }
        catch(PDOException $e) {
            header("Location: error.php");
        } 

?>

<!doctype html>
<html lang="pt-br">

<?php 
  include "partials/head.php";
?>

<body >

<script>
    $(document).ready(function(){
        $(".butao").click(function(){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
                });
        })
    });
</script>
<input type="button" class="butao" onClick="clickado()" value="BUTAO">

<?php
   include "partials/header.php";
?>


<?php
  include "partials/modals.php"
?>


                        <!--    LISTAGEM DE ITEM     -->
<section class="section-cards section-encontrados" id="itens_achados">

    <div class="row section-title">
        <div class="conteiner-title conteiner-title-achados">
            <h1 class="title-larger">Itens  <span class="text-bold"> &nbsp Perdidos</span> </h1>
        </div>
    </div>
    <div class="row">
        <?php
        try{
            $pagina = (!isset($_GET['pagina']))? 1 : $_GET['pagina'];

            $sqlExec = DB::prepare("SELECT * FROM intens WHERE status = 0");
            $sqlExec->execute();
            $result = $sqlExec->fetchAll();

            $exibir = 8;
            $total = ceil((count($result) / $exibir)) ;
            $inicioExibir = ($exibir*$pagina) - $exibir;

            $sqlExec1 = DB::prepare("SELECT * FROM intens WHERE status = 0 limit $inicioExibir, $exibir");
            $sqlExec1->execute();
            $result1 = $sqlExec1->fetchAll();
            
            if($sqlExec->rowCount() > 0 ){
                foreach ($result1 as $row):
                    include "partials/cards_achados.php";
                endforeach;
        ?>
    </div>
        <div class="paginacao-container">
            <div class="paginacao-elementos">
                <a class="prox-ant" href=""> < </a>
                    <?php
                        for($i = 1; $i <= $total; $i++ ){
                            echo '<a href="?pagina='.$i.'" class="paginacao-style">'.$i.'</a> ';
                        }}
                    }
                    catch(PDOException $e) {
                        header("Location: error.php");
                    } 
                    ?>

                <a class="prox-ant" href=""> > </a>

            </div>
        </div>

    </section>
    <section class="section-cards section-resolvidos">

        <div class="row section-title">
            <div class="conteiner-title conteiner-title-resolvidos">
                <h1 class="title-larger color-name-resolvidos"> <span class="text-bold color-name-casos ">Casos </span> &nbsp Resolvidos</h1>
            </div>
        </div>
    <div class="row">
        <?php
           try{
            $paginadev = (!isset($_GET['paginadev']))? 1 : $_GET['paginadev'];
            $sqlExec =  DB::prepare("SELECT * FROM intens WHERE status=1");
            $sqlExec->execute();
            $result = $sqlExec->fetchAll();
            
            $exibir = 8;
            $total = ceil((count($result)/$exibir)) ;
            $inicioExibir = ($exibir*$paginadev) - $exibir;

            $sqlExec1 =  DB::prepare("SELECT * FROM intens WHERE status=1 limit $inicioExibir, $exibir");
            $sqlExec1->execute();
            $result1 = $sqlExec1->fetchAll();

            if($sqlExec->rowCount() > 0 ){
               foreach ($result1 as $row):
                    include "partials/cards_achados.php";
                endforeach;
            ?>
    </div>
        <div class="paginacao-container">
            <div class="paginacao-elementos">
                <a class="prox-ant-res" href=""> < </a>
                        <?php
                            for($id = 1; $id <= $total; $id++ ){    

                                if($id == $paginadev){
                                    echo ' <a href="#" class="paginacao-dev">'.$id.'</a> ';
                                }else{
                                echo ' <a href="?paginacao='.$id.'">'.$id.'</a> ';
                                }
                            }
                        }
                    }
                    catch(PDOException $e) {
                        header("Location: error.php");
                    }
                    ?>
                <a class="prox-ant-res" href=""> > </a>
            </div>
        </div>

    </section>
    <footer class="rodape row ">
        <div class="container-conteudo ">
            <h3 class="sobre col  l2 s4">
                Software desenvolvido como <br>
                atividade de estágio dos alunos de <br>
                Curso Integrado em Informática 2016/2018
            </h3>

            <h2 class="copyright col l2 s4">
               <p> Copyright © IFG - Campus Uruaçu</p>
            </h2>

            <h2 class="governo col l2 s4">
                <a href="http://www.brasil.gov.br/" target="_blank">
                        <p>GOVERNO <br>
                        FEDERAL</p>
                </a>
            </h2>

        </div>
    </footer>

    <!-- Copyright © Víctor Gonçalves dos Santos |
         Ana Lívia Pereira Silva | -->
</body>
</html>