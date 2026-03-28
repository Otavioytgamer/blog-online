<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - otavio augusto</title>
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <nav>
        <a href="index.php" class="active">Início</a>
        <a href="usuarios.php">Usuários</a>
        <a href="categorias.php">Categorias</a>
        <a href="postagens.php">Postagens</a>

        <div class="perfil-usuario">
            <img src="https://play-lh.googleusercontent.com/jeNGu6ehpO1E-44ltojEoEAmQApE015dsuFVeqVGsizBGzlydGV8aq5C_gZrj59F93s=w240-h480-rw" alt="Avatar">
            <span>otavio augusto</span>
        </div>
    </nav>

    <main>
        <h1>Bem-vindo ao Painel</h1>
        <p class="subtitle">Gerencie o sistema de forma simples e organizada.</p>

        <section class="container-cards">
            <article>
                <h2>Módulo de Usuários</h2>
                <p>Gerencie os acessos e permissões do sistema nesta área.</p>
                <a href="usuarios.php" class="btn">Acessar</a>
            </article>

            <article>
                <h2>Categorias de Produtos</h2>
                <p>Gerencie as categorias dos produtos cadastrados no sistema</p>
                <a href="categorias.php" class="btn">Acessar</a>
            </article>

            <article>
                <h2>Gestão de Postagens</h2>
                <p>Gerencie o conteudo das postagens e mantenha o sistema atualizado</p>
                <a href="postagens.php" class="btn">Acessar</a>
            </article>
        </section>
    </main>

    <footer>
        © 2026 - Desenvolvido na aula de Web I
    </footer>

</body>
</html>