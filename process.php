<?php
session_start();

// Usuários e senhas para verificação
$usuarios = [
    'admin' => 'senha123',
    'usuario' => 'senha456'
];

// Processar login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = explode('@', $email)[0]; // Extrai o nome de usuário do email

    // Verifica se o usuário existe e se a senha está correta
    if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $senha) {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php"); // Redireciona para index.php após login bem-sucedido
        exit();
    } else {
        echo "Login inválido!";
    }
}

// Processar montagem do computador
if (isset($_POST['montar'])) {
    // Preços definidos
    $precosCpu = [
        'i5-1135G7' => 1000,
        'i7-1165G7' => 1500,
        'i9-11900H' => 2000,
        'i9-11980HK' => 2500
    ];

    $precosMemoria = [
        '8GB' => 150,
        '16GB' => 240,
        '32GB' => 800,
        '64GB' => 1200
    ];

    $precosHd = [
        '512GB' => 470,
        '1TB' => 680,
        '2TB' => 680,
        '4TB' => 1200
    ];

    $precosSo = [
        'Windows 11 Home' => 200,
        'Windows 11 Pro' => 300,
        'Linux' => 0,
        'MacOS' => 400
    ];

    // Preços dos monitores e telas de notebook
    $precosMonitor = [
        'monitor1' => 400, // Monitor 21"
        'monitor2' => 600,  // Monitor 24"
        'monitor3' => 299, // Monitor 18"
        'monitor4' => 350 // Monitor 15"
    ];

    $precosTela = [
        '14' => 250,  // Tela 14"
        '16' => 500   // Tela 16"
    ];

    // Receber os valores do formulário
    $tipo = $_POST['tipo']; // desktop ou notebook
    $cpu = $_POST['cpu'];
    $memoria = $_POST['memoria'];
    $hd = $_POST['hd'];
    $so = $_POST['so'];

    // Inicia o valor total com base nas seleções
    $valorTotal = $precosCpu[$cpu] + $precosMemoria[$memoria] + $precosHd[$hd] + $precosSo[$so];

    // Verifica se é desktop ou notebook para adicionar monitor ou tela
    if ($tipo === 'desktop' && isset($_POST['monitor'])) {
        $monitor = $_POST['monitor'];
        $valorTotal += $precosMonitor[$monitor]; // Adiciona o preço do monitor
    } elseif ($tipo === 'notebook' && isset($_POST['tela'])) {
        $tela = $_POST['tela'];
        $valorTotal += $precosTela[$tela]; // Adiciona o preço da tela
    }

    // Estrutura HTML para o layout do resumo
    echo '<!DOCTYPE html>';
    echo '<html lang="pt-BR">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Resumo da Montagem</title>';
    echo '<link rel="stylesheet" href="style.css">';
    echo '</head>';
    echo '<body>';

    echo '<header>';
    echo '<h1>GL Tech Imports</h1>';
    echo '</header>';

    echo '<main>';
    echo '<section>';
    echo '<h2>Resumo da Montagem</h2>';
    echo "<p>Tipo: " . ucfirst($tipo) . "</p>";
    echo "<p>Processador: " . $cpu . " - R$" . $precosCpu[$cpu] . "</p>";
    echo "<p>Memória: " . $memoria . " - R$" . $precosMemoria[$memoria] . "</p>";
    echo "<p>Armazenamento: " . $hd . " - R$" . $precosHd[$hd] . "</p>";
    echo "<p>Sistema Operacional: " . $so . " - R$" . $precosSo[$so] . "</p>";

    if ($tipo === 'desktop') {
        echo "<p>Monitor: " . $monitor . " - R$" . $precosMonitor[$monitor] . "</p>";
    } elseif ($tipo === 'notebook') {
        echo "<p>Tela: " . $tela . " - R$" . $precosTela[$tela] . "</p>";
    }

    echo "<h3>Valor Total: R$" . $valorTotal . "</h3>";
    echo '<h3> Desenvolvido por &copy GL Tech Systems <i>Gabriel Levi</i></h3>';
    echo '</section>';
    echo '</main>';

    echo '</body>';
    echo '</html>';
}
?>
