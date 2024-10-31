<!-- page2.php -->
<?php
    $valeur = isset($_POST['ma_variable']) ? $_POST['ma_variable'] : '';
?>

<!DOCTYPE html >
<html lang="fr">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de condidats</title>
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

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        label {
            font-weight: bold;
            display: inline-block;
            margin-bottom: 5px;
            margin-right:25px;
        }

        input[type="text"], input[type="date"], input[type="number"], input[type="email"]{
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        select {
            width: 108%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            width: 300px;
        }
        input[type="button"] {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            width: 300px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        h1 {
            text-align: center;
        }
        h2 {
            text-align: center;
            color:red;         
            
        }
        .entour{
            background-color:#f4f4f4;
        }
        .success {
            color: green;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .container {
            /* max-width: 2000px; */
            width: 1200px;
            margin: 0 auto; /* Centrer le conteneur */
            padding: 30px; /* Ajouter du padding autour */
            background-color: #fff; /* Couleur de fond blanche */
            border-radius: 8px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

    </style>

    <script>
        // Fonction pour le champ "endicape"
        function toggleEndicapeField() {
            var endicape = document.getElementById("endicape").value;
            var g_endicap = document.getElementById("g_endicap");

            if (endicape === "N") {
                g_endicap.disabled = true;
                g_endicap.value = ""; // Effacer le champ quand désactivé
            } else {
                g_endicap.disabled = false;
            }
        }

        // Fonction pour le champ "service_n"
        function toggleServiceField() {
            var service_n = document.getElementById("service_n").value;
            var date_service = document.getElementById("date_service");

            if (service_n === "غير معني") {
                date_service.disabled = true;
                date_service.value = ""; // Effacer le champ quand désactivé
            } else {
                date_service.disabled = false;
            }
        }

        // Ajouter les deux écouteurs d'événements au chargement de la page
        window.onload = function() {
            // Appel pour "endicape"
            document.getElementById("endicape").addEventListener("change", toggleEndicapeField);
            toggleEndicapeField(); // S'assurer que l'état correct est appliqué au chargement

            // Appel pour "service_n"
            document.getElementById("service_n").addEventListener("change", toggleServiceField);
            toggleServiceField(); // S'assurer que l'état correct est appliqué au chargement
        };
    </script>

</head>
<body dir=RTL>
    <div class="form-container">
            <!-- <h2><span class='entour'>عامل مهني من المستوى الأول توقيت كامل</span></h2> -->
            <h2><span class='entour'><?php echo htmlspecialchars($valeur); ?></span></h2>
            
            <?php
                if (isset($_GET['message'])) {
                    if ($_GET['message'] == 'success') {
                        echo "<div class='success'>Candidat ajouté avec succès.</div>";
                    } elseif ($_GET['message'] == 'error') {
                        echo "<div class='error'>Erreur lors de l'ajout du candidat.</div>";
                    }
                }
            ?>

        <form action="ajout_condidat.php" method="post">
            <table>
                <tr>
                    <td><label for="nom">اللقب:</label></td>
                    <td><input type="text" id="nom" name="nom" required></td>
                    <td><label for="prenom">الإسم:</label></td>
                    <td><input type="text" id="prenom" name="prenom" required></td>
                </tr>
                <tr>
                    <td><label for="pere">إسم الأب:</label></td>
                    <td><input type="text" id="pere" name="pere" required></td>
                    <td><label for="mere">لقب و إسم الأم:</label></td>
                    <td><input type="text" id="mere" name="mere" required></td>
                </tr>
                <tr>
                    <td><label for="date_nais">تاريخ الإزدياد:</label></td>
                    <td><input type="date" id="date_nais" name="date_nais" required></td>
                    <td><label for="prisime">خلال:</label></td>
                    <td><input type="text" id="prisime" name="prisime" ></td>
                </tr>
                <tr>
                    <td><label for="lieu_nais">مكان الإزدياد:</label></td>
                    <td><input type="text" id="lieu_nais" name="lieu_nais" required></td>
                    <td><label for="sex">الجنس:</label></td>
                    <td>
                        <select id="sex" name="sex" required>
                            <option value="M">ذكر</option>
                            <option value="F">أنثى</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="sit_fam">الحالة العائلية:</label></td>
                    <td>
                        <select id="sit_fam" name="sit_fam" required>
                            <option value="M">متزوج</option>
                            <option value="C">عازب</option>
                            <option value="D">مطلق</option>
                            <option value="V">أرمل</option>
                        </select>
                    </td>
                    <td><label for="nb_enf">عدد الأبناء:</label></td>
                    <td><input type="number" id="nb_enf" name="nb_enf" ></td>
                </tr>
                <tr>
                    <td><label for="endicape">ذوي الإحتياجات الخاصة:</label></td>
                    <td>
                        <select id="endicape" name="endicape" required>
                            <option value="N">لا</option>
                            <option value="O">نعم</option>
                        </select>
                    </td>
                    
                    <td><label for="g_endicap">نوع الإعاقة:</label></td>
                    <td><input type="text" id="g_endicap" name="g_endicap"></td>
                </tr>
                <tr>
                    <td><label for="adresse">عنوان الإقامة:</label></td>
                    <td><input type="text" id="adresse" name="adresse" required></td>
                    <td><label for="commune">بلدية الإقامة:</label></td>
                    <td>
                        <select id="commune" name="commune" required>
                            <option value="عنابة">عنابة</option>
                            <option value="برحال">برحال</option>
                            <option value="الحجار">الحجار</option>
                            <option value="العلمة">العلمة</option>
                            <option value="البوني">البوني</option>
                            <option value="وادي العنب">وادي العنب</option>
                            <option value="الشرفة">الشرفة</option>
                            <option value="سرايدي">سرايدي</option>
                            <option value="عين الباردة">عين الباردة</option>
                            <option value="شطايبي">شطايبي</option>
                            <option value="سيدي عمار">سيدي عمار</option>
                            <option value="تريعات">تريعات</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="tel">رقم الهاتف:</label></td>
                    <td><input type="text" id="tel" name="tel" required></td>
                    <td><label for="email">البريد الإلكتروني:</label></td>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="service_n">الخدمة الوطنية:</label></td>
                    <td>
                        <select id="service_n" name="service_n" required>
                            <option value="غير معني">غير معني</option>
                            <option value="مؤدي">مؤدي</option>
                            <option value="معفي">معفي</option>
                            <option value="مؤجل">مؤجل</option>
                            <option value="مسجل">مسجل</option>
                        </select>
                    </td>
                    <td><label for="date_service"> تاريخ اصدار الوثيقة:</label></td>
                    <td><input type="date" id="date_service" name="date_service" ></td>
                </tr>
                <tr>
                    <td><label for="diplome">تسمية الشهادة:</label></td>
                    <td><input type="text" id="diplome" name="diplome" required></td>
                    <td><label for="date_diplo">تاريخ الحصول على الشهادة :</label></td>
                    <td><input type="date" id="date_diplo" name="date_diplo" required></td>
                </tr>
                <tr>
                    <td><label for="num_diplo">رقم الشهادة:</label></td>
                    <td><input type="text" id="num_diplo" name="num_diplo" required></td>
                    <td><label for="etab_diplo">المؤسسة المسلمة للشهادة :</label></td>
                    <td><input type="text" id="etab_diplo" name="etab_diplo" required></td>
                </tr>
                <tr>
                    <td><label for="g_formation">نوع التكوين:</label></td>
                    <td>
                        <select id="g_formation" name="g_formation" required>
                            <option value="التوقيت الكامل">التوقيت الكامل</option>
                            <option value="التوقيت الجزئي">التوقيت الجزئي</option>
                        </select>
                    </td>
                    <td><label for="nb_mois">  عدد الأشهر:</label></td> 
                    <td><input type="number" id="nb_mois" name="nb_mois" required></td>
                </tr>
                <tr>
                    <td><label for="du">من:</label></td>
                    <td><input type="date" id="du" name="du" required></td>
                    <td><label for="au">إلى:</label></td>
                    <td><input type="date" id="au" name="au" required></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <input type="hidden"  id="type_exam" name="type_exam" value='<?php echo htmlspecialchars($valeur); ?>'>
                        
                        <input type="submit" value="Ajouter">
                        <a href="tableau_de_bord.php"><input type="button" value="Annuler"></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
        
</body>
</html>

