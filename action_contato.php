<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora IFPR - Resultado do Formulário</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Cabeçalho -->
    <header>
        <h2>Locadora IFPR</h2>
        <nav>
            <a href="index.html">Início</a>
            <a href="carros.html">Carros</a>
            <a href="filiais.html">Filiais</a>
            <a href="contato.html">Contato</a>
        </nav>
    </header>

    <!-- Conteúdo principal -->
    <main>
        <h1>Dados Recebidos</h1>
        <div class="contato-form">
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {

                // Campos principais
                $nome = htmlspecialchars($_POST["nome"] ?? "");
                $email = htmlspecialchars($_POST["email"] ?? "");
                $mensagem = htmlspecialchars($_POST["mensagem"] ?? "");

                if ($nome) echo "<p><strong>Nome:</strong> $nome</p>";
                if ($email) echo "<p><strong>Email:</strong> $email</p>";
                if ($mensagem) echo "<p><strong>Mensagem:</strong> " . nl2br($mensagem) . "</p>";

                // Exibir outros campos automaticamente
                foreach ($_POST as $campo => $valor) {
                    if (!in_array($campo, ["nome", "email", "mensagem"]) && trim($valor) !== "") {
                        $campoFormatado = ucwords(str_replace("_", " ", $campo));
                        echo "<p><strong>$campoFormatado:</strong> " . htmlspecialchars($valor) . "</p>";
                    }
                }

            } else {
                echo "<p>Nenhum dado foi enviado.</p>";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Locadora IFPR - Todos os direitos reservados</p>
    </footer>

</body>

</html>
