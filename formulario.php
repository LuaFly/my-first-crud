<?php 
$id = 0;
if(isset($_GET['c'])&& $_GET['c']!=''){
    $id=$_GET['c'];
    $pdo=new PDO ('mysql:host=localhost;dbname=semana', 'root', '' );
    $select = $pdo->prepare ("SELECT * FROM final WHERE codigo = :codigo");
    $select->bindParam(':codigo',$id,PDO::PARAM_STR);
    $select->execute();
    $result= $select->fetchAll (PDO::FETCH_ASSOC);
}
?>
<html>

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Formulario  </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
</head>
    <body>
        <form action="<?php echo ($id !=0)? 'newphpfile.php?c='.$id:'insert.php';?>" method="POST">
        <table>
            <div id="form" >
                <div class="col-sm-12">
        <tr >
                
                <button type="button" class="btn btn-primary"> <i class="fas fa-user-tag"></i> Cadastro de Pessoa </button> 
    
        </tr>

        </div>
                 <tr>
                <td>Nome  </td>
                <td> <input type="text" name="nome" class="name"> </td>
            </tr>
            <tr>
                <td> Sobrenome</td>
                <td> <input type="text" name="sobrenome" class="sobrenome"></td>
            </tr>
            <tr> 
                <td> Aniversario</td>
                <td> <input type="date" name="aniversario" class="aniversario"></td>
            </tr>
            <tr>
                <td> CPF</td>
                <td><input type="text" name="cpf" class="cpf"></td>
            </tr>
            <tr>
                <td> Categoria </td>
                <td>
                    <select name="categoria">
                        <option value="1"  (idGroup='1')>Cliente  </option>
                        <option value="2"  (idGroup='2')> Motorista </option>
                        <option value="3"  (idGroup='3')>Funcionario </option>
                        <option value="4"  (idGroup='4')>Vip  </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input type="text" name="senha" class="senha"> </td>
            </tr>
            <tr>
            <td> Foto </td>
            <td colspan="2">
                <input type="file" name="foto" value="foto" value="<?php echo $foto;?>">
            </td>
        </tr>
            </div>
            <td colspan="2" > <input type="submit" name="enviar" href="insert.php" target="blank"> </td> <br/>
            <tr>
            <td colspan="2">
                <input type="submit"  value="<?php echo ($id!= 0) ? 'Atualizar cliente' : 'Cadastrar cliente';?>" name="Cadastrar Cliente" >

            </td>
        </tr>
        </table>
        </form>
        </body>
        </html>