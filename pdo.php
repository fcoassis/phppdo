<?php

try{
	$conexao = new \PDO("mysql:host=localhost;dbname=pdo","root");
	
	$query = "Select * from alunos";
	
	echo "Listagem de todos os alunos: \n\n";
	foreach ($conexao->query($query) as $alunos) {
		echo $alunos['nome']."=".$alunos['nota']. "<br>";
	}
		
	echo "<br>Listagem das 3 maiores notas<br>";
	
	$stmt = $conexao->query($query);	
	$resultado = $stmt->fetchAll(PDO::FETCH_CLASS);
	rsort($resultado);
	$num = 3;
	
	for ($i=0; $i <$num ; $i++) { 
		echo $resultado[$i]->nome."=".$resultado[$i]->nota."<br>";
	}
	
}
catch(\PDOException $e){
	echo "Não foi possível estabelecer a conexão com o banco de dados";
}

?>
