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
    <?php include "./CatalogarNoticia.php"; ?>
    <?php include "./CatalogarSenha.php"; ?>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Master Page</h2>
    </div>

    <div class="master-container">
        <section class="master-table" role="tablist">
            <div>
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a data-toggle="collapse" href="#AdicionarNoticias" role="tab" class="collapsed">
                            ADICIONAR NOTICIAS
                        </a>
                    </h4>
                </div>
                <div id="AdicionarNoticias" class="collapse" role="tabpanel" style="height: 0px;">
                    <div class="painel-body">
                        <div class="artigo_texto">
                            <form action="" method="post" class="form-container" enctype="multipart/form-data">
                                <ul>
                                    <li>
                                        <label for="titulo">Título</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="titulo" value="<?php echo $titulo; ?>"><?php echo $titulo; ?></textarea>
                                        <span>Coloque o Título da noticia</span>
                                    </li>
                                    <li>
                                        <label for="descricao">Descrição</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="descricao" value="<?php echo $descricao; ?>"><?php echo $descricao; ?></textarea>
                                        <span>Coloque a descrição da noticia</span>
                                    </li>
                                    <li>
                                        <label for="sympla">Sympla</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="sympla" value="<?php echo $sympla; ?>"><?php echo $sympla; ?></textarea>
                                        <span>Coloque o link do Sympla como (Ex: https://www.sympla.com.br)</span>
                                    </li>
                                    <li>
                                        <label for="autor">Autor</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="autor" value="<?php echo $autor; ?>"><?php echo $autor; ?></textarea>
                                        <span>Coloque o nome do Autor</span>
                                    </li>
                                    <li>
                                        <label for="imagem">Imagem</label>
                                        <input type="file" name="imagem" value="<?php echo $imagem; ?>">
                                        <span>Escolha o arquivo de imagem apenas permitidos (png, jpeg, jpg)</span>
                                    </li>
                                    <li>
                                        <label for="secoes">Seções</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="secoes" value="<?php echo $secoes; ?>"><?php echo $secoes; ?></textarea>
                                        <span>Coloque as seções</span>
                                    </li>
                                    <li>
                                        <button type="submit" class="btn btn-primary" name="enviarnoticia">Enviar</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a data-toggle="collapse" href="#AdicionarConta" role="tab" class="collapsed">
                            ADICIONAR CONTA
                        </a>
                    </h4>
                </div>
                <div id="AdicionarConta" class="collapse" role="tabpanel" style="height: 0px;">
                    <div class="painel-body">
                        <div class="artigo_texto">
                            <form action="" method="post" class="form-container">
                                <ul>
                                    <li>
                                        <label for="username">Username</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="username" value="<?php echo $username; ?>"><?php echo $username; ?></textarea>
                                        <span>Coloque o seu Username</span>
                                    </li>
                                    <li>
                                        <label for="nome">Nome</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="nome" value="<?php echo $nome; ?>"><?php echo $nome; ?></textarea>
                                        <span>Coloque o seu nome</span>
                                    </li>
                                    <li>
                                        <label for="email">Email</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="email" value="<?php echo $email; ?>"><?php echo $email; ?></textarea>
                                        <span>Coloque o seu Email</span>
                                    </li>
                                    <li>
                                        <label for="cpf">CPF</label>
                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" name="cpf" value="<?php echo $cpf; ?>">
                                        <span>Digite seu CPF</span>
                                    </li>
                                    <li>
                                        <label for="senha">Senha</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="senha" value="<?php echo $senha; ?>"><?php echo $senha; ?></textarea>
                                        <span>Digite a senha que deseje colocar</span>
                                    </li>
                                    <li>
                                        <button type="submit" class="btn btn-primary" name="enviarconta">Enviar</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a href="./MudaNoticia.php" class="collapsed">
                            MODIFICAR | EXCLUIR NOTICIA
                        </a>
                    </h4>
                </div>
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a href="./MudaConta.php" class="collapsed">
                            MODIFICAR | EXCLUIR CONTA
                        </a>
                    </h4>
                </div>
            </div>
        </section>
    </div>


    <a href="Logout.php" style="text-decoration: none; color: white;"><button type="submit" class="btn btn-primary Logout-button">Logout</button></a>
</body>

</html>