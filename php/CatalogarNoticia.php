    <?php
    if (isset($_POST["enviarnoticia"])) {
        if (!empty($_POST['titulo']) and !empty($_POST['descricao']) and !empty($_POST['autor'])) {
            $titulo = $_POST["titulo"];
            $descricao = $_POST["descricao"];
            $autor = $_POST["autor"];
            $sympla = $_POST["sympla"];
            $secoes = $_POST["secoes"];
            $imagem = $_POST["imagem"];
            $db = new SQLite3('../db/userData.db');
            $sql = "INSERT INTO Noticias (titulo,descricao,hora,autor,sympla,secoes) VALUES ('$titulo','$descricao',CURRENT_DATE,'$autor ','$sympla','$secoes');";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $db->close();
            echo "Noticia catalogada";
            $titulo = "";
            $descricao = "";
            $autor = "";
            $sympla = "";
            $secoes = "";
            // IMAGEM ARRUMAR DPS *ADICIONAR NO IF DE CHECAGEM DPS
            // $formatosPermitidos = array("png", "jpeg", "jpg");
            // $extensao = pathinfo($_FILES["imagem"]['name'], PATHINFO_EXTENSION);
            // echo $extensao;
            //     if(in_array($extensao, $formatosPermitidos)){
            //     //
            //     $mensagem = "Noticia Catalogada";
            //     echo $mensagem;
            // }else{
            //             $mensagem = "Formato da imagem incompativel";
            //     echo $mensagem;
            // }
        } else {
            $titulo = $_POST["titulo"];
            $descricao = $_POST["descricao"];
            $autor = $_POST["autor"];
            $sympla = $_POST["sympla"];
            $secoes = $_POST["secoes"];
        }
    };
    ?>