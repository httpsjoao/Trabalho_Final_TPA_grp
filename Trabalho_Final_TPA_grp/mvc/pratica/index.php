<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - Projeto de Portfólio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <h1>Bem-vindo ao Nosso Projeto</h1>
        <p>Esta é a página inicial do nosso projeto. Navegue pelo site e conheça mais sobre nossos trabalhos.</p>
    </header>



    <!-- Rodapé -->
    <footer>
        <p>Conheça os portfólios dos integrantes (GIT):</p>
        <ul>
            <?php
            // Lista de integrantes com seus nomes e links de portfólio (GitHub)
            $integrantes = [
                "Diego" => "https://github.com/DiegoPeixe",
                "João" => "https://github.com/httpsjoao",
                "Ana" => "https://github.com/anagiordane",
                "André" => "https://github.com/12201600"
            ];

            // Loop para criar o link de cada integrante no rodapé
            foreach ($integrantes as $nome => $link) {
                echo "<li><a href='$link' target='_blank'>$nome</a></li>";
            }
            ?>
        </ul>
    </footer>

    <!-- Botão "Clique Aqui" -->
    <div class="botao-clique-aqui">
    <button onclick="window.location.href='/caminho/para/sua/pasta'">Acesse as tabelas</button>
</div>


    
</body>
</html>
