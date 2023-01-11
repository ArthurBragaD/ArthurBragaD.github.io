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
    <?php include "./Rememberme.php"; ?>
    <?php
    $id =  strval($_GET["id"]);
    if (isset($_POST["adicionar"])) {
        if (!empty($_POST["nome"]) && !empty($_POST["hora"]) && !empty($_POST["tipo"]) && $_FILES["arquivo"]["size"] != 0) {
            $db = new SQLite3('../db/userData.db');
            $id =  $_POST["id"];
            $nome = $_POST["nome"];
            $hora = $_POST["hora"];
            $tipo = $_POST["tipo"];
            $file_name = $_FILES['arquivo']['name'];
            $file_temp = $_FILES['arquivo']['tmp_name'];
            $exp = explode(".", $file_name);
            $ext = end($exp);
            $exp[0] = str_replace(' ', '', $exp[0]);
            $arquivo = time(). $exp[0]. "." . $ext;
            $ext_allowed = array("pdf", "docx");
            $localizado = "../upload/" . $arquivo;
            if (in_array($ext, $ext_allowed)) {
                if (move_uploaded_file($file_temp, $localizado)) {
                    $sql = "INSERT INTO EditalArquivos (nome,hora,tipo,arquivo,localizado,editalRelacionado) VALUES ('$nome','$hora','$tipo','$arquivo','$localizado','$id');";
                    $db->exec($sql);
                    echo "Arquivo do edital catalogado";
                    $nome = "";
                    $hora = "";
                    $tipo = "";
                    unset($_FILES["arquivo"]);
                }
            } else {
                echo "Formato de arquivo de imagem inválido";
                $nome = $_POST["nome"];
                $hora = $_POST["hora"];
                $id =  $_POST["id"];
            }
            // $sql = "UPDATE Edital SET edital='" . $edital . "' WHERE idEdital=" . $id;
            // $db->exec($sql);
            // header('Location: MudaEdital.php');
            // echo "Edital Modificado";
        } else {
            echo "Todos os campos precisam estar preenchidos";
            $nome = $_POST["nome"];
            $hora = $_POST["hora"];
            $id =  $_POST["id"];
            $arquivo = $_FILE["arquivo"];
        };
    }
    ?>
    <div>
        <form action="./MudaEdital.php">
            <button type="submit" class="btn btn-primary voltarbutton">Voltar</button>
        </form>
    </div>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Adicionar Arquivo em Edital</h2>
    </div>
    <div class="artigo_texto">
        <form action="" enctype="multipart/form-data" method="POST" class="form-container">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <ul>
                <li style="width: 50%;margin-left: 25%;margin-right:25%">
                    <label for="nome">Nome</label>
                    <textarea onkeyup="ajusta_texto(this)" name="nome" value="<?php echo $nome; ?>"><?php echo $nome; ?></textarea>
                    <span>Coloque o nome do arquivo Edital</span>
                </li>
                <li style="width: 50%;margin-left: 25%;margin-right:25%">
                    <label for="hora">Data</label>
                    <textarea onkeyup="ajusta_texto(this)" name="hora" value="<?php echo $hora; ?>"><?php echo $hora; ?></textarea>
                    <span>Coloque o data da disponibilização desse Arquivo</span>
                </li>
                <li style="width: 50%;margin-left: 25%;margin-right:25%">
                    <label for="arquivo">Edital Arquivo</label>
                    <input type="file" name="arquivo">
                    <span>Escolha o arquivo de imagem apenas permitidos (PDF e DOCX)</span>
                </li>
                <li style="width: 50%;margin-left: 25%;margin-right:25%">
                    <label for="tipo">Tipo</label>
                    <select name="tipo">
                        <option value=""></option>
                        <option value="baixar">Arquivos para download</option>
                        <option value="andamento">Andamento</option>
                    </select>
                    <span>Selecione a categoria do Arquivo</span>
                </li>
                <li>
                    <button type="submit" class="btn btn-primary" name="adicionar">Adicionar</button>
                </li>
            </ul>
        </form>
    </div>
    <button type="submit" class="btn btn-primary Logout-button"><a href="Logout.php" style="text-decoration: none; color: white;">Logout</a></button>
</body>

</html>