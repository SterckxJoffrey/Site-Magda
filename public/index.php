<?php

session_start();
define('SITE_ROOT', __DIR__ . '/../');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_parts = explode('/', trim($uri, '/'));

$section = 'public';
if (!empty($uri_parts[0]) && $uri_parts[0] === 'admin') {
    $section = 'admin';
    array_shift($uri_parts);
}

// Contrôleur par défaut
$controller = !empty($uri_parts[0]) ? $uri_parts[0] : 'home';
// Action par défaut
$action = $uri_parts[1] ?? 'index';
// Slug ou paramètre
$slug = $uri_parts[2] ?? null;

$controller_path = SITE_ROOT . "app/controller/{$section}/{$controller}.php";

if (file_exists($controller_path)) {
    include_once($controller_path);

    if (!function_exists($action)) {
        // Si l'action n'existe pas, on suppose que c'est un slug
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
        render('errors/404.php', ['head_title' => 'Page non trouvée'], $section);
        exit;
    }
} else {
    http_response_code(404);
    render('errors/404.php', ['head_title' => 'Page non trouvée', 'additional_css' => '<link rel="stylesheet" href="/css/404.css">'], $section);
    exit;
}

function render($partial, $data = [], $view_dir = 'public')
{
    $skeleton = SITE_ROOT . "app/view/{$view_dir}/skeleton.html";
    $partial  = SITE_ROOT . "app/view/{$view_dir}/{$partial}";

    $page = file_get_contents($skeleton);

    ob_start();
    include($partial);
    $partial = ob_get_clean();

    $page = str_replace('%%HEAD_TITLE%%', $data['head_title'] ?? 'Mon site', $page);
    $page = str_replace('%%ADDITIONAL_CSS%%', $data['additional_css'] ?? '', $page);
    $page = str_replace('%%ADDITIONAL_JS%%', $data['additional_js'] ?? '', $page);
    $page = str_replace('%%MAIN_CONTENT%%', $partial, $page);



    echo $page;
}
