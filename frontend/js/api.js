const API_BASE_URL = 'http://localhost:8000/api'; // À adapter selon ton environnement


/**
 * apiFetch — remplace fetch() dans toute l'application
 *
 * @param {string} endpoint  -chemin relatif /post ou /user
 * @param {RequestInit} options  -option fetch
 * @returns {Promise<any>}   -reponse json
 * @throws {Error}  - si la réponse HTTP est une erreur
 */

async function apiFetch(endpoint, options = {}) {
    const token = localStorage.getItem('token'); // Récupère le token depuis le localStorage

    //// Construction des headers : on fusionne les headers existants avec Authorization
const isFormData = options.body instanceof FormData;
const headers = {
    ...(!isFormData ? { 'Content-Type': 'application/json' } : {}),
    'Accept': 'application/json',
    ...(options.headers || {}),
    ...(token ? { 'Authorization': `Bearer ${token}` } : {}),
};
    const response = await fetch(`${API_BASE_URL}${endpoint}`, {
        ...options,
        headers,
    });

    if (response.status === 401) {
        localStorage.removeItem('token'); // Supprime le token du localStorage
        localStorage.removeItem('user'); // Supprime les infos utilisateur du localStorage
        window.location.href = '/frontend/login.php';
        return; // Arrête l'exécution de la fonction
    }

    //pour les réponse sans contenu 204 no content ex: delete reussi
    if (response.status === 204) {
        return null; // ou return {} selon ce que tu préfères
    }

    const data = await response.json();

    //si le serveur retorune une erreur HTTP (400, 403, 404, 422, 500
    //leve une error avec le message renvoyer par laravel

    if (!response.ok) {
        const message = data?.message || `Erreur HTTP ${response.status}`;
        console.log(response.status);
        throw new Error(message);
    }

    return data;
}

//get
const apiGet = (endpoint) =>
    apiFetch(endpoint, {
        method: 'GET',
    });

//post
const apiPost = (endpoint, body) =>
    apiFetch(endpoint, {
        method: 'POST',
        body: JSON.stringify(body),
    });

//put
const apiPut = (endpoint, body) =>
    apiFetch(endpoint, {
        method: 'PUT',
        body: JSON.stringify(body),
    });

//delete
const apiDelete = (endpoint) =>
    apiFetch(endpoint, {
        method: 'DELETE',
    });

const apiUpload = (endpoint, formData, method = 'POST') =>
    apiFetch(endpoint, {
        method,
        body: formData,
    });


