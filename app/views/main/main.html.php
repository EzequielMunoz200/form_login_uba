<div class="container-fluid col-md-8 col-lg-8">
    <div class="title mb-3">
        <h1 class="font-weight-bold mb-2">Inscription</h1>
        <h2>C'est gratuit (et ça le restera toujours)</h2>
    </div>

    <form id="form-register" action="<?= $router->generate('register') ?>" method="POST" novalidate='novalidate'>

        <div class="row">

            <div class="form-group col-6">
                <input class="form-control" data-valide data-function="checkString" type="text" name="firstname" id="firstname" placeholder="Prénom">
                <span><i class="fa fa-check-circle" aria-hidden="true"></i><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
            </div>


            <div class="form-group col-6">
                <input class="form-control" data-valide type="text" name="lastname" id="lastname" placeholder="Nom de famille">
                <span><i class="fa fa-check-circle" aria-hidden="true"></i><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
            </div>

            <div class="form-group col-12">
                <!--label for="email"></label-->
                <input class="form-control" data-valide type="email" name="email" id="email" placeholder="Numéro de mobile ou email">
                <span><i class="fa fa-check-circle" aria-hidden="true"></i><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
            </div>

            <div class="form-group col-12">
                <!--label for="email"></label-->
                <input class="form-control" data-valide type="email" name="email-confirmation" id="email-confirmation" placeholder="Confirmer numéro de mobile ou email">
                <span><i class="fa fa-check-circle" aria-hidden="true"></i><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
            </div>

            <div class="form-group col-12">
                <!--label for="password"></label-->
                <input class="form-control" data-valide type="password" name="password" id="password" placeholder="Nouveau mot de passe">
                <span><i class="fa fa-check-circle" aria-hidden="true"></i><small id="help-message" class="text-secondary">Doit comporter au moins 6 caractères, dont une majuscule, une minuscule, un chiffre.</small><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
            </div>


            <div class="col">
                <div class="form-group  d-flex align-items-center col-12 p-0">
                    <label class="my-2 mr-0 date" for="dob">Date de naissance<span><i class="fa fa-check-circle" aria-hidden="true"></i><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span><input data-valide class="form-control col-11 mt-2" type="date" name="dob" id="dob"> </label>
                    <span class="note-date col-5">Pourquoi indiquer ma date de naissance&nbsp;?</span>
                </div>

                <div class="form-group d-flex">
                    <div class="row">
                        <div class="gender">
                            <input data-valide class="form-control" type="radio" name="gender" id="genderFemale" value="F"><label class="m-0 pl-2" for="genderFemale">Femme</label>
                        </div>
                        <div class="gender">
                            <input data-valide class="form-control" type="radio" name="gender" id="genderMale" value="M"><label class="m-0 pl-2" for="genderMale">Homme</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group pl-4">
                <p class="cgu col-9 pl-0">En cliquant sur inscription, vous acceptez nos Conditions et indiquez que vous avez lu notre Politique d'utilisation des données, y compris notre Utilisation des cookies. Vous pourrez recevoir des notifications par texto de la part de Facebook et pouvez vous désabonner à tout moment</p>
            </div>

            <div class="form-group pl-4">
                <button value="Inscription" id="btn-register">Inscription</button>
            </div>

    </form>
</div>