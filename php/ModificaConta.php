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
    // Deletar Conta
    $busca = $_GET["busca"];
    if ($_GET["fazer"] === "excluir") {
        $cpf = $_GET["cpf"];
        $db = new SQLite3('../db/userData.db');
        $sql = "DELETE FROM Funcionarios WHERE cpf =" . $cpf;
        $db->exec($sql);
        $db->close();
        header('Location: MudaConta.php?buscaConta=' . $busca . '&enviarConta=');
    };
    // Modificar Conta
    if (isset($_POST["atualizar"])) {
        if (!empty($_POST['user']) and !empty($_POST['email']) and !empty($_POST['nomeReal']) and !empty($_POST['senha'])) {
            $user = $_POST['user'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $nomeReal = $_POST['nomeReal'];
            $senha = $_POST['senha'];
            $db = new SQLite3('../db/userData.db');
            $sql1 = 'SELECT * FROM Funcionarios WHERE (user = "' . $user . '" AND cpf != "' . $cpf . '") OR (email = "' . $email . '" AND cpf != "' . $cpf . '")  OR ( nomeReal = "' . $nomeReal . '" AND cpf != "' . $cpf . '");';
            $busca = implode($db->querySingle($sql1, true));
            if (str_contains($busca, $user)) {
                echo "Esse nome de usuário já é utilizado por outra pessoa.";
                $dados["user"] = "";
                $dados["email"] = $_POST['email'];
                $dados["nomeReal"] = $_POST['nomeReal'];
                $dados["senha"] = $_POST['senha'];
            } elseif (str_contains($busca, $nomeReal)) {
                echo "Essa pessoa já tem uma conta cadastrada.";
                $dados["user"] = $_POST['user'];
                $dados["email"] = $_POST['email'];
                $dados["nomeReal"] = "";
                $dados["senha"] = $_POST['senha'];
            } elseif (str_contains($busca, $email)) {
                echo "Esse email já é utilizado por outra pessoa.";
                $dados["user"] = $_POST['user'];
                $dados["email"] = "";
                $dados["nomeReal"] = $_POST['nomeReal'];
                $dados["senha"] = $_POST['senha'];
            } else {
                $sql = "UPDATE Funcionarios SET user = '" . $user . "', email = '" . $email . "', nomeReal = '" . $nomeReal . "', senha = '" . $senha . "' WHERE cpf=" . $cpf;
                $db->exec($sql);
                $db->close();
                header('Location: MudaConta.php?buscaConta=' . $busca . '&enviarConta=');
            };
        } else {
            echo "Título, Descrição e nomeReal não podem estar vazio";
            $dados["user"] = $_POST['user'];
            $dados["email"] = $_POST['email'];
            $dados["nomeReal"] = $_POST['nomeReal'];
            $dados["senha"] = $_POST['senha'];
            $dados["cpf"] = $_POST['cpf'];
        };
    } else {
        if ($_GET["fazer"] === "modificar") {
            $cpf = $_GET["cpf"];
            $db = new SQLite3('../db/userData.db');
            $sql = "SELECT * FROM Funcionarios WHERE cpf =" . $cpf;
            $alterar = $db->query($sql);
            $dados = $alterar->fetchArray(SQLITE3_ASSOC);
        };
    };
    ?>
    <div>
        <form action="./MudaConta.php">
            <input type="hidden" name="buscaConta" value="<?php echo $busca ?>">
            <input type="hidden" name="enviarConta" value="">
            <button type="submit" class="btn btn-primary voltarbutton">Voltar</button>
        </form>
    </div>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Modificar Conta</h2>
    </div>
    <div class="artigo_texto">
        <form action="" method="POST" class="form-container">
            <input type="hidden" name="busca" value="<?php echo $busca; ?>">
            <input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
            <ul>
                <li>
                    <label for="user">Username</label>
                    <textarea onkeyup="ajusta_texto(this)" name="user" value="<?php echo $dados["user"]; ?>"><?php echo $dados["user"]; ?></textarea>
                    <span>Coloque o Username</span>
                </li>
                <li>
                    <label for="email">Email</label>
                    <textarea onkeyup="ajusta_texto(this)" name="email" value="<?php echo $dados["email"]; ?>"><?php echo $dados["email"]; ?></textarea>
                    <span>Coloque o seu Email</span>
                </li>
                <li>
                    <label for="nomeReal">Nome Real</label>
                    <textarea onkeyup="ajusta_texto(this)" name="nomeReal" value="<?php echo $dados["nomeReal"]; ?>"><?php echo $dados["nomeReal"]; ?></textarea>
                    <span>Coloque o seu Nome Real</span>
                </li>
                <li>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" value="<?php echo $dados["senha"]; ?>">
                    <span>Coloque a Senha</span>
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