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
