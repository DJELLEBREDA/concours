<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        .message-container {
            padding: 20px;
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 24px;
        }
        .success-message, .error-message {
            padding: 15px;
            border-radius: 5px;
            font-size:24;
            color: #2c3e50;
        }
        .success-message {
            background-color: #e0f7e9;
            border: 1px solid #2ecc71;
        }
        .error-message {
            background-color: #fbeaea;
            border: 1px solid #e74c3c;
            color: #c0392b;
        }
        .download-btn, .print-btn {
            display: inline-block;
            padding: 8px 12px;
            margin-top: 15px;
            text-decoration: none;
            color: #ffffff;
            border-radius: 4px;
            font-size: 18px;
        }
        .download-btn {
            background-color: #3498db;
        }
        .print-btn {
            background-color: #1abc9c;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="message-container">
    <?php 
    if (isset($_GET['message']) && $_GET['message'] == 'success' && isset($_GET['pdf'])) {
        $pdfLink = urldecode($_GET['pdf']);
        // Vérification de l'existence du fichier
        if (file_exists($pdfLink)) {
    ?>
            <div class="success-message">
                <p>تمت إضافة المترشح بنجاح</p>
                <a href="<?php echo $pdfLink; ?>" target="_blank" class="download-btn" download>تحميل إستدعاء المترشح</a>
                <button class="print-btn" onclick="openAndPrintPDF('<?php echo $pdfLink; ?>')">طباعة إستدعاء المترشح</button>
            </div>
    <?php 
        } else {
            echo '<p>Le fichier PDF est introuvable.</p>';
        }
    } elseif (isset($_GET['message']) && $_GET['message'] == 'error') { 
    ?>
        <div class="error-message">
            <p>Erreur lors de l'ajout du candidat. Veuillez réessayer.</p>
        </div>
    <?php 
    } 
    ?>
</div>

<script>
function openAndPrintPDF(url) {
    const printWindow = window.open(url, '_blank');
    if (printWindow) {
        printWindow.onload = function() {
            // Ajoute un délai pour s'assurer que le PDF est complètement chargé avant d'imprimer
            setTimeout(() => {
                printWindow.print(); // Lance l'impression
            }, 500); // Délai de 500ms
        };
    } else {
        alert('Le pop-up est bloqué. Veuillez autoriser les pop-ups pour imprimer le PDF.');
    }
}

</script>

</body>
</html>
