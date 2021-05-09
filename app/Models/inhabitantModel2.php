<?php

namespace App\Models;

use CodeIgniter\Model;

class inhabitantModel2
{
    private $db;

    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function get_inhabitants()
    {
        $query_text = "SELECT avatars.location, user.firstname, user.lastname, user.userID
                        FROM inhabitant LEFT JOIN user ON inhabitant.userID = user.userID
                        LEFT JOIN avatars ON user.avatar = avatars.id
                        WHERE user.isActive = 1";
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function get_users()
    {
        $query_text = "SELECT u.avatar, u.firstname, u.lastname, u.userID, e.employeeAdminID
                        FROM user as u LEFT JOIN employeeadmin as e ON u.userID = e.userID";
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function get_inhabitant_info($user)
    {
        $query_text = "SELECT *
                        FROM user LEFT JOIN inhabitant ON user.userID = inhabitant.userID
                        WHERE user.userID = :user:";
        $query = $this->db->query($query_text, ['user' => $user]);
        return $query->getResult();
    }

    public function get_notes($id)
    {
        $query_text = "SELECT title, description
                        FROM note
                        WHERE inhabitantID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function get_doctors_appointments($id)
    {
        $query_text = "SELECT doctor.firstname, doctor.lastname, appointment.date, appointment.reason
                        FROM appointment LEFT JOIN doctor ON appointment.doctorID = doctor.doctorID
                        WHERE appointment.inhabitantID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function get_yellow_cards($id)
    {
        $query_text = "SELECT date, reason
                        FROM yellowcard
                        WHERE inhabitantID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function get_chores($id)
    {
        $query_text = "SELECT choreassignment.date, chore.description
                        FROM choreassignment LEFT JOIN chore ON choreassignment.choreID = chore.choreID
                        WHERE inhabitantID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function get_godparent($id)
    {
        $query_text = "SELECT a.godparentID, b.inhabitantID, u.firstname, u.lastname
                        FROM inhabitant as a LEFT JOIN inhabitant as b ON a.godparentID = b.inhabitantID
                        LEFT JOIN user as u ON b.userID = u.userID
                        WHERE a.inhabitantID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function get_godchildren($id)
    {
        $query_text = "SELECT a.inhabitantID, b.godparentID, u.firstname, u.lastname
                        FROM inhabitant as a LEFT JOIN inhabitant as b ON a.inhabitantID = b.godparentID
                        LEFT JOIN user as u ON b.userID = u.userID
                        WHERE b.godparentID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function alterPassword($id, $password)
    {
        $query_text="UPDATE user SET password = :password: WHERE userID = :id:";
        $query=$this->db->query($query_text, ['id' => $id, 'password' => $password]);
    }

    public function assignCard($employeeId, $inhabitantId, $reason)
    {
        $query_text="INSERT INTO yellowcard(employeeAdminID, inhabitantID, reason) VALUES (:employeeId:, :inhabitantId:, :reason:)";
        $query=$this->db->query($query_text, ['employeeId' => $employeeId, 'inhabitantId' => $inhabitantId, 'reason' => $reason]);
    }

}
