<?php 
// -------------CONEXÃO --------------
try{
    $pdo = new PDO("mysql:dbname=CRUDPDO;host=localhost;", "usuario", "");
} 
//erros do pdo
catch(PDOException $e) {
    echo "Erro com o banco de dados: " . $e-> getMessage();
} 
//erros fora da database
catch (Exception $e) {
    echo "Erro genérico: " . $e-> getMessage();
}


// ----------- INSERT ------------------
//1 forma
$res = $pdo-> prepare("INSERT INTO pessoa(nome, telefone, email)values(:n, :t, :e)");

$res-> bindValue(":n", "Pedroca");
$res-> bindValue(":t", "1134062088");
$res-> bindValue(":e", "teste@gmail.com");
$res-> execute();

//2 forma
$pdo-> query("INSERT INTO pessoa(nome, telefone, email)VALUES('carlos', '11553455', 'carlete@gmail.com')");


?>