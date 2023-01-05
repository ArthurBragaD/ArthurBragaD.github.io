<?php
    if (isset($_POST["enviarcarrousel"])) {
        if ($_FILES["imagem"]["size"] != 0) {
            $db = new SQLite3('../db/userData.db');
            $titulo = $_POST["titulo"];
            $descricao = $_POST["descricao"];
            $link = $_POST["link"];
            $file_name = $_FILES['imagem']['name'];
            $file_temp = $_FILES['imagem']['tmp_name'];
            $exp = explode(".", $file_name);
            $ext = end($exp);
            $imagem = time() . "." . $ext;
            $ext_allowed = array("png", "jpeg", "jpg");
            $localizado = "../upload/" . $imagem;
                if (in_array($ext, $ext_allowed)) {
                    if (move_uploaded_file($file_temp, $localizado)) {
                        $sql = "INSERT INTO Carrousel (titulo,descricao,link,imagem,localizado) VALUES ('$titulo','$descricao','$link','$imagem','$localizado');";
                        $db->exec($sql);
                        echo "Banner do carrossel catalogado";
                        $titulo = "";
                        $descricao = "";
                        $link = "";
                        unset($_FILES["imagem"]);
                    }
                }else{
                    echo "Formato de arquivo de imagem inválido";
                $titulo = $_POST["titulo"];
                $descricao = $_POST["descricao"];
                $link = $_POST["link"];
                unset($_FILES["imagem"]);
                    }
        } else {
        echo "Não foi definido uma imagem para Banner";
            $titulo = $_POST["titulo"];
            $descricao = $_POST["descricao"];
            $link = $_POST["link"];
        unset($_FILES["imagem"]);
        }
    };
?>