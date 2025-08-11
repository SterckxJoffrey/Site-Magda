<?php

function index()
{
    global $lang;
        $translations_file = __DIR__ . "/../../lang/{$lang}.php";
    $t = file_exists($translations_file) ? include $translations_file : [];

    render('domain/domain.php', [
        'head_title' => $t['head_title_domaines'],
        'additional_css' => '<link rel="stylesheet" href="/asset/css/domain.css">',
        'meta_description' => $t['meta_description_domaines'] ?? '',
    ], 'public', $lang);
}