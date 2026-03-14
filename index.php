<?php
date_default_timezone_set('America/Sao_Paulo');

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $erroTamanho = false;

    if (strlen($usuario) < 4 || strlen($usuario) > 15) {
        $mensagem .= "Erro: o nome de usuário deve ter entre 4 e 15 caracteres.<br>";
        $erroTamanho = true;
    }

    if (strlen($senha) < 4 || strlen($senha) > 15) {
        $mensagem .= "Erro: a senha deve ter entre 4 e 15 caracteres.<br>";
        $erroTamanho = true;
    }

    if ($erroTamanho == false) {
        if (($usuario == "PROFESSOR" || $usuario == "COORDENADOR") && $senha == "DEVISATE") {
            $data = date("d/m/Y");
            $hora = date("H:i");
            $mensagem = "Bem-vindo, $usuario! Você realizou acesso às $hora no dia $data.";
        } elseif ($usuario != "PROFESSOR" && $usuario != "COORDENADOR" && $senha != "DEVISATE") {
            $mensagem = "Erro: nome de usuário e senha inválidos.";
        } elseif ($usuario != "PROFESSOR" && $usuario != "COORDENADOR") {
            $mensagem = "Erro: nome de usuário inválido.";
        } else {
            $mensagem = "Erro: senha incorreta.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario" required>
        <br>
        <label>Senha: </label>
        <input type="password" name="senha" required>
        <br>
        <button type="submit">Entrar</button>
    </form>

    <p><b><?php echo $mensagem; ?></b></p>

</body>
</html>