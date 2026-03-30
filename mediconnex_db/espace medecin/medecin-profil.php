<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil médecin - MédiConnex</title>
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
            background: #1a1a2e;
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .profil-wrapper {
            max-width: 700px;
            width: 100%;
            background: rgba(26,26,46,0.7);
            border: 2px solid #00d4ff33;
            border-radius: 30px;
            backdrop-filter: blur(10px);
            padding: 40px;
            box-shadow: 0 0 50px rgba(0,212,255,0.2);
        }

        .profil-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profil-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #00d4ff, #1a1a2e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 4px solid #00d4ff;
            box-shadow: 0 0 30px #00d4ff66;
        }

        .profil-avatar i {
            font-size: 4rem;
            color: #fff;
        }

        .profil-header h1 {
            color: #00d4ff;
            font-size: 2.5rem;
            margin-bottom: 5px;
        }

        .profil-header p {
            color: #aaa;
            font-size: 1.1rem;
        }

        .info-card {
            background: rgba(0,212,255,0.03);
            border: 1px solid #00d4ff33;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #00d4ff22;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #aaa;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-label i {
            color: #00d4ff;
            width: 20px;
        }

        .info-value {
            color: #fff;
            font-weight: 500;
            font-size: 1rem;
        }

        .profil-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-action {
            flex: 1;
            padding: 15px;
            border: 2px solid;
            border-radius: 40px;
            background: transparent;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-modifier {
            border-color: #00d4ff;
            color: #00d4ff;
        }

        .btn-modifier:hover {
            background: #00d4ff;
            color: #1a1a2e;
            box-shadow: 0 0 30px #00d4ff;
        }

        .btn-logout {
            border-color: #ff3366;
            color: #ff3366;
        }

        .btn-logout:hover {
            background: #ff3366;
            color: #1a1a2e;
            box-shadow: 0 0 30px #ff3366;
        }

        /* MODAL */
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
            border: 2px solid #00d4ff;
            border-radius: 30px;
            padding: 35px;
            width: 90%;
            max-width: 500px;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            color: #00d4ff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .close-modal {
            color: #aaa;
            font-size: 2rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .close-modal:hover {
            color: #ff3366;
        }

        .modal-field {
            margin-bottom: 15px;
        }

        .modal-field label {
            color: #00d4ff;
            display: block;
            margin-bottom: 5px;
        }

        .modal-field input {
            width: 100%;
            padding: 12px;
            background: rgba(255,255,255,0.05);
            border: 1px solid #00d4ff33;
            border-radius: 8px;
            color: #fff;
        }

        .modal-field input:focus {
            outline: none;
            border-color: #00d4ff;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .modal-btn {
            flex: 1;
            padding: 12px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            border: 2px solid;
            background: transparent;
        }

        .modal-btn.save {
            border-color: #00d4ff;
            color: #00d4ff;
        }

        .modal-btn.save:hover {
            background: #00d4ff;
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

        @media (max-width: 600px) {
            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
            .profil-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="profil-wrapper" id="profilContainer"></div>

    <!-- MODAL DE MODIFICATION -->
    <div id="modalModif" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fa-solid fa-pen"></i> Modifier le profil</h2>
                <span class="close-modal" onclick="fermerModal()">&times;</span>
            </div>
            <div class="modal-field">
                <label>Nom complet</label>
                <input type="text" id="editNom">
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
                <input type="text" id="editWilaya">
            </div>
            <div class="modal-field">
                <label>Code médecin</label>
                <input type="text" id="editCode">
            </div>
            <div class="modal-field">
                <label>Email</label>
                <input type="email" id="editEmail">
            </div>
            <div class="modal-field">
                <label>Téléphone</label>
                <input type="text" id="editTel">
            </div>
            <div class="modal-field">
                <label>Nouveau mot de passe</label>
                <input type="password" id="editPassword" placeholder="Laisser vide pour ne pas changer">
            </div>
            <div class="modal-actions">
                <button class="modal-btn save" onclick="enregistrerModification()">Enregistrer</button>
                <button class="modal-btn cancel" onclick="fermerModal()">Annuler</button>
            </div>
        </div>
    </div>

    <script>
        // Données du médecin (simulées)
        let medecin = {
            nom: 'Dr. Ahmed Benali',
            specialite: 'Cardiologie',
            hopital: 'CHU Mustapha',
            wilaya: 'Alger (16)',
            code: 'CARD123',
            email: 'a.benali@mediconnex.dz',
            tel: '0550 12 34 56'
        };

        function afficherProfil() {
            document.getElementById('profilContainer').innerHTML = `
                <div class="profil-header">
                    <div class="profil-avatar">
                        <i class="fa-solid fa-user-md"></i>
                    </div>
                    <h1>${medecin.nom}</h1>
                    <p>${medecin.specialite}</p>
                </div>

                <div class="info-card">
                    <div class="info-row">
                        <span class="info-label"><i class="fa-solid fa-user"></i> Nom complet</span>
                        <span class="info-value">${medecin.nom}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label"><i class="fa-solid fa-stethoscope"></i> Spécialité</span>
                        <span class="info-value">${medecin.specialite}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label"><i class="fa-solid fa-hospital"></i> Hôpital</span>
                        <span class="info-value">${medecin.hopital}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label"><i class="fa-solid fa-location-dot"></i> Wilaya</span>
                        <span class="info-value">${medecin.wilaya}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label"><i class="fa-solid fa-id-card"></i> Code médecin</span>
                        <span class="info-value">${medecin.code}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label"><i class="fa-solid fa-envelope"></i> Email</span>
                        <span class="info-value">${medecin.email}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label"><i class="fa-solid fa-phone"></i> Téléphone</span>
                        <span class="info-value">${medecin.tel}</span>
                    </div>
                </div>

                <div class="profil-actions">
                    <button class="btn-action btn-modifier" onclick="ouvrirModal()">
                        <i class="fa-solid fa-pen"></i> Modifier
                    </button>
                    <button class="btn-action btn-logout" onclick="window.location.href='medecin-login.php'">
                        <i class="fa-solid fa-sign-out-alt"></i> Déconnexion
                    </button>
                </div>
            `;
        }

        function ouvrirModal() {
            document.getElementById('editNom').value = medecin.nom;
            document.getElementById('editSpecialite').value = medecin.specialite;
            document.getElementById('editHopital').value = medecin.hopital;
            document.getElementById('editWilaya').value = medecin.wilaya;
            document.getElementById('editCode').value = medecin.code;
            document.getElementById('editEmail').value = medecin.email;
            document.getElementById('editTel').value = medecin.tel;
            document.getElementById('editPassword').value = '';
            document.getElementById('modalModif').style.display = 'flex';
        }

        function fermerModal() {
            document.getElementById('modalModif').style.display = 'none';
        }

        function enregistrerModification() {
            medecin.nom = document.getElementById('editNom').value;
            medecin.specialite = document.getElementById('editSpecialite').value;
            medecin.hopital = document.getElementById('editHopital').value;
            medecin.wilaya = document.getElementById('editWilaya').value;
            medecin.code = document.getElementById('editCode').value;
            medecin.email = document.getElementById('editEmail').value;
            medecin.tel = document.getElementById('editTel').value;

            const newPassword = document.getElementById('editPassword').value;
            if (newPassword.trim() !== '') {
                alert('✅ Mot de passe modifié avec succès !');
            }

            afficherProfil();
            fermerModal();
        }

        afficherProfil();
    </script>
</body>
</html>