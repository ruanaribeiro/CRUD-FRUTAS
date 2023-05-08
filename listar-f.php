<?php include 'db.php';?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Registros de clientes</title>
</head>

<body class="listar">
    <h1>Registros dos clientes</h1>

    <?php
    $stmt = $pdo->query ('SELECT * FROM produto');
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($registros) == 0) {
        echo '<p>Nenhum registro registrado.</p>';
    } else {
        echo '<table border="1">';
        echo '<thead><tr>Nome</th><th>tamanho</th><th>peso</th><th>qnt</th><th>prc</th><th colspan="2">Opções</th></tr></thead>';
        echo '<tbody>';

        foreach ($registros as $registro) {
            echo '<tr>';
            echo '<td>' . $registro['nome'] . '</td>';
            echo '<td>' . $registro['tamanho'] . '</td>';
            echo '<td>' . $registro['peso'] . '</td>';
            echo '<td>' . $registro['qnt'] . '</td>';
            echo '<td>' . $registro['prc'] . '</td>';
            echo '<td><a style="color:black;" href="atualizar.php?id=' .
            $registro['id'] . '">Atualizar</a></td>';
            echo '<td><a style="color:black;" href="deletar.php?id=' .
            $registro['id'] . '">Deletar</a></td>';
            
    
        }
    
        echo '</tbody>';
        echo '</table>';
        }
    ?>    
    </body>
    </html>