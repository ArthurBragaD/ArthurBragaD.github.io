<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipo do Css Site Prefeitura | Noticias</title>
    <!-- <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/js/bootstrap.min.css" media="screen"> -->
    <link rel="stylesheet" href="/css/Reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/css/Hotbar.css">
    <link rel="stylesheet" href="/css/Noticias.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include "./Header.php"; ?>
    <?php
    $db = new SQLite3('../db/userData.db');
    $sql = "SELECT * FROM Noticias ORDER BY id DESC LIMIT 6";
    $noticias = $db->query($sql);
    ?>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Notícias</h2>
    </div>
    <div class="noticias-container">
        <div class="noticias-data-container">
            <?php
            while ($dados = $noticias->fetchArray(SQLITE3_ASSOC)) :
            ?>
                <article class="conteudo-lista-item clearfix">
                    <header>
                        <figure class="pull-left hidden-xs containerimagem">
                            <a href="./Noticia.php?noticia=<?php echo $dados["id"]; ?>" target="_self">
                                <img class="resultado-pesquisa-img" src="<?php echo $dados["localizado"]; ?>">
                            </a>
                        </figure>
                        <time class="conteudo-lista-item-datahora" datetime="">
                            <?php echo $dados["hora"]; ?>
                        </time>
                        <h2 class="conteudo-lista-item-titulo">
                            <a href="./Noticia.php?noticia=<?php echo $dados["id"]; ?>" method="GET" target="_self" title="Leia na íntegra."><?php echo $dados["titulo"]; ?></a>
                        </h2>
                    </header>
                    <p class="hidden-xs">
                        Descrição: <?php echo substr($dados["descricao"], 0, 250); ?> ...
                    </p>
                </article>
            <?php endwhile; ?>
            <!-- <article class="conteudo-lista-item clearfix">
                <header>
                    <figure class="pull-left hidden-xs">
                        <a href="" target="_self">
                            <img class="resultado-pesquisa-img" src="/Imagens/Design sem nome (1).png">
                        </a>
                    </figure>
                    <time class="conteudo-lista-item-datahora" datetime="">
                        00/00/0000-00h00min
                    </time>
                    <h2 class="conteudo-lista-item-titulo">
                        <a href="" target="_self" title="Leia na íntegra.">Titulo da noticia</a>
                    </h2>
                </header>
                <p class="hidden-xs">
                    Descrição: Teste
                </p>
            </article> -->
        </div>
    </div>
    <div class="ver-mais-button"><a href="./VermaisNoticias.php"><button class="btn btn-primary">Ver Mais Noticias</button></a>
    </div>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>