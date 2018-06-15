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
                <a href="#" class="logar iconMenu">Categorias</a>
            </li>
            <li>
                <a href="#" class="cadastrar iconMenu">Usuários</a>
            </li>
        <?php endif; ?>
        <?php if(isset($_COOKIE["id"])): ?>
            <li>
                <a href="" >Sair</a>
            </li>

        <?php endif;?>
            
        <!-- FIM -->
        </ul>
    </nav>
