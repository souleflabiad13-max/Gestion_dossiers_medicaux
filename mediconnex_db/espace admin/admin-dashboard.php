<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - MédiConnex</title>
    <link rel="stylesheet" href="style-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --admin: #ffaa33;
            --admin-light: rgba(255,170,51,0.2);
        }

        .dashboard-wrapper {
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

        .sidebar-footer a:hover {
            background: rgba(255,51,102,0.1);
            border-left: 4px solid #ff3366;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header-search {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--admin);
            border-radius: 40px;
            padding: 5px 15px;
        }

        .header-search i {
            color: var(--admin);
        }

        .header-search input {
            background: transparent;
            border: none;
            color: #fff;
            padding: 10px;
            width: 250px;
        }

        .header-search input:focus {
            outline: none;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
        }

        .admin-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--admin), #1a1a2e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--admin);
        }

        .admin-avatar i {
            font-size: 1.5rem;
            color: #fff;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(0,0,0,0.2);
            border: 1px solid var(--admin);
            border-radius: 15px;
            padding: 20px;
            transition: 0.3s;
        }

        .stat-card:hover {
            background: var(--admin-light);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255,170,51,0.3);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-header i {
            font-size: 2.5rem;
            color: var(--admin);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--admin);
            margin-bottom: 5px;
        }

        .stat-label {
            color: #aaa;
            font-size: 0.9rem;
        }

        .quick-actions {
            margin-bottom: 30px;
        }

        .quick-actions h3 {
            color: var(--admin);
            margin-bottom: 15px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .action-btn {
            background: rgba(0,0,0,0.2);
            border: 1px solid var(--admin);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            color: #fff;
            display: block;
        }

        .action-btn:hover {
            background: var(--admin-light);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255,170,51,0.3);
        }

        .action-btn i {
            font-size: 2rem;
            color: var(--admin);
            margin-bottom: 10px;
            display: block;
        }

        .action-btn span {
            color: #fff;
            font-size: 0.9rem;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart-card {
            background: rgba(0,0,0,0.2);
            border: 1px solid var(--admin);
            border-radius: 15px;
            padding: 20px;
        }

        .chart-title {
            color: var(--admin);
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .chart-bars {
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            height: 150px;
        }

        .bar {
            width: 30px;
            background: linear-gradient(to top, var(--admin), #ffaa33);
            border-radius: 5px 5px 0 0;
            transition: 0.3s;
        }

        .bar:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px var(--admin);
        }

        .bar-label {
            text-align: center;
            margin-top: 10px;
            color: #aaa;
            font-size: 0.8rem;
        }

        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .dashboard-wrapper {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 2px solid var(--admin);
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .actions-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="sidebar-logo">
                <i class="fa-solid fa-hospital-user"></i>
                <span>MédiConnex</span>
            </div>

            <ul class="sidebar-menu">
                <li class="active"><a href="admin-dashboard.php"><i class="fa-solid fa-chart-pie"></i> Dashboard</a></li>
                <li><a href="admin-medecins.php"><i class="fa-solid fa-user-md"></i> Médecins</a></li>
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
            <!-- HEADER -->
            <div class="dashboard-header">
                <div class="header-search">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" placeholder="Rechercher...">
                </div>
                <div class="admin-profile" onclick="window.location.href='admin-profil.php'">
                    <span>Admin</span>
                    <div class="admin-avatar">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                </div>
            </div>

            <!-- STATISTIQUES -->
            <div class="stats-grid">
                <div class="stat-card" onclick="window.location.href='admin-medecins.php'">
                    <div class="stat-header">
                        <i class="fa-solid fa-user-md"></i>
                    </div>
                    <div class="stat-number">24</div>
                    <div class="stat-label">Médecins</div>
                </div>
                <div class="stat-card" onclick="window.location.href='admin-patients.php'">
                    <div class="stat-header">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="stat-number">124</div>
                    <div class="stat-label">Patients</div>
                </div>
                <div class="stat-card" onclick="window.location.href='admin-hopitaux.php'">
                    <div class="stat-header">
                        <i class="fa-solid fa-hospital"></i>
                    </div>
                    <div class="stat-number">8</div>
                    <div class="stat-label">Hôpitaux</div>
                </div>
                <div class="stat-card" onclick="window.location.href='admin-statistiques.php'">
                    <div class="stat-header">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="stat-number">56</div>
                    <div class="stat-label">Consultations</div>
                </div>
            </div>

            <!-- ACCÈS RAPIDE (avec liens corrigés) -->
            <div class="quick-actions">
                <h3><i class="fa-solid fa-bolt"></i> Accès rapide</h3>
                <div class="actions-grid">
                    <a href="admin-ajout-medecin.php" class="action-btn">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Ajouter médecin</span>
                    </a>
                    <a href="admin-ajout-hopital.php" class="action-btn">
                        <i class="fa-solid fa-building"></i>
                        <span>Ajouter hôpital</span>
                    </a>
                    <a href="admin-patients.php" class="action-btn">
                        <i class="fa-solid fa-eye"></i>
                        <span>Voir patients</span>
                    </a>
                    <a href="admin-statistiques.php" class="action-btn">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Statistiques</span>
                    </a>
                </div>
            </div>

            <!-- GRAPHIQUES -->
            <div class="charts-grid">
                <!-- Consultations par mois -->
                <div class="chart-card">
                    <div class="chart-title">Consultations par mois</div>
                    <div class="chart-bars">
                        <div><div class="bar" style="height: 80px;"></div><div class="bar-label">Jan</div></div>
                        <div><div class="bar" style="height: 110px;"></div><div class="bar-label">Fév</div></div>
                        <div><div class="bar" style="height: 95px;"></div><div class="bar-label">Mar</div></div>
                        <div><div class="bar" style="height: 130px;"></div><div class="bar-label">Avr</div></div>
                        <div><div class="bar" style="height: 70px;"></div><div class="bar-label">Mai</div></div>
                    </div>
                </div>

                <!-- Patients enregistrés -->
                <div class="chart-card">
                    <div class="chart-title">Patients enregistrés</div>
                    <div class="chart-bars">
                        <div><div class="bar" style="height: 60px;"></div><div class="bar-label">Jan</div></div>
                        <div><div class="bar" style="height: 85px;"></div><div class="bar-label">Fév</div></div>
                        <div><div class="bar" style="height: 100px;"></div><div class="bar-label">Mar</div></div>
                        <div><div class="bar" style="height: 115px;"></div><div class="bar-label">Avr</div></div>
                        <div><div class="bar" style="height: 90px;"></div><div class="bar-label">Mai</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>