<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un médecin - MédiConnex</title>
    <link rel="stylesheet" href="style-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --admin: #ffaa33;
            --admin-light: rgba(255,170,51,0.2);
        }

        .form-wrapper {
            display: flex;
            width: 100%;
            max-width: 1400px;
            min-height: 90vh;
            background: rgba(26,26,46,0.7);
            border: 2px solid var(--admin);
            border-radius: 30px;
            backdrop-filter: blur(10px);
            overflow: hidden;
            box-shadow: 0 0 50px var(--admin);
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: rgba(0,0,0,0.3);
            border-right: 2px solid var(--admin);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
            padding: 0 10px;
        }

        .sidebar-logo i {
            font-size: 2.5rem;
            color: var(--admin);
            filter: drop-shadow(0 0 10px var(--admin));
        }

        .sidebar-logo span {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--admin);
            letter-spacing: 2px;
        }

        .sidebar-menu {
            list-style: none;
            flex: 1;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.3s;
            font-size: 0.95rem;
        }

        .sidebar-menu a i {
            width: 25px;
            color: var(--admin);
            font-size: 1.2rem;
        }

        .sidebar-menu a:hover {
            background: var(--admin-light);
            border-left: 4px solid var(--admin);
        }

        .sidebar-menu .active a {
            background: var(--admin-light);
            border-left: 4px solid var(--admin);
            color: var(--admin);
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid var(--admin);
        }

        .sidebar-footer a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: #ff3366;
            text-decoration: none;
            transition: 0.3s;
        }

        /* Contenu principal */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        /* En-tête */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            color: var(--admin);
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
        }

        .back-link:hover {
            color: var(--admin);
        }

        /* Formulaire */
        .form-container {
            background: rgba(0,0,0,0.2);
            border: 1px solid var(--admin);
            border-radius: 20px;
            padding: 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-group label {
            color: var(--admin);
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--admin);
            border-radius: 10px;
            color: #fff;
            font-size: 1rem;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--admin);
            box-shadow: 0 0 15px var(--admin);
        }

        .form-group select option {
            background: #1a1a2e;
            color: #fff;
        }

        /* Boutons */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 40px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            border: 2px solid;
            background: transparent;
        }

        .btn-primary {
            border-color: var(--admin);
            color: var(--admin);
        }

        .btn-primary:hover {
            background: var(--admin);
            color: #1a1a2e;
            box-shadow: 0 0 30px var(--admin);
        }

        .btn-secondary {
            border-color: #ff3366;
            color: #ff3366;
        }

        .btn-secondary:hover {
            background: #ff3366;
            color: #1a1a2e;
            box-shadow: 0 0 30px #ff3366;
        }

        @media (max-width: 768px) {
            .form-wrapper {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 2px solid var(--admin);
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
            .form-group.full-width {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="sidebar-logo">
                <i class="fa-solid fa-hospital-user"></i>
                <span>MédiConnex</span>
            </div>

            <ul class="sidebar-menu">
                <li><a href="admin-dashboard.php"><i class="fa-solid fa-chart-pie"></i> Dashboard</a></li>
                <li class="active"><a href="admin-medecins.php"><i class="fa-solid fa-user-md"></i> Médecins</a></li>
                <li><a href="admin-hopitaux.php"><i class="fa-solid fa-hospital"></i> Hôpitaux</a></li>
                <li><a href="admin-specialites.php"><i class="fa-solid fa-stethoscope"></i> Spécialités</a></li>
                <li><a href="admin-patients.php"><i class="fa-solid fa-users"></i> Patients</a></li>
                <li><a href="admin-statistiques.php"><i class="fa-solid fa-chart-line"></i> Statistiques</a></li>
                <li><a href="admin-logs.php"><i class="fa-solid fa-history"></i> Logs</a></li>
                <li><a href="admin-profil.php"><i class="fa-solid fa-user-cog"></i> Profil</a></li>
            </ul>

            <div class="sidebar-footer">
                <a href="admin-login.php"><i class="fa-solid fa-sign-out-alt"></i> Déconnexion</a>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <!-- En-tête -->
            <div class="page-header">
                <h1>
                    <i class="fa-solid fa-user-plus"></i>
                    Ajouter un médecin
                </h1>
                <a href="admin-medecins.php" class="back-link">
                    <i class="fa-solid fa-arrow-left"></i> Retour à la liste
                </a>
            </div>

            <!-- Formulaire -->
            <div class="form-container">
                <form onsubmit="event.preventDefault(); ajouterMedecin();">
                    <div class="form-grid">
                        <!-- Nom -->
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" id="nom" placeholder="Benali" required>
                        </div>

                        <!-- Prénom -->
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" id="prenom" placeholder="Ahmed" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="email" placeholder="ahmed.benali@email.com" required>
                        </div>

                        <!-- Téléphone -->
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="tel" id="telephone" placeholder="0550 12 34 56" required>
                        </div>

                        <!-- Spécialité -->
                        <div class="form-group">
                            <label>Spécialité</label>
                            <select id="specialite" required>
                                <option value="">Sélectionner</option>
                                <option value="Cardiologie">Cardiologie</option>
                                <option value="Neurologie">Neurologie</option>
                                <option value="Dermatologie">Dermatologie</option>
                                <option value="Pédiatrie">Pédiatrie</option>
                                <option value="Gynécologie">Gynécologie</option>
                                <option value="Médecine générale">Médecine générale</option>
                            </select>
                        </div>

                        <!-- Hôpital -->
                        <div class="form-group">
                            <label>Hôpital</label>
                            <select id="hopital" required>
                                <option value="">Sélectionner</option>
                                <option value="CHU Mustapha">CHU Mustapha</option>
                                <option value="CHU Oran">CHU Oran</option>
                                <option value="CHU Constantine">CHU Constantine</option>
                                <option value="CHU Annaba">CHU Annaba</option>
                            </select>
                        </div>

                        <!-- Wilaya -->
                        <div class="form-group">
                            <label>Wilaya</label>
                            <select id="wilaya" required>
                                <option value="">Sélectionner</option>
                                <option value="Alger (16)">Alger (16)</option>
                                <option value="Oran (31)">Oran (31)</option>
                                <option value="Constantine (25)">Constantine (25)</option>
                                <option value="Annaba (23)">Annaba (23)</option>
                                <option value="Sétif (19)">Sétif (19)</option>
                            </select>
                        </div>

                        <!-- Mot de passe -->
                        <div class="form-group full-width">
                            <label>Mot de passe</label>
                            <input type="password" id="password" placeholder="••••••••" required>
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='admin-medecins.php'">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter le médecin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function ajouterMedecin() {
            // Récupération des valeurs
            const nom = document.getElementById('nom').value.trim();
            const prenom = document.getElementById('prenom').value.trim();
            const email = document.getElementById('email').value.trim();
            const telephone = document.getElementById('telephone').value.trim();
            const specialite = document.getElementById('specialite').value;
            const hopital = document.getElementById('hopital').value;
            const wilaya = document.getElementById('wilaya').value;
            const password = document.getElementById('password').value;

            // Validation simple
            if (!nom || !prenom || !email || !telephone || !specialite || !hopital || !wilaya || !password) {
                alert('❌ Veuillez remplir tous les champs');
                return;
            }

            // Génération d'un ID simple
            const id = 'DOC' + Math.floor(Math.random() * 1000).toString().padStart(3, '0');

            // Simulation d'ajout
            alert(`✅ Médecin ajouté avec succès !\n\nID: ${id}\nNom: ${prenom} ${nom}\nSpécialité: ${specialite}\nHôpital: ${hopital} (${wilaya})`);

            // Redirection vers la liste
            window.location.href = 'admin-medecin.php';
        }
    </script>
</body>
</html>