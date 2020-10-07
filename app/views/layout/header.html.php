<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="<?= $assetsBaseUri ?>css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $assetsBaseUri ?>css/style.css">
</head>

<body>
    <nav class="nav justify-content-end mb-5">
        <form id="form-login" class="form-inline pb-2" action="<?= $router->generate('login') ?>" method="POST">

            <div class="form-group col-4 px-2 ml-2 py-0">
                <label class="text-light" for="login-email">Adresse e-mail ou mobile
                    <input class="form-control rounded-0" type="email" name="login-email" id="login-email">
                </label>
            </div>

            <div class="form-group col-4 px-2 py-0 m-1">
                <label class="text-light" for="login-password">Mot de passe
                    <input class="form-control rounded-0" type="password" name="login-password" id="login-password">
                    <small>Informations de compte oubliées ?</small>
                </label>
            </div>

            <div class="form-group col-3 px-2 py-0 ">
                <input class="form-control rounded-0 shadow-lg mb-2" type="submit" name="login-password" id="btn-login" value="Connexion">
                </label>
            </div>


        </form>

    </nav>