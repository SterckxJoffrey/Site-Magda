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

        // Ici tu envoies le mail (ou le simules)
        $to = 'ton.email@exemple.com'; // à remplacer
        $subject = 'Nouveau message depuis le site';
        $body = "Nom : $name\nEmail : $email\n\nMessage :\n$message";
        $headers = "From: $email\r\n" .
                   "Reply-To: $email\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // Envoi du mail (fonctionne uniquement si ton serveur mail local est bien configuré)
        $success = mail($to, $subject, $body, $headers);

        // Redirection vers la page contact avec paramètre de résultat
        $status = $success ? 'success' : 'error';
        header("Location: /$lang/contact?status=$status");
        exit;
    }

    // Si quelqu’un tente d’accéder à la route sans POST
    header("Location: /$lang/contact");
    exit;
}
