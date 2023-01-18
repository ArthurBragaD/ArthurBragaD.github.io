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
    // Deletar noticia 
    if ($_GET["fazer"] === "excluir") {
        $id = $_GET["id"];
        $db = new SQLite3('../db/userData.db');
        $db->exec('PRAGMA foreign_keys = ON');
        $sql = "DELETE FROM Edital WHERE idEdital =" . $id;
        $db->exec($sql);
        $db->close();
        header('Location: MudaEdital.php');
    };
    if (isset($_POST["atualizar"])) {
        if (!empty($_POST["edital"])) {
            $db = new SQLite3('../db/userData.db');
            $id =  $_POST["id"];
            $edital = $_POST["edital"];
            $descricao = $_POST["descricao"];
            $sql = "UPDATE Edital SET edital='" . $edital . "', descricao='" . $descricao . "' WHERE idEdital=" . $id;
            $db->exec($sql);
            header('Location: MudaEdital.php');
            echo "Edital Modificado";
        } else {
            echo "Edital não pode estar vazio";
        };
    }
    if ($_GET["fazer"] === "modificar") {
        $id = $_GET["id"];
        $db = new SQLite3('../db/userData.db');
        $sql = "SELECT * FROM Edital WHERE idEdital =" . $id;
        $alterar = $db->query($sql);
        $dados = $alterar->fetchArray(SQLITE3_ASSOC);
    };
    ?>
    <div>
        <form action="./MudaEdital.php">
            <button type="submit" class="btn btn-primary voltarbutton">Voltar</button>
        </form>
    </div>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Modificar Edital</h2>
    </div>
    <div class="artigo_texto">
        <form action="" enctype="multipart/form-data" method="POST" class="form-container">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <ul>
                <li>
                    <label for="edital">Edital</label>
                    <textarea onkeyup="ajusta_texto(this)" name="edital" value="<?php echo $dados["edital"]; ?>"><?php echo $dados["edital"]; ?></textarea>
                    <span>Coloque o nome do Edital</span>
                </li>
                <li>
                    <label for="descricao">Última Atualização</label>
                    <textarea onkeyup="ajusta_texto(this)" name="descricao" value="<?php echo $dados["descricao"]; ?>"><?php echo $dados["descricao"]; ?></textarea>
                    <span>Descreva qual foi a última atualização do edital</span>
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