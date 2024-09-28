<?php
session_start();

// Verifica se o usuário está logado
$loggedIn = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GL Tech Imports</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS atualizado para ajustar as imagens */
        img {
            width: 200px; /* Tamanho uniforme para ambas as imagens */
            height: auto; /* Mantém a proporção */
        }
    </style>
</head>

<body>
    <header>
        <h1>GL Tech Imports</h1>
    </header>

    <main>
        <!-- Seção de Login (aparece apenas se o usuário não estiver logado) -->
        <?php if (!$loggedIn): ?>
        <section id="login">
            <h2>Login</h2>
            <form method="post" action="process.php">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>
                <button type="submit" name="login">Logar</button>
            </form>
        </section>
        <?php else: ?>
        <!-- Seção de Montagem (aparece após o login bem-sucedido) -->
        <section id="montagem">
            <h2>Montagem de Computador</h2>
            <form method="post" action="process.php" id="form-montagem">
                <h3>Escolha o tipo de computador:</h3>
                <input type="radio" id="desktop" name="tipo" value="desktop" required>
                <img src="./img/pc.jpg" alt="pc">
                <label for="desktop">Desktop</label><br>
                <input type="radio" id="notebook" name="tipo" value="notebook" required>
                <img src="./img/notebook.jpg" alt="notebook">
                <label for="notebook">Notebook</label><br><br>

                <!-- Seção de monitores ou telas de notebook -->
                <div id="opcoes-extras" style="display: none;">
                    <h3>Escolha uma opção adicional:</h3>
                    <div id="opcoes-desktop" style="display: none;">
                        <label for="monitor">Monitor:</label>
                        <select id="monitor" name="monitor">
                            <option value="monitor1">Monitor 21" - R$400,00</option>
                            <option value="monitor2">Monitor 24" - R$600,00</option>
                            <option value="monitor3">Monitor 18" - R$299,00</option>
                            <option value="monitor">Monitor 15" - R$350,00</option>
                        </select><br><br>
                    </div>
                    <div id="opcoes-notebook" style="display: none;">
                        <label for="tela">Tela:</label>
                        <select id="tela" name="tela">
                            <option value="14">14" - R$250,00</option>
                            <option value="16">16" - R$500,00</option>
                        </select><br><br>
                    </div>
                </div>

                <h3>Selecione as opções:</h3>
                <!-- Restante do formulário -->
                <label for="cpu-select">Processador:</label>
                <select id="cpu-select" name="cpu" required>
                    <option value="i5-1135G7">i5-1135G7 - R$1000,00</option>
                    <option value="i7-1165G7">i7-1165G7 - R$1500,00</option>
                    <option value="i9-11900H">i9-11900H - R$2000,00</option>
                    <option value="i9-11980HK">i9-11980HK - R$2500,00</option>
                </select><br>

                <label for="memoria-select">Memória:</label>
                <select id="memoria-select" name="memoria" required>
                    <option value="8GB">8GB DDR4 - R$150,00</option>
                    <option value="16GB">16GB DDR4 - R$240,00</option>
                    <option value="32GB">32GB DDR4 - R$800,00</option>
                    <option value="64GB">64GB DDR4 - R$1200,00</option>
                </select><br>

                <label for="hd-select">Armazenamento:</label>
                <select id="hd-select" name="hd" required>
                    <option value="512GB">512GB SSD - R$470,00</option>
                    <option value="1TB">1TB SSD - R$680,00</option>
                    <option value="2TB">2TB HDD - R$680,00</option>
                    <option value="4TB">4TB HDD - R$1200,00</option>
                </select><br>

                <label for="so-select">Sistema Operacional:</label>
                <select id="so-select" name="so" required>
                    <option value="Windows 11 Home">Windows 11 Home - R$200,00</option>
                    <option value="Windows 11 Pro">Windows 11 Pro - R$300,00</option>
                    <option value="Linux">Linux - R$0,00</option>
                    <option value="MacOS">MacOS - R$400,00</option>
                </select><br>

                <button type="submit" name="montar">Montar Computador</button>
            </form>
        </section>

        <!-- Script para exibir monitores ou telas com base na escolha -->
        <script>
            document.querySelectorAll('input[name="tipo"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const extras = document.getElementById('opcoes-extras');
                    const desktopOptions = document.getElementById('opcoes-desktop');
                    const notebookOptions = document.getElementById('opcoes-notebook');

                    if (this.value === 'desktop') {
                        extras.style.display = 'block';
                        desktopOptions.style.display = 'block';
                        notebookOptions.style.display = 'none';
                    } else if (this.value === 'notebook') {
                        extras.style.display = 'block';
                        desktopOptions.style.display = 'none';
                        notebookOptions.style.display = 'block';
                    }
                });
            });
        </script>
        <?php endif; ?>
    </main>
</body>

</html>
