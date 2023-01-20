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
    <?php
    $db = new SQLite3('../db/userData.db');
    $sql = "SELECT * FROM Edital ORDER BY idEdital DESC";
    $editais = $db->query($sql);
    ?>
    <div class="conteudo">
        <div class="titulo-container">
            <h2 class="titulo-conteudo">Editais</h2>
        </div>
        <div class="editais-container">
            <div class="editais-conteudo">
                <?php
                while ($dados = $editais->fetchArray(SQLITE3_ASSOC)) :
                    $sql = "SELECT * FROM EditalArquivos WHERE editalRelacionado = '" . $dados["idEdital"] . "' ORDER BY idArquivo DESC";
                    $editaisArquivos = $db->query($sql);
                ?>
                    <div class="edital-table-container">
                        <h4 class="painel-title">
                            <a data-toggle="collapse" href="#<?php echo $dados["edital"]; ?>" role="tab" class="collapsed">
                                <?php echo $dados["edital"]; ?>
                            </a>
                        </h4>
                        <div id="<?php echo $dados["edital"]; ?>" class="collapse show" role="tabpanel">
                            <p style="color: red;   text-decoration: underline; text-decoration-color: red; width: 97.5%; margin-left:2.5%; height:fit-content"><?php echo $dados["descricao"]; ?></p>
                        </div>
                        <div id="<?php echo $dados["edital"]; ?>" class="collapse" role="tabpanel" style="height: 0px;">
                            <div class="painel-body">
                                <div class="artigo_texto">

                                    <p style="word-spacing:0px; text-decoration:underline;"><strong>Arquivos para download</strong></p>
                                    <?php while ($dadosArquivos = $editaisArquivos->fetchArray(SQLITE3_ASSOC)) : ?>
                                        <?php if ($dadosArquivos["tipo"] === "baixar") : ?>
                                            <li>
                                                <a href="<?php echo $dadosArquivos["localizado"]; ?>" download><span class="bi-download"> </span><?php echo $dadosArquivos["hora"]; ?> <?php echo $dadosArquivos["nome"]; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                    <p style="word-spacing:0px; text-decoration:underline;"><strong>Andamento</strong></p>
                                    <?php
                                    while ($dadosArquivos = $editaisArquivos->fetchArray(SQLITE3_ASSOC)) :
                                    ?>
                                        <?php
                                        if ($dadosArquivos["tipo"] === "andamento") :
                                        ?>
                                            <li style="text-align: justify;">
                                                <a href="<?php echo $dadosArquivos["localizado"]; ?>"><span class="bi-clock-history"> </span> <?php echo $dadosArquivos["hora"]; ?> <?php echo $dadosArquivos["nome"]; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>