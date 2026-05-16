<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Categoria</title>
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        .form-card {
            max-width: 500px;
            margin: 40px auto;
            padding: 35px 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .form-card h2 {
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 26px;
        }
        .form-card p {
            color: #666;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 22px;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }
        .btn-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        .btn-save {
            flex: 1;
            padding: 14px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-cancel {
            flex: 1;
            padding: 14px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
    </style>
</head>
<body>

    <nav>
        <a href="index.php">Início</a>
        <a href="usuarios.php">Usuários</a>
        <a href="categorias.php" class="active">Categorias</a>
        <a href="postagens.php">Postagens</a>

        <div class="perfil-usuario">
            <img src="https://play-lh.googleusercontent.com/jeNGu6ehpO1E-44ltojEoEAmQApE015dsuFVeqVGsizBGzlydGV8aq5C_gZrj59F93s=w240-h480-rw" alt="Avatar">
            <span>Otávio Augusto</span>
        </div>
    </nav>

    <main>
        <div class="form-card">
            <h2>Nova Categoria</h2>
            <p>Preencha os dados abaixo para registrar uma nova categoria</p>

            <form action="salvar-categoria.php" method="POST">
                
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" value="Auto" disabled>
                </div>

                <div class="form-group">
                    <label for="nome">Nome da Categoria <span style="color:red;">*</span></label>
                    <input type="text" id="nome" name="nome" placeholder="Ex: Tecnologia, Esportes, Notícias, etc." required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="ativo" selected>Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-save"></i> Finalizar Cadastro
                    </button>
                    <a href="categorias.php" class="btn-cancel">
                        <i class="fa-solid fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </main>

    <footer>
        © 2026 - Desenvolvido na aula de Web I
    </footer>

</body>
</html>
