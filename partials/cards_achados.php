
            
        <div class="col l3 m6 s12  card">

           <div class="card-conteiner">
               <div class="card-image">
                  <img class="activator"  src="upload/<?php echo $row->imagem ?>">
                </div>
            <?php if(isset($_COOKIE["tipo"]) && $_COOKIE["tipo"] == 1): ?>
                <div class="card-action edit-delet">
                    <?php echo '<a href="index.php?action=delete&id=' . $row->id.'">Excluir</a>' ?>
                    <a href="#" class="botaoAtualizar modal-atualizar">Atualizar</a>
                </div>

            <?php endif; ?>
                <div class="card-texto">

                    


                    <div class="info">
                        <span class="name-item"> <?php echo $row->nome_item;  ?> </span>

                        <div class="card-date">
                            <p class="card-text-encontrado">Local Encontrado: <?php echo $row->local_encontrado ?></p>
                            <p class="card-date-position"><?php
                                echo $data = $row->data_encontrado;
                                //echo $timeStamp = date( "d/m/Y", strtotime($data));
                                //echo date_format($data, 'd/m/Y');  ?></p>
                        </div>
                    </div>
                    <div class="info-complete">
                        <p>Descrição: <?php echo $row->descricao ?></p>
                        <p>Data: <?php echo $row->data_encontrado; ?></p>
                    </div>
                    <div class="container-btn-card">
                        <?php echo '
                            <a class="btn-devolver" href="devolvidos/Fdevolvidos.php?action=devolver&id=' . $row->id.'">
                                <span > Resgatar </span>
                            </a>
                        ' ?>
                    </div>
                </div>
           </div>
        </div>