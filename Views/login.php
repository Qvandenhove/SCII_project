<?php
ob_start();
$styleSheets = ["main","forms"];
?>
<div class = "container justify-content-center">
    <div id = "main">
        <form method="post" id = "infos" action="index.php?action=connect">
            <div class="form-group">
                <label for="pseudo">Votre Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo" minlength="5">
                <div id="wrongPseudo"></div>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" minlength = "6">
                <div id = "wrongPass"></div>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" >
                <label class="form-check-label" for="exampleCheck1">Rester connecté</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script src="JS/connexion.js"></script>
<?php
$content = ob_get_clean();
require("Views/template.php");
?>