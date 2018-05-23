        

            <div class="bg-modal-card"></div>

              <div class="conteiner-update">
                     <!-- Formulário para cadastro -->
                      <div class="formConfig modal-update">
                         <form enctype="multipart/form-data" method="POST" action="itens/cadastroi.php">
                           <div class="input-field col s12">
                            <label for="first_name">Nome do item:</label>
                              <input type="text" name="nome" value=""><br>
                            </div>
                               <div class="input-field col s12">
                                    <select name="categorias">
                                      <option value="" disabled selected>Categoria</option>
                                      <?php
                                      $categorias = Crud::findAllCategoria();

                                      foreach ($categorias as $cat):
                                        
                                    ?>
                                        <option value="<?php echo $cat->id ?>" ><?php echo $cat->nome?> </option>
                                    <?php
                                      endforeach;
                                    ?>  
                                    </select>
                                    <label>Categoria</label>
                                </div>
                              
                              Quem encontrou:<input type="text" name="nome_pessoa" value=""><br>
                              
                              Local:<input type="text" name="local" value=""><br>
                              
                              Descrição:<input type="text" name="descricao" value=""><br>
                                  <div class="cont-image-update">
                                        
                                  </div>
                                  
                              <input type="file" name="userfile" placeholder="imagem" value=""><br>
                              
                              <input type="hidden" name="id" value="">

                              <input type="submit" name="update" value="Altualizar">

                              <label class="fechar">X</label>
                          </form>    
                     </div>             
              </div>  

        <div class="col l3 m6 s12 card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="upload/<?php echo $row->imagem ?>">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4"><?php echo $row->nome_item;  ?><i class="material-icons right">more_vert</i></span>
                    <input type="text" class="id-card" value="<?php echo $row->id ?>">
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