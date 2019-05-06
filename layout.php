<?php
$conection=new  PDO ('mysql:host=localhost;dbname=semana', 'root', '' );
$select = $conection->prepare ("SELECT * FROM final");
$select->execute();
$result= $select->fetchAll (PDO::FETCH_ASSOC);
?>

<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> É agora  </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
    <body>
            
        <div class="container-fluid">
            <div class="row mt-1">
                <div class="col-sm-12">
                        <a href="formulario.php" target="_blank"> <button type="button" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Adicionar </button> </a>
                        <div class="input-group-prepend">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class= "fas fa-search"></i></span>
                        <input type="text" class="form-control Pesquisar" placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon1">
</div>


                </div>
            </div>
        <div class="row mt-3">
            <div class="col-md-12 col-lg-6">
                <table class="table">
                    <thead>
                        <tr>
                        
                            <th scope="col" width="10">Nome</th>
                            <th scope="col" width="10">Sobrenome</th>
                            <th scope="col" width="20">Nascimento</th>
                            <th scope="col" width="40"> CPF</th>
                            <th scope="col" width="10">Categoria</th>
                            <th scope="col" width="10">foto</th>
            
                            
                        </tr>
                    </thead>
                    <tbody id="dados-tabela">
                    <?php
                         foreach ($result as $coisa) 
                         {
                            ?>
                             <tr>
                             
                             <td><?php echo $coisa['nome']; ?>  </td>
                             <td><?php echo $coisa['sobrenome']; ?> </td>
                             <td><?php echo $coisa['aniversario']; ?> </td>
                             <td><?php echo $coisa['cpf']; ?> </td>
                             <td><?php echo $coisa['categoria']; ?> </td>
                             <td><?php echo $coisa['foto']; ?>  <img src="empty-user-masc.png" class="img-fluid img-thumbnail button" data-add="<?php echo $coisa['codigo'];?>"> </td>
                            </tr>
                         <?php
                         } 
                         ?>
                        
                        
                        </tbody>
               
                </table>
                        </div>
                <div class="col-md-12 col-lg-6">
                        <div class="card w-100">
                            <h5 class="card-header text-center" id="name-user"></h5>
                            <div class="card-body">
                        
                            <div id="nome"> </div>
                            <div id="sobrenome"> </div>
                            <div id="nascimento"> </div>
                            <div id="cpf" > </div>
                            <div id="categoria"> </div>
                            <div id="foto"> </div>
            
                            
                            <img src="" id="foto-user">
                            </div>
                            <div class="card-footer">
                                <div class="text-right"> 
                                        <a href="formulario.php" class="btn btn-outline-info" id="editar"><i class="fas fa-user-edit"></i> Editar</a>
                                        <a href="delete.php" class="btn btn-outline-danger" id="deletar"><i class="fas fa-user-minus"></i> Deletar</a>
           
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
        </div>
        
                        </div>
        </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script> $(".button").click(function(){

        var coisa_um= $(this).parent().parent();
        coisa_um = coisa_um.children();
        console.log(coisa_um);
        $("#nome").html($(coisa_um[0]).html());
        $("#sobrenome").html($(coisa_um[1]).html());
        $("#nascimento").html($(coisa_um[2]).html());
        $("#cpf").html($(coisa_um[3]).html());
        $("#categoria").html($(coisa_um[4]).html());
        $("#editar").attr("href", "formulario.php?c=" +$(this).data("add"));
        $("#deletar").attr("href", "delete.php?c=" +$(this).data("add"));
        $("#foto-user").attr("src", $(this).attr("src"));


    }); </script>
</body>
</html>