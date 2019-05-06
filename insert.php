<?php
if (!isset($_POST))
die ('não ta indo');
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$aniversario=$_POST['aniversario'];
$cpf=str_replace(['.','-'],'', $_POST['cpf']);
$pdo = new PDO ('mysql:host=localhost;dbname=semana', 'root', '' );
$select = $pdo->prepare ("SELECT * FROM final WHERE cpf LIKE :cpf");
$select->bindParam(':cpf',$cpf,PDO::PARAM_STR);
$select->execute();
$result= $select->fetchAll (PDO::FETCH_ASSOC);
if(count($result)===0){
$categoria=$_POST['categoria'];
$senha=$_POST['senha'];
$foto=$_POST['foto'];
$sql='insert into final values (null,:nome,:sobrenome,:aniversario,:cpf,:categoria,:senha,:foto)';
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
$stmt->bindParam(':sobrenome',$sobrenome,PDO::PARAM_STR);
$stmt->bindParam(':aniversario',$aniversario,PDO::PARAM_STR);
$stmt->bindParam(':cpf',$cpf,PDO::PARAM_STR);
$stmt->bindParam(':categoria',$categoria,PDO::PARAM_STR);
$stmt->bindParam(':senha',$senha,PDO::PARAM_STR);
$stmt->bindParam(':foto',$foto,PDO::PARAM_STR);
if($stmt->execute())
echo "Usuario cadastrado";
}
else{
    echo "Cpf já existe, por favor revise seus dados";
}
?>