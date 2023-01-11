<?php
    if (isset($_POST["enviaredital"])) {
        if (!empty($_POST['edital'])) {
            $db = new SQLite3('../db/userData.db');
            $edital = $_POST["edital"];
            $sql = "INSERT INTO Edital (edital) VALUES ('$edital')";
            $db->exec($sql);
            echo "Edital criado";
            $edital= "";
        } else {
        echo "Edital está vazio";
        }
    };
?>