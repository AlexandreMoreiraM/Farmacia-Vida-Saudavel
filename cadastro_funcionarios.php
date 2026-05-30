<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Vida Saudável</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

<header>
    <nav class="navbar">
        <div class="nav-container">
            <h1 class="logo">Farmácia Vida Saudável</h1>
            <ul class="nav-menu">
                <li><a href="../HTML/index.html" class="nav-link">Início</a></li>
                <li><a href="../HTML/cadastro_remedio.php" class="nav-link">Cadastro Remédios</a></li>
                <li><a href="../HTML/cadastro_funcionarios.php" class="nav-link active">Cadastro Funcionários</a></li>
            </ul>
        </div>
    </nav>
</header>

<main class="main-wrapper">
    <section class="bg-image-section">
        <div class="bg-image" style="background-image: url('../IMG/Farmacia.jpg');"></div>

        <div class="hero-content">

            <h2>Cadastro de Funcionários</h2>

            <form class="form-cadastro" action="../PHP/salvar_funcionario.php" method="POST">

                <div class="form-row">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="nome" required>
                    </div>

                    <div class="form-group">
                        <label>Cargo:</label>
                        <select name="cargo" required>
                            <option value="">Selecione...</option>
                            <option value="Farmaceutico">Farmacêutico</option>
                            <option value="Tecnico de Farmacia">Técnico</option>
                            <option value="Atendente">Atendente</option>
                            <option value="Gerente">Gerente</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>CPF:</label>
                        <input type="text" name="cpf" required>
                    </div>

                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="text" name="telefone">
                    </div>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email">
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>

            </form>

            <div class="table-container">

                <h3>Funcionários cadastrados</h3>

                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("../PHP/conexao.php");

                        $result = $conn->query("SELECT * FROM funcionarios");

                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['cargo']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['cpf']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>
    </section>
</main>

<footer class="footer">
    <p>© 2026 Farmácia Vida Saudável</p>
</footer>

</body>
</html>
