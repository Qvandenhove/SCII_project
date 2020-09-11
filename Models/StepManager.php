<?php


namespace Vandenhove\ProjectSC2\Models;

class StepManager extends Manager
{
    private $db;

    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function seeSteps($buildId){
        $buildingManager = new BuildingManager();
        $buildings = $buildingManager->getBuildings($buildId);
        $build = $this->db->prepare("SELECT STEPS.*,BUILDS.race FROM STEPS JOIN BUILDS ON BUILDS.id = STEPS.build WHERE build = :buildId");
        $build->execute(array(
            "buildId" => $buildId
        ));
        return $build;
    }

    public function addStep($array){
        $reqStep = $this->db->query("SELECT COUNT(*) FROM STEPS WHERE build = ".$array["build"]);
        $numStep = $reqStep->fetch();
        $array["etape"] = $numStep["COUNT(*)"] + 1;
        $req = $this->db->prepare("INSERT INTO STEPS (build,etape,pop,item,commentary) VALUES (:build,:etape,:pop,:item,:commentary)");
        $req->execute($array);
    }

    public function deleteStep($buildId,$step){
        $buildManager = new BuildManager();
        $buildreq = $buildManager->getBuild($buildId);
        $buildposter = $buildreq->fetch()["poster"];
        if($buildposter == $_SESSION["id"]){
            $delete = $this->db->prepare("DELETE FROM STEPS WHERE build = :build AND etape = :step");
            $sucessDelete = $delete->execute(array(
                "build" =>  $buildId,
                "step"  =>  $step
            ));
            $update = $this->db->prepare('UPDATE STEPS SET etape = etape - 1 WHERE etape > :step');
            $updateSuccess = $update->execute(array(
                "step" => $step
            ));
            if($updateSuccess && $sucessDelete){
                $res = "Cet étape à été supprimée.";
            }
        }else
        {
            $res = "Imposteur!!!";
        }
        return $res;
    }

    public function updateStep($buildId,$stepId,$update){
        $buildManager = new BuildManager();
        $buildreq = $buildManager->getBuild($buildId);
        $buildposter = $buildreq->fetch()["poster"];
        if($buildposter == $_SESSION["id"]){
            $req = $this->db->prepare('UPDATE STEPS SET item = :item, pop = :pop, commentary = :comment WHERE build = :build AND etape = :step');
            $req->execute(array(
                "item"      =>  $update["item"],
                "pop"       =>  $update["pop"],
                "comment"   =>  $update["comment"],
                "build"     =>  $buildId,
                "step"      =>  $stepId
            ));
        }
    }
}