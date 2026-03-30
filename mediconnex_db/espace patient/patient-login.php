<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Patient - MédiConnex</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Couleur patient (vert) */
        :root {
            --patient: #00ff88;
        }

        .auth-wrapper {
            border-color: var(--patient);
            box-shadow: 0 0 25px var(--patient);
        }

        .background-shape {
            background: linear-gradient(45deg, #1a1a2e, var(--patient));
        }

        .secondary-shape {
            border-top-color: var(--patient);
        }

        .field-wrapper input:focus,
        .field-wrapper input:valid {
            border-bottom-color: var(--patient);
        }

        .field-wrapper input:focus ~ label,
        .field-wrapper input:valid ~ label {
            color: var(--patient);
        }

        .field-wrapper input:focus ~ i,
        .field-wrapper input:valid ~ i {
            color: var(--patient);
        }

        .submit-button {
            border-color: var(--patient);
        }

        .submit-button::before {
            background: linear-gradient(#1a1a2e, var(--patient), #1a1a2e, var(--patient));
        }

        .submit-button:hover {
            background: var(--patient);
            color: #1a1a2e;
        }

        .welcome-section h2,
        .welcome-section p {
            color: var(--patient);
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="background-shape"></div>
        <div class="secondary-shape"></div>

        <div class="credentials-panel signin">
            <h2 class="slide-element">Connexion Patient</h2>

            <form onsubmit="event.preventDefault(); window.location.href='patient-dashboard.php'">
                <div class="field-wrapper slide-element">
                    <input type="text" required>
                    <label>ID Patient</label>
                    <i class="fa-solid fa-id-card"></i>
                </div>

                <div class="field-wrapper slide-element">
                    <input type="password" required>
                    <label>Mot de passe</label>
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div class="field-wrapper slide-element">
                    <button class="submit-button" type="submit">Se connecter</button>
                </div>
            </form>
        </div>

        <div class="welcome-section signin">
            <h2 class="slide-element">ESPACE PATIENT</h2>
            <p class="slide-element">Accès à votre dossier médical</p>
        </div>
    </div>
</body>
</html>