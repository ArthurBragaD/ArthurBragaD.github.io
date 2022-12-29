<?php
if (isset($_POST["enviarconta"])) {
    if (!empty($_POST['nome']) and !empty($_POST['email']) and !empty($_POST['senha']) and !empty($_POST['username']) and !empty($_POST['cpf'])) {
        $nome = $_POST["nome"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        // banco de dados
        $db = new SQLite3('../db/userData.db');
        $busca = implode($db->querySingle('SELECT * FROM Funcionarios WHERE user = "' . $username . '" OR email = "' . $email . '" OR nomeReal = "' . $nome . '" OR cpf = "' . $cpf . '";', true));
        if (str_contains($busca, $username)) {
            echo "Esse nome de usuário já é utilizado por outra pessoa.";
            $nome = $_POST["nome"];
            $username = "";
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $cpf = $_POST["cpf"];
        } elseif (str_contains($busca, $nome) || str_contains($busca, $cpf)) {
            echo "Essa pessoa já tem uma conta cadastrada.";
            $nome = "";
            $username = $_POST["username"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $cpf = "";
        } elseif (str_contains($busca, $email)) {
            echo "Esse email já é utilizado por outra pessoa.";
            $nome = $_POST["nome"];
            $username = $_POST["username"];
            $email = "";
            $senha = $_POST["senha"];
            $cpf = $_POST["cpf"];
        } else {
            $sql = "INSERT INTO Funcionarios (nomeReal,user,email,senha,cpf) VALUES ('$nome','$username','$email','$senha','$cpf');";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $db->close();
            echo "Conta catalogada";
            $nome = "";
            $username = "";
            $email = "";
            $senha = "";
            $cpf = "";
        };
};
};
?>