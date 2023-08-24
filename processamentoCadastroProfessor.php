<?php
// Aqui esta pegando as informações digitadas na outra pagina utilizandoo $_GET['name do input']
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$dataNascimento = $_POST["dataNascimento"];
$disciplina = $_POST["disciplina"];

// Validando a dataNascimento
$dataNascimentoV = strtotime($dataNascimento);

// Validandos os campos do usuario

if($nome === "" || $email === "" || $senha === "" || $dataNascimentoV === false || $disciplina === ""){
    echo "<h1>ERRO no cadastro,tem campo vazio</h1>";
    
}else{

    try{
        //Estabelecendo uma conexão com o banco de dados
        $conexao = new PDO("mysql:dbname=projeto;host=localhost","root","");

        //Aqui vai inserir os dados no banco de dados
        $statement = $conexao->prepare("INSERT INTO professor VALUES(0,'$nome','$email',md5(sha1('$senha')),'$dataNascimento','$disciplina')");

        $statement->execute();
        
        // header("Location: index.php");
        echo "<h1>Cadastrado com sucesso</h1>";
        echo "<h1>Faça seu login e veja os alunos matriculados na sua disciplina</h1>";

    }catch(PDOException $erro){
        echo "Ocorreu um erro".$erro->getMessage();
    }

}
?>