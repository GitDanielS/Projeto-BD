<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Cadastro</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header><h1>Cadastro de Professores</h1></header>
    <main class="container">
       <section class="column">
       <form action="processamentoCadastroProfessor.php" method="POST">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Insira seu nome completo" required>
            <br>
            <label>Email: </label>
            <input type="email" name="email" placeholder="Insira seu email" required>
            <br>
            <label>Senha</label>
            <input type="password" name="senha" required>
            <br>
            <label>Data de Nascimento: </label>
            <input type="date" name="dataNascimento" required>
            <br>
            <?php
            try{
                // Aqui estou fazendo uma consulta e retornando em um vetor para exibir a chave primaria e o nome da disciplina em um select e option
                $conexao = new PDO("mysql:dbname=projeto;host=localhost","root","");
                $statement = $conexao->prepare("SELECT id,nomeDisciplina FROM disciplina");
                $statement->execute();
                $resultadoConsulta = $statement->fetchAll(PDO::FETCH_ASSOC);

            }catch(PDOException $erro){
                echo "ocorre um erro".$erro->getMessage();
            }
            ?>
            <select name="disciplina" required>
            <?php foreach ($resultadoConsulta as $disciplina) { ?>
            <option value="<?php echo $disciplina['id']; ?>">
                <?php echo $disciplina['nomeDisciplina']; ?>
            </option>
            <?php } ?>
            
            </select>
            <input type="submit" value="Cadastrar">
        </form>
       </section>
</body>
</html>