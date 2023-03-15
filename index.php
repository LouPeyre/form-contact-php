<?php

    $firstname = $name = $email = $phone = $message = "";
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $firstname = verifyInput($_POST["firstname"]);
        $name = verifyInput($_POST["name"]);
        $email = verifyInput($_POST["email"]);
        $phone = verifyInput($_POST["phone"]);
        $message = verifyInput($_POST["message"]);
    }

    function verifyInput($var){
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);

        return $var;
    }

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Limelight&family=Lobster&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <title>Contactez-moi.</title>
    </head>


    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Contactez-moi</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="contact-form" role="form">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="firstname" class="form-label">Prénom <span class="blue">*</span></label>
                                <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo($firstname);?>">
                                <p class="comments">Message d'erreur</p>
                            </div>
                            <div class="col-lg-6">
                                <label for="name" class="form-label">Nom <span class="blue">*</span></label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="Votre Nom" value="<?php echo($name);?>">
                                <p class="comments">Message d'erreur</p>
                            </div>
                            <div class="col-lg-6">
                                <label for="email" class="form-label">Email <span class="blue">*</span></label>
                                <input id="email" type="text" name="email" class="form-control" placeholder="Votre Email" value="<?php echo($email);?>">
                                <p class="comments">Message d'erreur</p>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input id="phone" type="text" name="phone" class="form-control" placeholder="Votre Téléphone" value="<?php echo($phone);?>">
                                <p class="comments">Message d'erreur</p>
                            </div>
                            <div>
                                <label for="message" class="form-label">Message <span class="blue">*</span></label>
                                <textarea id="message" name="message" class="form-control" placeholder="Votre Message" rows="4"><?php echo($message);?></textarea>
                                <p class="comments">Message d'erreur</p>
                            </div>
                            <div>
                                <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                            </div>
                            <div>
                                <input type="submit" class="button1" value="Envoyer">
                            </div>    
                        </div>
                        <p class="thank-you">Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>