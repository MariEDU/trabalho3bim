<?php

    $id = $_REQUEST["id"];

    $host = "localhost";
    $usuario = "root";
    $senha = "novasenha";
    $banco = "bibi_games";

    $c = mysqli_connect($host,$usuario,$senha);

    if(!$c)
    {
        echo "erro na conexão";
        echo mysql_error();
        die();
    }

    if(!mysqli_select_db($c,$banco))
    {
        echo "erro no select_db";
        echo mysql_error();
        mysql_close($c);
        die();
    }

    $sql = "select * from games where Id = $id";

    $resp = mysqli_query($c, $sql);

    if(!$resp)
    {
        echo "erro na consulta $sql";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }

    $linha = mysqli_fetch_assoc($resp);
    if($linha)
    {
      $id = $linha["Id"];
      $nome = $linha["nome"];
      $categoria = $linha["categoria"];
      $classificacao = $linha["classificacao"];
      $quantidade = $linha["quantidade"];
      $preco = $linha["preco"];
      include "jogo_form.php";

    }
    else
    {
        echo "Nao encontrado";
    }

    mysqli_free_result($resp);
    mysqli_close($c);
    ?>
