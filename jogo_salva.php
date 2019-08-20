<?php

    $id = $_REQUEST["id"];
    $nome = $_REQUEST["nome"];
    $categoria = $_REQUEST["categoria"];
    $classificacao = $_REQUEST["classificacao"];
    $quantidade = $_REQUEST["quantidade"];
    $preco = $_REQUEST["preco"];

    if(empty($id))
    {
        // Inclusão
        $sql = "insert into games(nome ,categoria ,classificacao, quantidade, preco) values ('$nome','$categoria','$classificacao','$quantidade','$preco')";
    }
    else
    {
        // Alteração
        $sql = "update games set nome = '$nome', categoria = '$categoria', classificacao = '$classificacao', quantidade = '$quantidade', preco = '$preco' where Id = $id";

    }

    $host = "localhost";
    $usuario = "root";
    $senha = "novasenha";
    $banco = "bibi_games";

    $c = mysqli_connect($host,$usuario,$senha);

    if(!$c)
    {
        echo "erro na conexão";
        echo mysqli_error($c);
        die();
    }

    if(!mysqli_select_db($c,$banco))
    {
        echo "erro no select_db";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }


    $resp = mysqli_query($c, $sql);

    if(!$resp)
    {
        echo "erro na consulta $sql";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }
    else
    {
        header("location: jogo_lista.php");
    }
    ?>
