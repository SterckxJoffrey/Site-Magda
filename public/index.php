<?php

session_start();
define('SITE_ROOT', __DIR__ . '/../');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_parts = explode('/', trim($uri, '/'));


$supported_langs = ['fr', 'pl'];

// Si une langue est passée dans l'URL (et supportée)
if (!empty($uri_parts[0]) && in_array($uri_parts[0], $supported_langs)) {
    $lang = array_shift($uri_parts);      // On enlève la langue de l'URL
    $_SESSION['lang'] = $lang;            // On met à jour la session
} elseif (isset($_SESSION['lang']) && in_array($_SESSION['lang'], $supported_langs)) {
    $lang = $_SESSION['lang'];            // On garde la langue précédente
} else {
    $lang = 'fr';                          // Par défaut
    $_SESSION['lang'] = $lang;
}



$section = 'public';
if (!empty($uri_parts[0]) && $uri_parts[0] === 'admin') {
    $section = 'admin';
    array_shift($uri_parts);
}

$controller = !empty($uri_parts[0]) ? $uri_parts[0] : 'home';
$action = $uri_parts[1] ?? 'index';
$slug = $uri_parts[2] ?? null;

$controller_path = SITE_ROOT . "app/controller/{$section}/{$controller}.php";

if (file_exists($controller_path)) {
    include_once($controller_path);

    if (!function_exists($action)) {
        $slug = $action;
        $action = 'show';
    }

    if (function_exists($action)) {
        $refFunc = new ReflectionFunction($action);
        if ($refFunc->getNumberOfParameters() === 0) {
            call_user_func($action);
        } else {
            call_user_func($action, $slug);
        }
    } else {
        http_response_code(404);
        render('errors/404.php', ['head_title' => 'Page non trouvée'], $section, $lang);
        exit;
    }
} else {
    http_response_code(404);
    render('errors/404.php', [
        'head_title' => 'Page non trouvée',
        'additional_css' => '<link rel="stylesheet" href="/asset/css/404.css">'
    ], $section, $lang);
    exit;
}
function render($partial, $data = [], $view_dir = 'public', $lang = 'fr')
{
    $skeleton = SITE_ROOT . "app/view/{$view_dir}/skeleton.html";
    $partialPath = SITE_ROOT . "app/view/{$view_dir}/{$partial}";

    // Traductions (lang/fr.php ou lang/pl.php)
    $translations_file = SITE_ROOT . "app/lang/{$lang}.php";
    $t = file_exists($translations_file) ? include $translations_file : [];

    // Rendu du contenu partiel
    ob_start();
    extract($data);
    include($partialPath);
    $partialContent = ob_get_clean();

    // Lecture du squelette
    $page = file_get_contents($skeleton);

    // Reconstruire l'URL actuelle sans la langue
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_parts_local = explode('/', trim($uri, '/'));

    if (!empty($uri_parts_local[0]) && in_array($uri_parts_local[0], ['fr', 'pl'])) {
        array_shift($uri_parts_local); // on retire la langue
    }

    $current_uri = implode('/', $uri_parts_local);

    // Afficher uniquement le drapeau de la langue non active
    $other_lang = $lang === 'fr' ? 'pl' : 'fr';
    $flags_html = '';
    if ($other_lang === 'fr') {
        $flags_html = '<a href="/fr/' . $current_uri . '" title="Français">🇫🇷</a>';
    } else {
        $flags_html = '<a href="/pl/' . $current_uri . '" title="Polski">🇵🇱</a>';
    }

    // Génération du menu avec traductions et un seul drapeau (langue non active)
    $menu = <<<HTML
  <li><a href="/{$lang}/home">{$t['nav_home']}</a></li>
  <li><a href="/{$lang}/domain">{$t['nav_domain']}</a></li>
  <li><a href="/{$lang}/honoraire">{$t['nav_fees']}</a></li>
  <li><a href="/{$lang}/contact" class="CTO">{$t['nav_contact']}</a></li>
  <li class="lang-switcher">
    {$flags_html}
  </li>
HTML;

    // Injections dans le squelette
    $page = str_replace('%%HEAD_TITLE%%', $data['head_title'] ?? 'Mon site', $page);
    $page = str_replace('%%ADDITIONAL_CSS%%', $data['additional_css'] ?? '', $page);
    $page = str_replace('%%META_DESCRIPTION%%', htmlspecialchars($data['meta_description'] ?? ''), $page);
    $page = str_replace('%%ADDITIONAL_JS%%', $data['additional_js'] ?? '', $page);
    $page = str_replace('%%MAIN_CONTENT%%', $partialContent, $page);
    $page = str_replace('%%MENU%%', $menu, $page);
    $page = str_replace('%%LANG%%', $lang, $page);

    echo $page;
}
