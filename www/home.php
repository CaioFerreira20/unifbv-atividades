<?php
require __DIR__ . '/db.php';

// Criação da tabela "carros"
$pdo->exec("
    CREATE TABLE IF NOT EXISTS carros (
        id INT AUTO_INCREMENT PRIMARY KEY,
        carro VARCHAR(100) NOT NULL,
        marca VARCHAR(100) NOT NULL,
        modelo VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

// Processamento do formulário
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carro = trim($_POST['carro'] ?? '');
    $marca = trim($_POST['marca'] ?? '');
    $modelo = trim($_POST['modelo'] ?? '');

    if ($carro === '' || $marca === '' || $modelo === '') {
        $erro = 'Informe o carro, a marca e o modelo.';
    } else {
        $stmt = $pdo->prepare("INSERT INTO carros (carro, marca, modelo) VALUES (:carro, :marca, :modelo)");
        $stmt->execute([
            ':carro' => $carro,
            ':marca' => $marca,
            ':modelo' => $modelo,
        ]);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Buscar registros
$rows = $pdo->query("SELECT id, carro, marca, modelo, created_at FROM carros ORDER BY id DESC")->fetchAll();

// Função de escape para HTML
function e(string $v): string { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro de Carros</title>
<style>
    body { font-family: system-ui, Arial, sans-serif; margin: 24px; }
    form { display: grid; gap: 12px; max-width: 520px; padding: 16px; border: 1px solid #ddd; border-radius: 8px; }
    label { display: grid; gap: 6px; }
    input[type="text"] { padding: 10px; border: 1px solid #bbb; border-radius: 6px; }
    button { padding: 10px 14px; border: 0; border-radius: 6px; cursor: pointer; }
    .btn { background: #0d6efd; color: white; }
    .erro { color: #b00020; margin: 8px 0; }
    .lista { margin-top: 24px; max-width: 720px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px; border-bottom: 1px solid #eee; text-align: left; }
    thead th { background: #f7f7f7; }
    .muted { color: #666; font-size: 0.9rem; }
</style>
</head>
<body>

<h1>Cadastro de Carros</h1>

<form method="post" action="">
    <div>
        <p class="muted">Preencha os campos e clique em “Salvar”. Cada novo carro aparece abaixo do formulário.</p>
    </div>

    <?php if ($erro): ?>
        <div class="erro"><?= e($erro) ?></div>
    <?php endif; ?>

    <label>
        Carro
        <input type="text" name="carro" maxlength="100" required>
    </label>

    <label>
        Marca
        <input type="text" name="marca" maxlength="100" required>
    </label>

    <label>
        Modelo
        <input type="text" name="modelo" maxlength="100" required>
    </label>

    <button class="btn" type="submit">Salvar</button>
</form>

<div class="lista">
    <h2>Carros Cadastrados</h2>
    <?php if (!$rows): ?>
        <p class="muted">Ainda não há carros cadastrados.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Carro</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Criado em</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $r): ?>
                <tr>
                    <td><?= e($r['id']) ?></td>
                    <td><?= e($r['carro']) ?></td>
                    <td><?= e($r['marca']) ?></td>
                    <td><?= e($r['modelo']) ?></td>
                    <td><?= e($r['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
