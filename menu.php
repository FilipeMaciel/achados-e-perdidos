  <nav class="menu">
        <ul>
        <!-- QUANDO O USUÁRIO LOGAR, É NECESSÁRIO ESCONDER ESTE MENU -->
        <?php if(empty($_COOKIE["id"]) == true): ?>
            <li>
                <a href="#" class="logar iconMenu">Logar</a>
            </li>
        <?php endif; ?>

        <!-- FIM -->

        <!-- ESTE MENU SOMENTE SERÁ MOSTRADO PARA USUÁRIOS LOGADOS -->
        <?php if(isset($_COOKIE["id"]) && $_COOKIE["tipo"] == 1): ?>
            <li>
                <a href="#" class="logar iconMenu">Categorias</a>
            </li>
            <li>
                <a href="user/user.php" class="cadastrar iconMenu">Usuários</a>
            </li>
        <?php endif; ?>
            
        <!-- FIM -->
        </ul>
    </nav>

  <!--<nav class="">
        <ul>
            <li>
                <a href="#" class="logar iconMenu">Logar</a>
            </li>
            <li>
                <a href="#" class="cadastrar iconMenu">Cadastrar</a>
            </li>
        </ul>
    </nav>
-->