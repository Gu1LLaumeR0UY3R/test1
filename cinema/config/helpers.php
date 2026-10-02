<?php
// Échappe une valeur avant affichage HTML (protection contre XSS)
function e(?string $valeur): string
{
    return htmlspecialchars($valeur ?? '', ENT_QUOTES, 'UTF-8');
}
