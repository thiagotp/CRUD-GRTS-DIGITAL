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
	<title>Clientes</title>
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
        
        </style>

</head>

<body>
<?php require_once("nav.php") ?>
<div class="container box">
            <h1 align="center">CRUD GRTS</h1>
            <br />
            <div class="table-responsive">
                <br />
                <label for="">Endereço Principal</label>
    <table border="2">                    
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
    //$id = $GET_['id'];
        $query = "SELECT * FROM clientes WHERE id=$id";
        $sql = mysqli_query($connect,$query);
        while($row = mysqli_fetch_array($sql)){
            $principal = $row['id_principal'];
        }

        
        $query = "SELECT * FROM endereco WHERE id=$principal";
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
</fieldset>
                <div align="right">
                <a href="create_end.php?id=<?php echo $id; ?>" class="btn btn-info">Adicionar Endereço</a>
                <a href="home.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                </div>
                <br /><br />
             <table id="examples" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Numero</th>
                <th>Complemento</th>                
                <th>Cidade</th>
                <th>Estado</th>
                <th>CEP</th>
                <th>Editar</th> 
                <th>Principal</th> 
                <th>Principal</th> 
                
            </tr>
        </thead>
        <tbody>
        	<?php
        	      
                  $query = "SELECT * FROM endereco WHERE cliente_id = '$id'";
                  $sql = mysqli_query($connect,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>
            <tr>
                <td><?php echo $row["logradouro"];?></td>
                <td><?php echo $row["bairro"];?></td>
                <td><?php echo $row["numero"];?></td>
                <td><?php echo $row["complemento"];?></td>
                <td><?php echo $row["cidade"];?></td>
                <td><?php echo $row["estado"];?></td>
                <td><?php echo $row["cep"];?></td>
                <td><a href="edit_end.php?id=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a></td>
                <td><a href="principal_end.php?id=<?php echo $row['id']; ?>&idCliente=<?php echo $id?>" class="btn btn-info">Tonar Principal</a></td>
                <td><a href="delete_end.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
               <!-- <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger"onClick="return confirm('Deseja deletar este registro?')">DELETfasdfE</a></td>
                <td><a href="principal_end.php?id=<?php echo $row['id'];?>&idCliente=<?php echo $id?>"><button type="button" class="btn btn-info">Tornar Principal</button></a><td>
               
               -->
                        
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




