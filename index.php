<?php
session_start();
$data = file_get_contents('php://input');
$array = (json_decode($data,true));
require("Controller/front.php");
require("Controller/back.php");
if(isset($_GET["action"]))
{
    $action = $_GET["action"];
}
else
{
    $action = null;
}
switch($action) {
    case "subscribe" :
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            addUser($array);
        }else{
            subscribe();
        }
        break;
    case "addUser" :
        
        break;
    case "getPseudos":
        getPseudos();
        break;

    case "connect" :
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            checkUser($array);
        }else{
            connect();
        }
        break;
    case "checkUser" :
        checkUser($array);
        break;

    case "disconnect" :
        disconnect();
        break;

    case "addBuild" :
        addBuild();
        break;
    case "addABuild" :
        addABuild($array);
        break;

    case "getBuilds" :
        getBuilds($_GET['page']);
        break;
    case "seeBuilds" :
        seeBuilds();
        break;
    case "getBuildsCount" :
        getBuildsCount();
        break;

    case "myPage" :
        myPage();
        break;
    case 'myBuilds' :
        myBuilds($_GET['page']);
        break;

    case "seeSteps":
        if(isset($_GET["build"])){
            seeSteps($_GET["build"]);
        }else{
            myPage();
        }
        break;
    case "getBuildings" :
        getBuildings($_GET["build"]);
        break;
    case "checkStep" :
        checkStep($array);
        break;
    case "deleteStep":
        deleteStep($_GET["build"],$_GET["step"]);
        break;
    case "updateStep" :
        updateStep($_GET["build"],$_GET["step"],$array);
        break;
    case "seeBuild" :
        seeBuild($_GET["build"]);
        break;
    case "finishBuild" :
        finishBuild($_GET['build']);
        break;
    default :
        welcome();
}