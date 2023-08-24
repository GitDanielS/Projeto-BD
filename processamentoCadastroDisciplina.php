<?php
// Aqui esta pegando as informações digitadas na outra pagina utilizandoo $_GET['name do input']
$nome = $_POST["nome"];
$horas = $_POST["horas"];

// Validandos os campos do usuario
if($nome === "" || $horas === "" || $horas === 0){
    echo "<h1>ERRO no cadastro,tem campo vazio</h1>";

}else{
    try{
        //Estabelecendo uma conexão com o banco de dados
        $conexao = new PDO("mysql:dbname=projeto;host=localhost","root","");

        //Aqui vai inserir os dados no banco de dados
        $statement = $conexao->prepare("INSERT INTO disciplina VALUES(0,'$nome','$horas')");
        $statement->execute();

        // header("Location: index.php");
        echo "<h1>Cadastrado com sucesso</h1>";
        echo "<h1>Já pode matricular alunos e professores</h1>";

    }catch(PDOException $erro){
        echo "Ocorreu um erro".$erro->getMessage();
    }
}
?>