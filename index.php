<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di Password</title>
    <style>
        .error-message {
            color: red;
        }

        .valid-password {
            color: green;
        }

        p {
            font-size: 1.2em;
        }
    </style>
</head>

<body>

    <h2>Generatore di Password</h2>

    <?php
    // Inclusione file function
    include 'functions.php';

    // Verifica se il modulo è stato inviato
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['length'])) {
        $lunghezzaPassword = filter_input(INPUT_GET, 'length', FILTER_VALIDATE_INT, ['options' => ['min_range' => 6, 'max_range' => 30]]);

        if ($lunghezzaPassword !== false) {
            $password = generatePassword($lunghezzaPassword);
            echo '<p class="valid-password">La tua password generata: <strong>' . $password . '</strong></p>';
        } else {
            echo '<p class="error-message">Inserisci una lunghezza della password valida (compresa tra 6 e 30 caratteri).</p>';
        }
    } else {
        echo '<p>Scegli la lunghezza della password inserendo un numero compreso tra 6 e 30.</p>';
    }
    ?>

    <!-- Form per inserire la lunghezza della password -->
    <form action="index.php" method="get">
        <label for="length">Lunghezza Password:</label>
        <input type="number" name="length" id="length" min="1" required>
        <button type="submit">Genera Password</button>
    </form>

</body>

</html>