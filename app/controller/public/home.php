<?php

function index()
{
    global $lang;

    render('home/home.php', [
        'head_title' => 'Accueil', // Ce titre peut rester en dur ici
        'additional_css' => '<link rel="stylesheet" href="/asset/css/home.css">',
    ], 'public', $lang);
}

