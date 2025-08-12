<?php

function index()
{
    global $lang;
    $translations_file = __DIR__ . "/../../lang/{$lang}.php";
    $t = file_exists($translations_file) ? include $translations_file : [];

    render('home/home.php', [
        'head_title' => $t['head_title_home'],
        'additional_css' => '<link rel="stylesheet" href="/asset/css/home.css"> <link rel="stylesheet" href="/asset/css/contact.css">',
        
        'meta_description' => $t['meta_description_home'],
    ], 'public', $lang);
}




