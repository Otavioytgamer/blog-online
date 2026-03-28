

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Usuários</title>
    <link rel="stylesheet" href="usuarios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <nav>
        <a href="index.php">Início</a>
        <a href="usuarios.php" class="active">Usuários</a>
        <a href="categorias.php">Categorias</a>
        <a href="postagens.php">Postagens</a>

        <div class="perfil-usuario">
            <img src="https://play-lh.googleusercontent.com/jeNGu6ehpO1E-44ltojEoEAmQApE015dsuFVeqVGsizBGzlydGV8aq5C_gZrj59F93s=w240-h480-rw" alt="Avatar">
            <span>Otávio Augusto</span>
        </div>
    </nav>

    <main>
        <h1>Gestão de Usuários</h1>
        <p class="header-content">Visualize e gerencie as permissões dos usuários do sistema</p>

        <div class="btn-add-container">
            <a href="cad-usuario.php" class="btn-add">
                <i class="fa-solid fa-plus"></i> Adicionar Usuário
            </a>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Acesso</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Eric Freitas</td>
                        <td>eric@unifev.edu.br</td>
                        <td>Administrador</td>
                        <td><span class="status ativo">Ativo</span></td>
                        <td class="acoes">
                            <button title="Editar"><i class="fa-solid fa-pen"></i></button>
                            <button title="Visualizar"><i class="fa-solid fa-eye"></i></button>
                            <button title="Excluir"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Ana Souza</td>
                        <td>ana.souza@email.com</td>
                        <td>Editor</td>
                        <td><span class="status ativo">Ativo</span></td>
                        <td class="acoes">
                            <button title="Editar"><i class="fa-solid fa-pen"></i></button>
                            <button title="Visualizar"><i class="fa-solid fa-eye"></i></button>
                            <button title="Excluir"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Carlos Lima</td>
                        <td>carlos.lima@servidor.com</td>
                        <td>Usuário</td>
                        <td><span class="status inativo">Inativo</span></td>
                        <td class="acoes">
                            <button title="Editar"><i class="fa-solid fa-pen"></i></button>
                            <button title="Visualizar"><i class="fa-solid fa-eye"></i></button>
                            <button title="Excluir"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        © 2026 - Desenvolvido na aula de Web I
    </footer>

</body>
</html>