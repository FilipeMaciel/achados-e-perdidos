    <nav class="menu">
        <ul>
        <!-- QUANDO O USUÁRIO LOGAR, É NECESSÁRIO ESCONDER ESTE MENU -->
        <?php if(empty($_COOKIE["id"])): ?>
            <li>
                <a href="#" class="logar iconMenu">Logar</a>
            </li>
        <?php endif; ?>

        <!-- FIM -->

        <!-- ESTE MENU SOMENTE SERÁ MOSTRADO PARA USUÁRIOS LOGADOS -->
        <?php if(isset($_COOKIE["id"]) && $_COOKIE["tipo"] == 1): ?>
            
        <li>
            <a href="./user/user.php">Usuários</a>
        </li>
        
            <li>
                <a href="#" class="iconMenu categoria"> Categorias </a>
            </li>
            <li>
                <a href="#" class="iconMenu cadastrar ">Cadastrar Usuários</a>
            </li>
        <?php endif; ?>
        <?php if(isset($_COOKIE["id"])): ?>
            <li>
                <a href="partials/desconectar.php" class="iconMenu ">Sair</a>
            </li>

        <?php endif;?>
            
        <!-- FIM -->
        </ul>
    </nav>
