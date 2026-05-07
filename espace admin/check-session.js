// check-session.js - À placer dans le dossier "espace admin"

const SUPABASE_URL = 'https://uuhdpvtnfaycqemhrelo.supabase.co';
const SUPABASE_KEY = 'sb_publishable_C-QCOapZ_QY92foN_Q-VRw_3WSoCos7';

// Vérifier la session admin
function checkAdminSession() {
    const admin = localStorage.getItem('admin');
    if (!admin) {
        window.location.href = 'admin-login.html';
        return null;
    }
    return JSON.parse(admin);
}

// Afficher un toast de notification
function showToast(message, type = 'success') {
    const existing = document.querySelector('.toast');
    if (existing) existing.remove();
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `<i class="fa-solid fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i> ${message}`;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

// Hasher un mot de passe
async function hashPassword(password) {
    const encoder = new TextEncoder();
    const data = encoder.encode(password);
    const hashBuffer = await crypto.subtle.digest('SHA-256', data);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    return hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
}

// Vérifier un mot de passe
async function verifyPassword(password, hashedPassword) {
    const hash = await hashPassword(password);
    return hash === hashedPassword;
}

// Déconnexion
function logout() {
    localStorage.removeItem('admin');
    window.location.href = 'admin-login.html';
}

// Vérification immédiate
const currentAdmin = checkAdminSession();