<?php


namespace Vandenhove\ProjectSC2\Models;


class BuildManager extends Manager
{
    private $db;

    public function __construct(){
        $this->db = $this->DbConnect();
    }

    public function addBuild($build)
    {
        $add = $this->db->prepare("INSERT INTO builds(name, race, matchup, type, note, poster,isDone) VALUES (:name, :race, :matchup, :type, null, (SELECT id FROM USERS WHERE pseudo = :poster),false)");
        $add->execute(array(
            "name" => $build["name"],
            "race" => $build["race"],
            "matchup" => $build["matchup"],
            "type" => $build["type"],
            "poster" => $_SESSION["pseudo"]
        ));
    }
    public function getBuilds($page)
    {
        $builds = $this->db->query("SELECT id,name,race,matchup,type,IFNULL(note, 'pas encore noté') AS Note,(SELECT pseudo FROM USERS WHERE id = BUILDS.poster) AS Poster FROM BUILDS WHERE isDone = true LIMIT ".strval(($page-1)*4).",4");
        $buildList = array();
        while($build = $builds->fetch()){
            $build1 = array();
            for ($i=0;$i<7;$i++){
                array_push($build1,$build[$i]);
            }
            array_push($buildList,$build1);
        }
        return json_encode($buildList, JSON_UNESCAPED_UNICODE);
    }

    public function getNumberOfBuilds(){
        $count = $this->db->query('SELECT COUNT(*) FROM BUILDS');
        $count = [$count->fetch()];
        return json_encode($count);
    }

    public function getUserBuilds($page){
        $builds = $this->db->prepare("SELECT id,name,race,matchup,type,IFNULL(note, 'pas encore noté') AS Note FROM BUILDS WHERE poster = :user LIMIT ".strval(($page - 1 )* 4).", 3");
        $buildsList = array();
        $builds->execute(array(
            "user" => $_SESSION["id"]
        ));
        while($build = $builds->fetch()){
            $buildInfos = array();
            for ($i = 0; $i <= 5; $i++) {
                array_push($buildInfos,$build[$i]);
            }
            array_push($buildsList,$buildInfos);
        }
        return json_encode($buildsList,JSON_UNESCAPED_UNICODE);
    }

    public function getBuild($buildId){
        $build = $this->db->prepare("SELECT *,IFNULL(note, \"pas encore noté\") AS Note FROM BUILDS WHERE id = :id");
        $build->execute(array(
            "id" => $buildId
        ));
        return $build;
    }

    public function finishBuild($buildId){
        $response = $this->db->exec('UPDATE BUILDS SET isDone = true WHERE id = '.strval($buildId));
        return $response;
    }
}