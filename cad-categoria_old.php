<section class="card-form">
    <div class="form-header">
        <h2><i class="fa-solid fa-user-plus"></i> Nova Categoria</h2>
        <p>Preencha os dados abaixo para registrar um nova categoria</p>
    </div>

    <form action="processa.php" method="POST">
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" id="id" name="id" placeholder="" readonly>
        </div>

        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" id="nome" name="nome" placeholder="" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="">Selecione o status</option>
                <option value="1" selected>Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">Finalizar Cadastro</button>
            <a href="categorias.php" class="btn-cancel">Cancelar</a>
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
.btn-cancel {
    background-color: #e74c3c;
    color: white;
    padding: 12px 25px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    display: inline-block;
}

</style>