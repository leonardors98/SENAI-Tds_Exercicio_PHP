<?php
    include 'conecta.php';
    $id=$_GET['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $altura_metros = $altura/100;
    $imc = $peso/($altura_metros*$altura_metros);
    $imc = number_format($imc, 2, '.', '');
    if($imc < 18.5){
        $classificacao = 'Magreza';
    }else if($imc<24.9){
        $classificacao = 'Normal';
    }else if($imc<29.9){
        $classificacao = 'Sobrepeso';
    }else if($imc<39.9){
        $classificacao = 'Obesidade';
    }else {
        $classificacao = 'Obesidade Grave';
    }

    $sql= "UPDATE exercicio SET nome=?,idade=?, altura=?, peso=?, imc=?, classificacao=? WHERE id=?";
    $update = $conn->prepare($sql) or die($conn->error);
    if(!$update){
        echo "erro na atualização!".$conn->errno.' - '.$conn->error;
    }
    // ssi = string string int, pois o bind param precisa especificar os tipos 
    $update->bind_param('ssssssi',$nome,$idade,$altura,$peso,$imc,$classificacao,$id);
    $update->execute();
    $update->close();
    header("Location:index.php");

    mysqli_close($conn);
?>