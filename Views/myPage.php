<?php
ob_start();
$styleSheets = ["main","tables","modals"];
if(isset($_SESSION["id"]))
{
?>
    <h1>Voici la liste de vos créations.</h1>

    <table>
        <thead>
            <tr>
                <td>Nom du build</td>
                <td>Race</td>
                <td>Matchup</td>
                <td>Type</td>
                <td>Note</td>
                <td></td>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <div class ="pager"></div>
    <script>document.querySelector("body").style.height = "auto"</script>
<?php if(isset($_GET['finish'])): ?>
    <div class="myModal">
        <div class="flex-row align-items-center modalContent">
            <span class = "align-items-center closeModal">&times;</span>
            <p class = "modalText">Votre build est désormais visible par tous</p>
        </div>
    </div>
    <script src="JS/modals.js"></script>
<?php endif;?>
    <script src = JS/myPage.js></script>
<?php
}else {?>
    <p id = "main">Merci de vous connecter avec le menu à droite.</p>
<?php
}

$content = ob_get_clean();
require("Views/template.php");
?>
