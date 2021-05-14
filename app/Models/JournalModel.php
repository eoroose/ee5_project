<?php

namespace App\Models;

use CodeIgniter\Model;


class JournalModel
{
    private $db;

    public function __construct(){
        $this->db = \Config\Database::connect();
    }

    public function get_entries($user)
    {
        $query_text = "SELECT journalEntryID, title,entry,date 
                        FROM journalentry
                        WHERE inhabitantID = :user:";
        $query = $this->db->query($query_text, ['user' => $user]);
        return $query->getResult();
    }

    public function getJournalEntry($id)
    {
        $query_text = "SELECT journalEntryID, title, entry, date 
                        FROM journalentry
                        WHERE journalEntryID = :id:";
        $query = $this->db->query($query_text, ['id' => $id]);
        return $query->getResult();
    }

    public function addJournalEntry($title,$text,$id)
    {
        $query_text = "INSERT INTO journalentry(title, entry, inhabitantID)
                        VALUES (:title:, :text:, :id:)";
        $this->db->query($query_text, ['title' => $title, 'text'=>$text,'id'=>$id]);
        return $this->db->insertID();
    }

    public function removeEntry($id)
    {
        $query_text2 = "DELETE FROM journalentry
                        WHERE journalEntryID = :id:";
        $this->db->query($query_text2, ['id' => $id]);
    }

    public function changeJournalEntry($id, $title, $text){
        $query_text2 = "UPDATE journalentry
                        SET title = :title:, entry = :text:
                        WHERE journalEntryID = :id:";
        $this->db->query($query_text2, ['id' => $id, 'title'=>$title, 'text'=>$text]);
    }

}