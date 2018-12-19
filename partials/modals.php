<div class="bg-modal"></div>
         <div class="conteiner-modal row">
            <div class="modal-header modal-logar col l6 offset-l3 m8 offset-m2 s10 offset-s1">
                     <form id="formLogin"  method="POST" action="./login.php">
                         <div  class="modal">
                          <div class="input-field col s12">
                              <p class="title"> Achados e Perdidos <br> IFG <br></p>
                             <input type="text" name="email" width="100%" id="email" class="campo" placeholder="E-mail:"><br>
                          </div>
                          <div class="input-field col s12">
                             <input type="password" name="senha" id="senha" class="campo" placeholder="Senha:"><br>

                          </div>
                           
                             <input type="submit" name="login" value="ENTRAR" class="botao" >
                            <!-- <label class="fechar">X</label> -->
                         </div>
                     </form>
          </div>


                <div class="modal-header col l6 offset-l3 m8 offset-m2 s10 offset-s1 modal-cadastrar">
                    <form id="formCadastro" method="POST" action="./cadastro.php" style="background-color: #000;">
                         <div  class="modal">
                             <p class="title"> Cadastro de Usuários <br></p>
                              <input type="text" name="nome" class="campo" placeholder="Nome:"><br>
                              <input type="text" name="email" class="campo" placeholder="E-mail:"><br>
                              <input type="password" name="senha" id="senha2" class="campo" placeholder="Senha: "><br>
                              <input type="password" name="senha2" class="campo" placeholder="Digite a senha novamente: "><br>
                              <input type="text" name="telefone" id="tel" class="campo" placeholder="Telefone: "><br>
                              <input type="number" name="tipo" max=1 min=0 class="campo" placeholder="Tipo de usuário"><br>
                              <input type="submit" name=cadastrar value="cadastrar" class="botao">
                         </div>
                     </form>
                </div>

                <div class="modal-header modal-categoria col l6 offset-l3 m8 offset-m2 s10 offset-s1">
                     <form action="./categoria/cadastroCategoria.php" method="POST">
                         <div  class="modal">
                             <p class="title">Inserir Categoria</p>
                             <input type="text" name="nome" class="campo" placeholder="Insira o nome da nova categoria"><br>
                             <input type="hidden" name="id" value="">
                             <input  class="botao" type="submit" name="cadastro" value="Cadastrar">
                         </div>
                     </form>
                 </div>


             <div class="modal-header modal-itens col l6 offset-l3 m8 offset-m2 s10 offset-s1">
                     <form enctype="multipart/form-data"  method="POST" action="./itens/cadastroi.php" id="formCadItem" >
                             <div class="modal row">
                                 <p class="title">Registrar Item Perdido</p>
                                 <input id="nome" type="text" name="nome" class="validate campo col l6 m6 s12" placeholder="Insira o nome do Item">

                                    <div class="position-select">
                                        <div class="select-style col l6 m6 s12">
                                            <select name="categorias" id="iinput-select">
                                                <option disabled selected><u> Selecione a categoria </u> </option>
                                                 <?php
                                                 $categorias = Crud::findAllCategoria();

                                                 foreach ($categorias as $cat):

                                                     ?>
                                                     <option value="<?php echo $cat->id ?>" ><?php echo $cat->nome?> </option>
                                                 <?php
                                                 endforeach;
                                                 ?>
                                             </select>
                                        </div>
                                     </div>
                                         <input id="encontrou" type="text" name="nome_pessoa" class="validate campo col l6 m6 s12" placeholder="Quem encontrou?">
                                         <input id="local" type="text" name="local" class="validate campo col l6 m6 s12" placeholder="Local encontrado">
                                         <input id="descricao" type="text" name="descricao" class="validate campo col l6 m6 s12" placeholder="Descrição">
                                         <div class="file-field input-field ">
                                                    <label for="btn-img" class="botao-img">Selecionar um arquivo </label>
                                                    <input id="btn-img" type="file" name="userfile" placeholder="imagem" value="" class="botao-img">

                                         </div>
                                         <button class="botao" type="submit" name="cadastro">
                                             Cadatrar Item
                                         </button>
                             </div>
                     </form>
                  </div>

             <div class="modal-header modal-atualizar col l6 offset-l3 m8 offset-m2 s10 offset-s1">
                     <form id="formCadItem"  enctype="multipart/form-data" method="POST" action="./itens/cadastroi.php">
                         <div  class="modal">
                             <span class="title"> Atualizar Item </span>

                             <input type="text" name="nome" class="campo" value="" placeholder="Nome do Item" ><br>
                             <div class="position-select">
                                 <div class="select-style">
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
                                 </div>
                             </div>

                         <input type="text" name="nome_pessoa" value="" class="campo" placeholder="Quem encontrou:"><br>

                         <input type="text" name="local" value="" class="campo" placeholder="Local:"><br>

                         <input type="text" name="descricao" value="" class="campo" placeholder="Descrição:"><br>

                             <div class="cont-image-update">

                             </div>
                             <div class="file-field input-field ">

                                <label for="btn-img" class="botao-img">Selecionar um arquivo </label>
                                                    
                                <input type="file" name="userfile" placeholder="imagem" value="" class="btn-img"><br>

                            </div>

                         
                         <input type="hidden" name="id" value="">

                         <input type="submit" name="update" value="Altualizar" class="botao">

                         </div>
                     </form>
             </div>
         </div>






