<?php
      echo "<link rel='stylesheet' href='bootstrap.css'>";
      echo "<div class='alert alert-primary text-center' role=''><h1>Listagem de Jogos Bibi Game</h1></div>";



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

    $sql = "select * from games";

    $resp = mysqli_query($c, $sql);

    if(!$resp)
    {
        echo "erro na consulta $sql";
        echo mysqli_error($c);
        mysqli_close($c);
        die();
    }

    $linha = mysqli_fetch_assoc($resp);

    echo "<div class='row justify-content-md-center'>";
    echo "<div class='col-6'>";
    echo "<a href='Index.php'><button type='button' class='btn btn-outline-primary space'>Inicio</button></a>";
    echo "<a href=\"jogo_inclui.php\"><button type='button' class='btn btn-outline-success'>Incluir</button></a>";
    echo "<table class='table table-striped table-dar'>";
    echo "<tr>";
    echo "<th>ID jogo</th>";
    echo "<th>Nome</th>";
    echo "<th>Categoria</th>";
    echo "<th>Classificação</th>";
    echo "<th>Quantidade</th>";
    echo "<th>Preço</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";

    if($linha)
    {
        while($linha)
        {
          echo "<tr>";
          echo "<th>{$linha["Id"]}</th>";
          echo "<th>{$linha["nome"]}</th>";
          echo "<th>{$linha["categoria"]}</th>";
          echo "<th>{$linha["classificacao"]}</th>";
          echo "<th>{$linha["quantidade"]}</th>";
          echo "<th>{$linha["preco"]}</th>";
          echo "<th><a href=\"jogo_atualiza.php?id={$linha["Id"]}\"><button class='btn btn-outline-warning'>Editar</button></a></th>";
          echo "<th><a href=\"jogo_deleta.php?id={$linha["Id"]}\"><button class='btn btn-outline-dark'>Deleta</button></a></th>";
          echo "</tr>";
          $linha = mysqli_fetch_assoc($resp);
        }
    }
    else
    {
        echo "<div class='alert alert-danger text-center' role='alert'>
                  Tabela está vazia!
              </div>";
    }
    echo "</table>";
    echo "</div>";
    echo "</div>";
    mysqli_free_result($resp);
    mysqli_close($c);
    ?>
