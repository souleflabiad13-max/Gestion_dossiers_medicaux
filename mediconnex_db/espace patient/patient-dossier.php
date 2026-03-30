<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon dossier médical - MédiConnex</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --patient: #00ff88;
        }

        body {
            background: #1a1a2e;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .dossier-container {
            max-width: 1000px;
            width: 100%;
            background: rgba(26,26,46,0.7);
            border: 2px solid var(--patient);
            border-radius: 30px;
            backdrop-filter: blur(10px);
            padding: 30px;
            box-shadow: 0 0 50px var(--patient);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: var(--patient);
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
        }

        .section {
            background: rgba(0,0,0,0.2);
            border: 1px solid var(--patient);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .section-title {
            color: var(--patient);
            font-size: 1.2rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-item {
            padding: 10px 0;
            border-bottom: 1px solid rgba(0,255,136,0.2);
        }

        .info-label {
            color: #aaa;
            font-size: 0.85rem;
        }

        .info-value {
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            color: var(--patient);
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid var(--patient);
        }

        td {
            padding: 10px;
            border-bottom: 1px solid rgba(0,255,136,0.2);
        }
    </style>
</head>
<body>
    <div class="dossier-container">
        <div class="header">
            <h1><i class="fa-solid fa-folder-open"></i> Mon dossier médical</h1>
            <a href="patient-dashboard.php" class="back-link"><i class="fa-solid fa-arrow-left"></i> Retour</a>
        </div>

        <!-- Informations personnelles -->
        <div class="section">
            <div class="section-title"><i class="fa-solid fa-user"></i> Informations personnelles</div>
            <div class="info-grid">
                <div class="info-item"><span class="info-label">Nom</span><div class="info-value">Sarah Benali</div></div>
                <div class="info-item"><span class="info-label">ID</span><div class="info-value">DZ-2503-042</div></div>
                <div class="info-item"><span class="info-label">Âge</span><div class="info-value">32 ans</div></div>
                <div class="info-item"><span class="info-label">Groupe sanguin</span><div class="info-value">A+</div></div>
                <div class="info-item"><span class="info-label">Téléphone</span><div class="info-value">0550 12 34 56</div></div>
                <div class="info-item"><span class="info-label">Adresse</span><div class="info-value">Alger, Ben Aknoun</div></div>
            </div>
        </div>

        <!-- Antécédents & Allergies -->
        <div class="section">
            <div class="section-title"><i class="fa-solid fa-notes-medical"></i> Antécédents & Allergies</div>
            <p><strong>Allergies :</strong> Pénicilline, Arachides</p>
            <p><strong>Antécédents :</strong> Aucun</p>
        </div>

        <!-- Consultations récentes -->
        <div class="section">
            <div class="section-title"><i class="fa-solid fa-clock-rotate-left"></i> Consultations récentes</div>
            <table>
                <thead><tr><th>Date</th><th>Médecin</th><th>Diagnostic</th></tr></thead>
                <tbody>
                    <tr><td>10/03/2025</td><td>Dr. Benali</td><td>Rhume</td></tr>
                    <tr><td>15/02/2025</td><td>Dr. Benali</td><td>Fatigue</td></tr>
                </tbody>
            </table>
        </div>

        <!-- Diagnostics -->
        <div class="section">
            <div class="section-title"><i class="fa-solid fa-stethoscope"></i> Diagnostics</div>
            <ul>
                <li>10/03/2025 : Rhume aigu</li>
                <li>15/02/2025 : Fatigue passagère</li>
            </ul>
        </div>

        <!-- Prescriptions -->
        <div class="section">
            <div class="section-title"><i class="fa-solid fa-prescription"></i> Prescriptions en cours</div>
            <ul>
                <li>Doliprane 500mg - 3x/jour</li>
                <li>Vitamine D - 1 ampoule/mois</li>
            </ul>
        </div>

        <!-- Analyses -->
        <div class="section">
            <div class="section-title"><i class="fa-solid fa-flask"></i> Analyses récentes</div>
            <ul>
                <li>Analyse sanguine - 10/03/2025 (Normale)</li>
                <li>Radio thorax - 05/02/2025 (Normale)</li>
            </ul>
        </div>
    </div>
</body>
</html>