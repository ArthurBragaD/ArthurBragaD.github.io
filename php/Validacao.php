<?php
session_start();

if (isset($_SESSION["currentUserName"])) {
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
        if (!isset($_POST["lembrar"])) {
            $_SESSION["lifeTime"] = 3600;
        }
        session_start();
        $_SESSION["loggedIn"] = 'loggedIn';
        $_SESSION["startTime"] = time();
        $_SESSION["currentUserName"] = $row["user"];
        header('Location: Master.php');
    }
    unset($row);
    $db->close();
    if (!isset($_SESSION["loggedIn"])) {
        echo '<p><b>Usuário/Email e/ou Senha incorretos.</b></p>';
    }
}
?>