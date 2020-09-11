<?php
ob_start();
$styleSheets = ["main","tables","forms"];
if(isset($_SESSION["id"]))
{
    ?>
<div class = "col-12 .flex-column align-items-center">
    <script>document.getElementsByClassName("content")[0].style.height = "auto"</script>
    <h1>Voici les étapes du build sélectionné</h1>
            <table>
                <thead>
                    <tr>
                        <td>Numéro</td>
                        <td>Action</td>
                        <td>Population</td>
                        <td>Commentaire</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $numStep = 0;
                    while($step = $build->fetch())
                    {
                        $numStep = $step["etape"];
                        ?>
                        <tr id = "step<?=$numStep?>">
                            <td><?=$step["etape"]?></td>
                            <td><div class = "align-items-center test"><img src = "MediaContent/Pictures/<?= str_replace(' ','_',$step['item'])?>.png"><span class = "buildItem"><?=$step["item"]?></span></div></td>
                            <td><?=$step["pop"]?></td>
                            <td><?=$step["commentary"]?></td>
                            <td>
                                <button class = "btn btn-primary" onclick = "askDelete(<?=$numStep?>)">
                                    Supprimer
                                </button>
                            </td>
                            <td><button class = "btn btn-primary Edit" onclick = "editStep(<?=$numStep?>)">
                                    Modifier
                                </button></td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
                    <tfoot>
                        <tr style = "height : 300px">
                            <form action=<?="index.php?action=checkStep&build=".$_GET["build"]?> method="POST" id="infos">
                                <td><?= $numStep + 1?></td>
                                <td style = "width : 200px; overflow :">
                                    <span id = "element" style = "width : 300px">Choisissez un élément</span>
                                    <div id = "deroulant" style = "width : 300px">
                                        <p>Cliquez ici pour choisir un élément.</p>
                                        <ul id = "chooseElement"></ul>
                                    </div>
                                </td>
                                <td><label for="pop">Population: </label><input class = "form-control" type="number" id="pop" value = "12" max = "200" min = "0"/><br/></td>
                                <td><label for = "comment">Commentaire : </label><br /><textarea placeholder = "Commentez cette étape." maxlength = "255" name = "comment" id = "comment"></textarea><br /></td>
                                <td colspan = "2" class = "justify-content-center"><input class = "btn btn-primary" type="submit" /></td>
                            </form>
                        </tr>
                </tfoot>
            </table>
    <div class="buttons">
        <a href = "index.php?action=myPage"><button class = "btn btn-primary">Retour à la liste</button></a>
        <button class = "btn btn-primary" onclick = "finishBuild(<?=$_GET['build']?>)">Valider le contenu du Build</button>
    </div>
        <script src="JS/steps.js"></script>
</div>
    <?php
    }

$content = ob_get_clean();
require("Views/template.php");