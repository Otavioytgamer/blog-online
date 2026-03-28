<section class="card-form">
    <div class="form-header">
        <h2><i class="fa-solid fa-user-plus"></i> Novo Usuário</h2>
        <p>Preencha os dados abaixo para registrar um novo acesso.</p>
    </div>

    <form action="processa.php" method="POST">
        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: Eric Freitas" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="nome@empresa.com" required>
        </div>

        <div class="form-row">
            <div class="form-group flex-1">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group flex-1">
                <label for="nivel">Nível</label>
                <select id="nivel" name="nivel">
                    <option value="1">Usuário</option>
                    <option value="2">Administrador</option>
                </select>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">Finalizar Cadastro</button>
            <a href="usuarios.php" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</section>



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

input, select {
    padding: 12px;
    border: 1px solid #cbd5e0;
    border-radius: 6px;
    transition: 0.3s;
}

input:focus { 
    border-color: #004a8d; 
    outline: none; 
    box-shadow: 0 0 0 3px rgba(0,74,141,0.1); 
}

.btn-save {
    background-color: #27ae60;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
}

</style>