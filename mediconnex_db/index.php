<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MédiConnex - Accueil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            color: #fff;
            background: #1a1a2e;
        }

        /* ===== IMAGE DE FOND MÉDICALE ===== */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?q=80&w=2073&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(0.3) blur(2px);
            z-index: -1;
        }

        /* ===== SUPERPOSITION MÉDICALE ===== */
        .medical-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 30%, rgba(0,212,255,0.1), transparent 60%);
            pointer-events: none;
            z-index: 0;
        }

        /* ===== CONTENEUR PRINCIPAL ===== */
        .container {
            position: relative;
            z-index: 10;
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 30px;
            text-align: center;
        }

        /* ===== TITRE LUMINEUX ===== */
        .site-title {
            margin-bottom: 60px;
        }

        .site-title h1 {
            font-size: 4.5rem;
            color: #00d4ff;
            text-shadow: 
                0 0 10px #00d4ff,
                0 0 20px #00d4ff,
                0 0 40px #00d4ff,
                0 0 80px #00d4ff;
            letter-spacing: 6px;
            margin-bottom: 10px;
            animation: pulse 2.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { text-shadow: 0 0 10px #00d4ff, 0 0 20px #00d4ff, 0 0 40px #00d4ff; }
            50% { text-shadow: 0 0 20px #00d4ff, 0 0 40px #00d4ff, 0 0 60px #00d4ff, 0 0 100px #00d4ff; }
        }

        .site-title p {
            color: rgba(255,255,255,0.9);
            font-size: 1.3rem;
            letter-spacing: 2px;
        }

        /* ===== GRILLE DES CARTES ===== */
        .cards-grid {
            display: flex;
            justify-content: center;
            align-items: stretch;
            gap: 30px;
            flex-wrap: wrap;
            margin-bottom: 60px;
        }

        /* ===== CARTES COLORÉES ===== */
        .role-card {
            background: rgba(26,26,46,0.8);
            backdrop-filter: blur(10px);
            border: 2px solid;
            border-radius: 30px;
            padding: 40px 30px;
            width: 320px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
        }

        .role-card:hover {
            transform: translateY(-20px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0,0,0,0.6);
        }

        /* Couleurs spécifiques */
        .role-card.medecin {
            border-color: #00d4ff;
            box-shadow: 0 0 30px rgba(0,212,255,0.3);
        }

        .role-card.medecin:hover {
            box-shadow: 0 0 60px #00d4ff;
        }

        .role-card.patient {
            border-color: #00ff88;
            box-shadow: 0 0 30px rgba(0,255,136,0.3);
        }

        .role-card.patient:hover {
            box-shadow: 0 0 60px #00ff88;
        }

        .role-card.admin {
            border-color: #ffaa33;
            box-shadow: 0 0 30px rgba(255,170,51,0.3);
        }

        .role-card.admin:hover {
            box-shadow: 0 0 60px #ffaa33;
        }

        .role-card i {
            font-size: 5rem;
            margin-bottom: 20px;
        }

        .role-card.medecin i {
            color: #00d4ff;
        }

        .role-card.patient i {
            color: #00ff88;
        }

        .role-card.admin i {
            color: #ffaa33;
        }

        .role-card h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .role-card.medecin h2 {
            color: #00d4ff;
        }

        .role-card.patient h2 {
            color: #00ff88;
        }

        .role-card.admin h2 {
            color: #ffaa33;
        }

        .role-card p {
            color: #ddd;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .btn-card {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 40px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            border: 2px solid;
            background: transparent;
        }

        .role-card.medecin .btn-card {
            border-color: #00d4ff;
            color: #00d4ff;
        }

        .role-card.medecin .btn-card:hover {
            background: #00d4ff;
            color: #1a1a2e;
            box-shadow: 0 0 30px #00d4ff;
        }

        .role-card.patient .btn-card {
            border-color: #00ff88;
            color: #00ff88;
        }

        .role-card.patient .btn-card:hover {
            background: #00ff88;
            color: #1a1a2e;
            box-shadow: 0 0 30px #00ff88;
        }

        .role-card.admin .btn-card {
            border-color: #ffaa33;
            color: #ffaa33;
        }

        .role-card.admin .btn-card:hover {
            background: #ffaa33;
            color: #1a1a2e;
            box-shadow: 0 0 30px #ffaa33;
        }

        /* ===== FOOTER CONTACT ===== */
        .footer {
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(10px);
            padding: 40px 30px 20px;
            margin-top: 60px;
            border-top: 2px solid #00d4ff33;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-section {
            text-align: left;
        }

        .footer-section h3 {
            color: #00d4ff;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .footer-section p {
            color: #aaa;
            margin: 8px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-section i {
            color: #00d4ff;
            width: 20px;
        }

        .footer-bottom {
            border-top: 1px solid #00d4ff22;
            padding-top: 20px;
            color: #aaa;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .site-title h1 {
                font-size: 3rem;
            }
            
            .cards-grid {
                gap: 20px;
            }
            
            .role-card {
                width: 100%;
                max-width: 350px;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .footer-section {
                text-align: center;
            }
            
            .footer-section p {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="medical-overlay"></div>

    <div class="container">
        <!-- Titre lumineux -->
        <div class="site-title">
            <h1>MÉDICONNEX</h1>
            <p>Plateforme médicale sécurisée</p>
        </div>

        <!-- Cartes des rôles -->
        <div class="cards-grid">
            <!-- Médecin (bleu) -->
            <div class="role-card medecin" onclick="window.location.href='C:/xampp/htdocs/mediconnex_db/espace medecin/medecin-login.php'">
                <i class="fa-solid fa-user-md"></i>
                <h2>Médecin</h2>
                <p>Accédez à votre espace de travail, gérez vos patients et leurs dossiers médicaux.</p>
                <a href="espace medecin/medecin-login.php" class="btn-card">Se connecter →</a>
            </div>

            <!-- Patient (vert) -->
            <div class="role-card patient" onclick="window.location.href='C:/xampp/htdocs/mediconnex_db/espace patient/patient-login.php'">
                <i class="fa-solid fa-user-injured"></i>
                <h2>Patient</h2>
                <p>Consultez votre dossier médical, vos rendez-vous et vos prescriptions.</p>
                <a href="espace patient/patient-login.php" class="btn-card">Accéder →</a>
            </div>

            <!-- Administrateur (orange) -->
            <div class="role-card admin" onclick="window.location.href='C:/xampp/htdocs/mediconnex_db/espace admin/admin-login.php'">
                <i class="fa-solid fa-user-tie"></i>
                <h2>Administrateur</h2>
                <p>Gérez les comptes médecins, les statistiques et la configuration du système.</p>
                <a href="espace admin/admin-login.php" class="btn-card">Accéder →</a>
            </div>
        </div>
    </div>

    <!-- Footer avec contact -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3><i class="fa-solid fa-hospital"></i> MédiConnex</h3>
                <p><i class="fa-solid fa-location-dot"></i> 15 Rue des Médecins, Alger</p>
                <p><i class="fa-solid fa-phone"></i> +213 23 45 67 89</p>
                <p><i class="fa-solid fa-envelope"></i> contact@mediconnex.dz</p>
            </div>
            <div class="footer-section">
                <h3>Horaires</h3>
                <p><i class="fa-solid fa-clock"></i> Lun-Ven: 8h - 18h</p>
                <p><i class="fa-solid fa-clock"></i> Sam: 9h - 14h</p>
                <p><i class="fa-solid fa-clock"></i> Dim: Fermé</p>
            </div>
            <div class="footer-section">
                <h3>Liens utiles</h3>
                <p><i class="fa-solid fa-shield"></i> Confidentialité</p>
                <p><i class="fa-solid fa-file-contract"></i> CGU</p>
                <p><i class="fa-solid fa-headset"></i> Support</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 MédiConnex - Tous droits réservés. Plateforme médicale sécurisée.</p>
        </div>
    </footer>
</body>
</html>