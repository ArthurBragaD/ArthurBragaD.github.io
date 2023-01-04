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
    <link rel="stylesheet" href="/css/VermaisNoticias.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == "especifica") {
                document.getElementById('hidden_div').style.display = "block";
            } else {
                document.getElementById('hidden_div').style.display = "none";
            }
        }
    </script>
</head>

<body>
    <?php include "./Header.php"; ?>
    <?php
    //Contando o numero de noticias aparecendo
    $db = new SQLite3('../db/userData.db');
    $sql = "SELECT DISTINCT * FROM Noticias ORDER BY id DESC LIMIT 10";
    $conta = $db->query($sql);
    $num = 0;
    while ($rows = $conta->fetchArray(SQLITE3_ASSOC)) {
        ++$num;
    };
    if (isset($_POST["pag"])) {
        $pag = $_POST["pag"];
        if (isset($_POST["rpag"])) {
            $pag++;
        } else {
            $pag--;
            if ($pag < 0) {
                $pag = 0;
            };
        };
    } else {
        $pag = 0;
    };
    $limite = $pag * 10;
    if ($num < $limite) {
        $pag--;
        $limite = $pag * 10;
    }
    $sql1 = "SELECT DISTINCT * FROM Noticias ORDER BY id DESC LIMIT 10 OFFSET " . $limite;
    $noticia = $db->query($sql1);
    ?>
    <div class="conteudo">
        <div class="titulo-container">
            <h2 class="titulo-conteudo">Ver Mais Noticias</h2>
        </div>
        <div class="resultado-container">
            <div class="resultado-pesquisa-container">
                <div class="resultado-pesquisa-data-container">
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
                    <div class="filtro-controle">
                        <form action="" method="POST">
                            <input type="hidden" name="pag" value="<?php echo $pag;?>">
                            <button type="submit" class="filtro-style bi-arrow-left" name="apag" value="0"></button>
                            <label class="filtro-style">Página <?php echo $pag + 1; ?></label>
                            <button type="submit" class="filtro-style bi-arrow-right" name="rpag" value="1"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>