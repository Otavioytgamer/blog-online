<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Postagens</title>
    <link rel="stylesheet" href="usuarios.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.85);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-content {
            background: white;
            color: #333;
            border-radius: 12px;
            padding: 30px;
            width: 100%;
            max-width: 580px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.6);
        }
        .modal-content h2 {
            margin: 0 0 8px 0;
            color: #222;
        }
        .modal-content p {
            color: #666;
            margin-bottom: 20px;
        }
        .modal-content label {
            display: block;
            margin: 15px 0 6px;
            font-weight: 600;
            color: #333;
        }
        .modal-content input,
        .modal-content select,
        .modal-content textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            resize: vertical;
        }
        .modal-content textarea {
            min-height: 120px;
        }
        .modal-content input[readonly] {
            background: #f5f5f5;
            color: #666;
        }
        .button-group {
            margin-top: 30px;
            display: flex;
            gap: 12px;
        }
        .btn-modal {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-success { background: #10b981; color: white; }
        .btn-danger   { background: #ef4444; color: white; }
        .btn-success:hover { background: #059669; }
        .btn-danger:hover   { background: #dc2626; }
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
        <h1>Gestão de Postagens de Produtos</h1>
        <p class="header-content">Visualize e gerencie as postagens de produtos do sistema</p>

        <div class="btn-add-container">
            <button id="btnAdicionar" class="btn-add">
                <i class="fa-solid fa-plus"></i> Adicionar Postagem
            </button>
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
                <tbody></tbody>
            </table>
        </div>
    </main>

  
    <div id="modalPostagem" class="modal">
        <div class="modal-content">
            <h2 id="modalTitle">Nova Postagem</h2>
            <p>Preencha os dados abaixo</p>

            <form id="formPostagem">
                <label>ID</label>
                <input type="text" id="idField" value="Auto" readonly>

                <label for="titulo">Título <span style="color:red">*</span></label>
                <input type="text" id="titulo" required>

                <label for="conteudo">Conteúdo <span style="color:red">*</span></label>
                <textarea id="conteudo" required></textarea>

                <label for="categoria">Categoria <span style="color:red">*</span></label>
                <select id="categoria" required></select>

                <label for="status">Status</label>
                <select id="status">
                    <option value="Ativo" selected>Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>

                <div class="button-group">
                    <button type="button" id="btnFinalizar" class="btn-modal btn-success">
                        <i class="fa-solid fa-check"></i> <span id="btnText">Finalizar Cadastro</span>
                    </button>
                    <button type="button" id="btnCancelar" class="btn-modal btn-danger">
                        <i class="fa-solid fa-xmark"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
    

    <footer>
        © 2026 - Desenvolvido na aula de Web I
    </footer>

<script>
    let postagens = JSON.parse(localStorage.getItem('bancoPostagens')) || [
        { id: 1, titulo: "Smartphone Galaxy S25 Ultra", conteudo: "Review completo do novo flagship da Samsung com câmera de 200MP...", categoria: "Eletrônicos", status: "Ativo" },
        { id: 2, titulo: "Camiseta Básica Algodão Premium", conteudo: "Camiseta 100% algodão egípcio, disponível em várias cores...", categoria: "Roupas e Moda", status: "Ativo" },
        { id: 3, titulo: "Notebook Dell Inspiron 15", conteudo: "Processador Intel i7, 16GB RAM, SSD 512GB...", categoria: "Eletrônicos", status: "Inativo" },
        { id: 4, titulo: "Kit de Panelas Antiaderente", conteudo: "Conjunto com 5 peças, revestimento antiaderente de alta qualidade...", categoria: "Alimentos e Bebidas", status: "Ativo" }
    ];

    let editingId = null; 

    function getNextId() {
        if (postagens.length === 0) return 5;
        const maxId = Math.max(...postagens.map(p => p.id));
        return maxId + 1;
    }

    // Carrega categorias para o select
    function carregarCategorias() {
        const select = document.getElementById('categoria');
        select.innerHTML = '<option value="">Selecione uma categoria...</option>';
        
        const categorias = JSON.parse(localStorage.getItem('bancoCategorias')) || [];
        categorias.forEach(cat => {
            const option = document.createElement('option');
            option.value = cat.nome;
            option.textContent = cat.nome;
            select.appendChild(option);
        });
    }

    function renderTabela() {
        const tbody = document.querySelector('tbody');
        tbody.innerHTML = '';

        postagens.forEach(post => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${post.id.toString().padStart(2, '0')}</td>
                <td>${post.titulo}</td>
                <td>${post.conteudo.substring(0, 60)}${post.conteudo.length > 60 ? '...' : ''}</td>
                <td>${post.categoria}</td>
                <td><span class="status ${post.status.toLowerCase()}">${post.status}</span></td>
                <td class="acoes">
                    <button class="btn-edit" data-id="${post.id}" title="Editar"><i class="fa-solid fa-pen"></i></button>
                    <button class="btn-view" data-id="${post.id}" title="Visualizar"><i class="fa-solid fa-eye"></i></button>
                    <button class="btn-delete" data-id="${post.id}" title="Excluir"><i class="fa-solid fa-trash"></i></button>
                </td>
            `;
            tbody.appendChild(tr);
        });

        adicionarEventos();
    }

    function salvarDados() {
        localStorage.setItem('bancoPostagens', JSON.stringify(postagens));
    }

    function adicionarEventos() {
  
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = parseInt(btn.getAttribute('data-id'));
                const post = postagens.find(p => p.id === id);
                if (!post) return;

                editingId = id;
                document.getElementById('modalTitle').textContent = 'Editar Postagem';
                document.getElementById('btnText').textContent = 'Salvar Alterações';
                document.getElementById('idField').value = id.toString().padStart(2, '0');
                document.getElementById('titulo').value = post.titulo;
                document.getElementById('conteudo').value = post.conteudo;
                document.getElementById('categoria').value = post.categoria;
                document.getElementById('status').value = post.status;

                document.getElementById('modalPostagem').style.display = 'flex';
            });
        });

       
        document.querySelectorAll('.btn-view').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = parseInt(btn.getAttribute('data-id'));
                const post = postagens.find(p => p.id === id);
                if (post) {
                    alert(`DETALHES DA POSTAGEM\n\nID: ${post.id}\nTítulo: ${post.titulo}\nConteúdo: ${post.conteudo}\nCategoria: ${post.categoria}\nStatus: ${post.status}`);
                }
            });
        });

     
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = parseInt(btn.getAttribute('data-id'));
                const post = postagens.find(p => p.id === id);
                if (!post) return;

                if (confirm(`Tem certeza que deseja excluir "${post.titulo}"?`)) {
                    postagens = postagens.filter(p => p.id !== id);
                    salvarDados();
                    renderTabela();
                    alert('Postagem excluída com sucesso!');
                }
            });
        });
    }

    
    const modal = document.getElementById('modalPostagem');
    const btnAdicionar = document.getElementById('btnAdicionar');
    const btnCancelar = document.getElementById('btnCancelar');
    const btnFinalizar = document.getElementById('btnFinalizar');

    btnAdicionar.addEventListener('click', () => {
        editingId = null;
        document.getElementById('modalTitle').textContent = 'Nova Postagem';
        document.getElementById('btnText').textContent = 'Finalizar Cadastro';
        document.getElementById('formPostagem').reset();
        document.getElementById('idField').value = 'Auto';
        carregarCategorias();
        modal.style.display = 'flex';
    });

    btnCancelar.addEventListener('click', () => {
        modal.style.display = 'none';
        editingId = null;
    });

    btnFinalizar.addEventListener('click', () => {
        const titulo = document.getElementById('titulo').value.trim();
        const conteudo = document.getElementById('conteudo').value.trim();
        const categoria = document.getElementById('categoria').value;
        const status = document.getElementById('status').value;

        if (!titulo || !conteudo || !categoria) {
            alert('Por favor, preencha todos os campos obrigatórios!');
            return;
        }

        if (editingId !== null) {
          
            const post = postagens.find(p => p.id === editingId);
            if (post) {
                post.titulo = titulo;
                post.conteudo = conteudo;
                post.categoria = categoria;
                post.status = status;
            }
        } else {
    
            const novaPostagem = {
                id: getNextId(),
                titulo: titulo,
                conteudo: conteudo,
                categoria: categoria,
                status: status
            };
            postagens.push(novaPostagem);
        }

        salvarDados();
        renderTabela();
        alert(editingId !== null ? '✅ Postagem atualizada com sucesso!' : '✅ Postagem cadastrada com sucesso!');
        modal.style.display = 'none';
        editingId = null;
    });

 
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
            editingId = null;
        }
    });

   
    document.addEventListener('DOMContentLoaded', () => {
        carregarCategorias();
        renderTabela();
    });
</script>

</body>
</html>
