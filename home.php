<?php

session_start();
require_once('config.php');

  if($_SESSION["logado"]!=true){
      header("Location: index.php");
   }

?>
<html>
<head>
	<title>Clientes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
                
            }
            h5{
                text-align: center;
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
        </style>
</head>

<body>
<?php require_once("nav.php") ?>
<div class="container box">
            <h1 align="center">Desafio GRTS</h1>
            <br />
            <div class="table-responsive">
                <br />
                <div align="right">
                
                    <a href="create.php"><button type="button" class="btn btn-info btn-lg">Adicionar Cliente</button></a>
                </div>
                <br /><br />
             <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nome da Empresa</th>
                <th>Nome do Resposavel</th>
                <th>CNPJ</th>                
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
        </thead>
        <tbody>
        	<?php
        	      
                  $query ="SELECT * FROM clientes";
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
                <td><a href="info_end.php?id=<?php echo $row['id']; ?>" class="btn btn-info">ENDEREÇO</a></td>
                <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a></td>
                <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger" onClick="return confirm('Deseja deletar este registro?')">DELETE</a></td>
                 
            </tr>
            <?php } ?>
            
        </tbody>
        
    </table>

		</div>
	</div>

    <?php require_once("footer.php") ?>

</body>
</html>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable({
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