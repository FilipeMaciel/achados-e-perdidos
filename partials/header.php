<header>
    <input type="checkbox" id="bt_menu">
    <label for='bt_menu'>&#9776;</label>
    <nav class="menu">
        <ul>
            <li>
                <a href="#" class="logar iconMenu">Logar</a>
            </li>
            <li>
                <a href="#" class="cadastrar iconMenu">Cadastrar</a>
            </li>
        </ul>
    </nav>


    <div class="bg-modal"></div>
         <div class="conteiner-modal">
            <div class="modal-header">
                <div class="conteiner-modalheader modal-logar">
                     <form class=" black-text" method="POST" action="login.php"> 
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

                    <form method="POST" action="cadastro.php"> 
                         <div  class="formConfig">     
                              Nome:<input type="text" name="nome"><br>
                              Email:<input type="text" name="email"><br>
                              Senha:<input type="password" name="senha"><br>
                              Telefone:<input type="text" name="telefone" ><br>
                              Tipo:<input type="number" name="tipo" max=1 min=0 ><br>
                              <input type="submit" name=cadastrar value="cadastrar" class="waves-effect waves-light btn cursor">
                             <label class="fechar">X</label>

                         </div>
                     </form>
                </div>
           </div>
          </div>
           
    


       
        
              <div id="slider">
                  <a href="#" id="prev">  </a>
                  <a href="#" id="next">  </a>

                  <ul>
                      <li class="one"></li>
                      <li class="two"></li>
                      <li class="three"></li>
                  </ul>
              </div>



              <a class="btn-floating btn-large waves-effect waves-light green" href="itens/cadastro.php"><i class="material-icons">add</i></a>

</header>