<?php
 if (!empty($_POST) AND (empty($_POST['userORemail']) OR empty($_POST['senha']))) {
      header("Location: Login.php"); exit;
  }
if (!empty($_POST)) {
$funcionario_user_email = trim($_POST["userORemail"]);
$password = trim($_POST["senha"]);
$db = new SQLite3('../db/userData.db');
$funcionario_resultado = $db->query('SELECT * FROM Funcionarios WHERE (user = "' . $funcionario_user_email . '" OR email = "' . $funcionario_user_email . '") AND password = "' . $password . '";');
$row = $funcionario_resultado->fetchArray(SQLITE3_ASSOC);
 if (is_array($row) && sizeof($row) > 0) {
        if (!isset($_POST["remember"])) {
            $_SESSION["lifeTime"] = 3600;
        }
        session_start();
        $_SESSION["loggedIn"] = 'loggedIn';
        $_SESSION["startTime"] = time();
        $_SESSION["currentUserName"] = $row["user"];
        echo $_SESSION["loggedIn"]."<br>". $_SESSION["startTime"]."<br>". $_SESSION["currentUserName"] = $row["user"];
            // header('Location: ./Master.php');
    }
    unset($row);
    $db->close();
    if (!isset($_SESSION["loggedIn"])) {
        echo '<p><b>Usuário/Email e/ou Senha incorretos.</b></p>';
    }
}
?>