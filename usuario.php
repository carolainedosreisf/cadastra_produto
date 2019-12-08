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
    
<div class="section-title">
    <h3>Produtos</h3>
</div>
    <div id="about" class="section wb">
        <div class="container">
           <div class="row">
           <?php
                    
                    $sql_sel_prod = "SELECT * FROM produtos ORDER BY id DESC";
                    $con_sel_prod = mysqli_query($conexao, $sql_sel_prod);
                    if(mysqli_num_rows($con_sel_prod) == ''){
                        echo "No momento não existe produtos cadastrados";
                    }else{
                ?>
                <?php while($res_sel_prod = mysqli_fetch_assoc($con_sel_prod)){
                    
                ?>
				<div class="col-md-4 col-sm-6">
                    <a href="produto.php?prod_id=<?php echo $res_sel_prod['id'];?>">
                        <div class="about-item about-item2">
                            <div class="about-ico">
                                <img src="<?php echo $res_sel_prod['imagem']?>">
                            </div>
                            <div class="blog-text">
                                <h3><?php echo $res_sel_prod['titulo']?></h3>
                                <span class="posted_on">Mais detalhes >></span>
                            </div> 
                        </div>
                    </a>
                </div>
                <?php 
                        }
                    }
                ?>
				
			</div>
        </div><!-- end container -->
    </div><!-- end section -->
    
    
<script>
    var modal_mensagem = document.querySelector('.modal-fora');
    
    $(document).ready(function(){
        $(".fechar").click(function(){
            //modal_mensagem.style.display ='none';
            window.location = "usuario.php";
        });
    });
</script>
</body>
</html>