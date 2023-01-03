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
    <link rel="stylesheet" href="/css/ModificaVar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <script type="text/javascript">
        function ajusta_texto(h) {
            h.style.height = "20px";
            h.style.height = (h.scrollHeight) + "px";
        }
    </script>
    <?php include "./Header.php"; ?>
    <?php
    session_start();
    if (!isset($_SESSION["currentUserName"])) header('Location: Login.php');
    // echo $_SESSION["loggedIn"] . "<br>" . $_SESSION["startTime"] . "<br>" . $_SESSION["currentUserName"];
    ?>
    <?php
    // Deletar noticia 
    $busca = $_GET["busca"];
    if ($_GET["fazer"] === "excluir") {
        $id = $_GET["id"];
        $db = new SQLite3('../db/userData.db');
        $sql = "DELETE FROM Noticias WHERE id =" . $id;
        $db->exec($sql);
        $db->close();
        header('Location: MudaNoticia.php?buscaNoticia=' . $busca . '&enviarnoticia=');
    };
    if (isset($_POST["atualizar"])) {
        if (!empty($_POST['titulo']) and !empty($_POST['descricao']) and !empty($_POST['autor'])) {
            $db = new SQLite3('../db/userData.db');
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $sympla = $_POST['sympla'];
            $autor = $_POST['autor'];
            $secoes = $_POST['secoes'];
            $id =  $_POST["id"];
            if ($_FILES["imagem"]["size"] != 0) {
                $file_name = $_FILES['imagem']['name'];
                $file_temp = $_FILES['imagem']['tmp_name'];
                $exp = explode(".", $file_name);
                $ext = end($exp);
                $imagem = time() . "." . $ext;
                $ext_allowed = array("png", "jpeg", "jpg");
                $localizado = "../upload/" . $imagem;
                if (in_array($ext, $ext_allowed)) {
                    if (move_uploaded_file($file_temp, $localizado)) {
                        echo "entrei";
                        $sql = "UPDATE Noticias SET titulo = '" . $titulo . "', descricao = '" . $descricao . "', sympla='" . $sympla . "', autor = '" . $autor . "', secoes = '" . $secoes . "', imagem = '" . $imagem . "', localizado = '" . $localizado . "' WHERE id=" . $id;
                        echo  $sql;
                        $db->exec($sql);
                        header('Location: MudaNoticia.php?buscaNoticia=' . $busca . '&enviarnoticia=');
                    };
                } else {
                    $dados["titulo"] = $_POST['titulo'];
                    $dados["descricao"] = $_POST['descricao'];
                    $dados["sympla"] = $_POST['sympla'];
                    $dados["autor"] = $_POST['autor'];
                    $dados["secoes"] = $_POST['secoes'];
                    unset($_FILES["imagem"]);
                    echo "Formato de arquivo de imagem inválido";
                };
            } else {
                $sql = "UPDATE Noticias SET titulo = '" . $titulo . "', descricao = '" . $descricao . "', sympla='" . $sympla . "', autor = '" . $autor . "', secoes = '" . $secoes . "' WHERE id=" . $id;
                echo $sql;
                $db->exec($sql);
                //   $db->close();
                header('Location: MudaNoticia.php?buscaNoticia=' . $busca . '&enviarnoticia=');
            }
        } else {
            echo "Título, Descrição e Autor não podem estar vazio";
            $dados["titulo"] = $_POST['titulo'];
            $dados["descricao"] = $_POST['descricao'];
            $dados["sympla"] = $_POST['sympla'];
            $dados["autor"] = $_POST['autor'];
            $dados["secoes"] = $_POST['secoes'];
            unset($_FILES["imagem"]);
        };
    } else {
        if ($_GET["fazer"] === "modificar") {
            $id = $_GET["id"];
            $db = new SQLite3('../db/userData.db');
            $sql = "SELECT * FROM Noticias WHERE id =" . $id;
            $alterar = $db->query($sql);
            $dados = $alterar->fetchArray(SQLITE3_ASSOC);
        };
    };
    ?>
    <div>
        <form action="./MudaNoticia.php">
            <input type="hidden" name="buscaNoticia" value="<?php echo $busca ?>">
            <input type="hidden" name="enviarnoticia" value="">
            <button type="submit" class="btn btn-primary voltarbutton">Voltar</button>
        </form>
    </div>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Modificar Noticias</h2>
    </div>
    <div class="artigo_texto">
        <form action="" enctype="multipart/form-data" method="POST" class="form-container">
            <input type="hidden" name="busca" value="<?php echo $busca; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <ul>
                <li>
                    <label for="titulo">Título</label>
                    <textarea onkeyup="ajusta_texto(this)" name="titulo" value="<?php echo $dados["titulo"]; ?>"><?php echo $dados["titulo"]; ?></textarea>
                    <span>Coloque o Título da noticia</span>
                </li>
                <li>
                    <label for="descricao">Descrição</label>
                    <textarea onkeyup="ajusta_texto(this)" name="descricao" value="<?php echo $dados["descricao"]; ?>"><?php echo $dados["descricao"]; ?></textarea>
                    <span>Coloque a descrição da noticia</span>
                </li>
                <li>
                    <label for="sympla">Sympla</label>
                    <textarea onkeyup="ajusta_texto(this)" name="sympla" value="<?php echo $dados["sympla"]; ?>"><?php echo $dados["sympla"]; ?></textarea>
                    <span>Coloque o link do Sympla como (Ex: https://www.sympla.com.br)</span>
                </li>
                <li>
                    <label for="autor">Autor</label>
                    <textarea onkeyup="ajusta_texto(this)" name="autor" value="<?php echo $dados['autor']; ?>"><?php echo $dados['autor']; ?></textarea>
                    <span>Coloque o nome do Autor</span>
                </li>
                <li>
                    <label for="imagem">Imagem</label>
                    <input type="file" name="imagem" value="<?php echo $imagem; ?>">
                    <span>Escolha o arquivo de imagem apenas permitidos (png, jpeg, jpg)</span>
                </li>
                <li>
                    <label for="secoes">Seções</label>
                    <textarea onkeyup="ajusta_texto(this)" name="secoes" value="<?php echo $dados["secoes"]; ?>"><?php echo $dados["secoes"]; ?></textarea>
                    <span>Coloque as seções</span>
                </li>
                <li>
                    <button type="submit" class="btn btn-primary" name="atualizar">Alterar</button>
                </li>
            </ul>
        </form>
    </div>
    <button type="submit" class="btn btn-primary Logout-button"><a href="Logout.php" style="text-decoration: none; color: white;">Logout</a></button>
</body>

</html>