<?php
ob_start();
$styleSheets = ["main","tables"]
?>
    <table>
        <thead>
            <tr>
                <td>Nom du build</td>
                <td>Race</td>
                <td>Matchup</td>
                <td>Type</td>
                <td>Note</td>
                <td>Build écrit par</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php forEach($builds as $build): ?>
                <tr>
                <td><?= $build["name"]?></td>
                <td><?= $build["race"]?></td>
                <td><?= $build["matchup"]?></td>
                <td><?= $build["type"]?></td>
                <td><?= $build["Note"]?></td>
                <td><?= $build["Poster"]?></td>
                <td><a href="index.php?action=seeBuild&build=<?=$build["id"]?>" class="btn btn-primary">Voir les étapes</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class = "pager"></div>
<script src = "JS/getBuilds.js"></script>
<?php
$content = ob_get_clean();
require("Views/template.php");

