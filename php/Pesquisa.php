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
</head>

<body>
    <?php include "./Header.php"; ?>
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
                    <p>A busca pelo termo "X" encontrou Y resultados.<br> Exibindo 1 - 10 de Z</p>
                </div>
                <div class="filtro-controle">
                    <select class="filtro-style">
                        <option value="aecentes" selected>Mais Recentes</option>
                        <option value="antigas">Mais Antigas</option>
                        <option value="alfabética">Alfabética</option>
                    </select>
                    <select class="filtro-style">
                        <option value="qualquer" selected>Em qualquer data</option>
                        <option value="específica">Data específica</option>
                    </select>
                    <button class="filtro-style">Filtrar</button>
                </div>
            </div>
            <div class="resultado-pesquisa-data-container">
                <article class="conteudo-lista__item clearfix">
                    <header>
                        <figure class="pull-left hidden-xs">
                            <a href="" target="_self">
                                <img class="resultado-pesquisa-img" src="/Imagens/Design sem nome (1).png">
                            </a>
                        </figure>


                        <time class="conteudo-lista__item__datahora" datetime="">
                            00/00/0000
                            -
                            00h00min
                        </time>
                        <h2 class="conteudo-lista__item__titulo">
                            <a href="" target="_self" title="Leia na íntegra.">Teste de pesquisa</a>
                        </h2>
                    </header>
                    <p class="hidden-xs">
                        Data:&nbsp; Teste Horário:&nbsp; Teste Local:&nbsp; Teste &nbsp; Descrição: Teste
                    </p>

                </article>
                <article class="conteudo-lista__item clearfix">
                    <header>
                        <figure class="pull-left hidden-xs">
                            <a href="" target="_self">
                                <img class="resultado-pesquisa-img" src="/Imagens/Design sem nome (1).png">
                            </a>
                        </figure>


                        <time class="conteudo-lista__item__datahora" datetime="">
                            00/00/0000
                            -
                            00h00min
                        </time>
                        <h2 class="conteudo-lista__item__titulo">
                            <a href="" target="_self" title="Leia na íntegra.">Teste de pesquisa</a>
                        </h2>
                    </header>
                    <p class="hidden-xs">
                        Data:&nbsp; Teste Horário:&nbsp; Teste Local:&nbsp; Teste &nbsp; Descrição: Teste
                    </p>

                </article>
            </div>
        </div>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>