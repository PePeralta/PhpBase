<?php
require 'config.php';

$nome = $_POST['nome'];
$idade = $_POST['idade'];

$url = $SUPABASE_URL . "/rest/v1/alunos";
$data = json_encode([
    "nome" => $nome,
    "idade" => $idade
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "apikey: $SUPABASE_KEY",
    "Authorization: Bearer $SUPABASE_KEY"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_exec($ch);
curl_close($ch);

echo "✅ Aluno guardado!";
echo "<br><a href='index.html'>Voltar</a>";
