<?php
// Aqui esta pegando as informações digitadas na outra pagina utilizandoo $_GET['e o name do input']
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$dataNascimento = $_POST["dataNascimento"];
$dataMatricula = $_POST["dataMatricula"];
$disciplina1 = $_POST["disciplina1"];
$disciplina2 = $_POST["disciplina2"];
$disciplina3 = $_POST["disciplina3"];
$disciplina4 = $_POST["disciplina4"];

// Validando as datas
$dataNascimentoV = strtotime($dataNascimento);
$dataMatriculaV = strtotime($dataMatricula);

// Validandos os campos do usuario

if($nome === "" || $email === "" || $senha === "" || $dataMatriculaV === false || $dataNascimentoV === false || $disciplina1 === "" || $disciplina2 === "" || $disciplina3 === "" || $disciplina4 === ""){
    echo "<h1>ERRO no cadastro,tem campo vazio</h1>";
}else{
    
    try{
        //Estabelecendo uma conexão com o banco de dados
        $conexao = new PDO("mysql:dbname=projeto;host=localhost","root","");
    
        //Aqui vai inserir os dados no banco de dados
        $statement1 = $conexao->prepare("INSERT INTO aluno VALUES(0,'$nome','$email',md5(sha1('$senha')),'$dataNascimento')");
        $statement1->execute();
        // lastInsertId pega o id inserido no ultimo INSERT
        $alunoId = $conexao->lastInsertId();
    
        $statement2 = $conexao->prepare("INSERT INTO matricula VALUES(0,'$nome','$dataMatricula','$alunoId','$disciplina1','$disciplina2','$disciplina3','$disciplina4')");
        $statement2->execute();
        
        // header("Location: index.php");
        echo "<h1>Cadastrado com sucesso</h1>";
        echo "<h1>Faça seu Login na Página Inicial,e veja as diciplinas matriculadas</h1>";

    }catch(PDOException $erro){
        echo "Ocorreu um erro".$erro->getMessage();
    }
}
?>