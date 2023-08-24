<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main class="container">
    <section class="column">
        <!-- inicia o php -->
        <?php
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // Validandos os campos do usuario
        
        if($email === "" || $senha === ""){

            $mensagem = "ERRO,tem campo vazio";
           

        }else{
            try{
                // Aqui estou estabelecendo uma conexão com o banco de dados
                $conexao = new PDO("mysql:dbname=projeto;host=localhost","root","");

                // Aqui vai validar Login e pegar as informações do usuario
                $statement = $conexao->prepare("SELECT * FROM aluno WHERE email = :email AND senha = md5(sha1(:senha))");
                $statement->bindParam(":email", $email);
                $statement->bindParam(":senha", $senha);

                $statement->execute();

                $aluno = $statement->fetch(PDO::FETCH_ASSOC);
                $id = $aluno['id'];
                $nomeAluno = $aluno['nomeAluno'];
                $email = $aluno['email'];
                $dataNascimento = $aluno['dataNascimento'];

                // Aqui esta filtrando as disciplinas que estão ligadas com o id do aluno e retornado em um vetor[]
                $statement2 = $conexao->prepare("SELECT aluno.nomeAluno, disciplina.nomeDisciplina,disciplina.horascurso
                FROM aluno JOIN matricula ON matricula.FK_aluno_id = aluno.id JOIN disciplina ON disciplina.id IN (matricula.FK_disciplina_id, matricula.FK_disciplina_id2, matricula.FK_disciplina_id3, matricula.FK_disciplina_id4)
                WHERE aluno.id = :id");
                $statement2->bindParam(":id", $id);

                $statement2->execute();
                
                $consulta = $statement2->fetchAll(PDO::FETCH_ASSOC);

                // Se caso não estiver vazio as consultas ele exibe as informações da conta,caso contrario esta vazio então ele não entra na conta
                if (!empty($aluno) && !empty($consulta)) {
                    $mensagem = "Logado com com sucesso!";

                    echo "<h1>Informações da conta do Aluno</h1>";
                    echo "<table border='1'>";
                    echo "<tr><th>RA</th><th>Nome</th><th>E-mail</th><th>Data de Nascimento</th></tr>";
                    
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$nomeAluno</td>";
                    echo "<td>$email</td>";
                    echo "<td>$dataNascimento</td>";
                    echo "</tr>";
                    echo "</table>";
                    
                    echo "<br>";
                    echo "<h1>Disciplina Matriculadas</h1>";
                    echo "<table border='1'>";
                    echo "<tr><th>Nome</th><th>Horas a Cumprir</th></tr>";
                    foreach($consulta as $disciplina){
                        // esse .$var. é para concatenar na tag html
                        echo "<tr>";
                        echo "<td>".$disciplina['nomeDisciplina']."</td>";
                        echo "<td>".$disciplina['horascurso']."</td>";
                        echo "</tr>";
                        }
                    echo "</table>";
                    }

                else {
                    header("Location: index.php");
                }
            }catch(PDOException $erro){
                echo "Ocorreu um erro".$erro->getMessage();
            }
        }
        ?>
        <!-- encerra o php -->
    </section>
    <!-- Javascript -->
<script>
var mensagem = "<?php echo $mensagem;?>";
alert(mensagem);
</script>

</body>
</html>