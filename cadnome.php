<?php
    include 'conecta.php';

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $altura_metros = $altura/100;
    $peso = $_POST['peso'];
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
    
    $query = $conn->query("SELECT * from exercicio where nome = '$nome' and idade = '$idade'");
    if(mysqli_num_rows($query)>0 ){
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados já existentes!');
        window.location.href='cadastro.php';
        </script>";
    }else{
        $sql = "INSERT INTO exercicio(nome,idade,altura,peso,imc,classificacao) VALUES ('$nome','$idade','$altura','$peso','$imc','$classificacao')";
        if(mysqli_query($conn,$sql)){
            echo "<script language='javascript' type='text/javascript'>
                alert('Dados cadastrados com sucesso!');
                window.location.href='index.php';
                </script>";
        }
    }
    mysqli_close($conn);
?>