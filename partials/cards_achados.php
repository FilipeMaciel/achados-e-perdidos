
            
        <div class="col l3 m6 s12  card">

           <div class="card-conteiner">
               <div class="card-image">
                  <img class="activator"  src="upload/<?php echo $row[7] ?>">
                </div>

                <div class="card-action edit-delet">
                    <?php echo '<a href="index.php?action=delete&id=' . $row[0].'">Excluir</a>' ?>
                    <a href="#" class="botaoAtualizar modal-atualizar">Atualizar</a>
                </div>

                <div class="card-texto">

                    <?php if(isset($_COOKIE["tipo"]) && $_COOKIE["tipo"] == 1): ?>

                    <?php endif; ?>

                    <div class="info">
                        <span class="name-item"> <?php echo $row[1];  ?> </span>

                        <div class="card-date">
                            <p class="card-text-encontrado">Local Encontrado: <?php echo $row[3] ?></p>
                            <p class="card-date-position"><?php
                                echo $data = $row[5];
                                //echo $timeStamp = date( "d/m/Y", strtotime($data));
                                //echo date_format($data, 'd/m/Y');  ?></p>
                        </div>


                    </div>
                    <div class="info-complete">
                        <p>Descrição: <?php echo $row[4] ?></p>
                        <p class="card-text-encontrado">Local Encontrado:<?php echo $row[3] ?></p>

                    </div>
                    <div class="container-btn-card">
                        <?php echo '
                            <a class="btn-devolver" href="devolvidos/Fdevolvidos.php?action=devolver&id=' . $row[0].'">
                                <span > Resgatar </span>
                            </a>
                        ' ?>


                    </div>
                    <p class="date"><?php echo $data = $row[5]; ?></p>
                </div>
           </div>
        </div>