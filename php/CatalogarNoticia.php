<?php
    if (isset($_POST["enviarnoticia"])) {
        if (!empty($_POST['titulo']) and !empty($_POST['descricao']) and !empty($_POST['autor'])) {
            $db = new SQLite3('../db/userData.db');
            $titulo = $_POST["titulo"];
            $descricao = $_POST["descricao"];
            $autor = $_POST["autor"];
            $sympla = $_POST["sympla"];
            $secoes = $_POST["secoes"];

            if ($_FILES["imagem"]["size"]!=0) {
                $file_name = $_FILES['imagem']['name'];
                $file_temp = $_FILES['imagem']['tmp_name'];
                $exp = explode(".", $file_name);
                $ext = end($exp);
                $imagem = time() . "." . $ext;
                $ext_allowed = array("png", "jpeg", "jpg");
                $localizado = "../upload/" . $imagem;
                    if (in_array($ext, $ext_allowed)) {
                        if (move_uploaded_file($file_temp, $localizado)) {
                            $sql = "INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes,imagem,localizado) VALUES ('$titulo','$descricao',CURRENT_DATE,'$autor ','$sympla','$secoes','$imagem','$localizado');";
                            $db->exec($sql);
                    echo "Noticia catalogada";
                            $titulo = "";
                            $descricao = "";
                            $autor = "";
                            $sympla = "";
                            $secoes = "";
                    unset($_FILES["imagem"]);
                        }
                    }else{
                $titulo = $_POST["titulo"];
                $descricao = $_POST["descricao"];
                $autor = $_POST["autor"];
                $sympla = $_POST["sympla"];
                $secoes = $_POST["secoes"];
                unset($_FILES["imagem"]);
                echo "Formato de arquivo de imagem inválido";
                    }
            }else {
            $sql = "INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes,imagem,localizado) VALUES ('$titulo','$descricao',CURRENT_DATE,'$autor ','$sympla','$secoes','DesignPlaceHolder.png','../upload/DesignPlaceholder.png');";
            $db->exec($sql);
            echo "Noticia catalogada";
            $titulo = "";
            $descricao = "";
            $autor = "";
            $sympla = "";
            $secoes = "";
            unset($_FILES["imagem"]);
            }
        } else {
        echo "Título, Descrição ou Autor está vazio";
            $titulo = $_POST["titulo"];
            $descricao = $_POST["descricao"];
            $autor = $_POST["autor"];
            $sympla = $_POST["sympla"];
            $secoes = $_POST["secoes"];
            $imagem = $_FILES["imagem"];
        }
    };
    ?>