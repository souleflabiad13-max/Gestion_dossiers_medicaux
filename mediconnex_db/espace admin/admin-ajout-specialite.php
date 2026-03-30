<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une spécialité - MédiConnex</title>
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

        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

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

        .form-container {
            background: rgba(0,0,0,0.2);
            border: 1px solid var(--admin);
            border-radius: 20px;
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            color: var(--admin);
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--admin);
            border-radius: 10px;
            color: #fff;
            font-size: 1rem;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--admin);
            box-shadow: 0 0 15px var(--admin);
        }

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
                <li><a href="admin-medecins.php"><i class="fa-solid fa-user-md"></i> Médecins</a></li>
                <li><a href="admin-hopitaux.php"><i class="fa-solid fa-hospital"></i> Hôpitaux</a></li>
                <li class="active"><a href="admin-specialites.php"><i class="fa-solid fa-stethoscope"></i> Spécialités</a></li>
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
            <div class="page-header">
                <h1>
                    <i class="fa-solid fa-plus-circle"></i>
                    Ajouter une spécialité
                </h1>
                <a href="admin-specialites.php" class="back-link">
                    <i class="fa-solid fa-arrow-left"></i> Retour à la liste
                </a>
            </div>

            <div class="form-container">
                <form onsubmit="event.preventDefault(); ajouterSpecialite();">
                    <div class="form-group">
                        <label>Nom de la spécialité</label>
                        <input type="text" id="nomSpecialite" placeholder="Ex: Cardiologie" required>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='admin-specialites.php'">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter la spécialité</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function ajouterSpecialite() {
            // Récupération de la valeur
            const nom = document.getElementById('nomSpecialite').value.trim();

            // Validation
            if (!nom) {
                alert('❌ Veuillez entrer le nom de la spécialité');
                return;
            }

            // Génération d'un ID simple
            const id = 'SP' + Math.floor(Math.random() * 1000).toString().padStart(3, '0');

            // Simulation d'ajout
            alert(`✅ Spécialité ajoutée avec succès !\n\nID: ${id}\nNom: ${nom}`);

            // Redirection vers la liste
            window.location.href = 'admin-specialites.php';
        }
    </script>
</body>
</html>