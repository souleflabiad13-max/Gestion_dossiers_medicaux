<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des actions - MédiConnex</title>
    <link rel="stylesheet" href="style-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --admin: #ffaa33;
            --admin-light: rgba(255,170,51,0.2);
        }

        .logs-wrapper {
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
            margin-bottom: 30px;
        }

        .page-header h1 {
            color: var(--admin);
            font-size: 2rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .filter-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .filter-bar input {
            flex: 1;
            padding: 12px 15px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--admin);
            border-radius: 10px;
            color: #fff;
        }

        .filter-bar select {
            padding: 12px 15px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--admin);
            border-radius: 10px;
            color: #fff;
        }

        .table-container {
            overflow-x: auto;
            background: rgba(0,0,0,0.2);
            border: 1px solid var(--admin);
            border-radius: 15px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            color: var(--admin);
            padding: 15px 10px;
            text-align: left;
            border-bottom: 2px solid var(--admin);
            font-weight: 600;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid rgba(255,170,51,0.2);
        }

        tr:hover td {
            background: var(--admin-light);
        }

        .badge {
            background: rgba(255,170,51,0.2);
            color: var(--admin);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            border: 1px solid var(--admin);
        }

        .badge-action {
            background: rgba(0,212,255,0.2);
            color: #00d4ff;
        }

        @media (max-width: 768px) {
            .logs-wrapper {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 2px solid var(--admin);
            }
            .filter-bar {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="logs-wrapper">
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
                <li><a href="admin-specialites.php"><i class="fa-solid fa-stethoscope"></i> Spécialités</a></li>
                <li><a href="admin-patients.php"><i class="fa-solid fa-users"></i> Patients</a></li>
                <li><a href="admin-statistiques.php"><i class="fa-solid fa-chart-line"></i> Statistiques</a></li>
                <li class="active"><a href="admin-logs.php"><i class="fa-solid fa-history"></i> Logs</a></li>
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
                    <i class="fa-solid fa-history"></i>
                    Historique des actions
                </h1>
            </div>

            <!-- Filtres -->
            <div class="filter-bar">
                <input type="text" id="searchLog" placeholder="Rechercher par utilisateur ou action..." onkeyup="filtrerLogs()">
                <select id="filterAction" onchange="filtrerLogs()">
                    <option value="all">Toutes les actions</option>
                    <option value="Ajout">Ajouts</option>
                    <option value="Modification">Modifications</option>
                    <option value="Suppression">Suppressions</option>
                </select>
            </div>

            <div class="table-container">
                <table id="logsTable">
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="logsBody">
                        <!-- Rempli par JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Données des logs
        let logsData = [
            { user: 'Admin', action: 'Ajout médecin', date: '14/03/2026 10:30' },
            { user: 'Admin', action: 'Modification hôpital', date: '14/03/2026 09:15' },
            { user: 'Admin', action: 'Suppression patient', date: '13/03/2026 16:45' },
            { user: 'Admin', action: 'Ajout spécialité', date: '13/03/2026 14:20' },
            { user: 'Admin', action: 'Ajout médecin', date: '12/03/2026 11:10' },
            { user: 'Admin', action: 'Modification médecin', date: '12/03/2026 09:30' },
            { user: 'Admin', action: 'Ajout hôpital', date: '11/03/2026 15:45' }
        ];

        let logsFiltres = [...logsData];

        function afficherLogs() {
            const tbody = document.getElementById('logsBody');
            tbody.innerHTML = '';

            logsFiltres.forEach(log => {
                const badgeClass = log.action.includes('Ajout') ? 'badge' : log.action.includes('Modification') ? 'badge badge-action' : 'badge';
                tbody.innerHTML += `
                    <tr>
                        <td>${log.user}</td>
                        <td><span class="${badgeClass}">${log.action}</span></td>
                        <td>${log.date}</td>
                    </tr>
                `;
            });
        }

        window.filtrerLogs = function() {
            const search = document.getElementById('searchLog').value.toLowerCase();
            const filterAction = document.getElementById('filterAction').value;

            logsFiltres = logsData.filter(log => {
                const matchSearch = log.user.toLowerCase().includes(search) || log.action.toLowerCase().includes(search);
                const matchAction = filterAction === 'all' || log.action.includes(filterAction);
                return matchSearch && matchAction;
            });

            afficherLogs();
        };

        afficherLogs();
    </script>
</body>
</html>