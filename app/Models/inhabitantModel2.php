<?php

namespace App\Models;

use CodeIgniter\Model;

class inhabitantModel2
{
    private $db;

    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function get_active_inhabitants()
    {
        $query_text = "SELECT inhabitant.inhabitantID, avatars.location, user.firstname, user.lastname, user.userID
                        FROM inhabitant LEFT JOIN user ON inhabitant.userID = user.userID
                        LEFT JOIN avatars ON user.avatar = avatars.id
                        WHERE user.isActive = 1";
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function get_archived_inhabitants()
    {
        $query_text = "SELECT avatars.location, user.firstname, user.lastname, user.userID
                        FROM inhabitant LEFT JOIN user ON inhabitant.userID = user.userID
                        LEFT JOIN avatars ON user.avatar = avatars.id
                        WHERE user.isActive = 0";
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function get_active_employees()
    {
        $query_text = "SELECT avatars.location, u.firstname, u.lastname, u.userID, e.employeeAdminID
                        FROM user as u LEFT JOIN employeeadmin as e ON u.userID = e.userID
                        LEFT JOIN avatars ON u.avatar = avatars.id
                        WHERE employeeAdminID IS NOT NULL AND u.isActive = 1";
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function get_archived_employees()
    {
        $query_text = "SELECT avatars.location, u.firstname, u.lastname, u.userID, e.employeeAdminID
                        FROM user as u LEFT JOIN employeeadmin as e ON u.userID = e.userID
                        LEFT JOIN avatars ON u.avatar = avatars.id
                        WHERE employeeAdminID IS NOT NULL AND u.isActive = 0";
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
        $query_text = "SELECT noteID, title, description
                        FROM note LEFT JOIN inhabitant ON note.inhabitantID = inhabitant.inhabitantID
                        WHERE inhabitant.userID = :id: AND note.isActive = 1";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function get_doctors_appointments($id)
    {
        $query_text = "SELECT doctor.doctorID, doctor.firstname, doctor.lastname, appointment.date, appointment.reason, appointment.appointmentID
                        FROM appointment LEFT JOIN doctor ON appointment.doctorID = doctor.doctorID
                        LEFT JOIN inhabitant ON appointment.inhabitantID = inhabitant.inhabitantID
                        WHERE inhabitant.userID = :id: AND appointment.isActive = 1";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function get_doctors()
    {
        $query_text = "SELECT doctorID, firstname, lastname FROM doctor";
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function get_yellow_cards($id)
    {
        $query_text = "SELECT yellowCardID, date, reason, isActive
                        FROM yellowcard LEFT JOIN inhabitant ON yellowcard.inhabitantID = inhabitant.inhabitantID
                        WHERE userID = :id:";
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
                        WHERE a.userID = :id:";
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

    public function get_firstname_doctor($doctorID)
    {
        $query_text = "SELECT firstname FROM doctor WHERE doctorID = :doctorID:";
        $query = $this->db->query($query_text, ['doctorID' => $doctorID]);
        return $query->getResult();
    }

    public function get_lastname_doctor($doctorID)
    {
        $query_text = "SELECT lastname FROM doctor WHERE doctorID = :doctorID:";
        $query = $this->db->query($query_text, ['doctorID' => $doctorID]);
        return $query->getResult();
    }

    public function set_appointment($appointmentid, $doctorID, $date, $reason)
    {
        $query_text = "UPDATE appointment
                       SET doctorID = :doctorID:, date = :date:, reason = :reason:
                       WHERE appointmentID = :appointmentid:";
        $query = $this->db->query($query_text, ['appointmentid' => $appointmentid, 'doctorID' => $doctorID, 'date' => $date, 'reason' => $reason]);
    }

    public function delete_appointment($id)
    {
        $query_text = "UPDATE appointment SET isActive = 0 WHERE appointmentID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
    }

    public function insert_appointment($id, $doctor, $date, $reason)
    {
        $query_text = "INSERT INTO appointment(inhabitantID, doctorID, date, reason)
                       VALUES ((SELECT inhabitantID FROM inhabitant WHERE userID = :id:),
                                :doctor:, :date:, :reason:)";
        $query = $this->db->query($query_text, ['id' => $id, 'doctor' => $doctor, 'date' => $date, 'reason' => $reason]);
    }

    public function set_card($cardid, $date, $reason, $isActive)
    {
        $query_text = "UPDATE yellowcard SET date = :date:, reason = :reason:, isActive = :isActive:
                       WHERE yellowCardID = :cardid:";
        $query = $this->db->query($query_text, ['cardid' => $cardid, 'date' => $date, 'reason' => $reason, 'isActive' => $isActive]);
    }

    public function set_godparent($id, $godparentID)
    {
        $query_text = "UPDATE inhabitant SET godparentID = :godparentID: WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'godparentID' => $godparentID]);
    }

    public function set_gender($id, $gender)
    {
        $query_text = "UPDATE user SET gender = :gender: WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id, 'gender' => $gender]);
    }

    public function set_note($noteid, $title, $description)
    {
        $query_text = "UPDATE note SET title =:title:, description = :description:
                       WHERE noteID = :noteid:";
        $query = $this->db->query($query_text, ['noteid' => $noteid, 'title' => $title, 'description' => $description]);
    }

    public function delete_note($id)
    {
        $query_text = "UPDATE note SET isActive = 0 WHERE noteID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
    }

    public function insert_note($employeeuserid, $inhabitantuserid, $title, $description)
    {
        $query_text = "INSERT INTO note(employeeAdminID, inhabitantID, title, description)
                       VALUES ((SELECT employeeAdminID FROM employeeadmin WHERE userID = :employeeuserid:),
                       (SELECT inhabitantID FROM inhabitant WHERE userID = :inhabitantuserid:), :title:, :description:)";
        $query = $this->db->query($query_text, ['employeeuserid' => $employeeuserid, 'inhabitantuserid' => $inhabitantuserid, 'title' => $title, 'description' => $description]);
    }

    public function get_isActive($id)
    {
        $query_text = "SELECT isActive FROM user WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function get_isAdmin($id)
    {
        $query_text = "SELECT isAdmin FROM employeeadmin WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function archive_user($id)
    {
        $query_text = "UPDATE user SET isActive = 0 WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
    }

    public function dearchive_user($id)
    {
        $query_text = "UPDATE user SET isActive = 1 WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
    }

    public function make_admin($id)
    {
        $query_text = "UPDATE employeeadmin SET isAdmin = 1 WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
    }

    public function make_employee($id)
    {
        $query_text = "UPDATE employeeadmin SET isAdmin = 0 WHERE userID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
    }
}
