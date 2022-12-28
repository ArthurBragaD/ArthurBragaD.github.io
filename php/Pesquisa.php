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
    <link rel="stylesheet" href="/css/Pesquisa.css">
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
    $pesquisa = $_GET["pesquisa"];
    $db = new SQLite3('../db/userData.db');
    $data = $_GET["data"];
    if ($data === "especifica") {
        $hora = date('Y-m-d', strtotime($_GET['hora']));
        $data = "hora = '" . $hora. "' AND";
    }else{
        $data= "";
    };
    // echo $data;
    $pag = 0;
    if (isset($_GET["pag"])) {
        $pag = $_GET["pag"];
    };
    $filtro = "DESC";
    if (isset($_GET["filtro"])) {
        $filtro = $_GET["filtro"];
    };
    $sql1 = "SELECT DISTINCT * FROM Noticias WHERE (" . $data . " titulo LIKE '%" . $pesquisa . "%') OR (" . $data . " descricao LIKE '%" . $pesquisa . "%') ORDER BY id " . $filtro . " LIMIT 10 OFFSET " . $pag;
    echo $sql1;
    // $sql2 = "SELECT count(DISTINCT *) FROM Noticias WHERE titulo LIKE %" . $pesquisa . "% OR descricao LIKE %" . $pesquisa . "%";
    $noticia = $db->query($sql1);
    ?>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Resultado da busca</h2>
    </div>
    <div class="resultado-container">
        <div class="resultado-secoes-container">
            <div>
                <h4 class="secoes-title"> Nas Seções:
                </h4>
            </div>
            <div class="secoes-dados"><a href="" class="secoes-dados-style">Dados (0)</a></div>
            <div class="secoes-dados"><a href="" class="secoes-dados-style">Dados (0)</a></div>
            <div class="secoes-dados"><a href="" class="secoes-dados-style">Dados (0)</a></div>
        </div>
        <div class="resultado-pesquisa-container">
            <div class="filtro-container">
                <div class="filtro-data">
                    <p>A busca pelo termo "<?php echo $pesquisa; ?>" encontrou <?php echo $resultados; ?> resultados.<br> Exibindo 1 - 10 de <?php echo $resultados; ?></p>
                </div>
                <div class="filtro-controle">
                    <form action="" method="GET">
                        <input type="hidden" name="pesquisa" value="<?php echo $pesquisa; ?>">
                        <input type="hidden" name="pag" value="<?php echo $pag; ?>">
                        <select class="filtro-style" name="filtro">
                            <option value="DESC">Mais Recentes</option>
                            <option value="ASC">Mais Antigas</option>
                        </select>
                        <select class="filtro-style" name="data" onchange="showDiv(this)">
                            <option value="qualquer">Em qualquer data</option>
                            <option value="especifica">Data específica</option>
                        </select>
                        <button type="submit" class="filtro-style" name="submit" value="submit">Filtrar</button>
                        <input id="hidden_div" class="filtro-style" style="display:none;" type="date" name="hora" value="<?php echo date('Y-m-d'); ?>" />
                    </form>
                </div>
            </div>
            <div class="resultado-pesquisa-data-container">
                <?php while ($dados = $noticia->fetchArray(SQLITE3_ASSOC)) : ?>
                    <article class="conteudo-lista__item clearfix">
                        <header>
                            <figure class="pull-left hidden-xs">
                                <a href="./Noticia.php?noticia=<?php echo $dados["id"]; ?>">
                                    <img class="resultado-pesquisa-img" src="/Imagens/Design sem nome (1).png">
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
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>