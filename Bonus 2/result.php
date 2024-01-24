<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato Generazione Password</title>
    <!-- Collegamento con Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #result-container {
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 1.2em;
        }

        button {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div id="result-container">
        <?php
        session_start();

        if (isset($_SESSION['generated_password'])) {
            $password = $_SESSION['generated_password'];
            echo '<p style="font-size: 2em; text-align: center;">La tua password generata: <strong style="display: block; margin: 10px auto; font-size: 1.5em;">' . $password . '</strong></p>';
        }
        ?>

        <!-- Pulsante per generare una nuova password -->
        <form action="index.php" method="get">
            <button type="submit" class="btn btn-primary mt-3">Genera Nuova Password</button>
        </form>
    </div>



</body>

</html>