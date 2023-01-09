<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipo do Css Site Prefeitura | Editais</title>
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
    <link rel="stylesheet" href="/css/Editais.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include "./Header.php"; ?>
    <div class="conteudo">
        <div class="titulo-container">
            <h2 class="titulo-conteudo">Editais</h2>
        </div>
        <div class="editais-container">
            <section class="editais-table" role="tablist">
                <div class="editais-table-container">
                    <div class="painel-heading">
                        <h4 class="painel-title">
                            <a data-toggle="collapse" href="#INFORMAÇÕES DE CONTATO ESTRUTURA" role="tab" class="collapsed">
                                Lei Aldir Blanc
                            </a>
                        </h4>
                    </div>
                    <div id="INFORMAÇÕES DE CONTATO ESTRUTURA" class="collapse" role="tabpanel" style="height: 0px;">
                        <div class="painel-body">
                            <div class="artigo_texto">
                                <div>
                                    <p style="word-spacing:0px;"><strong><span style="font-family:Cambria, serif;color:#000000;">Informações e dúvidas no e-mail:
                                            </span></strong>aldirblancrg@gmail.com</p>
                                    <p style="word-spacing:0px;"><span style="font-family:Cambria, serif;color:#000000;">
                                            <p style="word-spacing:0px;"><span style="font-family:Cambria, serif;color:#000000;"><strong>Acompanhe aqui as atualizações e acesse os editais:
                                                </span></strong>
                                            </p>
                                            <div class="painel-heading">
                                                <h4 class="painel-title">
                                                    <a data-toggle="collapse" href="#CHAMADA PÚBLICA Nº01/2020" role="tab" class="collapsed">
                                                        CHAMADA PÚBLICA Nº01/2020
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="CHAMADA PÚBLICA Nº01/2020" class="collapse" role="tabpanel" style="height: 0px;">
                                                <div class="painel-body">
                                                    <div class="artigo_texto">
                                                        <p>TESTE</p>
                                                        <p>TESTE</p>
                                                        <p>TESTE</p>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>