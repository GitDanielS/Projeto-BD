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
            
            $mensagem = "ERRO,tem valor indefinido";

        }else{

            try{
                // Aqui estou estabelecendo uma conexão com o banco de dados
                $conexao = new PDO("mysql:dbname=projeto;host=localhost","root","");

                // Aqui vai validar Login e pegar as informações do usuario
                $statement = $conexao->prepare("SELECT * FROM professor WHERE email = :email AND senha = md5(sha1(:senha))");
                $statement->bindParam(":email", $email);
                $statement->bindParam(":senha", $senha);

                $statement->execute();
                
                $professor = $statement->fetch(PDO::FETCH_ASSOC);
                $id = $professor['id'];
                $nomeProfessor = $professor['nomeProfessor'];
                $email = $professor['email'];
                $dataNascimento= $professor['dataNascimento'];
    
                // Aqui vai filtrar os alunos que estão ligados com a id do professor e retornar em um vetor[]
                $statement2 =$conexao ->prepare("SELECT aluno.nomeAluno
                FROM aluno JOIN matricula ON aluno.id = matricula.FK_aluno_id
                JOIN disciplina ON disciplina.id IN (matricula.FK_disciplina_id, matricula.FK_disciplina_id2, matricula.FK_disciplina_id3, matricula.FK_disciplina_id4)
                JOIN professor ON professor.FK_disciplina_id = disciplina.id
                WHERE professor.id = :id ");
                $statement2 ->bindParam(":id", $id);
                $statement2 -> execute();
                $consulta = $statement2 ->fetchAll(PDO::FETCH_ASSOC);
    
                // Aqui estou procurando o nome da disciplina que esta ligado com o id do professor
                $statement3 = $conexao->prepare("SELECT * FROM professor,disciplina WHERE  email = :email AND senha = md5(sha1(:senha))
                AND professor.FK_disciplina_id = disciplina.id");
                $statement3->bindParam(":email", $email);
                $statement3->bindParam(":senha", $senha);
                $statement3 ->execute();
                $disciplina = $statement3 ->fetch(PDO::FETCH_ASSOC);
                $nomeDisciplina = $disciplina['nomeDisciplina'];
    
                // Se caso não estiver vazio as consultas ele exibe as informações da conta,caso contrario esta vazio então ele não entra na conta
                if (!empty($professor) && !empty($consulta)) {
                    $mensagem = "Logado com com sucesso!";

                    echo "<h1>Informações da conta do Professor</h1>";
                    echo "<table border='1'>";
                    echo "<tr><th>RA</th><th>Nome</th><th>E-mail</th><th>Data de Nascimento</th><th>Disciplina</th></tr>";
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$nomeProfessor</td>";
                    echo "<td>$email</td>";
                    echo "<td>$dataNascimento</td>";
                    echo "<td>$nomeDisciplina</td>";
                    echo "</tr>";
                    echo "</table>";
    
                    echo "<h1>Alunos Matriculados</h1>";
                    echo "<table border='1'>";
                    echo "<tr><th>Nome</th>";
                    foreach ($consulta as $row) {
                        echo "<tr>";
                        echo "<td>".$row['nomeAluno']."</td>";
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