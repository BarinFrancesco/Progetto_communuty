<?php
require_once 'db.php';

// Recupera tutti i piloti in ordine alfabetico per cognome
$stmt = $pdo->query("SELECT * FROM piloti ORDER BY cognome ASC");
$piloti = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>F1 Community - Griglia Piloti</title>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <h1>Griglia Piloti F1</h1>

    <?php if (count($piloti) > 0): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Nazionalità</th>
                    <th>Anno di Nascita</th>
                    <th>Scuderia</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($piloti as $pilota): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pilota['id']); ?></td>
                        <td><?php echo htmlspecialchars($pilota['nome']); ?></td>
                        <td><?php echo htmlspecialchars($pilota['cognome']); ?></td>
                        <td><?php echo htmlspecialchars($pilota['nazionalita']); ?></td>
                        <td><?php echo htmlspecialchars($pilota['anno_nascita']); ?></td>
                        <td><?php echo htmlspecialchars($pilota['scuderia']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nessun pilota presente nel database.</p>
    <?php endif; ?>

</body>
</html>