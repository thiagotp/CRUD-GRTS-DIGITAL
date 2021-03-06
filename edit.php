<?php
// including the database connection file
session_start();
    require_once('config.php');

    if($_SESSION["logado"]!=true){
       header("Location: index.php");
    }

//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM clientes WHERE id=$id");
 
while($row = mysqli_fetch_array($result))
{
	 	$nome_empresa = $row['nome_empresa'];
        $nome_responsavel = $row['nome_responsavel'];
        $telefone = $row['telefone'];
        $cnpj = $row['cnpj'];
        $email = $row['email'];
        $id_principal = $row['id_principal'];
        $idCliente = $row['id'];


}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
  <title>PROJETO GRTS DIGITAL</title>
</head>

<body onload="goFocus('nome')">
<?php require_once("nav.php") ?>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Editar Usuário </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="edit_cliente.php?id=<?php echo $id?>" method="post">
            <label for="">DADOS DA EMPRESA<br></label>
            <input type="hidden" name="idCliente" id="id" value="<?php echo $idCliente; ?>">
            <input type="hidden" name="id_principal" id="id" value="<?php echo $id_principal; ?>">
                <div class="control-group">
                    <label class="control-label">Nome Empresa:</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="nome_empresa" id="nome" onkeypress='return filtroTeclasLetras(event)' type="text" placeholder="Nome" required="" value="<?php echo !empty($nome_empresa)?$nome_empresa: '';?>">
                     
                    </div>
                </div>

                <div class="control-group">
                  <label class="control-label">CNPJ:</label>
                  <div class="controls">
                      <input size="40" class="form-control" id="cnpj" name="cnpj" type="text" placeholder="CNPJ" required="" value="<?php echo !empty($cnpj)?$cnpj: '';?>">
             
                  </div>
              </div>
                <div class="control-group">
                    <label class="control-label">Nome do Responsável:</label>
                    <div class="controls">
                        <input size="40" class="form-control" name="nome_responsavel" type="text" placeholder="Nome do Responsável" required="" value="<?php echo !empty($nome_responsavel)?$nome_responsavel: '';?>">
                    </div>
                </div>

                
                <div class="control-group">
                    <label class="control-label">Telefone:</label>
                    <div class="controls">
                        <input size="40" class="salario form-control" id="telefone" name="telefone" type="text" placeholder="Telefone" onkeypress='return filtroTeclas(event)' required="" value="<?php echo !empty($telefone)?$telefone: '';?>">
                    
                    </div>
                </div>


                  <div class="control-group">
                    <label class="control-label">Email:</label>
                    <div class="controls">
                        <input size="40" class="form-control" name="email" type="email" placeholder="E-mail" required="" value="<?php echo !empty($email)?$email: '';?>">
               
                    </div>
                </div>

                <div class="form-actions" align="center">
                    <br/>

                    <button type="submit" class="btn btn-success">Concluir</button>
                    <a href="home.php" type="btn" class="btn btn-default">Voltar</a>
                    <br>
                    <br/>
            
                </div>
            </form>
          </div>
        </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
            <script>
        var filtroTeclas = function(event) {
  return ((event.charCode >= 48 && event.charCode <= 57) || (event.keyCode == 13) || (event.keyCode == 44) || (event.keyCode == 46))
}
    </script>

        <script type="text/javascript">
function goFocus(elementID){

document.getElementById(elementID).focus();

}

</script>
            <script>
        var filtroTeclasLetras = function(event) {
  return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.keyCode == 13) || (event.keyCode == 32))
}
    </script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  
<script type="text/javascript">
    $('.salario').mask('###0,00', {reverse: true});
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function () { 
        var $seuCampoCelular = $("#telefone");
        $seuCampoCelular.mask('(00) 00000-0000');
        
    });
</script>

  <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
        
                $("#logradouro").val("");
                $("#complemento").val("");
                $("#bairro").val("");
                $("#cidade").val("");        
                $("#estado").val("...");

            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro").val("...");
                        $("#complemento").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#complemento").val(dados.complemento);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>

<script>
    $(document).ready(function () { 
        var $seuCampocep = $("#cep");
        $seuCampocep.mask('00000-000', {reverse: true});
    });
</script>

<script>
    $(document).ready(function () { 
        var $seuCampoCnpj = $("#cnpj");
        $seuCampoCnpj.mask('00.000.000/0000-00', {reverse: true});
    });
</script>
<?php require_once("footer.php") ?>
</body>

</html>




