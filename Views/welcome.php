<?php
ob_start();
$styleSheets = ["main","modals"]
?>
<div class = "col-4 align-self-center text-center">
    <?php
    if(isset($_SESSION["pseudo"])){
        echo "<h2>Bonjour ".$_SESSION["pseudo"]."</h2>";
    }elseif(isset($answer)){
        echo "<h2>Bonjour ".$answer."</h2>";
    } else{
        ?>
            <h2>Bienvenue sur mon site</h2>
    <?php
    }
?>
</div>
<?php if(sizeof($_POST) > 0): ?>
    <div class="myModal">
        <div class="flex-row align-items-center modalContent">
            <span class = "align-items-center closeModal">&times;</span>
            <p class = "modalText">Le build : <?=$_POST['buildName']?>  à été ajouté ajoutez des étapes en visitant votre page personnelle</p>
        </div>
    </div>
    <script src="JS/modals.js"></script>
<?php endif;?>
<?php
$content = ob_get_clean();
require("Views/template.php");
?>
