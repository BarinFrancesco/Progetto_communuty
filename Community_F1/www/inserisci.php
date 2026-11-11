<?php
require_once 'db.php';

$messaggio = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $cognome = trim($_POST['cognome'] ?? '');
    $nazionalita = trim($_POST['nazionalita'] ?? '');
    $anno_nascita = filter_input(INPUT_POST, 'anno_nascita', FILTER_VALIDATE_INT);
    $scuderia = trim($_POST['scuderia'] ?? '');

    if (!empty($nome) && !empty($cognome) && !empty($nazionalita) && $anno_nascita && !empty($scuderia)) {
        $sql = "INSERT INTO piloti (nome, cognome, nazionalita, anno_nascita, scuderia) 
                VALUES (:nome, :cognome, :nazionalita, :anno_nascita, :scuderia)";
        
        $stmt = $pdo->prepare($sql);
        $esito = $stmt->execute([
            ':nome' => $nome,
            ':cognome' => $cognome,
            ':nazionalita' => $nazionalita,
            ':anno_nascita' => $anno_nascita,
            ':scuderia' => $scuderia
        ]);

        if ($esito) {
            header('Location: index.php');
            exit;
        } else {
            $messaggio = "Errore durante il salvataggio del pilota.";
        }
    } else {
        $messaggio = "Compila correttamente tutti i campi.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>F1 Community - Aggiungi Pilota</title>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <h1>Inserisci un nuovo pilota</h1>

    <?php if ($messaggio): ?>
        <p style="color: red;"><?php echo htmlspecialchars($messaggio); ?></p>
    <?php endif; ?>

    <form action="inserisci.php" method="POST">
        <div>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" required>
        </div>
        <br>
        <div>
            <label for="cognome">Cognome:</label><br>
            <input type="text" id="cognome" name="cognome" required>
        </div>
        <br>
        <div>
            <label for="nazionalita">Nazionalità:</label><br>
            <input type="text" id="nazionalita" name="nazionalita" required>
        </div>
        <br>
        <div>
            <label for="anno_nascita">Anno di Nascita:</label><br>
            <input type="number" id="anno_nascita" name="anno_nascita" min="1950" max="2010" required>
        </div>
        <br>
        <div>
            <label for="scuderia">Scuderia:</label><br>
            <input type="text" id="scuderia" name="scuderia" required>
        </div>
        <br>
        <button type="submit">Salva Pilota</button>
    </form>

</body>
</html>