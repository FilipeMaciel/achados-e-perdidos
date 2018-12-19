<script>
    $(document).ready(function(){
        $(".alertDeletar").click(function(){

            let id = $(this).attr('id');
            
            swal({
                title: "Você tem certeza?",
                text: "Uma vez deletado, você não poderá recuperar este item!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {

                    $.get( "index.php?action=delete&id="+id, function( data ) {
                        swal("Item excluído com sucesso!", {
                            icon: "success",
                        });
                    });
                    location.reload();
                } else {
                    swal("Operação cancelada!");
                }
                });
        })
    });
</script>

            
        <div class="col l3 m6 s12  card">

           <div class="card-conteiner">
               <div class="card-image">
                  <img class="activator"  src="upload/<?php echo $row->imagem ?>">
                </div>
            <?php if(isset($_COOKIE["tipo"]) && $_COOKIE["tipo"] == 1): ?>
                <div class="card-action edit-delet">
                    <?php echo '<a class="alertDeletar" href="#" id="' . $row->id.'">Excluir</a>' ?>

                  <a href="#" class="botaoAtualizar" id="<?php $row->id?>">Atualizar</a>
                </div>

            <?php endif; ?>
                <div class="card-texto">

                    


                    <div class="info">
                        <span class="name-item"> <?php echo $row->nome_item;  ?> </span>

                        <div class="card-date">

                            <p class="card-text-encontrado">Local Encontrado: <?php echo $row->local_encontrado ?></p>
                        
                            <p class="card-date-position"><?php
                                $data = $row->data_encontrado;
                                echo date('d/m/Y', strtotime($data));  ?></p>
                        </div>


                    </div>
                    <div class="info-complete">

                        <p>Descrição: <?php echo $row->descricao ?></p>
                    </div>

                    <?php if (isset($_COOKIE["id"]) && $row->status == 0): ?>

                        <div class="container-btn-card">
                            <?php 
                            echo '
                                <a class="btn-devolver" href="devolvidos/Fdevolvidos.php?action=devolver&id=' . $row->id.'">
                                    Resgatar 
                                </a>
                            ' ?>

                        </div>

                    <?php endif ?>
                   
                    <p class="date"><?php $data = $row->data_encontrado;
                    echo date('d/m/Y', strtotime($data)); 
                     ?></p>
                </div>
           </div>
        </div>