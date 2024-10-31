<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, redirection vers la page de connexion
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #555;
        }
        a {
            display: block;
            text-align: center;
            background-color: #dc3545;
            color: white;
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
        }
        a:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue, <?php echo $_SESSION['username']; ?>!</h1>
        <p>Ceci est une page protégée, uniquement accessible aux utilisateurs connectés.</p>
        <a href="logout.php">Se déconnecter</a>
    </div>
</body>
</html>
