<?php

function index()
{
    global $lang;
    $translations_file = __DIR__ . "/../../lang/{$lang}.php";
    $t = file_exists($translations_file) ? include $translations_file : [];

    render('contact/contact.php', [
        'head_title' => $t['head_title_contact'] ?? 'Contact',
        'additional_css' => '<link rel="stylesheet" href="/asset/css/contact.css">',
        'meta_description' => $t['meta_description_contact'] ?? '',
    ], 'public', $lang);
}

function send()
{
    global $lang;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sécurisation des données
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));
        $origin = isset($_POST['origin']) ? $_POST['origin'] : 'contact'; // Valeur par défaut

        // Si champs manquants
        if (empty($name) || empty($email) || empty($message)) {
            header("Location: /$lang/$origin?status=error#contact-form");
            exit;
        }

        // Préparation de l'email
        $to = "Magdalena.tyminska@avocat.be";
        $subject = "Nouveau message depuis le site";
        $body = "Nom : $name\nEmail : $email\n\nMessage :\n$message";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Envoi réel du mail
        $success = mail($to, $subject, $body, $headers);

        // Redirection avec le statut
        $status = $success ? 'success' : 'error';
        header("Location: /$lang/$origin?status=$status#contact-form");
        exit;
    }

    // Si accès direct sans POST
    header("Location: /$lang/contact");
    exit;
}
