<?php 
// -------------CONEXÃO --------------
try{
    //$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $pdo = new PDO("mysql:dbname=CRUDPDO;host=localhost;", "usuario", "", $options);
} 
//erros do pdo
catch(PDOException $e) {
    echo "Erro com o banco de dados: " . $e-> getMessage();
} 
//erros fora da database
catch (Exception $e) {
    echo "Erro genérico: " . $e-> getMessage();
}


// ----------- INSERT  (CREATE)------------------
//1 forma
// $res = $pdo-> prepare("INSERT INTO pessoa(nome, telefone, email)values(:n, :t, :e)");

// $res-> bindValue(":n", "Pedroca");
// $res-> bindValue(":t", "1134062088");
// $res-> bindValue(":e", "teste@gmail.com");
// $res-> execute();

// //2 forma
// $pdo-> query("INSERT INTO pessoa(nome, telefone, email)VALUES('carlos', '11553455', 'carlete@gmail.com')");

// --------------- DELETE -----------------
// $cmd = $pdo-> prepare("DELETE FROM pessoa WHERE id = :id ");
// $id = 2;
// $cmd-> bindValue(":id", $id);
// $cmd-> execute();

// $cmd = $pdo-> query("DELETE FROM pessoa WHERE id = '4' ");

// -------------- UPDATE --------------
// $cmd = $pdo-> prepare("UPDATE pessoa SET email = :e WHERE id = :id");
// $cmd-> bindValue(":e", "Pedroca@gmail.com");
// $cmd -> bindValue(":id", "1");
// $cmd -> execute();

// $cmd = $pdo-> query("UPDATE pessoa SET email = 'pedrin@gmail.com' WHERE id = 1");

// ------------ SELECT  ---------------
$cmd = $pdo-> prepare("SELECT * FROM pessoa WHERE id = :id");
$cmd->bindValue(":id", "3");
$cmd->execute();

$result = $cmd-> fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($result);
echo "</pre>";

//listagem na tela
foreach($result as $key => $value){
    echo "Campo: $key <br>";
    echo "Valor: $value <br>";
    echo "<br>";    
}



?>