<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous - MédiConnex</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .rdv-wrapper {
            max-width: 700px;
            width: 100%;
            background: rgba(26,26,46,0.7);
            border: 2px solid #00d4ff33;
            border-radius: 30px;
            backdrop-filter: blur(10px);
            padding: 30px;
            box-shadow: 0 0 50px rgba(0,212,255,0.2);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            color: #00d4ff;
            font-size: 2rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back-link {
            color: #aaa;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            font-size: 1rem;
        }

        .back-link:hover {
            color: #00d4ff;
        }

        .rdv-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .rdv-item {
            background: rgba(0,212,255,0.03);
            border: 1px solid #00d4ff33;
            border-radius: 15px;
            padding: 20px;
            transition: 0.3s;
        }

        .rdv-item:hover {
            border-color: #00d4ff;
            background: rgba(0,212,255,0.05);
        }

        .rdv-patient {
            color: #00d4ff;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .rdv-details {
            color: #aaa;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .rdv-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 5px;
        }

        .status-confirme {
            background: rgba(0,212,255,0.2);
            color: #00d4ff;
            border: 1px solid #00d4ff;
        }

        .status-attente {
            background: rgba(255,170,51,0.2);
            color: #ffaa33;
            border: 1px solid #ffaa33;
        }

        .status-termine {
            background: rgba(0,255,136,0.2);
            color: #00ff88;
            border: 1px solid #00ff88;
        }

        hr {
            border: none;
            border-top: 1px solid #00d4ff22;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="rdv-wrapper">
        <div class="page-header">
            <h1><i class="fa-solid fa-calendar-check"></i> Rendez-vous</h1>
        </div>

        <div class="rdv-list">
            <!-- Rendez-vous 1 -->
            <div class="rdv-item">
                <div class="rdv-patient">Sarah Benali</div>
                <div class="rdv-details">10:30 – Consultation de suivi</div>
                <span class="rdv-status status-confirme">Confirmé</span>
            </div>

            <!-- Rendez-vous 2 -->
            <div class="rdv-item">
                <div class="rdv-patient">Karim Bensalem</div>
                <div class="rdv-details">14:00 – Résultats d'analyses</div>
                <span class="rdv-status status-attente">En attente</span>
            </div>

            <!-- Rendez-vous 3 -->
            <div class="rdv-item">
                <div class="rdv-patient">Mohamed Amine</div>
                <div class="rdv-details">09:00 – Consultation terminée</div>
                <span class="rdv-status status-termine">Terminé</span>
            </div>
        </div>

        <!-- Ligne de séparation -->
        <hr>

        <!-- Lien retour -->
        <div style="text-align: center; margin-top: 20px;">
            <a href="medecin-dashboard.php" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> Retour
            </a>
        </div>
    </div>
</body>
</html>