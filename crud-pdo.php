<?php 
try{
    //conexão
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


?>