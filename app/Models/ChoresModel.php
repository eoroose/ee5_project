<?php

namespace App\Models;

use CodeIgniter\Model;


class ChoresModel
{
    private $db;

    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function getInhabitants()
    {
        //$query_text = "SELECT * FROM inhabitant ";
        $query_text = "SELECT user.firstname, user.lastname, inhabitant.chore, inhabitant.inhabitantID, user.userID, user.avatar  FROM inhabitant INNER JOIN user ON inhabitant.userID = user.userID";
        $query = $this->db->query($query_text);
        return $query->getResultArray();
    }

    public function getChores()
    {
        $query_text = "SELECT choreID, description 
                        FROM chore";
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function changeChore($inhabitantID,$choreID)
    {
        $query_text = "UPDATE inhabitant
                        SET chore = :choreID:
                        WHERE inhabitantID = :inhabitantID:";
        $this->db->query($query_text, ['inhabitantID' => $inhabitantID, 'choreID'=>$choreID]);
    }

    public function unasign($choreID){
        $query_text = "UPDATE inhabitant
                        SET chore = 1
                        WHERE chore = :choreID:";
        $this->db->query($query_text, ['choreID' => $choreID]);
    }

    public function addChore($choreTitle){
        $query_text = "INSERT INTO chore (description)
                        VALUES (:choreTitle:)";
        $this->db->query($query_text, ['choreTitle' => $choreTitle]);
    }

    public function removeChore($choreID){

        $query_text2 = "DELETE FROM chore
                        WHERE choreID = :choreID:";
        $this->db->query($query_text2, ['choreID' => $choreID]);
    }

}