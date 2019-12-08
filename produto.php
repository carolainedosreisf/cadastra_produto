<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Projeto de PHP 02</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<?php require "conexao.php"; ?>

</head>

<body>


<?php

    $id = $_GET['prod_id'];
    $sql = "SELECT * FROM produtos WHERE id = '$id'";
    $con = mysqli_query($conexao, $sql);
    while ($res = mysqli_fetch_assoc($con)){
            
?>
    <div class="container margin">
        <div class="row">
            <div class="col-md-6 imagem-prod">
                <img src="<?php echo $res['imagem']?>">
            </div>
            <div class="col-md-6">
                <h4><?php echo $res['titulo']?></h4>
                
                <p><?php echo $res['descricao']?></p>
            </div>
            
        </div>
    </div>
<?php 
    }
    
?>