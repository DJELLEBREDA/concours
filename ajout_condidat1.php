<?php
// Inclure la bibliothèque FPDF pour générer un PDF
require('fpdf/fpdf.php');

// Connexion à la base de données
require 'db_connexion.php'; // Fichier de connexion à la base de données

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pere = $_POST['pere'];
    $mere = $_POST['mere'];
    $date_nais = $_POST['date_nais'];
    $prisime = $_POST['prisime'];
    $lieu_nais = $_POST['lieu_nais'];
    $sex = $_POST['sex'];
    $sit_fam = $_POST['sit_fam'];
    $nb_enf = $_POST['nb_enf'];
    $endicape = $_POST['endicape'];
    $g_endicap = $_POST['g_endicap'];
    $adresse = $_POST['adresse'];
    $commune = $_POST['commune'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $service_n = $_POST['service_n'];
    $date_service = $_POST['date_service'];
    $diplome = $_POST['diplome'];
    $date_diplo = $_POST['date_diplo'];
    $num_diplo = $_POST['num_diplo'];
    $etab_diplo = $_POST['etab_diplo'];
    $g_formation = $_POST['g_formation'];
    $nb_mois = $_POST['nb_mois'];
    $du = $_POST['du'];
    $au = $_POST['au'];

    // Insérer les données dans la base de données
    $sql = "INSERT INTO candidats (nom, prenom, pere, mere, date_nais, prisime, lieu_nais, sex, sit_fam, nb_enf, endicape, g_endicap, adresse, commune, tel, email, service_n, date_service, diplome, date_diplo, num_diplo, etab_diplo, g_formation, nb_mois, du, au) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$nom, $prenom, $pere, $mere, $date_nais, $prisime, $lieu_nais, $sex, $sit_fam, $nb_enf, $endicape, $g_endicap, $adresse, $commune, $tel, $email, $service_n, $date_service, $diplome, $date_diplo, $num_diplo, $etab_diplo, $g_formation, $nb_mois, $du, $au])) {
        
        // Générer le fichier PDF avec les informations du candidat

        // $pdf = new TCPDF('p','mm','A4',true,'UTF-8',false);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Fiche de candidat');
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, 'Nom: ' . $nom);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Prenom: ' . $prenom);
        $pdf->Ln();
        $pdf->Cell(40, 10, 'Email: ' . $email);
        $pdf->Ln();
        // Ajouter plus d'informations selon votre besoin

        // Enregistrer le PDF dans un dossier
        $file_path = 'pdf/candidats/' . time() . '_fiche.pdf';
        $pdf->Output('F', $file_path); // 'F' pour enregistrer le fichier
        
        // Redirection avec un message de succès et un lien pour télécharger le PDF
        header("Location: ajout_condidat.php?message=success&pdf=" . urlencode($file_path));
        exit();
        
    } else {
        // Redirection avec un message d'erreur en cas d'échec
        header("Location: ajout_condidat.php?message=error");
        exit();
    }
}
?>
