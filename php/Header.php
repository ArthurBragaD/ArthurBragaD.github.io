<?php
// if (!isset($_SESSION["currentUserName"])) session_start();
// if (isset($_SESSION["lifeTime"]) && (time() - $_SESSION["startTime"] > $_SESSION["lifeTime"])) {
//     session_destroy();
// }
?>
<div class="header-container">
    <form class="pesquisar-container" action="Pesquisa.php" method="GET">
        <input class="pesquisar-style" type="text" placeholder="Pesquisar..." name="pesquisa">
        <button class="bi bi-search" type="submit"></button>
    </form>

</div>

<div id="hotbar-menu-wrap " class="hotbar-container ">
    <ul class="hotbar-menu ">
        <li class="hotbar-logo ">
            <a href="/php/Index.php"><i class="bi-house-door-fill ">| Ínicio</i></a>
        </li>
        <li class="hotbar-item ">
            <a href="/php/Login.php ">Login</a>
        </li>
        <li class="hotbar-item ">
            <a href="/php/Informacoes.php ">Informações</a>
        </li>
        <li class="hotbar-item ">
            <a href="/php/Noticias.php ">Noticias</a>
        </li>
        <!-- <li class="hotbar-item ">
            <a href=" ">Pro-Cultura</a>
        </li> -->
        <li class="hotbar-item ">
            <a href="/php/Editais.php ">Editais</a>
        </li>
        <li class="hotbar-item ">
            <a href="/php/Equipamentos.php ">Equipamentos</a>
        </li>
        <li class="hotbar-item ">
            <a href=" ">Mapa Cultural</a>
        </li>
    </ul>
</div>