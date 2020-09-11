<?php
namespace Vandenhove\ProjectSC2\Models;

require("Models/Manager.php");

class UserManager extends Manager
{
    private $_db;
    public function __construct()
    {
        $this->_db = $this->DbConnect();
    }

    public function getPseudos(){
        $pseudos = $this->_db->query("SELECT pseudo FROM USERS");
        $pseudoList = array();
        while ($pseudo = $pseudos->fetch()){
            array_push($pseudoList, $pseudo["pseudo"]);
        }
        echo json_encode($pseudoList, JSON_UNESCAPED_UNICODE);
    }

    public function subscribe($data)
    {
        $req = $this->_db->prepare("INSERT INTO USERS (pseudo,Last_name,First_name,mail,pass) VALUES (:pseudo, :lastName,:firstName,:mail,:pass)");
        $success = $req->execute(array(
            "pseudo" => htmlspecialchars($data["pseudo"]),
            "lastName" => htmlspecialchars($data["lastName"]),
            "firstName" => htmlspecialchars($data["firstName"]),
            "mail" => htmlspecialchars($data["mail"]),
            "pass" => password_hash(htmlspecialchars($data["pass"]), PASSWORD_DEFAULT),
        ));
        return $success;
    }

    public function connect($log)
    {
        $req = $this->_db->prepare("SELECT id,pseudo, pass, last_name FROM USERS WHERE pseudo = :pseudo");
        $success = $req->execute(array(
            "pseudo" => $log["pseudo"]
        ));
        if($success)
        {
            $userLogin = $req->fetch();
            if(password_verify($log["pass"],$userLogin["pass"])){
                $_SESSION["id"] = $userLogin["id"];
                $_SESSION["pseudo"] = $userLogin["pseudo"];
                $_SESSION["lastName"] = $userLogin["last_name"];
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return "Une erreur est survenue";
        }
    }

    public function disconnect(){
        session_destroy();
    }
}