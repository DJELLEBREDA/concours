<?php
// Connexion à la base de données
require 'db_connexion.php'; // Fichier de connexion à la base de données

session_start(); // Démarrer la session pour stocker le CAPTCHA

$message = ''; // Variable pour les messages

// Générer un code CAPTCHA de 4 chiffres si nécessaire
if (!isset($_SESSION['captcha'])) {
    $_SESSION['captcha'] = rand(1000, 9999); // Générer un code aléatoire
}

// Connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $captcha_input = $_POST['captcha_input'];

    // Vérification du CAPTCHA
    if ($captcha_input == $_SESSION['captcha']) {
        // Vérification de l'utilisateur dans la base de données
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Démarrer la session et enregistrer l'utilisateur connecté
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Réinitialiser le CAPTCHA
            $_SESSION['captcha'] = rand(1000, 9999);

            $message = "<div class='success'>Connexion réussie. Bienvenue, " . htmlspecialchars($user['username']) . ".</div>";
            header('Location: tableau_de_bord.php');
            exit;
        } else {
            $message = "<div class='error'>Identifiants incorrects.</div>";
        }
    } else {
        $message = "<div class='error'>Le Code est incorrect. Veuillez réessayer.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            justify-content: flex-start; /* Aligne le contenu en haut */
            align-items: center;
            height: 100vh;
            margin: 0; /* Supprime les marges */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 60%;
            height: 100px;
            padding: 20px;
            background-color: #f4f4f4;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .header .logo {
            max-width: 240px; /* Taille maximale de l'image */
            height: auto;
            animation: rotateYaxis 4s infinite linear; /* Animation de rotation sur l'axe Y */
            transform-style: preserve-3d; /* Pour un effet 3D lisse */
        }

        /* Animation de rotation sur l'axe Y */
        @keyframes rotateYaxis {
            from {
                transform: rotateY(0deg);
            }
            to {
                transform: rotateY(360deg);
            }
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
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

        input[type="email"], input[type="password"] , input[type="text"] {
            width: 94%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 30%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: OrangeRed;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: red;
        }

        input[type="button"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type="button"]:hover {
            background-color: #218838;
        }

        /* Style pour les messages */
        .message {
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
        }

        .success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 10px;
            border-radius: 4px;
        }

        .error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 4px;
        }

        @keyframes slideInFromTopRight {
            0% {
                transform: translate(100%, -100%); /* Commencer hors de l'écran (en haut à droite) */
                opacity: 0;
            }
            100% {
                transform: translate(0, 0); /* Position finale */
                opacity: 1;
            }
        }
        .image-container {
            display: flex;
            justify-content: center; /* Centre l'image horizontalement */
            align-items: center; /* Centre l'image verticalement */
            animation: slideInFromTopRight 4s forwards; /* Appliquer l'animation */
        }
        .vert {
            color: #155724;
        }

    </style>
</head>
<body>
    <div class="header">
        <div><img src="pngegg.png" alt="Drapeau Algérien" class="logo"></div>
        <div><h1 class="vert">الجمهورية الجزائرية الديمقراطية الشعبية </h1>
        <h1>وزارة التربية الوطنية </h1>
        <h1>مديرية التربية لولاية عنابة </h1></div>
        
    </div>

    <div class="main-container">
        <div class="image-container">
            <img src="log.svg" alt="Description de l'image" class="animated-image">
        </div>

        <div class="container">
            <h1>Connexion</h1>
            <form action="" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required autocomplete="off" value="">

                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required autocomplete="off" value="">
                
                <div style="display: flex;  vertical-align: middle;">
                    <label for="captcha" style="margin-right: 10px;">
                        Veuillez entrer ce code : 
                        <strong id="captcha-code" style="background-color: red; color: white; text-decoration: line-through; padding: 2px 5px;">
                            <?php echo $_SESSION['captcha']; ?>
                        </strong>
                    </label>
                    <input type="text" id="captcha" name="captcha_input" maxlength="4" required >
                </div>

                <input type="submit" value="Se connecter">
                <br>
                <a href="signup.php"><input type="button" value="S'inscrire"></a>
            </form>

            <!-- Affichage du message ici -->
            <div class="message">
                <?php if (!empty($message)) echo $message; ?>
            </div>
        </div>
    </div>

    <!-- Validation côté client pour s'assurer que le CAPTCHA est bien un nombre de 4 chiffres -->
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            var captchaInput = document.getElementById('captcha').value;

            // Vérifier si l'utilisateur a bien saisi 4 chiffres
            if (!/^\d{4}$/.test(captchaInput)) {
                alert("Veuillez entrer un code de 4 chiffres.");
                event.preventDefault(); // Empêcher l'envoi du formulaire
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Récupérer l'élément du CAPTCHA
            var captchaCode = document.getElementById('captcha-code');
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
            
            // Ajouter un style pour barrer le texte
            captchaCode.style.textDecoration = "line-through";
            
            // Ajouter un fond rouge
            captchaCode.style.backgroundColor = "orangered";
            captchaCode.style.color = "white"; // Pour le contraste du texte
        });
    </script>
   


</body>
</html>
