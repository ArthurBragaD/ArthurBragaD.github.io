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
    <link rel="stylesheet" href="/css/Noticia.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include "./Header.php"; ?>
    <?php
    $db = new SQLite3('../db/userData.db');
    $id = $_GET["noticia"];
    $sql = "SELECT * FROM Noticias WHERE id = " . $id;
    $noticia = $db->query($sql);
    $dados = $noticia->fetchArray(SQLITE3_ASSOC);
    // var_dump($noticia->fetchArray(SQLITE3_ASSOC));
    ?>
    <div class="noticia-container">
        <section class="noticia-table">
            <div class="painel-body">
                <h2 class="noticia-titulo"><?php echo $dados["titulo"]; ?></h2>
                <img src="" class="imagem-noticia">
                <div class="artigo_texto">
                    <div>
                        <p style="margin-top:0cm;">

                            <?php echo $dados["descricao"]; ?>
                        </p>
                        <p style="word-spacing:0px;"><strong>Informações:
                            </strong></p>
                        <p style="word-spacing:0px;"><strong>Sympla:
                            </strong><?php echo $dados["sympla"]; ?></p>
                        <p style="word-spacing:0px;"><strong>Data de publicação:
                            </strong><?php echo $dados["hora"]; ?></p>
                        <p style="word-spacing:0px;"><strong>Escrito por:
                            </strong><?php echo $dados["autor"]; ?></p>
                    </div>
                </div>
                <div class="ver-mais-button"><button class="btn btn-primary">Ver Mais Noticias</button></div>
            </div>
    </div>
    </section>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>