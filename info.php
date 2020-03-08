<?php

session_start();
    require_once('config.php');

    if($_SESSION["logado"]!=true){
        header("Location: index.php");
    }

 $id = $_GET['id'];
?>
<html>
<head>
	<title>PROJETO GRTS DIGITAL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


<style>
                  
                 
                  body
            {
                margin:0;
                padding:0;
                background-color:#81D4FA;
            }
            .box
            {
                width:1270px;
                padding:20px;
                background-color:#fff;
                border:1px solid #ccc;
                border-radius:50px;
                margin-top:25px;
            }
            footer {
                width:100%;
                position: fixed;
                bottom:0;
                left:0;
                background-color:#0288D1;
                height: 10%;
            }
            h5{
                text-align: center;
                margin: 0;
            }
            a{
                color: black;
            }
            nav {
                width:100%;
                position: fixed;
                top:0;
                left:0;
                background-color:transparent;  
                
                height: 30px;
            }
            #btn-off{
                margin: 7px 0 0 95%;
                border: none;
                display:inline-block;
                padding: 2px;
                background-color: #1A237E;
            }
            .div-tb{
                margin: 20px;
            }
        
        </style>

</head>

<body>
<?php require_once("nav.php") ?>
<div class="container box">
<div align="right">
<a href="home.php"><button type="button" class="btn btn-danger">Voltar</button></a>
</div>
            <h1 align="center">PROJETO GRTS DIGITAL</h1>
            <br />
            <div class="table-responsive">
                <br />
    <div class="div-tb" align="center">
    <label  for="">CLIENTE</label>
    </div>
    <table align="center" class="tb_cliente" border="2">                    
    <thead>
            <tr>
                <th>Nome da Empresa</th>
                <th>Nome do Resposavel</th>
                <th>CNPJ</th>                
                <th>Email</th>
                <th>Telefone</th>            
            </tr>
        </thead>
        
    </div>
    <?php
        	      
                  $query ="SELECT * FROM clientes where id=$id";
                  $sql = mysqli_query($connect,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>
            <tr>
                <td><?php echo $row["nome_empresa"];?></td>
                <td><?php echo $row["nome_responsavel"];?></td>
                <td><?php echo $row["cnpj"];?></td>
                <td><?php echo $row["email"];?></td>
                <td><?php echo $row["telefone"];?></td>
                 
            </tr>
            <?php } ?>
    </table>
    
    <div class="div-tb" align="center">
    <label  for="">ENDEREÇOS</label>
    </div>
    <table id="examples" border="2">                    
    <thead>
            <tr>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Numero</th>
                <th>Complemento</th>                
                <th>Cidade</th>
                <th>Estado</th>
                <th>CEP</th>                
            </tr>
        </thead>
        
    </div>
    <?php
        $query = "SELECT * FROM clientes WHERE id=$id";
        $sql = mysqli_query($connect,$query);
        while($row = mysqli_fetch_array($sql)){
            $principal = $row['id_principal'];
        }

        
        $query = "SELECT * FROM endereco WHERE cliente_id = $id";
        $sql2 = mysqli_query($connect,$query);
        while($row = mysqli_fetch_array($sql2)){
   
    ?>
    <tr>
        <td><?php echo $row["logradouro"];?></td>
        <td><?php echo $row["bairro"];?></td>
        <td><?php echo $row["numero"];?></td>
        <td><?php echo $row["complemento"];?></td>
        <td><?php echo $row["cidade"];?></td>
        <td><?php echo $row["estado"];?></td>
        <td><?php echo $row["cep"];?></td>
         
    </tr>
    <?php } 
    ?>
    </table>
    <?php require_once("footer.php") ?>


    
</body>
</html>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#examples').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registro por paginas",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponivel",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)"
        }
    } );
} );
</script>




