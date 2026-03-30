<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des médecins - MédiConnex</title>
    <link rel="stylesheet" href="style-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --admin: #ffaa33;
            --admin-light: rgba(255,170,51,0.2);
        }

        .gestion-wrapper {
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

        .btn-add {
            background: rgba(0,0,0,0.2);
            border: 2px solid var(--admin);
            border-radius: 40px;
            padding: 12px 25px;
            color: var(--admin);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .btn-add:hover {
            background: var(--admin);
            color: #1a1a2e;
            box-shadow: 0 0 30px var(--admin);
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

        .action-icons {
            display: flex;
            gap: 15px;
        }

        .action-icons i {
            color: #aaa;
            cursor: pointer;
            transition: 0.3s;
            font-size: 1.1rem;
        }

        .action-icons i:hover {
            color: var(--admin);
        }

        .action-icons .fa-trash:hover {
            color: #ff3366;
        }

        /* MODAL DE MODIFICATION */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            backdrop-filter: blur(5px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: linear-gradient(145deg, #16213e, #1a1a2e);
            border: 2px solid var(--admin);
            border-radius: 30px;
            padding: 30px;
            width: 90%;
            max-width: 500px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            color: var(--admin);
        }

        .close-modal {
            color: #aaa;
            font-size: 2rem;
            cursor: pointer;
        }

        .close-modal:hover {
            color: #ff3366;
        }

        .modal-field {
            margin-bottom: 15px;
        }

        .modal-field label {
            color: var(--admin);
            display: block;
            margin-bottom: 5px;
        }

        .modal-field input,
        .modal-field select {
            width: 100%;
            padding: 10px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--admin);
            border-radius: 8px;
            color: #fff;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .modal-btn {
            flex: 1;
            padding: 10px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            border: 2px solid;
            background: transparent;
        }

        .modal-btn.save {
            border-color: var(--admin);
            color: var(--admin);
        }

        .modal-btn.save:hover {
            background: var(--admin);
            color: #1a1a2e;
        }

        .modal-btn.cancel {
            border-color: #ff3366;
            color: #ff3366;
        }

        .modal-btn.cancel:hover {
            background: #ff3366;
            color: #1a1a2e;
        }

        @media (max-width: 768px) {
            .gestion-wrapper {
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
    <div class="gestion-wrapper">
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
            <div class="page-header">
                <h1>
                    <i class="fa-solid fa-user-md"></i>
                    Gestion des médecins
                </h1>
                <a href="admin-ajout-medecin.php" class="btn-add">
                    <i class="fa-solid fa-plus"></i> Ajouter un médecin
                </a>
            </div>

            <div class="table-container">
                <table id="medecinsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Spécialité</th>
                            <th>Hôpital</th>
                            <th>Wilaya</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="medecinsBody">
                        <!-- Rempli par JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL DE MODIFICATION -->
    <div id="modalModif" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fa-solid fa-pen"></i> Modifier médecin</h2>
                <span class="close-modal" onclick="fermerModal()">&times;</span>
            </div>
            <div class="modal-field">
                <label>ID</label>
                <input type="text" id="editId" readonly>
            </div>
            <div class="modal-field">
                <label>Nom</label>
                <input type="text" id="editNom">
            </div>
            <div class="modal-field">
                <label>Prénom</label>
                <input type="text" id="editPrenom">
            </div>
            <div class="modal-field">
                <label>Spécialité</label>
                <input type="text" id="editSpecialite">
            </div>
            <div class="modal-field">
                <label>Hôpital</label>
                <input type="text" id="editHopital">
            </div>
            <div class="modal-field">
                <label>Wilaya</label>
                <select id="editWilaya">
                    <option value="Alger (16)">Alger (16)</option>
                    <option value="Oran (31)">Oran (31)</option>
                    <option value="Constantine (25)">Constantine (25)</option>
                    <option value="Annaba (23)">Annaba (23)</option>
                    <option value="Sétif (19)">Sétif (19)</option>
                </select>
            </div>
            <div class="modal-actions">
                <button class="modal-btn save" onclick="enregistrerModification()">Enregistrer</button>
                <button class="modal-btn cancel" onclick="fermerModal()">Annuler</button>
            </div>
        </div>
    </div>

    <script>
        // Données initiales des médecins
        let medecins = [
            { id: 'DOC001', nom: 'Benali', prenom: 'Ahmed', specialite: 'Cardiologie', hopital: 'CHU Mustapha', wilaya: 'Alger (16)' },
            { id: 'DOC002', nom: 'Amine', prenom: 'Karim', specialite: 'Neurologie', hopital: 'CHU Oran', wilaya: 'Oran (31)' },
            { id: 'DOC003', nom: 'Leila', prenom: 'Fatima', specialite: 'Dermatologie', hopital: 'CHU Constantine', wilaya: 'Constantine (25)' },
            { id: 'DOC004', nom: 'Said', prenom: 'Mohamed', specialite: 'Pédiatrie', hopital: 'CHU Annaba', wilaya: 'Annaba (23)' }
        ];

        let ligneEnCours = null;

        function afficherMedecins() {
            const tbody = document.getElementById('medecinsBody');
            tbody.innerHTML = '';

            medecins.forEach(m => {
                const ligne = document.createElement('tr');
                ligne.setAttribute('data-id', m.id);
                ligne.setAttribute('data-nom', m.nom);
                ligne.setAttribute('data-prenom', m.prenom);
                ligne.setAttribute('data-specialite', m.specialite);
                ligne.setAttribute('data-hopital', m.hopital);
                ligne.setAttribute('data-wilaya', m.wilaya);
                ligne.innerHTML = `
                    <td>${m.id}</td>
                    <td>${m.nom}</td>
                    <td>${m.prenom}</td>
                    <td>${m.specialite}</td>
                    <td>${m.hopital}</td>
                    <td>${m.wilaya}</td>
                    <td class="action-icons">
                        <i class="fa-solid fa-eye" title="Voir" onclick="voirMedecin('${m.id}')"></i>
                        <i class="fa-solid fa-pen" title="Modifier" onclick="ouvrirModal(this)"></i>
                        <i class="fa-solid fa-trash" title="Supprimer" onclick="supprimerMedecin(this)"></i>
                    </td>
                `;
                tbody.appendChild(ligne);
            });
        }

        // Fonction Voir
        window.voirMedecin = function(id) {
            const med = medecins.find(m => m.id === id);
            alert(`👁️ Détails du médecin :\n\nID: ${med.id}\nNom: ${med.nom} ${med.prenom}\nSpécialité: ${med.specialite}\nHôpital: ${med.hopital}\nWilaya: ${med.wilaya}`);
        };

        // Fonction Supprimer
        window.supprimerMedecin = function(icone) {
            if (confirm('🗑️ Supprimer ce médecin ?')) {
                const ligne = icone.closest('tr');
                const id = ligne.getAttribute('data-id');
                medecins = medecins.filter(m => m.id !== id);
                afficherMedecins();
            }
        };

        // Fonction Modifier (ouvrir modal)
        window.ouvrirModal = function(icone) {
            ligneEnCours = icone.closest('tr');
            document.getElementById('editId').value = ligneEnCours.getAttribute('data-id');
            document.getElementById('editNom').value = ligneEnCours.getAttribute('data-nom');
            document.getElementById('editPrenom').value = ligneEnCours.getAttribute('data-prenom');
            document.getElementById('editSpecialite').value = ligneEnCours.getAttribute('data-specialite');
            document.getElementById('editHopital').value = ligneEnCours.getAttribute('data-hopital');
            document.getElementById('editWilaya').value = ligneEnCours.getAttribute('data-wilaya');
            document.getElementById('modalModif').style.display = 'flex';
        };

        window.fermerModal = function() {
            document.getElementById('modalModif').style.display = 'none';
            ligneEnCours = null;
        };

        window.enregistrerModification = function() {
            if (!ligneEnCours) return;

            const id = document.getElementById('editId').value;
            const newNom = document.getElementById('editNom').value;
            const newPrenom = document.getElementById('editPrenom').value;
            const newSpecialite = document.getElementById('editSpecialite').value;
            const newHopital = document.getElementById('editHopital').value;
            const newWilaya = document.getElementById('editWilaya').value;

            // Mettre à jour le tableau medecins
            const med = medecins.find(m => m.id === id);
            if (med) {
                med.nom = newNom;
                med.prenom = newPrenom;
                med.specialite = newSpecialite;
                med.hopital = newHopital;
                med.wilaya = newWilaya;
            }

            // Mettre à jour l'affichage
            ligneEnCours.setAttribute('data-nom', newNom);
            ligneEnCours.setAttribute('data-prenom', newPrenom);
            ligneEnCours.setAttribute('data-specialite', newSpecialite);
            ligneEnCours.setAttribute('data-hopital', newHopital);
            ligneEnCours.setAttribute('data-wilaya', newWilaya);
            ligneEnCours.cells[1].innerText = newNom;
            ligneEnCours.cells[2].innerText = newPrenom;
            ligneEnCours.cells[3].innerText = newSpecialite;
            ligneEnCours.cells[4].innerText = newHopital;
            ligneEnCours.cells[5].innerText = newWilaya;

            fermerModal();
        };

        // Initialisation
        afficherMedecins();
    </script>
</body>
</html>