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
    <?php
    session_start();
    if (!isset($_SESSION["currentUserName"])) header('Location: Login.php');
    // echo $_SESSION["loggedIn"] . "<br>" . $_SESSION["startTime"] . "<br>" . $_SESSION["currentUserName"];
    ?>
    <?php
    if (isset($_GET["enviarnoticia"])) {
        $buscaNoticia = $_GET["buscaNoticia"];
        $db = new SQLite3('../db/userData.db');
        $sql = "SELECT DISTINCT * FROM Noticias WHERE titulo LIKE '%" . $buscaNoticia . "%' ORDER BY id DESC";
        $contando = $db->query($sql);
        $noticia = $db->query($sql);
        $num = 0;
        while ($conta = $contando->fetchArray(SQLITE3_ASSOC)) {
            ++$num;
        };
    } else {
        $num = 0;
    };
    ?>
    <div>
        <form action="./Master.php">
            <button type="submit" class="btn btn-primary voltarbutton">Voltar</button>
        </form>
    </div>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Modifica|Exclui Noticias</h2>
    </div>
    <div class="table-container">
        <form method="GET" action="" class="form-container form-organiza">
            <ul class="organiza-display">
                <li style="    border: 1px solid #DDDDDD; margin-bottom: 30px;">
                    <label for="buscaNoticia">Busca</label>
                    <textarea onkeyup="ajusta_texto(this)" name="buscaNoticia" value="<?php echo $buscaNoticia; ?>"><?php echo $buscaNoticia; ?></textarea>
                    <span>Coloque uma parte do Título da noticia</span>
                </li>
                <button type="submit" class="btn btn-primary" name="enviarnoticia">Buscar</button>
            </ul>
            <div class="encontrados">
                <p>A busca pelo termo "<?php echo $buscaNoticia; ?>" encontrou <?php echo $num; ?> resultados.</p>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 30%;">Título</th>
                    <th style="width: 40%;">Descrição</th>
                    <th style="width: 10%;">Autor</th>
                    <th style="width: 10%;">Data</th>
                    <th style="width: 10%;" colspan="2"> Botões</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dados = $noticia->fetchArray(SQLITE3_ASSOC)) : ?>
                    <tr>
                        <td><?php echo $dados["titulo"]; ?></td>
                        <td><?php echo $dados["descricao"]; ?></td>
                        <td><?php echo $dados["autor"]; ?></td>
                        <td><time class="conteudo-lista__item__datahora" datetime="">
                                <?php echo $dados["hora"]; ?>
                            </time></td>
                        <td>
                            <form method="GET" action="./ModificaNoticia.php">
                                <input type="hidden" name="id" value="<?php echo $dados["id"]; ?>">
                                <input type="hidden" name="busca" value="<?php echo $buscaNoticia; ?>">
                                <button type="submit" name="fazer" value="modificar" class="botao-modifica rounded-circle bi bi-pencil-fill"></button>
                            </form>
                        </td>
                        <td>
                            <form method="GET" action="./ModificaNoticia.php">
                                <input type="hidden" name="id" value="<?php echo $dados["id"]; ?>">
                                <input type="hidden" name="busca" value="<?php echo $buscaNoticia; ?>">
                                <button type="submit" name="fazer" value="excluir" class="botao-deleta rounded-circle bi bi-trash-fill"></button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile;
                $db->close(); ?>
            </tbody>
        </table>
    </div>
</body>

</html>