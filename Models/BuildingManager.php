<?php


namespace Vandenhove\ProjectSC2\Models;


class BuildingManager extends Manager
{
    private $db;
    public function __construct()
    {
        $this->db = $this->DbConnect();
    }

    public function getBuildings($buildId){
        $buildManager = new BuildManager();
        $reqRace = $buildManager->getBuild($buildId);
        $race = $reqRace->fetch();
        $race = $race["race"];
        $buildings = $this->db->prepare("SELECT nom FROM BUILDINGS WHERE race = :race ORDER BY nom");
        $buildings->execute(array(
            "race" => $race
        ));
        return $buildings;
    }
}