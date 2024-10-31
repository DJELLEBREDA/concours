<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 colonnes */
            grid-gap: 180px; /* Espace entre les post-its */
            width: 80%;
            max-width: 1200px;
        }

        .post-it {
            background-color: #fef68a; /* Couleur post-it classique */
            padding: 20px;
            border-radius: 5px;
            position: relative;
            font-size: 18px;
            color: #333;
            transition: transform 0.3s ease;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            border-radius: 25px;
        }

        .post-it:hover {
            transform: scale(1.05); /* Agrandit légèrement au survol */
        }

        /* Différentes couleurs pour chaque post-it */
        .post-it:nth-child(1) {
            background-color: #ffeb3b;
        }
        .post-it:nth-child(2) {
            background-color: #ff9800;
        }
        .post-it:nth-child(3) {
            background-color: #4caf50;
        }
        .post-it:nth-child(4) {
            background-color: #2196f3;
        }

        /* Style du titre */
        h2 {
            margin-top: 0;
            text-align: center; 
        }

        /* Style pour un bouton à l'intérieur */
        .post-it button {
            padding: 10px 24px;
            background-color:  #DCDCDC; color: black;
            border: 1px #333;
            color: #333;
            cursor: pointer;
            border-radius: 15px;
            font-size: 20px;
        }
        
        .post-it button:hover {
            background-color: #f0f0f0;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        
        p{
            text-align: center;
            color:#DC143C;
            font-size: 20px;
        }
    </style>
</head>
<body>
    
    <div class="dashboard">
    <!-- <h1>Tableau de bord</h1>
    <p>Bienvenue, <?php echo $_SESSION['username']; ?>!</p> -->

        <div class="post-it">
            <form id="form_redirect" action="formulaire.php" method="POST">
                <input type="hidden" name="ma_variable" value=" عامل مهني من المستوى الأول (بالتوقيت الكامل)">
                <h2> عامل مهني من المستوى الأول (بالتوقيت الكامل)</h2>
                <p>عدد المناصب المفتوحة 187</p>
                <button onclick="location.href='formulaire.php'">التسجيل</button>
                <!-- <button type="submit">Aller à la page 2</button> -->
            </form>
        </div>
        <div class="post-it">
            <form id="form_redirect" action="formulaire.php" method="POST">
                <input type="hidden" name="ma_variable" value=" عامل مهني من المستوى الثاني (بالتوقيت الكامل)">
                <h2> عامل مهني من المستوى الثاني (بالتوقيت الكامل)</h2>
                <p>عدد المناصب المفتوحة 93</p>
                
                <!-- <button onclick="location.href='#'">التسجيل</button> -->
                <button onclick="location.href='formulaire.php'">التسجيل</button>
            </form>
        </div>
        <div class="post-it">
            <form id="form_redirect" action="formulaire.php" method="POST">
                <input type="hidden" name="ma_variable" value=" عامل مهني من المستوى الثالث (بالتوقيت الكامل)">
                <h2> عامل مهني من المستوى الثالث (بالتوقيت الكامل)</h2>
                <p>عدد المناصب المفتوحة 67</p>
                <!-- <button onclick="location.href='#'">التسجيل</button> -->
                <button onclick="location.href='formulaire.php'">التسجيل</button>
            </form>
        </div>
        <div class="post-it">
            <form id="form_redirect" action="formulaire.php" method="POST">
                <input type="hidden" name="ma_variable" value="  عون أمن ووقاية مستوى أول (بالتوقيت الكامل)">
                <h2> عون أمن ووقاية مستوى أول (بالتوقيت الكامل)</h2>
                <p>عدد المناصب المفتوحة 17</p>
                <button onclick="location.href='formulaire.php'">التسجيل</button>
                <!-- <button onclick="location.href='#'">التسجيل</button> -->
        </form>
        </div>
    </div>

</body>
</html>
