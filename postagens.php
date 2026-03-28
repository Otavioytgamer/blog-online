
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Postagens</title>
    <link rel="stylesheet" href="usuarios.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <nav>
        <a href="index.php">Início</a>
        <a href="usuarios.php">Usuários</a>
        <a href="categorias.php">Categorias</a>
        <a href="postagens.php" class="active">Postagens</a>

        <div class="perfil-usuario">
            <img src="https://play-lh.googleusercontent.com/jeNGu6ehpO1E-44ltojEoEAmQApE015dsuFVeqVGsizBGzlydGV8aq5C_gZrj59F93s=w240-h480-rw" alt="Avatar">
            <span>Otávio Augusto</span>
        </div>
    </nav>

    <main>
        <h1>Gestão de Postagens de Produtos</h1>
        <p class="header-content">Visualize e gerencie as postagens de produtos do sistema</p>

     
        <div class="btn-add-container">
            <a href="cad-postagens.php" class="btn-add">
                <i class="fa-solid fa-plus"></i> Adicionar Postagem
            </a>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Conteúdo</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Smartphone Galaxy S25 Ultra</td>
                        <td>Review completo do novo flagship da Samsung com câmera de 200MP...</td>
                        <td>Eletrônicos</td>
                        <td><span class="status ativo">Ativo</span></td>
                        <td class="acoes">
                            <button title="Editar"><i class="fa-solid fa-pen"></i></button>
                            <button title="Visualizar"><i class="fa-solid fa-eye"></i></button>
                            <button title="Excluir"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Camiseta Básica Algodão Premium</td>
                        <td>Camiseta 100% algodão egípcio, disponível em várias cores...</td>
                        <td>Roupas e Moda</td>
                        <td><span class="status ativo">Ativo</span></td>
                        <td class="acoes">
                            <button title="Editar"><i class="fa-solid fa-pen"></i></button>
                            <button title="Visualizar"><i class="fa-solid fa-eye"></i></button>
                            <button title="Excluir"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Notebook Dell Inspiron 15</td>
                        <td>Processador Intel i7, 16GB RAM, SSD 512GB...</td>
                        <td>Eletrônicos</td>
                        <td><span class="status inativo">Inativo</span></td>
                        <td class="acoes">
                            <button title="Editar"><i class="fa-solid fa-pen"></i></button>
                            <button title="Visualizar"><i class="fa-solid fa-eye"></i></button>
                            <button title="Excluir"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>Kit de Panelas Antiaderente</td>
                        <td>Conjunto com 5 peças, revestimento antiaderente de alta qualidade...</td>
                        <td>Alimentos e Bebidas</td>
                        <td><span class="status ativo">Ativo</span></td>
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