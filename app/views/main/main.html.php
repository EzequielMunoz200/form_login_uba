<div class="container-fluid">
    <div class="title mb-3">
        <h1 class="font-weight-bold mb-2">Inscription</h1>
        <h2>C'est gratuit (et ça le restera toujours)</h2>
    </div>

    <form id="form-register" action="<?= $router->generate('register') ?>" method="POST" novalidate='novalidate'>

        <div class="row">

            <div class="form-group col-6">
                <input class="form-control" data-valide type="text" name="firstname" id="firstname" placeholder="Prénom">
            </div>


            <div class="form-group col-6">
                <input class="form-control" data-valide type="text" name="lastname" id="lastname" placeholder="Nom de famille">
            </div>

            <div class="form-group col-12">
                <!--label for="email"></label-->
                <input class="form-control" data-valide type="email" name="email" id="email" placeholder="Numéro de mobile ou email">
            </div>

            <div class="form-group col-12">
                <!--label for="email"></label-->
                <input class="form-control" data-valide type="email" name="email-confirmation" id="email-confirmation" placeholder="Confirmer numéro de mobile ou email">
            </div>

            <div class="form-group col-12">
                <!--label for="password"></label-->
                <input class="form-control" data-valide type="password" name="password" id="password" placeholder="Nouveau mot de passe">
            </div>

            <div class="col">
                <div class="form-group  d-flex align-items-center col-12 p-0">
                    <label class="my-2 mr-0" for="dob">Date de naissance<input data-valide class="form-control col-9 mt-2" type="date" name="dob" id="dob"></label>
                    <span class="note-date col-6">Pourquoi indiquer ma date de naissance ?</span>
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