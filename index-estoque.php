<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <form action="controlemovto.php" method="get">
        <label for="codProd">Codigo do produto</label>
        <input type="number" name="codProd" id="codProd" min="1" max="9999999999" required><br>

        <label for="tipo">Tipo de Movimentação</label>
        <select name="tipo" id="tipo" required>
            <option value="e" checked>Entrada</option><br>
            <option value="s">Saida</option>
        </select><br>
            
        <label for="qtde">Quantidade</label>
        <input type="number" name="qtde" id="qtde" step="0.01" max=99999 required><br>

        <label for="datamov">Data de Movimentação</label>
        <input type="date" name="datamov" id="datamov" required><br><br>

        <input type="submit" value="Incluir" name="incluir" id="incluir">
        <input type="submit" value="Exluir"  name="excluir"  id="excluir">
        <input type="reset" value="Limpar" name="limpar" id="limpar">
    </form>
       
</body>
</html>