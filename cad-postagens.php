<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Postagem</title>
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        .card-form {
            background: white;
            max-width: 700px; 
            margin: 20px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .form-header { 
            margin-bottom: 25px; 
            border-bottom: 1px solid #eee; 
            padding-bottom: 15px; 
        }

        .form-header h2 {
            color: #2c3e50;
            margin: 0;
        }

        .form-group {
            display: flex;
            flex-direction: column; 
            gap: 8px;
            margin-bottom: 20px;
        }

        .form-row { 
            display: flex; 
            gap: 20px; 
        } 

        .flex-1 { 
            flex: 1; 
        }

        label { 
            font-weight: bold; 
            color: #2c3e50; 
            font-size: 14px; 
        }

        input, select, textarea {
            padding: 12px;
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            transition: 0.3s;
            font-family: inherit;
            resize: vertical;
        }

        input:focus, select:focus, textarea:focus { 
            border-color: #004a8d; 
            outline: none; 
            box-shadow: 0 0 0 3px rgba(0,74,141,0.1); 
        }

        textarea {
            min-height: 180px;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .btn-save {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-cancel {
            background-color: #e74c3c;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            flex: 1;
            text-align: center;
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
        <a href="categorias.php">Categorias</a>
        <a href="postagens.php" class="active">Postagens</a>

        <div class="perfil-usuario">
            <img src="https://play-lh.googleusercontent.com/jeNGu6ehpO1E-44ltojEoEAmQApE015dsuFVeqVGsizBGzlydGV8aq5C_gZrj59F93s=w240-h480-rw" alt="Avatar">
            <span>Otávio Augusto</span>
        </div>
    </nav>

    <main>
        <section class="card-form">
            <div class="form-header">
                <h2><i class="fa-solid fa-file-pen"></i> Nova Postagem</h2>
                <p>Preencha os dados abaixo para registrar uma nova postagem.</p>
            </div>

            <form action="salvar-postagem.php" method="POST">
                
                <div class="form-group">
                    <label for="titulo">Título da Postagem</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Digite o título da postagem" required>
                </div>

                <div class="form-group">
                    <label for="postagem">Conteúdo da Postagem</label>
                    <textarea id="postagem" name="postagem" rows="10" placeholder="Digite o conteúdo da postagem aqui..." required></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group flex-1">
                        <label for="categoria">Categoria</label>
                        <select id="categoria" name="categoria" required>
                            <option value="">Selecione uma categoria</option>
                            <option value="1">Tecnologia</option>
                            <option value="2">Design</option>
                            <option value="3">Marketing</option>
                            <option value="4">Negócios</option>
                            <option value="5">Outros</option>
                        </select>
                    </div>

                    <div class="form-group flex-1">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="1" selected>Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-save"></i> Finalizar Cadastro
                    </button>
                    <a href="postagens.php" class="btn-cancel">
                        <i class="fa-solid fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </section>
    </main>

    <footer>
        © 2026 - Desenvolvido na aula de Web I
    </footer>

</body>
</html>
