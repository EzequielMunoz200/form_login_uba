<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="<?= $assetsBaseUri ?>css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $assetsBaseUri ?>css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.1.7/css/fork-awesome.min.css" integrity="sha256-gsmEoJAws/Kd3CjuOQzLie5Q3yshhvmo7YNtBG7aaEY=" crossorigin="anonymous">
</head>

<body>
    <nav class="nav justify-content-end mb-5">
        <form id="form-login" class="pb-2" action="<?= $router->generate('login') ?>" method="POST" novalidate='novalidate'>

            <div class="form-group col-4 px-2 ml-2 py-0">

                <label class="text-light" for="login-email">Adresse e-mail ou mobile
                </label>
                <input class="form-control rounded-0 validateEmail" type="email" name="login-email" id="login-email">
            </div>

            <div class="form-group col-4 px-2 py-0">
                <label class="text-light" for="login-password">Mot de passe
                </label>
                <input class="form-control rounded-0" type="password" name="login-password" id="login-password">
                <small id="pass-forgotten">Informations de compte oubliées?</small>
            </div>

            <div class="form-group col-3 px-2 py-0 ">
                <button class="form-control rounded-0 shadow-lg" id="btn-login">Connexion</button>
                </label>
            </div>


        </form>

    </nav>
    <?php
    if (!empty($_SESSION['error-login'])) :
    ?>
        <div class="alert alert-danger"><?= $_SESSION['error-login'] ?></div>
    <?php
        unset($_SESSION['error-login']);
    endif;
    ?>