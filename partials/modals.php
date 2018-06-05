<div class="bg-modal"></div>
         <div class="conteiner-modal">
            <div class="modal-header">
                <div class="conteiner-modalheader modal-logar">
                     <form id="formLogin" class="formLogin black-text" method="POST" action="login.php"> 
                        <div  class="formConfig">

                          <div class="input-field col s12">
                             <label for="email">Email</label>
                             <input type="text" name="email" width="100%" id="email"><br>
                          </div>
                          <div class="input-field col s12">
                             <label for="senha">Senha</label>
                             <input type="password" name="senha" id="senha"><br>

                          </div>
                           
                             <input type="submit" name="login" value="Logar" class="waves-effect waves-light btn cursor" >
                             <label class="fechar">X</label>
                         </div>
                     </form>
                </div>     
          </div>


            <div class="modal-header">
                <div class="conteiner-modalheader modal-cadastrar">
              <!-- Formulário para cadastro -->

                    <form id="formCadastro" method="POST" action="cadastro.php" style="background-color: #000;"> 
                         <div  class="formConfig">     
                              Nome:<input type="text" name="nome"><br>
                              Email:<input type="text" name="email"><br>
                              Senha:<input type="password" name="senha" id="senha2"><br>
                              Repita a senha:<input type="password" name="senha2"><br>
                              Telefone:<input type="text" name="telefone" id="tel" ><br>
                              Tipo:<input type="number" name="tipo" max=1 min=0 ><br>
                              <input type="submit" name=cadastrar value="cadastrar" class="waves-effect waves-light btn cursor">
                             <label class="fechar">X</label>

                         </div>
                     </form>
                </div>
           </div>


          </div>

          
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


