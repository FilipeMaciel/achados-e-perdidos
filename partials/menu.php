    <nav class="menu">

        <div class="logo">
            <h1>LOGO</h1>
        </div>


        <ul>
        <!-- QUANDO O USUÁRIO LOGAR, É NECESSÁRIO ESCONDER ESTE MENU -->
        <?php if(empty($_COOKIE["id"])): ?>
            <li>
                <a href="#" class="logar iconMenu">Logar</a>
            </li>
        <?php endif; ?>

        <!-- FIM -->

            <?php if(isset($_COOKIE["id"])): ?>
                <li>
                    <a href="partials/desconectar.php" class="iconMenu ">Sair</a>
                </li>
            <?php endif;?>
            <!-- ESTE MENU SOMENTE SERÁ MOSTRADO PARA USUÁRIOS LOGADOS -->
            <?php if(isset($_COOKIE["id"]) && $_COOKIE["tipo"] == 1): ?>

            <li>
                <a href="#" class="iconMenu categoria"> Categorias </a>
            </li>

            <li class="iconSubmenu">
                <a href="#" class="iconMenu"> Usuários </a>
                <ul>
                    <li> <a href="./user/user.php" class="iconMenu">Listar Usuários</a> </li>
                    <li> <a href="#" class="cadastrar iconMenu">Cadastrar Usuários</a> </li>
                </ul>
            </li>
            <?php endif; ?>


            
        <!-- FIM -->
        </ul>
    </nav>
