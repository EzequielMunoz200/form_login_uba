<div class="title">
    <h1>Inscription</h1>
    <h2>C'est gratuit (et ça le restera toujours)</h2>
</div>

<form id="form-register" action="<?= $router->generate('register') ?>" method="POST">

    <div class="row">

        <div class="form-group">
            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Prénom">
        </div>


        <div class="form-group">
            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Nom de famille">
        </div>

        <div class="form-group">
            <!--label for="email"></label-->
            <input class="form-control" type="email" name="email" id="email" placeholder="Numéro de mobile ou email">
        </div>

        <div class="form-group">
            <!--label for="email"></label-->
            <input class="form-control" type="email" name="email-confirmation" id="email-confirmation" placeholder="Confirmer numéro de mobile ou email">
        </div>

        <div class="form-group">
            <!--label for="password"></label-->
            <input class="form-control" type="password" name="password" id="password" placeholder="Nouveau mot de passe">
        </div>

        <div class="form-group">
            <label for="dob">Date de naissance</label>
            <input class="form-control" type="date" name="dob" id="dob">
        </div>

        <div class="form-group">
            <div class="row">
                <div class="gender">
                    <input class="form-control" type="radio" name="gender" id="genderFemale" value="F"><label for="genderFemale">Femme</label>
                </div>
                <div class="gender">
                    <input class="form-control" type="radio" name="gender" id="genderMale" value="M"><label for="genderMale">Homme</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <p>En cliquant sur inscription, vous acceptez nos Conditions et indiquez que vous avez lu notre Politique d'utilisation des données, y compris notre Utilisation des cookies. Vous pourrez recevoir des notifications par texto de la part de Facebook et pouvez vous désabonner à tout moment</p>
        </div>

        <div class="form-group">
            <input type="submit" value="Inscription" id="btn-register">
        </div>

</form>