<?php

function index()
{
    global $lang;

    render('honoraire/honoraire.php', [
        'head_title' => 'Accueil', // Ce titre peut rester en dur ici
        'additional_css' => '<link rel="stylesheet" href="/asset/css/honoraire.css">',
    ], 'public', $lang);
}