<?php
// Inclure la bibliothèque TCPDF pour générer un PDF
require('TCPDF/tcpdf.php');

// Connexion à la base de données
require 'db_connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupérer les données du formulaire
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $pere = isset($_POST['pere']) ? $_POST['pere'] : '';
        $mere = isset($_POST['mere']) ? $_POST['mere'] : '';
        $date_nais = isset($_POST['date_nais']) ? $_POST['date_nais'] : '';
        $prisime = isset($_POST['prisime']) ? $_POST['prisime'] : '';
        $lieu_nais = isset($_POST['lieu_nais']) ? $_POST['lieu_nais'] : '';
        $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
        $sit_fam = isset($_POST['sit_fam']) ? $_POST['sit_fam'] : '';
        $nb_enf = isset($_POST['nb_enf']) ? $_POST['nb_enf'] : 0;
        $endicape = isset($_POST['endicape']) ? $_POST['endicape'] : 0;
        $g_endicap = isset($_POST['g_endicap']) ? $_POST['g_endicap'] : '';
        $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
        $commune = isset($_POST['commune']) ? $_POST['commune'] : '';
        $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $service_n = isset($_POST['service_n']) ? $_POST['service_n'] : '';
        $date_service = isset($_POST['date_service']) ? $_POST['date_service'] : null;
        $diplome = isset($_POST['diplome']) ? $_POST['diplome'] : '';
        $date_diplo = isset($_POST['date_diplo']) ? $_POST['date_diplo'] : '';
        $num_diplo = isset($_POST['num_diplo']) ? $_POST['num_diplo'] : '';
        $etab_diplo = isset($_POST['etab_diplo']) ? $_POST['etab_diplo'] : '';
        $g_formation = isset($_POST['g_formation']) ? $_POST['g_formation'] : '';
        $nb_mois = isset($_POST['nb_mois']) ? $_POST['nb_mois'] : 0;
        $du = isset($_POST['du']) ? $_POST['du'] : '';
        $au = isset($_POST['au']) ? $_POST['au'] : '';

        // Préparer la requête d'insertion avec PDO
        $sql = "INSERT INTO condidats (nom, prenom, pere, mere, date_nais, prisime, lieu_nais, sex, sit_fam, nb_enf, endicape, g_endicap, adresse, commune, tel, email, service_n, date_service, diplome, date_diplo, num_diplo, etab_diplo, g_formation, nb_mois, du, au)
                VALUES (:nom, :prenom, :pere, :mere, :date_nais, :prisime, :lieu_nais, :sex, :sit_fam, :nb_enf, :endicape, :g_endicap, :adresse, :commune, :tel, :email, :service_n, :date_service, :diplome, :date_diplo, :num_diplo, :etab_diplo, :g_formation, :nb_mois, :du, :au)";

        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':pere', $pere);
        $stmt->bindParam(':mere', $mere);
        $stmt->bindParam(':date_nais', $date_nais);
        $stmt->bindParam(':prisime', $prisime);
        $stmt->bindParam(':lieu_nais', $lieu_nais);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':sit_fam', $sit_fam);
        $stmt->bindParam(':nb_enf', $nb_enf);
        $stmt->bindParam(':endicape', $endicape);
        $stmt->bindParam(':g_endicap', $g_endicap);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':commune', $commune);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':service_n', $service_n);
        $stmt->bindParam(':date_service', $date_service);
        $stmt->bindParam(':diplome', $diplome);
        $stmt->bindParam(':date_diplo', $date_diplo);
        $stmt->bindParam(':num_diplo', $num_diplo);
        $stmt->bindParam(':etab_diplo', $etab_diplo);
        $stmt->bindParam(':g_formation', $g_formation);
        $stmt->bindParam(':nb_mois', $nb_mois);
        $stmt->bindParam(':du', $du);
        $stmt->bindParam(':au', $au);

        // Exécuter la requête d'insertion
        if ($stmt->execute()) {
            // Initialiser TCPDF
            // $pdf = new TCPDF();
            $pdf = new TCPDF('p','mm','A4',true,'UTF-8',false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Votre Nom');
            $pdf->SetTitle('Fiche de candidat');

            // Ajout d'une page
            $pdf->AddPage();

            // Définir la police pour le texte
            $pdf->SetFont('aealarabiya', '', 12);
            $pdf->Cell(0, 10, 'Fiche de candidat', 0, 1, 'C');
            $pdf->Ln();

            // Afficher les informations
            $pdf->Cell(0, 10, 'Nom: ' . $nom, 0, 1);
            $pdf->Cell(0, 10, 'Prenom: ' . $prenom, 0, 1);
            $pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
            // Ajoutez d'autres informations ici

            // Enregistrer le PDF dans un dossier
            $outputDir = 'pdf/candidats/';
            if (!file_exists($outputDir)) {
                mkdir($outputDir, 0777, true); // Créer le dossier s'il n'existe pas
            }

            // Utiliser un chemin absolu pour le fichier PDF
            $file_path = 'F:/EasyPHP-Devserver-17/eds-www/CONCOURS/' . $outputDir . time() . '_fiche.pdf';
            $pdf->Output($file_path, 'F'); // 'F' pour enregistrer le fichier
            // $pdf->Output($file_path); // 'F' pour enregistrer le fichier
            // $pdf->Output();
            
            // Redirection avec un message de succès et un lien pour télécharger le PDF
            header("Location: confirmation.php?message=success&pdf=" . urlencode($file_path));
            // $pdf->Output($file_path); // 'F' pour enregistrer le fichier
            exit();
        } else {
            // Afficher l'erreur SQL
            print_r($stmt->errorInfo());
            echo "Échec de l'insertion.";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion : " . $e->getMessage();
    }
}
?>
