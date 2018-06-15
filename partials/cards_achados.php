
            
        <div class="offset-l1 col l3 m6 s12  card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="upload/<?php echo $row[7] ?>">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4"><?php echo $row[1];  ?>
                  <i class="material-icons right">more_vert</i></span>
                    <input type="hidden" class="id-card" value="<?php echo $row[0] ?>">
                </div>
                <?php if(isset($_COOKIE["tipo"]) && $_COOKIE["tipo"] == 1): ?>
                <div class="card-action">
                        <?php echo '<a href="index.php?action=delete&id=' . $row[0].'">Excluir</a>' ?>
                        <?php echo '<a href="devolvidos/Fdevolvidos.php?action=devolver&id=' . $row[0].'">Devolver</a>' ?>
                        <a href="#" class="botaoAtualizar modal-atualizar">Atualizar</a>        
                </div>
                <?php endif; ?>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><?php echo $row[1];  ?>
                      <i class="material-icons right">close</i>
                  </span>
                    <p>Descrição: <?php echo $row[4] ?></p>
                    <p>Local Encontrado: <?php echo $row[3] ?></p>
                    <p>Data: <?php echo $row[5] ?></p>
                    
                </div>
            </div>