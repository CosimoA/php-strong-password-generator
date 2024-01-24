<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di Password</title>
    <!-- Collegamento con Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-message {
            color: red;
        }

        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #main-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-row {
            max-width: 550px;
            text-align: center;
        }

        .form-check {
            display: inline-block;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div id="main-container" class="container">
        <h2>Generatore di Password</h2>

        <?php
        session_start();
        include 'functions.php';

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['length'])) {
            $lunghezzaPassword = filter_input(INPUT_GET, 'length', FILTER_VALIDATE_INT, ['options' => ['min_range' => 6, 'max_range' => 30]]);
            $usareNumeri = isset($_GET['use_numbers']);
            $usareLettere = isset($_GET['use_letters']);
            $usareSimboli = isset($_GET['use_symbols']);
            $evitareRipetizioni = isset($_GET['avoid_repetitions']);

            if ($lunghezzaPassword !== false) {
                $password = generatePassword($lunghezzaPassword, $usareNumeri, $usareLettere, $usareSimboli, $evitareRipetizioni);

                $_SESSION['generated_password'] = $password;

                header('Location: result.php');
                exit();
            } else {
                echo '<div class="alert alert-danger" role="alert">Inserisci una lunghezza della password valida (compresa tra 6 e 30 caratteri).</div>';
            }
        } else {
            echo '<p>Scegli le opzioni per la generazione della password e la lunghezza.</p>';
        }
        ?>

        <!-- Form per inserire la lunghezza della password e opzioni -->
        <form action="index.php" method="get">
            <div class="form-group">
                <input placeholder="Lunghezza Password: (min 6 - max 30)" type="number" class="form-control custom-input" name="length" id="length" min="1" required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="use_numbers" id="use_numbers" checked>
                        <label class="form-check-label" for="use_numbers">Numeri</label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="use_letters" id="use_letters" checked>
                        <label class="form-check-label" for="use_letters">Lettere</label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="use_symbols" id="use_symbols" checked>
                        <label class="form-check-label" for="use_symbols">Simboli</label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="avoid_repetitions" id="avoid_repetitions">
                        <label class="form-check-label" for="avoid_repetitions">Evita ripetizioni</label>
                    </div>
                </div>
            </div>


            <div class="form-group text-center mt-3">
                <button type="submit" class="btn btn-primary">Genera Password</button>
            </div>

        </form>
    </div>

</body>

</html>