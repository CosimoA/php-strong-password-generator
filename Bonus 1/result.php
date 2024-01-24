<?php
session_start();

if (isset($_SESSION['generated_password'])) {
    $password = $_SESSION['generated_password'];
    echo '<p class="valid-password" style="font-size: 1.5em; color: green;">La tua password generata: <strong>' . $password . '</strong></p>';
    unset($_SESSION['generated_password']);
} else {
    // Se la password non è presente nella sessione, reindirizza alla pagina principale
    header('Location: index.php');
    exit();
}
