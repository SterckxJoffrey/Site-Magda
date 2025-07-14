<?php

function index()
{
    global $lang;

    render('domain/domain.php', [
        'head_title' => 'Accueil', // Ce titre peut rester en dur ici
        'additional_css' => '<link rel="stylesheet" href="/asset/css/domain.css">',
    ], 'public', $lang);
}