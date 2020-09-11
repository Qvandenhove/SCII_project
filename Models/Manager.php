<?php


namespace Vandenhove\ProjectSC2\Models;


class Manager
{
    protected function DbConnect()
    {
        try
        {
        $bdd = new \PDO('mysql:host=localhost;dbname=sc2project;charset=utf8','root','');
        }catch(Exception $e)
        {
            echo "Une erreur est survenue";
        }
        return $bdd;
    }
}