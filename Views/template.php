<?php $connected = isset($_SESSION['id']); ?>
<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset="UTF-8">
    <title>SCII Builder</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ma+Shan+Zheng&display=swap">
    <!-- Mes CSS -->
    <?php forEach($styleSheets as $styleSheet):?>
    <link rel="stylesheet" type="text/css" href = "CSS/<?= $styleSheet?>.css">
    <?php endforeach;?>

</head>
<body>
<header>
    <div class = "row">
        <h1 class = "title">StarCraft II Builder</h1>
    </div>
</header>
<div class = "container-fluid header">
    <nav>
        <div class="row header">
            <div class = "col-12">
                <ul class="nav menu1">
                    <li class="nav-item dropdown" id = "subMenuTrigger">
                        <a id = "account" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Compte</a>
                        <div class="dropdown-menu" id = "submenu1">
                            <?php if($connected):?>
                                <a class="dropdown-item" href="index.php?action=myPage">Ma Page</a>
                                <a class="dropdown-item" href="index.php?action=disconnect">Déconnxion</a>
                            <?php else : ?>
                            <a class="dropdown-item" href="index.php?action=connect">Connexion</a>
                            <a class="dropdown-item" href="index.php?action=subscribe">Inscription</a>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown" id = "subMenuTrigger">
                        <a id = "builds" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Builds</a>
                        <div class="dropdown-menu" id = "submenu2">
                            <a class="dropdown-item" href="index.php?action=seeBuilds&page=1">Consulter</a>
                            <a class="dropdown-item" href="index.php?action=addBuild">Ajouter</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class = "container-fluid content">
    <div class="row flex-column align-items-center justify-content-center">
        <?= $content?>
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- Script pour le menu -->
        <script type = "text/javascript" src = "JS/menu.js"></script>
    </div>
</div>
<footer class = "text-center">
    <h3>Dernière Modification 18/09/2020</h3>
</footer>
</body>
</html>
