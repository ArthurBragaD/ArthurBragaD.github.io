<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipo do Css Site Prefeitura | Agenda</title>
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
    <link rel="stylesheet" href="/css/Index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include "./Header.php"; ?>
    <?php
    $db = new SQLite3('../db/userData.db');
    $sql1 = "SELECT DISTINCT * FROM Noticias ORDER BY id DESC LIMIT 5";
    $noticia = $db->query($sql1);
    ?>
    <?php
    $sql = "SELECT * FROM Carrousel ORDER BY id DESC";
    $carrouselconta = $db->query($sql);
    $carrousel = $db->query($sql);
    ?>

    <div class="carousel-container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                //Contando o numero de noticias aparecendo
                $num = 0;
                while ($rows = $carrouselconta->fetchArray(SQLITE3_ASSOC)) {
                    if ($num == 0) {
                        echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
                        ++$num;
                    } else {
                        echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $num . '"></li>';
                        ++$num;
                    }
                }; ?>
            </ol>
            <div class="carousel-inner">
                <?php
                $num = 0;
                while ($dados = $carrousel->fetchArray(SQLITE3_ASSOC)) {
                    if ($num == 0) { ?>
                        <div class="carousel-item active">
                            <a href="<?php echo $dados['link']; ?>">
                                <img class=".d-block .img-fluid tamanho-img-carrossel" src="<?php echo $dados['localizado']; ?>"></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $dados["titulo"]; ?></h5>
                                <p><?php echo $dados["descricao"]; ?></p>
                            </div>
                        </div>
                    <?php
                        $num++;
                    } else { ?>
                        <div class="carousel-item">
                            <a href="<?php echo $dados['link']; ?>">
                                <img class=".d-block .img-fluid tamanho-img-carrossel" src="<?php echo $dados['localizado']; ?>"></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $dados["titulo"]; ?></h5>
                                <p><?php echo $dados["descricao"]; ?></p>
                            </div>
                        </div>
                <?php
                    };
                };
                ?>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only" style="color: #14172a; font-weight: bolder; font-size: larger;">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="sr-only" style="color: #14172a; font-weight: bolder; font-size: larger;">Próximo</span>
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="conteudo">
        <div class="titulo-container">
            <h2 class="titulo-conteudo">Pagina Inicial</h2>
        </div>
        <div class="teste">
            <div class="resultado-container">
                <div class="resultado-pesquisa-container">
                    <div class="resultado-pesquisa-data-container">
                        <h2 style="text-align: center;">Notícias recentes</h2>
                        <?php while ($dados = $noticia->fetchArray(SQLITE3_ASSOC)) : ?>
                            <article class="conteudo-lista__item clearfix">
                                <header>
                                    <figure class="pull-left hidden-xs">
                                        <a href="./Noticia.php?noticia=<?php echo $dados["id"]; ?>">
                                            <img class="resultado-pesquisa-img" src="<?php echo $dados["localizado"]; ?>">
                                        </a>
                                    </figure>
                                    <time class="conteudo-lista__item__datahora" datetime="">
                                        <?php echo $dados["hora"]; ?>
                                    </time>
                                    <h2 class="conteudo-lista__item__titulo">
                                        <a href="./Noticia.php?noticia=<?php echo $dados["id"]; ?>" title="Leia na íntegra."><?php echo $dados["titulo"]; ?></a>
                                    </h2>
                                </header>
                                <p class="hidden-xs">
                                    Descrição: <?php echo $dados["descricao"]; ?>
                                </p>

                            </article>
                        <?php endwhile;
                        $db->close(); ?>
                        <div class="ver-mais-button"><a href="./VermaisNoticias.php"><button class="btn btn-primary">Ver Mais Noticias</button></a></div>
                    </div>
                </div>
            </div>
            <div class="mini-menu">
                <ul class="form">
                    <li><a class="profile" href="#"><i class="icon-user"></i>Sympla</a></li>
                    <li><a class="messages" href="#"><i class="icon-envelope-alt"></i>TESTE</a></li>
                    <li><a class="settings" href="#"><i class="icon-cog"></i>TESTE</a></li>
                    <li><a class="settings" href="#"><i class="icon-cog"></i>TESTE</a></li>

                    <li><a class="logout" href="#"><i class="icon-signout"></i>Contate-nos</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>