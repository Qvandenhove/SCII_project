<?php
ob_start();
$styleSheets = ["main","tables"];
$stepCount = 1;
?>
    <table>
        <thead>
            <tr>
                <td>Numéro</td>
                <td>Action</td>
                <td>Population</td>
                <td>Commentaire</td>
            </tr>
        </thead>
        <tbody>
            <?php forEach($build as $step): ?>
                <tr>
                    <td><?= $stepCount ?></td>
                    <td><img src="MediaContent\Pictures\<?= str_replace(" ", "_", $step["item"])?>.PNG"><?= $step["item"] ?></td>
                    <td><?= $step["pop"] ?></td>
                    <td><?= isset($step["commentary"]) ? $step["commentary"] : "" ?></td>
                </tr>
                <?php $stepCount++ ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href = "index.php?action=seeBuilds&page=1"><button class = "btn btn-primary">Retour à la liste</button></a>
<?php
$content = ob_get_clean();
require("Views/template.php");
