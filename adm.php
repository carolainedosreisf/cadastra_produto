<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Projeto de PHP 02</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href=""/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>



<?php require "conexao.php"; ?>
<?php
    $pagination = $_GET['pagination'];
    
    if ( $pagination == ''){
        header('Location: adm.php?pagination=1');
        exit;
    }

?>
<script>
    var pagination = "<?php print $pagination; ?>"; 
</script>

</head>

<body>

<!--  Aqui começa o exemplo -->
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                    <form action="" class="listar" method="POST">
                        <span>Qtd. listada por página: </span>
                        <select name="listagem" id="" class="listagem">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                        <button class="btn btn-default btn-listar" name="listar" type="submit">Listar</button>
                    </form>
                        
                    </div>
                    <div class="text-right col-md-6">
                        <a href="adm.php?pagination=1&func=cadastra" class="mensagem"><button class="btn-abrir btn_nv_prod"><i class="" aria-hidden="true">Cadastrar novo produto</i></button></a>
                    </div>
                </div>
            
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nome do produto</th>
                        <th>Caminho da imagem</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                    <?php 
                        $cont=0;
                        $sql_cont_prod = "SELECT * FROM produtos ORDER BY id DESC";
                        $con_cont_prod = mysqli_query($conexao, $sql_cont_prod);
                        $sql_sel_list = "SELECT * FROM listar WHERE id = '0'";
                        $con_sel_list = mysqli_query($conexao, $sql_sel_list);
                        while($res_cont_prod = mysqli_fetch_assoc($con_cont_prod)){
                            $cont = $cont + 1;
                        }
                        while ($res_sel_list= mysqli_fetch_assoc($con_sel_list)){
                            $quant = $res_sel_list['listagem'];

                        $paginas = ceil($cont / $quant);
                        $inicio = 0 - $quant; 
                        $fim = ($paginas * $quant) - ($quant + 1);
                        $y =$inicio;
                        $z = 0;
                        while($y <= $fim){
                            $y = $y + $quant;
                            $z++;
                            $sql_exibe_prod = "SELECT * FROM produtos ORDER BY id DESC LIMIT $y,$quant ";
                            $con_exibe_prod = mysqli_query($conexao, $sql_exibe_prod); 
                    ?>
                        <tbody class="paginacao pagination<?php echo $z;?>">
                            <?php
                                while($res_exibe_prod = mysqli_fetch_assoc($con_exibe_prod)){
                            ?>
                            <tr>
                                <td><?php echo $res_exibe_prod['titulo']; ?></td>
                                <td><?php echo $res_exibe_prod['imagem']; ?></td>
                                <td>
                                    <a href="adm.php?pagination=<?php echo $z;?>&func=abrir&id=<?php echo $res_exibe_prod['id'];?>" class="mensagem"><button class=" btn-abrir"><i class="" aria-hidden="true">Abrir</i></button></a>
                                </td>
                                <td>
                                    <a href="adm.php?pagination=<?php echo $z;?>&func=edita&id=<?php echo $res_exibe_prod['id'];?>"><img src="img/edit.png" title="Editar"></a>
                                    <a href="adm.php?pagination=<?php echo $z;?>&func=deleta&id=<?php echo $res_exibe_prod['id'];?>"><img src="img/trash.png" title="Excluir"></a>
                                </td>
                            </tr> 
                            <?php
                                }
                            ?>
                        </tbody>
                    <?php
                        }
                    }
                    ?>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item prev ">
                <a class="page-link" href="adm.php?pagination=<?php if($pagination > 1){echo $pagination - 1;}else{echo $pagination;}?>" tabindex="-1">Previous</a>
                </li>
                <?php 
                    for ($i = 1; $i <= $paginas; $i++){ 
                ?>
                    <li class="page-item item<?php echo $i?>"><a class="page-link" href="adm.php?pagination=<?php echo $i?>"><?php echo $i?></a></li>
                <?php }?>
                <li class="page-item next">
                <a class="page-link next-a" href="adm.php?pagination=<?php if($pagination < $paginas){echo $pagination + 1;}else{echo $pagination;}?>">Next</a>
                
                </li>
            </ul>
        </nav>
    </div>
</div>

<?php
    if(@$_GET['func'] == 'edita'){
        $id = $_GET['id'];
        $sql_sel_edit = "SELECT * FROM produtos WHERE id = '$id'";
        $con_sel_edit = mysqli_query($conexao, $sql_sel_edit);
        while ($res_sel_edit = mysqli_fetch_assoc($con_sel_edit)){
      
?>
    <div class="modal-fora editar">
        <div class="modal-dentro">
            <form action="" class="form_03" method="POST">
                <div class="erro_aviso erro"></div>
                <span>Nome do produto</span><br>
                <input name="titulo_edit" id="titulo_edit"type="text" value="<?php echo $res_sel_edit['titulo'];?>"><br>
                <span>Caminho da imagem</span><br>
                <input name="imagem_edit" id="imagem_edit" type="text" value="<?php echo $res_sel_edit['imagem'];?>"><br>
                <span>Descrição do produto</span><br>
                <textarea name="descricao_edit" id="descricao_edit"><?php echo $res_sel_edit['descricao'];?></textarea><br>
                <button class="btn btn-default cancelar" name="cancelar" type="submit">Cancelar</button>
                <button class="btn btn-default salvar btn-success" name="salvar" type="submit">Salvar</button>
            </form>
        
        </div>
    </div>

<?php
        }
    }
?>


<?php
    if(@$_GET['func'] == 'cadastra'){
      
?>
<div class="container">
    <div class="row">
        <div class="alert-red">
            <div class="alert-red-dentro">
                <button type="button" class="fechar-red" aria-hidden="true">×</button>
                <span class="fa fa-times-circle erro-x-red"></span>
                <p>Por favor preencha todos os campos!</p>
            </div>
        </div>
        <div class="alert-green">
            <div class="alert-green-dentro">
                <button type="button" class="fechar-green" aria-hidden="true">×</button>
                <span class="fa fa-check-circle erro-x-green"></span>
                <p>Produto cadastrado com sucesso!</p>
            </div>
        </div> 
        <h4>Cadastrar novo produto!</h4>
        <form action="" class="form_01" method="POST">
            <input type="text" name="imagem" id="imagem" placeholder="Caminho da imagem"><br>
            <input type="text" name="titulo" id="titulo" placeholder="Nome do produto"><br>
            <textarea name="descricao" cols="30" id="descricao" rows="10" placeholder="Descrição do produto"></textarea><br>
            <input class="input" type="submit" name="cadastrar"  id="cadastrar" class="cadastrar" value="Cadastrar">
        </form>
    </div>
</div>

    
    

<?php
    }
?>
<?php 

    if(isset($_POST['cadastrar'])){
        $imagem = $_POST['imagem'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
    }
    $listar;
    if(isset($_POST['listar'])){
        $listar= $_POST['listagem'];
        $sql_upd_list = "UPDATE listar SET listagem = '$listar' WHERE id = '0'";
        $res_upd_list = mysqli_query($conexao, $sql_upd_list);	
        echo "<script>window.location = 'adm.php?pagination=1';</script>";  
    }
    $sql_marc_op = "SELECT * FROM listar WHERE id = '0'";
    $con_marc_op= mysqli_query($conexao, $sql_marc_op);
    
    while ($res_marc_op= mysqli_fetch_assoc($con_marc_op)){
        $quant_marc = $res_marc_op['listagem'];
        echo "<script>document.querySelector('.listagem').value = $quant_marc </script>";
    }
?>
<script>

    function guarda_dados_cadastro(){
        
        var imagem = "<?php print $imagem; ?>";
        var titulo = "<?php print $titulo; ?>";
        var descricao = "<?php print $descricao; ?>";
        document.querySelector('#imagem').value = imagem;
        document.querySelector('#titulo').value = titulo ;
        document.querySelector('#descricao').value = descricao;     
    }
    
</script>
<?php 
    if(isset($_POST['salvar'])){
        $imagem_edit = $_POST['imagem_edit'];
        $titulo_edit = $_POST['titulo_edit'];
        $descricao_edit = $_POST['descricao_edit'];
    }
?>
<script>
    function guarda_dados_edit(){
        var imagem_edit = "<?php print $imagem_edit; ?>";
        var titulo_edit = "<?php print $titulo_edit; ?>";
        var descricao_edit = "<?php print $descricao_edit; ?>";
        document.querySelector('#imagem_edit').value = imagem_edit;
        document.querySelector('#titulo_edit').value = titulo_edit ;
        document.querySelector('#descricao_edit').value = descricao_edit;     
    }
</script>
<?php
    if(isset($_POST['salvar'])){
        
        if ($imagem_edit != '' && $titulo_edit != '' && $descricao_edit ){
            $sql_upd_prod = "UPDATE produtos SET imagem = '$imagem_edit', titulo = '$titulo_edit', descricao = '$descricao_edit' WHERE id = '$id'";
            $res_upd_prod = mysqli_query($conexao, $sql_upd_prod);	
            echo "<script>window.location = 'adm.php?pagination='+ pagination;</script>";
        }else{
            echo "<script>document.querySelector('.erro_aviso').innerHTML = 'Por favor preencha todos os campos.';guarda_dados_edit();</script>";  
        }
        
    
        
    }
    if (isset($_POST['cancelar'])){
        echo "<script>window.location = 'adm.php?pagination='+ pagination;</script>";
    }
?>

<?php
 if(@$_GET['func'] == 'abrir'){
    $id = $_GET['id'];
    $sql_sel_desc = "SELECT * FROM produtos WHERE id = '$id'";
    $con_sel_desc = mysqli_query($conexao, $sql_sel_desc);
    while ($res_sel_desc = mysqli_fetch_assoc($con_sel_desc)){
        
?>
    <div class="modal-fora mostra">
        <div class="modal-dentro">
            <h4><?php echo $res_sel_desc['titulo']; ?></h4>
            <p><?php echo $res_sel_desc['descricao']; ?></p>
            <button class="btn btn-default fechar" type="submit">Fechar</button>
        
        </div>
    </div>
<?php
    }

 }
?>
<script>
 
    
</script>
<?php
 if(@$_GET['func'] == 'deleta'){
    $id = $_GET['id'];
    $sql_confirm_del = "SELECT * FROM produtos WHERE id = '$id'";
    $con_confirm_del = mysqli_query($conexao, $sql_confirm_del);
    while ($res_confirm_del = mysqli_fetch_assoc($con_confirm_del)){
?>
    <div class="modal-fora mostra">
        <div class="modal-dentro">
            <h4 class="text-center">Deseja realmente apagar o produto: <?php echo $res_confirm_del['titulo']; ?>?</h4>
            
            <form action="" class="sim_nao" method="POST">
                <button class="btn btn-success btn-nao" name="apagar_nao" type="submit">Não</button>
                <button class="btn btn-default btn-sim" name="apagar_sim" type="submit">Sim</button>
            </form>
        </div>
    </div>
    
<?php  
    if(isset($_POST['apagar_sim'])){
        $sql_delete = "DELETE FROM produtos WHERE id = '$id'";
        mysqli_query($conexao, $sql_delete);
        echo "<script>window.location = 'adm.php?pagination='+ pagination;</script>"; 
    }
    if (isset($_POST['apagar_nao'])){
        echo "<script>window.location = 'adm.php?pagination='+ pagination;</script>";
    }
 }
}
        
?>
     
<script>
    var modal_mensagem = document.querySelector('.mostra');
    var alert_red = document.querySelector('.alert-red-dentro');
    var alert_green = document.querySelector('.alert-green-dentro');
    
    function msg_erro(){
        alert_red.style.display = 'block';
        setTimeout(function(){ alert_red.style.display = 'none'; }, 5000);
    }
    function msg_sucesso(){
        alert_green.style.display = 'block';
        setTimeout(function(){ alert_green.style.display = 'none'; }, 5000);
        setTimeout(function(){ 
            window.location="adm.php?pagination=1";    
        }, 5001);
        
    }
    $(document).ready(function(){
        $(".fechar").click(function(){
            window.location = 'adm.php?pagination='+ pagination;
        });
    });
    $(document).ready(function(){
        $(".fechar-red").click(function(){
            alert_red.style.display = 'none';
        });
    });
    $(document).ready(function(){
        $(".fechar-green").click(function(){
            alert_green.style.display = 'none';
        });
    });
</script>
<?php 
    if(isset($_POST['cadastrar'])){
        
        if ($imagem != '' && $titulo != '' && $descricao ){
            $sql_cadastra = "INSERT INTO produtos (imagem,titulo, descricao) VALUES ('$imagem','$titulo','$descricao')";
            $cad = mysqli_query($conexao, $sql_cadastra);
            echo "<script type='text/javascript'>msg_sucesso();</script>";  
        }else{
            echo "<script type='text/javascript'>msg_erro(); guarda_dados_cadastro();</script>";
        } 
    }
?>

<?php  
    
    if($pagination >= $paginas){
        echo '<script>$(document).ready(function(){$(".next").addClass("disabled");});</script>';
    }else{
        echo '<script>$(document).ready(function(){$(".next").removeClass("disabled");});</script>';
    }
    if($pagination <= 1){
        echo '<script>$(document).ready(function(){$(".prev").addClass("disabled");});</script>';
    }else{
        echo '<script>$(document).ready(function(){$(".prev").removeClass("disabled");});</script>';
    }
?>

<script>
    function pega_pagina(pagina){
        document.querySelector('.pagination'+pagina).style.display = "table-row-group"; 
        document.querySelector('.item' + pagina + ' > a').style.backgroundColor ='#23527c';   
        document.querySelector('.item' + pagina + ' > a').style.color ='#fff';   
        var paginas = "<?php print $paginas; ?>";  
        for (var x=1;x<= paginas;x++ ){
            if (x != pagina){
                document.querySelector('.pagination'+ x).style.display = "none";
            }    
        }   
    }
    pega_pagina(pagination);


</script>


</body>
</html>