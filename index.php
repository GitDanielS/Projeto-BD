<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <h1>Página Inicial</h1>
    </header>
    <nav>
        <ul>
            <li><a href="cadastrarAluno.php">Cadastro de Alunos</a></li>
            <li><a href="cadastrarProfessor.php">Cadastro de Professor</a></li>
            <li><a href="cadastrarDisciplina.php">Cadastro de Disciplina(MEC)</a></li>
        </ul>
    </nav>

    <main class="container">

    <section class=column>
            <h1>Acesso dos Alunos</h1>
            <form action="processarLoginAluno.php" method="POST">
                <label>Email:</label>
                <input type="text" name="email" placeholder="Insira seu email" required>
                <br>
                <label>Senha:</label>
                <input type="password" name="senha" required>
                <br>
                <input type="submit" value="Login">
            </form>
        </section>

        <section class=column>
            <h1>Acesso de Professores</h1>
            <form action="processarLoginProfessor.php" method="POST">
                <label>Email:</label>
                <input type="text" name="email" placeholder="Insira seu email" required>
                <br>
                <label>Senha:</label>
                <input type="password" name="senha" required>
                <br>
                <input type="submit" value="Login">
            </form>
        </section>

</body>
</html>