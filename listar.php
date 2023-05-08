<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style.css">
    <title>cadastro</title>
</head>
<body class="listar">
<div class="container">
    <h1>cadastro</h1>

    <?php
    $stmt = $pdo->query('SELECT * FROM cliente');
    $cadastros = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($cadastros)==0) {
        echo '<p>Nenhum compromisso agendado.</p>';
}else{
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Dtnasc</th>><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($cadastros as $cadastro) {
        echo '<tr>';
        echo '<td>' . $cadastro['nome'] . '</td>';
        echo '<td>' . $cadastro['email'] . '</td>';
        echo '<td>' . $cadastro['telefone'] . '</td>';
        echo '<td>' . date('d/m/y',strtotime($cadastro['dtnasc'])) . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' .
        $cadastro['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' .
        $cadastro['id'] . '">Deletar</a></td>';
        

    }

    echo '</tbody>';
    echo '</table>';
    }
?>    
</div>
</body>
</html>