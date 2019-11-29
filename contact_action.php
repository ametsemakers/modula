<?php
session_start();
// require ReCaptcha class
require('recaptcha-master/src/autoload.php');

if(isset($_POST['rgpd'])) {

    $recaptchaSecret = '6LfH_sQUAAAAAHASyDoRCZ8MePN7AT03J7OJY2UR';
    $response = $_POST['g-recaptcha-response'];
    $remoteIp = $_SERVER['REMOTE_ADDR'];

    $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
            . $recaptchaSecret
            . "&response=" . $response
            . "&remoteip=" . $remoteIp;
        
            $decode = json_decode(file_get_contents($api_url), true);
        
    if ($decode['success'] == false) {
        $_SESSION['contact_error_msg'] = "Désolé, le captcha n'est pas valide.";
        header('Location: contact.php');
        exit();
    }
    else {
           
        $firstname = htmlspecialchars(trim($_POST['nom']));
        $lastname = htmlspecialchars(trim($_POST['prenom']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

        if(!empty($firstname) || !empty($lastname) || !empty($email) || !empty($message)) {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $_SESSION['contact_error_msg'] = "Votre email n'est pas valide.";
                header('Location: contact.php');
                exit();
            }

            require 'connexion.php';

            $request = $pdo->prepare ('INSERT INTO contact (lastname, firstname , email, message, date) VALUES (:lname, :fname, :email, :mess, now())');
                
            $request->bindValue(':lname', $lastname);
            $request->bindValue(':fname', $firstname);
            $request->bindValue(':email', $email);
            $request->bindValue(':mess', $message);
                
            $request->execute();
                
            // envoi du mail
            $to      = 'administrateur@domaine.fr';
            $subject = 'Message du formulaire de contact';
            $headers = array($email . "\r\n" .
                'Reply-To: ' . $email . "\r\n" .
                'X-Mailer: PHP/' . phpversion());

            mail($to, $subject, $message, $headers);
                
            $_SESSION['contact_success_msg'] = "Votre message a bien été envoyé!";
            header('Location: contact.php');
            exit();
        }
        else {
            $_SESSION['contact_error_msg'] = "Désolé, le formulaire n'est pas valide.";
            header('Location: contact.php');
            exit();
        }
    
    }
}
else {
    $_SESSION['contact_error_msg'] = "Oups..ça n'a pas marché. C'est embêtant...";
    header('Location: contact.php');
    exit();
}
