<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora IFPR - Contato</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Cabeçalho -->
    <header>
        <h2>Locadora IFPR</h2>
        <nav>
            <a href="index.html">Início</a>
            <a href="filiais.html">Filiais</a>
            <a href="contato.html" aria-current="page">Contato</a>
            <a href="planilha.html">Planilha</a>
        </nav>
    </header>

    <!-- Conteúdo principal -->
    <main>
        <h1>Entre em Contato</h1>
        <form class="contato-form" id="form-contato">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" rows="5" placeholder="Escreva sua mensagem"></textarea>

            <button type="submit">Enviar</button>
        </form>

        <div id="resposta" class="info-msg"></div>
    </main>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2025 Locadora IFPR - Todos os direitos reservados</p>
    </footer>

    <script>
        const SCRIPT_URL = "https://script.google.com/macros/s/AKfycby8-UzNmWk6_t1wKGOySCfTmaGgMD8H9DDzIxIZslXKIY28T26SGa2rRRWbPHf_YiL7/exec";

        const form = document.getElementById("form-contato");
        const resposta = document.getElementById("resposta");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(form);

            try {
                const res = await fetch(SCRIPT_URL, {
                    method: "POST",
                    body: formData
                });

                if (res.ok) {
                    resposta.textContent = "Dados enviados com sucesso!";
                    form.reset();
                } else {
                    resposta.textContent = "Erro ao enviar os dados.";
                }
            } catch (err) {
                resposta.textContent = "Erro ao enviar: " + err.message;
            }
        });
    </script>

</body>
</html>


/* ======= BOTÃO TOGGLE DE TEMA ======= */
.tema-toggle {
    position: absolute;
    top: 15px;
    right: 20px;
    width: 50px;
    height: 26px;
    background: #ddd;
    border-radius: 20px;
    cursor: pointer;
    padding: 3px;
    display: flex;
    align-items: center;
    transition: background 0.25s;
}
.tema-toggle .bolinha {
    width: 20px;
    height: 20px;
    background: white;
    border-radius: 50%;
    transition: transform 0.25s;
}

/* ======= TEMA ESCURO ======= */
.tema-escuro {
    background-color: #0f1720;
    color: #e9eef5;
}

.tema-escuro header {
    background-color: #0b1220;
}

.tema-escuro footer {
    background-color: #0b1220;
    color: #e9eef5;
}

.tema-escuro .conteudo-scroll {
    background: #111821;
    border-color: #2a3645;
}

.tema-escuro .bloco-item {
    border-color: #2a3645;
}

.tema-escuro .bloco-item h2 {
    color: #8db0ff;
}

.tema-escuro .tema-toggle {
    background: #374151;
}

.tema-escuro .tema-toggle .bolinha {
    transform: translateX(24px);
}
