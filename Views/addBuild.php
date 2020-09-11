<?php
ob_start();
$styleSheets = ["main","forms"];
$connected = isset($_SESSION["id"]);
if (isset($_SESSION["pseudo"])) {
    ?>
    <div id="main" class = "justify-content-center text-center">
        <form method="POST" id="infos" action="index.php">
            <div class = "form-row">
                <label for = "buildName">Nom du build</label>
                <input name = "buildName" type = "text" class = "form-control" id = "buildName"/>
            </div>
            <div class="form-row">
                <label for="race">Race jouée :</label>
                <select name="race" id="race" class="form-control">
                    <option value="Terran">Terran</option>
                    <option value="Zerg">Zerg</option>
                    <option value="Protoss">Protoss</option>
                </select>
            </div>
            <div class="form-row">
                <label for="matchup">Matchup favori :</label>
                <select name="matchup" id="matchup" class="form-control">
                    <option value="Terran">Terran</option>
                    <option value="Zerg">Zerg</option>
                    <option value="Protoss">Protoss</option>
                </select>
            </div>
            <div class="form-row">
                <label for="type">Type de build</label>
                <select name = "type" id = "type" class = "form-control">
                    <option value = "Économique">Économique</option>
                    <option value="Cheese">Cheese</option>
                    <option value = "Timing Attack">Timing Attack</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style = "margin: 10px 0">Submit</button>
        </form>
    </div>
    <script type="text/javascript" src="JS/addBuild.js"></script>
    <?php
}
else
{
    ?>
    <p id = "main">Merci de vous connecter avec le menu à droite.</p>
    <?php
}

$content = ob_get_clean();
require("template.php");
?>