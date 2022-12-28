<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipo do Css Site Prefeitura | Informações</title>
    <!-- <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/js/bootstrap.min.css" media="screen"> -->
    <link rel="stylesheet" href="/css/Reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/Hotbar.css">
    <link rel="stylesheet" href="/css/Informacoes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <?php include "./Header.php"; ?>
    <div class="conteudo">
        <div class="titulo-container">
            <h2 class="titulo-conteudo">Informações dos Servidores</h2>
        </div>
        <div class="informacoes-container">
            <section class="informacoes-table" role="tablist">
                <div class="informacoes-table-container">
                    <div class="painel-heading">
                        <h4 class="painel-title">
                            <a data-toggle="collapse" href="#INFORMAÇÕES  DE CONTATO ESTRUTURA" role="tab" class="collapsed">
                                ESTRUTURA
                            </a>
                        </h4>
                    </div>
                    <div id="INFORMAÇÕES  DE CONTATO ESTRUTURA" class="collapse" role="tabpanel" style="height: 0px;">
                        <div class="painel-body">
                            <div class="artigo_texto">
                                <div>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Fábio Branco -
                                            </span></strong>Prefeito do Rio Grande</p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Luis Henrique
                                            </span></strong>Secretário de Cultura, Esporte e Lazer </p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">David Pereira -
                                            </span></strong>Secretário Adjunto de Cultura, Esporte e Lazer</p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Roberto Tadiello -
                                            </span></strong>Superintende do Esporte </p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">-
                                            </span></strong>Superintendente da Cultura </p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Cintia Campos -
                                            </span></strong> Diretora Criativa </p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Cássio Pinheiro -
                                            </span></strong> Técnico em Artes Visuais </p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Luciana Gepiak -
                                            </span></strong>Livro, leitura e literatura</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="informacoes-table-container">
                    <div class="painel-heading">
                        <h4 class="painel-title">
                            <a data-toggle="collapse" href="#INFORMAÇÕES  DE CONTATO Administrativo" role="tab" class="collapsed">
                                ADMINISTRATIVO
                            </a>
                        </h4>
                    </div>
                    <div id="INFORMAÇÕES  DE CONTATO Administrativo" class="collapse" role="tabpanel" style="height: 0px;">
                        <div class="painel-body">
                            <div class="artigo_texto">
                                <div>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Ana -
                                            </span></strong>Superitendente Administrativa</p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Fran -
                                            </span></strong>Chefe de administração</p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Lidia -
                                            </span></strong>Chefe de núcleo financeiro</p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Marta -
                                            </span></strong> </p>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">o menino? -
                                            </span></strong> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="contate-button"><button class="btn btn-primary">Contate-nos</button></div>
    </div>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>