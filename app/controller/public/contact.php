<?php

function index()
{
    global $lang;

    render('contact/contact.php', [
        'head_title' => 'Contact',
        'additional_css' => '<link rel="stylesheet" href="/asset/css/contact.css">',
    ], 'public', $lang);
}

function send()
{
    global $lang;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

        if (empty($name) || empty($email) || empty($message)) {
            header("Location: /$lang/contact?status=error");
            exit;
        }

        // Simulation d'envoi réussi (car mail() ne fonctionne pas forcément sur MAMP)
        $success = true;

        // Redirection vers la page contact avec paramètre de résultat
        $status = $success ? 'success' : 'error';
        header("Location: /$lang/contact?status=$status");
        exit;
    }

    // Si on accède à cette route sans POST
    header("Location: /$lang/contact");
    exit;
}
