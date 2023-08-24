<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Disciplina</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header><h1>Cadastro de Disciplina</h1></header>
    <main class="container">
    <section class="column">
    <form action="processamentoCadastroDisciplina.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Insira o nome da disciplina" required>
        <br>
        <label>Horas de curso:</label>
        <input type="number" name="horas" min="10" required>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
    </section>
</body>
</html>