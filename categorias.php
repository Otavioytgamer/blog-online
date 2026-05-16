<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Categorias</title>
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
            max-width: 480px;
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
        .modal-content select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
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
        <a href="categorias.php" class="active">Categorias</a>
        <a href="postagens.php">Postagens</a>

        <div class="perfil-usuario">
            <img src="https://play-lh.googleusercontent.com/jeNGu6ehpO1E-44ltojEoEAmQApE015dsuFVeqVGsizBGzlydGV8aq5C_gZrj59F93s=w240-h480-rw" alt="Avatar">
            <span>Otávio Augusto</span>
        </div>
    </nav>

    <main>
        <h1>Gestão de Categorias</h1>
        <p class="header-content">Visualize e gerencie as categorias de produtos do sistema</p>

        <div class="btn-add-container">
            <button id="btnAdicionar" class="btn-add">
                <i class="fa-solid fa-plus"></i> Adicionar Categoria
            </button>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </main>

 
    <div id="modalNovaCategoria" class="modal">
        <div class="modal-content">
            <h2>Nova Categoria</h2>
            <p>Preencha os dados abaixo para registrar uma nova categoria</p>

            <form id="formNovaCategoria">
                <label>ID</label>
                <input type="text" id="idField" value="Auto" readonly>

                <label for="nome">Nome da Categoria <span style="color:red">*</span></label>
                <input type="text" id="nome" placeholder="Ex: Tecnologia, Esportes, Notícias, etc." required>

                <label for="status">Status</label>
                <select id="status">
                    <option value="Ativo" selected>Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>

                <div class="button-group">
                    <button type="button" id="btnFinalizar" class="btn-modal btn-success">
                        <i class="fa-solid fa-check"></i> Finalizar Cadastro
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
    let categorias = JSON.parse(localStorage.getItem('bancoCategorias')) || [
        { id: 1, nome: "Eletrônicos", status: "Ativo" },
        { id: 2, nome: "Roupas e Moda", status: "Ativo" },
        { id: 3, nome: "Alimentos e Bebidas", status: "Inativo" },
        { id: 4, nome: "Móveis e Decoração", status: "Ativo" }
    ];

    function getNextId() {
        if (categorias.length === 0) return 5;
        const maxId = Math.max(...categorias.map(cat => cat.id));
        return maxId + 1;
    }

    function renderTabela() {
        const tbody = document.querySelector('tbody');
        tbody.innerHTML = '';

        categorias.forEach(cat => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${cat.id.toString().padStart(2, '0')}</td>
                <td>${cat.nome}</td>
                <td><span class="status ${cat.status.toLowerCase()}">${cat.status}</span></td>
                <td class="acoes">
                    <button class="btn-edit" data-id="${cat.id}" title="Editar"><i class="fa-solid fa-pen"></i></button>
                    <button class="btn-view" data-id="${cat.id}" title="Visualizar"><i class="fa-solid fa-eye"></i></button>
                    <button class="btn-delete" data-id="${cat.id}" title="Excluir"><i class="fa-solid fa-trash"></i></button>
                </td>
            `;
            tbody.appendChild(tr);
        });

        adicionarEventos();
    }

    function salvarDados() {
        localStorage.setItem('bancoCategorias', JSON.stringify(categorias));
    }

    function adicionarEventos() {
        // Editar
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = parseInt(btn.getAttribute('data-id'));
                const cat = categorias.find(c => c.id === id);
                if (!cat) return;

                const novoNome = prompt('Editar nome da categoria:', cat.nome);
                if (novoNome === null || novoNome.trim() === '') return;

                cat.nome = novoNome.trim();
                salvarDados();
                renderTabela();
                alert('Categoria editada com sucesso!');
            });
        });

       
        document.querySelectorAll('.btn-view').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = parseInt(btn.getAttribute('data-id'));
                const cat = categorias.find(c => c.id === id);
                if (cat) {
                    alert(`DETALHES DA CATEGORIA\n\nID: ${cat.id}\nNome: ${cat.nome}\nStatus: ${cat.status}`);
                }
            });
        });

     
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = parseInt(btn.getAttribute('data-id'));
                const cat = categorias.find(c => c.id === id);
                if (!cat) return;

                if (confirm(`Tem certeza que deseja excluir "${cat.nome}"?`)) {
                    categorias = categorias.filter(c => c.id !== id);
                    salvarDados();
                    renderTabela();
                    alert('Categoria excluída com sucesso!');
                }
            });
        });
    }


    const modal = document.getElementById('modalNovaCategoria');
    const btnAdicionar = document.getElementById('btnAdicionar');
    const btnCancelar = document.getElementById('btnCancelar');
    const btnFinalizar = document.getElementById('btnFinalizar');

    btnAdicionar.addEventListener('click', () => {
        document.getElementById('nome').value = '';           
        document.getElementById('idField').value = 'Auto';
        modal.style.display = 'flex';
    });

    btnCancelar.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    btnFinalizar.addEventListener('click', () => {
        const nome = document.getElementById('nome').value.trim();

        if (!nome) {
            alert('Por favor, preencha o nome da categoria!');
            return;
        }

        const status = document.getElementById('status').value;

        const novaCategoria = {
            id: getNextId(),
            nome: nome,
            status: status
        };

        categorias.push(novaCategoria);
        salvarDados();
        renderTabela();

        alert('✅ Categoria cadastrada com sucesso!');
        modal.style.display = 'none';
    });

   
    modal.addEventListener('click', (e) => {
        if (e.target === modal) modal.style.display = 'none';
    });

 
    document.getElementById('formNovaCategoria').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            btnFinalizar.click();
        }
    });

  
    document.addEventListener('DOMContentLoaded', renderTabela);
</script>

</body>
</html>
