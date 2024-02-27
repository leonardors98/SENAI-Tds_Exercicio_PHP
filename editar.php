<?php
    include 'conecta.php';
    $id=$_GET['id'];
    $sql= "SELECT * FROM exercicio WHERE id=$id";
    $query =$conn->query($sql);
    while($dados = $query->fetch_array()){
        $nome = $dados['nome'];
        $idade = $dados['idade'];
        $altura = $dados['altura'];
        $peso = $dados['peso'];
    }
    
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CADASTRO </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <center><h1><b> EDITAR </b></h1></center>
    <hr>
    <br>

    <div class="container">
      <center>
        <form action="upnome.php?id=<?php echo $id;?>" method="post">
          
        <label for="nome">NOME</label>
          <input class="form-control" type="text" name="nome" value=<?php echo $nome;?> required>
          <br>
          
          <label for="idade">IDADE</label>
          <input class="form-control" type="number" name="idade" value=<?php echo $idade;?> required>
          <br>

          <label for="altura">ALTURA (em cm)</label>
          <input class="form-control" type="number" name="altura" value=<?php echo $altura;?> required>
          <br>

          <label for="nome">PESO (em kg)</label>
          <input class="form-control" type="number" name="peso" value=<?php echo $peso;?> required>
          <br>
          <button class="btn btn-primary" type="submit">ATUALIZAR</button>

        </form>
      </center>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
