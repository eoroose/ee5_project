<?php

namespace App\Controllers;

class Home extends BaseController
{

    private $journalModel;
    private $agendaModel;

    public function __construct()
    {
        $this->journalModel = new \App\Models\JournalModel();
        $this->agendaModel = new \App\Models\AgendaModel();
    }


    public function index()
    {
        return view('welcome_message');
    }

    public function firstPage()
    {
        $data["name"] = "Marie";
        return view('first_page', $data);
    }

    public function goToHome()
    {
        return view('welcome_message');
    }

    public function profilePage()
    {
        return view('profile_page');
    }

    public function agendaPage()
    {

        return view('agenda_page');
    }

    public function agendaTest()
    {

        return view('agenda_test');
    }

    public function journalPage()
    {
        $this->data['entries'] = $this->journalModel->get_entries(9);
        return view('journal_page', $this->data);
    }

    public function test()
    {
        $journalID =  htmlspecialchars($_GET["journalID"]);
        $this->data['entries'] = $this->journalModel->get_entry($journalID);
        return view('test_journal', $this->data);
    }

    public function agenda1()
    {
        header('Content-Type: application/json');
        echo json_encode($this->agendaModel->getMonthevents(date("Y/m/d")));
        return;
//        $this->output->set_content_type('application/json')
//            ->set_output(json_encode($this->agendaModel->getMonthevents(date("Y/m/d"))));

        //return view('agendaFunctions/agendaValues');
    }

    public function agenda2()
    {
        $this->data['ev'] = json_encode($this->agendaModel->getMonthevents(date("Y/m/d")));
        //echo $this->data['ev'];
        return view('agenda2', $this->data);
    }

    public function agendaStatic()
    {
        $this->data['ev'] = json_encode($this->agendaModel->getMonthevents(date("Y/m/d")));
        //echo $this->data['ev'];
        return view('agendaStatic', $this->data);
    }

    public function agenda3()
    {
        if(isset($_POST['title'])){
            $title = $_POST['title'];
            $date = $_POST['date'];
        }else{
            $text = 43;
        }


        $this->agendaModel->insert($title, $date);

    }

    public function insert2()
    {
        if(isset($_GET['title'])){
            $title = $_GET['title'];
            $start = $_GET['start'];
            $end = $_GET['end'];
        }else{
            $text = 43;
        }


        $this->agendaModel->insert2($title, $start, $end);

    }




    public function alterInDatabase()
    {
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $start = $_POST['start'];
        }else{
            $text = 43;
        }

        $this->agendaModel->alterInDatabase($id, $start);

    }

}
