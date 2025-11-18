<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // URL do Apps Script
    $url = "https://script.google.com/macros/s/AKfycby8-UzNmWk6_t1wKGOySCfTmaGgMD8H9DDzIxIZslXKIY28T26SGa2rRRWbPHf_YiL7/exec";

    // Captura todos os campos enviados
    $data = [];
    foreach ($_POST as $campo => $valor) {
        $data[$campo] = trim($valor);
    }

    // Inicializa cURL
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // evita travamento

    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    // Erros de cURL
    if ($curl_error) {
        echo "<p style='color:red;'>Erro ao conectar com o Google Apps Script:</p>";
        echo "<pre>$curl_error</pre>";
        exit;
    }

    // Erro HTTP
    if ($http_code !== 200) {
        echo "<p style='color:red;'>Erro ao enviar dados. Código HTTP: $http_code</p>";
        echo "<pre>" . htmlspecialchars($response) . "</pre>";
        exit;
    }

    // Sucesso
    echo "<p style='color:green;'>Dados enviados para a planilha com sucesso!</p>";
    echo "<pre>" . htmlspecialchars($response) . "</pre>";

} else {
    echo "<p>Nenhum dado foi enviado.</p>";
}
?>


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
