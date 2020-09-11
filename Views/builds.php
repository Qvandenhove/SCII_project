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

        </tbody>
    </table>
    <div class = "pager"></div>
<script src = "JS/getBuilds.js"></script>
<?php
$content = ob_get_clean();
require("Views/template.php");

