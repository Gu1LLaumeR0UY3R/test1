<?php
// Retourne une connexion PDO (XAMPP : utilisateur root, mot de passe vide par défaut)
function creerConnexion(): PDO
{
    return new PDO(
        'mysql:host=localhost;dbname=cinema;charset=utf8mb4',
        'root',
        '',
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
}
