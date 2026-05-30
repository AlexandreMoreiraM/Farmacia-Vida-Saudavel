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
                <li><a href="../HTML/cadastro_remedio.php" class="nav-link active">Cadastro Remédios</a></li>
                <li><a href="../HTML/cadastro_funcionarios.php" class="nav-link">Cadastro Funcionários</a></li>
            </ul>
        </div>
    </nav>
</header>

<main class="main-wrapper">
    <section class="bg-image-section">
        <div class="bg-image" style="background-image: url('../IMG/Farmacia.jpg');"></div>

        <div class="hero-content">

            <h2>Cadastro de Remédios</h2>

            <form class="form-cadastro" action="../PHP/salvar_remedio.php" method="POST">

                <div class="form-row">
                    <div class="form-group">
                        <label>Nome do Remédio:</label>
                        <input type="text" name="nome" required>
                    </div>

                    <div class="form-group">
                        <label>Categoria:</label>
                        <select name="categoria" required>
                            <option value="">Selecione...</option>
                            <option value="Generico">Genérico</option>
                            <option value="Referencia">Referência</option>
                            <option value="Similar">Similar</option>
                            <option value="Manipulado">Manipulado</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Fabricante:</label>
                        <input type="text" name="fabricante">
                    </div>

                    <div class="form-group">
                        <label>Estoque:</label>
                        <input type="number" name="estoque" min="0">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Preço:</label>
                        <input type="number" name="preco" step="0.01" min="0">
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>

            </form>

            <div class="table-container">

                <h3>Remédios cadastrados</h3>

                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Fabricante</th>
                            <th>Estoque</th>
                            <th>Preço</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("../PHP/conexao.php");

                        $result = $conn->query("SELECT * FROM remedios");

                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['fabricante']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['estoque']) . "</td>";
                            echo "<td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
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
