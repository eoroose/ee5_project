<?php

namespace App\Controllers;

class JournalController extends BaseController
{

    private $journalModel;

    public function __construct()
    {
        $this->journalModel = new \App\Models\JournalModel();
    }


    public function index()
    {
        if(session()->get('role')=='inhabitant')
        {
            $this->data['entries'] = $this->journalModel->get_entries(9);
            return view('journal_page', $this->data);
        }
        else{
            return redirect()->to('/');

        }}


    public function getJournalEntry()
    {
        header('Content-Type: application/json');

        $id=$_GET['id'];


        echo json_encode($this->journalModel->getJournalEntry($id));
        return;
    }

    public function addJournalEntry()
    {
        header('Content-Type: application/json');

        $title=$_GET['title'];
        $text=$_GET['text'];

        $id = 9;


        echo json_encode($this->journalModel->addJournalEntry($title,$text,$id));
        return;
    }

}