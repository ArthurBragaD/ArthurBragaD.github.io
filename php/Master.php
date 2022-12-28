<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipo do Css Site Prefeitura | Login</title>
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
    <link rel="stylesheet" href="/css/Master.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include "./Header.php"; ?>
    <?php
    session_start();
    if (!isset($_SESSION["currentUserName"])) header('Location: Login.php');
    // echo $_SESSION["loggedIn"] . "<br>" . $_SESSION["startTime"] . "<br>" . $_SESSION["currentUserName"];
    ?>
    <?php
    if (isset($_POST["enviar"])) {
        if (!empty($_POST['titulo']) and !empty($_POST['descricao'] and !empty($_POST['autor']) and !empty($_POST['sympla']))) {
            $titulo = $_POST["titulo"];
            $descricao = $_POST["descricao"];
            $autor = $_POST["autor"];
            $sympla = $_POST["sympla"];
            $secoes = $_POST["secoes"];
            $imagem = $_POST["imagem"];
            $db = new SQLite3('../db/userData.db');
            $sql = "INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes) VALUES ('$titulo','$descricao',CURRENT_DATE,'$autor ','$sympla','$secoes');";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            // $db->execute([
                //     ':$titulo' = $titulo,
                //     ':$descricao'= $descricao,
                //     ':$autor'= $autor,
                //     ':$sympla'= $sympla,
                //     ':$imagem'= $imagem,
                // ]);
                $db->close();
                echo "Noticia catalogada";
            $titulo = "";
            $descricao = "";
            $autor = "";
            $sympla = "";
            $secoes = "";
            // IMAGEM ARRUMAR DPS *ADICIONAR NO IF DE CHECAGEM DPS
            // $formatosPermitidos = array("png", "jpeg", "jpg");
            // $extensao = pathinfo($_FILES["imagem"]['name'], PATHINFO_EXTENSION);
            // echo $extensao;
            //     if(in_array($extensao, $formatosPermitidos)){
            //     //
            //     $mensagem = "Noticia Catalogada";
            //     echo $mensagem;
            // }else{
            //             $mensagem = "Formato da imagem incompativel";
            //     echo $mensagem;
            // }
        } else {
            $titulo = $_POST["titulo"];
            $descricao = $_POST["descricao"];
            $autor = $_POST["autor"];
            $sympla = $_POST["sympla"];
            $secoes = $_POST["secoes"];
        }
    };
    ?>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Master Page</h2>
    </div>

    <div class="master-container">
        <section class="master-table" role="tablist">
            <div>
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a data-toggle="collapse" href="#AdicionarNoticias" role="tab" class="collapsed">
                            ADICIONAR NOTICIAS
                        </a>
                    </h4>
                </div>
                <div id="AdicionarNoticias" class="collapse" role="tabpanel" style="height: 0px;">
                    <div class="painel-body">
                        <div class="artigo_texto">
                            <p style="margin-top:0cm;">
                                Descriçao de como funciona
                                <br>
                            </p>
                            <form action="" method="post">
                                Titulo:<input type="text" name="titulo" value="<?php echo $titulo; ?>"><br>
                                Descrição:<input type="text" name="descricao" value="<?php echo $descricao; ?>"><br>
                                Autor:<input type="text" name="autor" value="<?php echo $autor; ?>"><br>
                                Sympla:<input type="text" name="sympla" value="<?php echo $sympla; ?>"><br>
                                Seções:<input type="text" name="secoes" value="<?php echo $secoes; ?>"><br>
                                <!-- <input type="file" name="imagem"> -->
                                <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <button type="submit" class="btn btn-primary Logout-button"><a href="Logout.php" style="text-decoration: none; color: white;">Logout</a></button>
</body>

</html>