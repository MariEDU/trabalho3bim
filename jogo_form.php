<?php
echo "<link rel='stylesheet' href='bootstrap.css'>";

$form = <<<EOT
<div class='alert alert-primary text-center' role=''><h1>Jogos Bibi Game</h1></div>
<div class='form-row justify-content-md-center'>
    <form method="post" action="jogo_salva.php">
    <a href='Index.php'><button type='button' class='btn btn-outline-primary space' name='button'>Inicio</button></a></br>
    <input type="hidden" name="id" value="$id">
    <label for='nome'>Nome:</label>
    <input type="text" id="nome" name="nome" size="40" class="form-control" value="$nome"></br>
    <label for='categoria'>Categoria:</label>
    <input type="text" id="categoria" name="categoria" size="40" class="form-control" value="$categoria"></br>
    <label for='classificacao'>Classificação:</label>
    <input type="text" id="classificacao" name="classificacao" size="40" class="form-control" value="$classificacao"></br>
    <label for='quantidade'>Quantidade:</label>
    <input type="text" id="quantidade" name="quantidade" size="40" class="form-control" value="$quantidade"></br>
    <label for='preco'>Preço:</label>
    <input type="text" id="preco" name="preco" size="40" class="form-control" value="$preco"></br>
    <button class='btn btn-outline-success space' type="submit">Salvar</button>
</form>
</div>


EOT;

echo $form;

?>
