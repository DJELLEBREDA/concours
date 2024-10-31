<?php
// Connexion à la base de données
require 'db_connexion.php'; // Fichier de connexion à la base de données

$message = ''; // Variable pour les messages

// Variables pour le formulaire
$username = '';
$password = '';

// Inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash du mot de passe

    // Insertion des données dans la table `users`
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$username, $email, $password])) {
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
        header('Location: index.php');
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .main-container {
            display: flex; /* Utilise flexbox pour le conteneur principal */
            justify-content: center; /* Centre les éléments horizontalement */
            align-items: center; /* Centre les éléments verticalement */
            gap: 20px; /* Espace entre l'image et le formulaire */
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .image-container {
            display: flex;
            justify-content: center; /* Centre l'image horizontalement */
            align-items: center; /* Centre l'image verticalement */
        }

        img {
            max-width: 100%; /* Assure que l'image ne dépasse pas la largeur de son conteneur */
            height: auto; /* Maintient le ratio de l'image */
            width: 600px; /* Largeur fixe pour l'image, vous pouvez ajuster */
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            color: #555;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 94%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        input[type="button"] {
            width: 100%;
            padding: 10px;
            background-color: OrangeRed;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top:20px;
        }
        input[type="button"]:hover {
            background-color: red;
        }

        @keyframes slideIn {
    0% {
        transform: translateX(-100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }

    /* Animation inverse pour faire sortir l'image */
    /* 0% {
        transform: translateX(0);
        opacity: 1;
    }
    100% {
        transform: translateX(100%);
        opacity: 0;
    } */
}

.image-container img {
    animation: slideIn 4s forwards; /* Appliquer l'animation */
}


    </style>
</head>
<body>
    <div class="main-container">
        
        <div class="image-container">
            <img src="register.svg" alt="Description de l'image" class="animated-image">
        </div>
    <div class="container">
        <h1>Inscription</h1>
        <form action="signup.php" method="post">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required autocomplete="off">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required autocomplete="off">

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required autocomplete="off">

            <input type="submit" value="S'inscrire">
            <a href="index.php"><input type="button" value="Retour"></a>

        </form>
    </div>
</div>    
</body>
</html>
