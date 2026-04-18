// utils/crypto.js

/**
 * Hache un mot de passe avec SHA-256
 * @param {string} password - Mot de passe en clair
 * @returns {Promise<string>} - Mot de passe hashé
 */
async function hashPassword(password) {
    const encoder = new TextEncoder();
    const data = encoder.encode(password);
    const hashBuffer = await crypto.subtle.digest('SHA-256', data);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
    return hashHex;
}

/**
 * Vérifie un mot de passe
 * @param {string} password - Mot de passe en clair
 * @param {string} hashedPassword - Mot de passe hashé stocké
 * @returns {Promise<boolean>}
 */
async function verifyPassword(password, hashedPassword) {
    const hash = await hashPassword(password);
    return hash === hashedPassword;
}