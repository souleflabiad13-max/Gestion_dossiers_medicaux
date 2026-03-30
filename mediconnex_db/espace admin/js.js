// Animation pour la page de connexion (si vous voulez garder la fonctionnalité de bascule)
const authWrapper = document.querySelector('.auth-wrapper');
const loginTrigger = document.querySelector('.login-trigger');
const registerTrigger = document.querySelector('.register-trigger');

if (loginTrigger && registerTrigger && authWrapper) {
    registerTrigger.addEventListener('click', (e) => {
        e.preventDefault();
        authWrapper.classList.add('toggled');
    });

    loginTrigger.addEventListener('click', (e) => {
        e.preventDefault();
        authWrapper.classList.remove('toggled');
    });
}

// Gestion des sélections (optionnel)
document.querySelectorAll('.hopital-card, .specialite-card, .medecin-card').forEach(card => {
    card.addEventListener('click', function() {
        // Si le lien est dans l'attribut onclick, on ne fait rien
        // Sinon, on peut ajouter une navigation ici
    });
});