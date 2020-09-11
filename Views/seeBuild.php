<?php
ob_start();
$styleSheets = ["main","tables"];
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
            <?php
            $numStep = 0;
            while($step = $build->fetch())
            {
                ?>
                <tr>
                    <td><?=$step["etape"] - 1?></td>
                    <td><?=$step["item"]?></td>
                    <td><?=$step["pop"]?></td>
                    <td><?=$step["commentary"]?></td>

                </tr>
                <?php

            }
            ?>
        </tbody>
    </table>
    <a href = "index.php?action=seeBuilds&page=1"><button class = "btn btn-primary">Retour à la liste</button></a>
<?php
$content = ob_get_clean();
require("Views/template.php");
