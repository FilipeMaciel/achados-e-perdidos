<header>
    <input type="checkbox" id="bt_menu">
    <label for='bt_menu'>&#9776;</label>
    
    <?php
      include "menu.php"
    ?>

      <div class="row">
          <div id="slider" class="s12 m12 l12">
              <a href="#" id="prev">  </a>
              <a href="#" id="next">  </a>

              <ul>
                  <li class="one"></li>
                  <li class="two"></li>
                  <li class="three"></li>
              </ul>
          </div>
      </div>

    <!-- SOMENTE USUÁRIOS CADASTRADOS E LOGADOS PODERÃO VER ESTE BOTÃO -->
    <?php if(isset($_COOKIE["id"])): ?>
          <a class="btn-floating-header" href="itens/cadastro.php">
              <i class="material-icons">add</i>
          </a>
    <?php endif; ?>
    
</header>