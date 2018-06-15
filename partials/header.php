<header>
    <input type="checkbox" id="bt_menu">
    <label for='bt_menu'>&#9776;</label>
    
    <?php
      include "menu.php"
    ?>


          <div id="slider" class="s12 m12 l12">
                <div class="conteiner-header">
                    <div id="traco">
                        <h1>Menos dor de cabeça para encontrar <br> seus pertences perdidos</h1>
                    </div>
                    <div>
                        <span id="btn-header"> Ver Itens</span>
                    </div>
                </div>
          </div>

    <!-- SOMENTE USUÁRIOS CADASTRADOS E LOGADOS PODERÃO VER ESTE BOTÃO -->
    <?php if(isset($_COOKIE["id"])): ?>
          <a class="btn-floating-header" href="itens/cadastro.php">
              <i class="material-icons">add</i>
          </a>
    <?php endif; ?>
    
</header>