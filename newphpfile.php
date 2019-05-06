<?php
var_dump(isset($_POST));
if (!isset($_POST) || !(isset($_GET['c']) && $_GET['c'] != ''))
die ('não ta indo');
$codigo=$_GET['c'];
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$aniversario=$_POST['aniversario'];
$cpf=str_replace(['.','-'],'', $_POST['cpf']);
$pdo = new PDO ('mysql:host=localhost;dbname=semana', 'root', '' );
$select = $pdo->prepare ("SELECT * FROM final WHERE cpf LIKE :cpf AND codigo <> :id");
$select->bindParam(':id',$codigo,PDO::PARAM_INT);
$select->bindParam(':cpf',$cpf,PDO::PARAM_STR);
$select->execute();
$result= $select->fetchAll (PDO::FETCH_ASSOC);
if(count($result)===1){
    $categoria=$_POST['categoria'];
    $senha=$_POST['senha'];
    $foto=$_POST['foto'];

    $sql='update final set nome=:nome, sobrenome=:sobrenome, aniversario=:aniversario, cpf=:cpf, categoria=:categoria, senha=:senha, foto=:foto where codigo=:codigo';
    $stmt= $pdo->prepare($sql);
    $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
    $stmt->bindParam(':sobrenome',$sobrenome,PDO::PARAM_STR);
    $stmt->bindParam(':aniversario',$aniversario,PDO::PARAM_STR);
    $stmt->bindParam(':cpf',$cpf,PDO::PARAM_STR);
    $stmt->bindParam(':categoria',$categoria,PDO::PARAM_STR);
    $stmt->bindParam(':senha',$senha,PDO::PARAM_STR);
    $stmt->bindParam(':foto',$foto,PDO::PARAM_STR);
    $stmt->bindParam(':codigo',$codigo,PDO::PARAM_INT);
    if ( $stmt-> execute())
    echo('Atualizado, você é foda.');
}
else{
    echo('="w"=');
}

?>