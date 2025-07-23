<?php

function index()
{
    global $lang;

    render('presentation/presentation.php', [
        'head_title' => 'Contact',
        'additional_css' => '<link rel="stylesheet" href="/asset/css/presentation.css">',
    ], 'public', $lang);
}