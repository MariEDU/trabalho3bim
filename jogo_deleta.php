<?php

    $id = $_REQUEST["id"];

    if(!empty($id))
    {
        $sql = "delete from games where Id = $id";

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


        $resp = mysqli_query($c,$sql);

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
    }
    else
    { echo "Id não encontrado!"; } ?>
