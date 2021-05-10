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
        $query_text = "SELECT u.userID, u.username, u.password, u.firstname, u.lastname, u.birthday, u.dateAdded, u.isActive, u.gender,
                        i.inhabitantID, i.godParentID, i.arrivalDate, i.halfwayDate, i.departureDate, i.chore, a.location
                        FROM user as u LEFT JOIN inhabitant as i ON u.userID = i.userID
                        LEFT JOIN avatars as a ON u.avatar = a.id
                        WHERE u.userID = :user:";
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
        $query_text = "SELECT doctor.firstname, doctor.lastname, appointment.date, appointment.reason, appointment.appointmentID
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
        $query_text = "SELECT chore.description
                        FROM user LEFT JOIN inhabitant ON user.userID = inhabitant.userID
                        LEFT JOIN chore ON chore.choreID = inhabitant.chore
                        WHERE user.userID = :id:";
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

    public function set_username($id, $username)
    {
        $query_text = "UPDATE user
                       SET username = :username:
                       WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'username' => $username]);
    }

    public function set_firstname($id, $firstname)
    {
        $query_text = "UPDATE user
                       SET firstname = :firstname:
                       WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'firstname' => $firstname]);
    }

    public function set_lastname($id, $lastname)
    {
        $query_text = "UPDATE user
                       SET lastname = :lastname:
                       WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'lastname' => $lastname]);
    }

    public function set_birthday($id, $birthday)
    {
        $query_text = "UPDATE user
                       SET birthday = :birthday:
                       WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'birthday' => $birthday]);
    }

    public function set_dateAdded($id, $dateAdded)
    {
        $query_text = "UPDATE user
                       SET dateAdded = :dateAdded:
                       WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'dateAdded' => $dateAdded]);
    }

    public function set_arrivalDate($id, $arrivalDate)
    {
        $query_text = "UPDATE inhabitant LEFT JOIN user ON inhabitant.userID = user.userID
                       SET inhabitant.arrivalDate = :arrivalDate:
                       WHERE inhabitant.userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'arrivalDate' => $arrivalDate]);
    }

    public function set_departureDate($id, $departureDate)
    {
        $query_text = "UPDATE inhabitant LEFT JOIN user ON inhabitant.userID = user.userID
                       SET inhabitant.departureDate = :departureDate:
                       WHERE inhabitant.userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'departureDate' => $departureDate]);
    }

    public function set_chore($id, $chore)
    {
        $query_text = "UPDATE inhabitant LEFT JOIN user ON inhabitant.userID = user.userID
                       SET inhabitant.chore = (SELECT choreID FROM chore WHERE description = :chore:)
                       WHERE inhabitant.userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'chore' => $chore]);
    }

    public function assignCard($employeeId, $inhabitantId, $reason)
    {
        $query_text="INSERT INTO yellowcard(employeeAdminID, inhabitantID, reason) VALUES (:employeeId:, :inhabitantId:, :reason:)";
        $query=$this->db->query($query_text, ['employeeId' => $employeeId, 'inhabitantId' => $inhabitantId, 'reason' => $reason]);
    }

}
