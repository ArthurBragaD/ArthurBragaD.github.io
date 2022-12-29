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
    <link rel="stylesheet" href="/css/Login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include "./Header.php"; ?>
    <?php
session_start();
    
    if (isset($_SESSION["currentUserName"])){
     header('Location: Master.php');
     exit;
    }
    if (!empty($_POST) and (empty($_POST['userORemail']) or empty($_POST['senha']))) {
        header("Location: Login.php");
        exit;
    }
    if (!empty($_POST)) {
        // session_start();
        $funcionario_user_email = trim($_POST["userORemail"]);
        $password = trim($_POST["senha"]);
        $db = new SQLite3('../db/userData.db');
        $funcionario_resultado = $db->query('SELECT * FROM Funcionarios WHERE (user = "' . $funcionario_user_email . '" OR email = "' . $funcionario_user_email . '") AND senha = "' . $password . '";');
        $row = $funcionario_resultado->fetchArray(SQLITE3_ASSOC);
        if (is_array($row) && sizeof($row) > 0) {
            if (!isset($_POST["remember"])) {
                $_SESSION["lifeTime"] = 3600;
            }
            session_start();
            $_SESSION["loggedIn"] = 'loggedIn';
            $_SESSION["startTime"] = time();
            $_SESSION["currentUserName"] = $row["user"];
            header('Location: ./Master.php');
        }
        unset($row);
        $db->close();
        if (!isset($_SESSION["loggedIn"])) {
            echo '<p><b>Usuário/Email e/ou Senha incorretos.</b></p>';
        }
    }
    ?>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Login</h2>
    </div>
    <div class="login-container">
        <form class="form-conteudo" action="" method="POST">
            <label class="label-texto">Usuário / Email:</label><br>
            <input type="text" placeholder="Digite o usuário/email" name="userORemail" maxlength="30" required><br>

            <label class="label-texto">Senha:</label><br>
            <input type="password" placeholder="Senha" name="senha" maxlength="20" required><br>
            <input type="checkbox" name="lembrar"><b> Lembre-se de mim</b></input>
            <br>
            <button type="submit" class="btn btn-primary button-submit">Login</button>
        </form>
    </div>
    <?php include "./Footer.php"; ?>

</body>

</html>