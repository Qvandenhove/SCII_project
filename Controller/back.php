<?php
function getBuildings($race){
    $buildingManager = new Vandenhove\ProjectSC2\Models\BuildingManager();
    $buildings = $buildingManager->getBuildings($race);
    $buildingsList = array();
    while($building = $buildings->fetch()){
        array_push($buildingsList,$building);
    }
    $buildingsList = json_encode($buildingsList);
    echo $buildingsList;
}

function deleteStep($buildId,$stepId){
    $stepManager = new Vandenhove\ProjectSC2\Models\StepManager();
    $response = $stepManager->deleteStep($buildId,$stepId);
    echo json_encode(array("res" =>$response),JSON_UNESCAPED_UNICODE);
}

function updateStep($buildId,$stepId,$update){
    $stepManager = new Vandenhove\ProjectSC2\Models\StepManager();
    $response = $stepManager->updateStep($buildId,$stepId,$update);
    echo json_encode(array("res" =>$response),JSON_UNESCAPED_UNICODE);
}

function addUser($array){
    $userManager = new Vandenhove\ProjectSC2\Models\UserManager();
    $userManager->subscribe($array);
}

function checkUser($log){
    $userManager = new Vandenhove\ProjectSC2\Models\UserManager();
    $isCorrect = $userManager->connect($log);
    if($isCorrect){
        echo json_encode(array("isCorrect" => true));
    }else{
        echo json_encode(array("isCorrect" => false));
    }
}

function myBuilds($page){
    $buildManager = new Vandenhove\ProjectSC2\Models\BuildManager();
    $builds = $buildManager->getUserBuilds($page);
    echo $builds;
}

function getPseudos(){
    $userManager = new Vandenhove\ProjectSC2\Models\UserManager();
    $userManager->getPseudos();
}

function getBuilds($page){
    $buildManager = new Vandenhove\ProjectSC2\Models\BuildManager();
    $builds = $buildManager->getBuilds($page);
    echo $builds;
}

function addABuild($array){
    if(isset($array["name"]) && isset($array["race"]) && isset($array["matchup"]) && isset($array["type"])){
        $buildManager = new Vandenhove\ProjectSC2\Models\BuildManager();
        $buildManager->addBuild($array);
    }
}

function getBuildsCount(){
    $buildManager = new Vandenhove\ProjectSC2\Models\BuildManager();
    $count = json_decode($buildManager->getNumberOfBuilds(),true);
    foreach ($count as $number){
        print_r($number[0]);
    }
}

function finishBuild($buildId){
    $buildManager = new Vandenhove\ProjectSC2\Models\BuildManager();
    $response = $buildManager->FinishBuild($buildId);
    if($response == true){
        echo json_encode(array("response" => 'Le build est désormais en ligne'),JSON_UNESCAPED_UNICODE);
    }
}