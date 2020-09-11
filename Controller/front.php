<?php
require("Models/UserManager.php");
require("Models/BuildManager.php");
require("Models/StepManager.php");
require("Models/BuildingManager.php");

$connected = isset($_SESSION["id"]);

function connect()
{
    require("Views/login.php");
}

function subscribe($array)
{
    require("Views/subscribe.php");
}

function disconnect(){
    $userManager = new Vandenhove\ProjectSC2\Models\UserManager();
    $userManager->disconnect();
    header("Location: index.php");
}

function welcome()
{
    require("Views/welcome.php");
}

function addBuild(){
    require("Views/addBuild.php");
}

function seeBuilds(){
    require("Views/builds.php");
}

function myPage(){
        require("Views/myPage.php");
}
function seeSteps($build){
    if(isset($_SESSION["id"])) {
        $stepManager = new Vandenhove\ProjectSC2\Models\StepManager();
        $build = $stepManager->seeSteps($build);
    }

    require("Views/steps.php");
}

function checkStep($array){
    if(isset($_SESSION["id"])) {
        $stepManager = new Vandenhove\ProjectSC2\Models\StepManager();
        $stepManager->addStep($array);
    }
    require("Views/steps.php");
}

function seeBuild($build){
    $stepManager = new Vandenhove\ProjectSC2\Models\StepManager();
    $build = $stepManager->seeSteps($build);
    require("Views/seeBuild.php");
}