<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro de Alunos</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header><h1>Cadastro de Aluno</h1></header>
    <main class="container">
   <section class="column">
   <form action="processamentoCadastroAluno.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Insira seu Nome Completo" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" placeholder="exemplo.@gmail" required>
        <br>
        <label>Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <label>Data de Nascimento:</label>
        <input type="date" name="dataNascimento" required>
        <br>
        <label>Data de Matricula:</label>
        <input type="date" name="dataMatricula" required>
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
        // Cada um desses são os select com as materias registradas no banco de dados
        ?>
        <p>Escolha a primeira disciplina</p>
        <select name="disciplina1" required>
        <?php foreach ($resultadoConsulta as $disciplina) { ?>
        <option value="<?php echo $disciplina['id']; ?>">
            <?php echo $disciplina['nomeDisciplina']; ?>
        </option>
        <?php } ?>
        </select>
        <br>
        <p>Escolha a segunda disciplina</p>
        <select name="disciplina2" required>
        <?php foreach ($resultadoConsulta as $disciplina) { ?>
        <option value="<?php echo $disciplina['id']; ?>">
            <?php echo $disciplina['nomeDisciplina']; ?>
        </option>
        <?php } ?>
        </select>
        <p>Escolha a terceira disciplina</p>
        <select name="disciplina3" required>
        <?php foreach ($resultadoConsulta as $disciplina) { ?>
        <option value="<?php echo $disciplina['id']; ?>">
            <?php echo $disciplina['nomeDisciplina']; ?>
        </option>
        <?php } ?>
        </select>
        <p>Escolha a quarta disciplina</p>
        <select name="disciplina4" required>
        <?php foreach ($resultadoConsulta as $disciplina) { ?>
        <option value="<?php echo $disciplina['id']; ?>">
            <?php echo $disciplina['nomeDisciplina']; ?>
        </option>
        <?php } ?>
        </select>
        <input type="submit" value="Matricular">
    </form>
   </section>
    
</body>
</html>