<?php
include 'db.php';
if (!isset($_GET['id'])){
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo -> prepare('SELECT * FROM cliente WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment){
    header('Location : listar.php');
    exit;
}

$nome = $appointment[' nome '];
$email = $appointment[' email '];
$telefone = $appointment[' telefone '];
$dtnasc = $appointment[' dtnasc '];


?>

<!DOCTYPE html>
<html>
<head>
    <title>atualizar cadastro</title>
</head>
<body>
<div class="container">
    <h1>atualizar cadastro</h1>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" valu="<?php echo $nome; ?>"required><br>

        <label for="email">email:</label>
        <input type="text" name="email" valu="<?php echo $email; ?>"required><br>

        <label for="telefone">telefone:</label>
        <input type="tel" name="telefone" valu="<?php echo $telefone; ?>"required><br>

        <label for="dtnasc">nascimento:</label>
        <input type="date" name="dtnasc" valu="<?php echo $dtnasc; ?>"required><br>


        <button type="submit">atualizar</button>
</form>
</div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $dtnasc = $_POST['dtnasc'];
  


$stmt = $pdo->prepare('UPDATE cliente SET nome = ?, email=?, telefone=?,
dtnasc=? WHERE id = ?');
$stmt->execute([$nome, $email, $telefone, $dtnasc, $id]);
header('Location : listar.php');
exit;
}
?>