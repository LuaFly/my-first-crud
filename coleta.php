<?php
$conection=new  PDO ('mysql:host=localhost;dbname=semana', 'root', '' );
$sql='select * from banco';
$stmt = $conection->query($sql);
$result=$stmt->fetchAll();
echo json_encode($result);
?>