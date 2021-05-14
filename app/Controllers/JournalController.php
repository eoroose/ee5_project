<?php

namespace App\Controllers;

use App\Models\inhabitantModel;

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
            $inhabitantID=$this->getInhabitantid(session()->get('id'));
            $this->data['entries'] = $this->journalModel->get_entries($inhabitantID);
            echo view('templates/header');
            echo view('journal_page', $this->data);
            echo view('templates/footer');
        }
        else{
            return redirect()->to('/');
        }
    }

    private function getInhabitantid($id){
        $inhabitantmodel=new inhabitantModel();
        $inhabitantID= $inhabitantmodel->select('inhabitantID')->where('userID',$id)->first();
        return $inhabitantID;
    }

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

        $id = session()->get('id');
        $inhabitantID=$this->getInhabitantid($id);

        echo json_encode($this->journalModel->addJournalEntry($title,$text,$inhabitantID));
        return redirect()->to('/journal');
    }

    public function removeEntry()
    {
        header('Content-Type: application/json');

        $id=$_GET['ID'];

        $this->journalModel->removeEntry($id);

    }

    public function changeJournalEntry(){
        header('Content-Type: application/json');

        $id=$_GET['id'];
        $title=$_GET['title'];
        $text=$_GET['text'];

        $this->journalModel->changeJournalEntry($id, $title, $text);
    }

}