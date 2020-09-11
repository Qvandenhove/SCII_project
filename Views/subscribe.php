<?php ob_start();
$styleSheets = ["main","forms"];
?>
<div class="justify-content-center container">
    <div id = "main">
        <form class = "text-center" id = "infos">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="lastName">Nom</label>
                    <input type="text" class="form-control" id="lastName" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="firstName">Prenom</label>
                    <input type="text" class="form-control" id="firstName" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pseudo">Pseudonyme</label>
                    <input type="text" class="form-control" id="pseudo" name = "pseudo" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="mail">Mail</label>
                    <input type = "email" class = "form-control" id = 'mail' name = "mail" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pass">Mot de passe</label>
                    <input type="password" class="form-control" id="pass" name = "pass" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="confirmPass">Retapez votre mot de passe</label>
                    <input type="password" class="form-control" id="confirmPass" name = "confirmPass" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">

                </div>
                <div id = "error"></div>
            </div>
            <button type="submit" class="btn btn-primary" id = "submit">Sign in</button>
        </form>
    </div>
</div>
<script type = "text/javascript" src = "JS/subscribe.js"></script>

<?php
$content = ob_get_clean();
require ("Views/template.php");
?>