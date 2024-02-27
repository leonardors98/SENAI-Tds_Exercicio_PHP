<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CRUD </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <center><h1><b> CRUD </b></h1></center>
    <hr>
    <br>

    <div class="container justify-content-center">

      <center>
        <a href="cadastro.php" class="btn btn-primary" role="button">cadastrar nova pessoa</a>
        <br>
        <div>

      
        <table class="table table-striped table-hover"> 
          <!-- table head -->
          <thead>
            <!-- table row -->
            <tr>
              <th>ID</th>
              <th>NOME</th>
              <th>IDADE</th>
              <th>ALTURA</th>
              <th>PESO</th>
              <th>IMC</th>
              <th>CLASSIFICAÇÃO</th>
              <th>AÇÕES</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
              include 'conecta.php';
              $pessoas = mysqli_query($conn,"SELECT * FROM exercicio");
              $row = mysqli_num_rows($pessoas);
              if($row > 0){
                while($registro = $pessoas->fetch_array()){
                  $id = $registro['id'];
                  echo '<tr>
                        <td>'.$registro['id'].'</td>
                        <td>'.$registro['nome'].'</td>
                        <td>'.$registro['idade'].'</td>
                        <td>'.$registro['altura'].'</td>
                        <td>'.$registro['peso'].'</td>
                        <td>'.$registro['imc'].'</td>
                        <td>'.$registro['classificacao'].'</td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-outline-secondary" href="editar.php?id='.$id.'">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                              </svg>
                            </a>
                            <a class="btn btn-outline-secondary" href="excluir.php?id='.$id.'">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                              </svg>
                            </a>
                          </div>
                        </td>
                      </tr>';
                }
              }else{
                echo '<tr>';
                echo '<td colspan="8">Não existem pessoas cadastradas</td>';
                echo '</tr>';
              }
            ?>
            
          </tbody>
          </table>
        </div>
      </center>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>