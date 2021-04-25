<?php

namespace App\Controllers;

class AgendaController extends BaseController
{

    private $agendaModel;

    public function __construct()
    {
        $this->agendaModel = new \App\Models\AgendaModel();
    }


    public function index()
    {
        if(session()->get('role')=='inhabitant')
        {
            $this->data['ev'] = json_encode($this->agendaModel->getMonthevents(date("Y/m/d")));
            //echo $this->data['ev'];

            echo view('templates/header', $this->data);
            return view('agendaStatic');
            echo view('templates/footer');
        }
        else{
            $this->data['ev'] = json_encode($this->agendaModel->getMonthevents(date("Y/m/d")));
            //echo $this->data['ev'];

            echo view('templates/header');
            echo view('agenda2',$this->data) ;
            echo view('templates/footer');

        }}

    public function test1()
    {
            echo json_encode($this->agendaModel->getMonthevents(date("Y/m/d")));
    }




    public function alterInDatabase2()
    {
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $start = $_POST['start'];
            $end = $_POST['end'];
        }else{
            $text = 43;
        }

        $this->agendaModel->alterInDatabase2($id, $start, $end);

    }

    public function getEvents()
    {
        header('Content-Type: application/json');

        $start=$_GET['start'];
        $end=$_GET['end'];


        echo json_encode($this->agendaModel->getEvents($start,$end));
        return;
    }

    public function getRecurringEvents()
    {
        header('Content-Type: application/json');

        echo json_encode($this->agendaModel->getReccuringEvents());
        return;
    }

    public function getRecurring()
    {
        header('Content-Type: application/json');

        $id=$_GET['id'];
        echo json_encode($this->agendaModel->getReccuring($id));
        return;
    }


    public function getBirthdays()
    {
        header('Content-Type: application/json');

        $start=substr( $_GET['start'], 5, 2);
        $end=substr( $_GET['end'], 5, 2);

        echo json_encode($this->agendaModel->getBirthdays($start,$end));
        return;
    }

    public function getAppointments()
    {
        header('Content-Type: application/json');

        $start=$_GET['start'];
        $end=$_GET['end'];
        $id=9;


        echo json_encode($this->agendaModel->getAppointments($start,$end,$id));
        return;
    }

    public function addEvent(){
        if(isset($_GET['title'])){
            $title = $_GET['title'];
            $start = $_GET['start'];
            $end = $_GET['end'];
            $color = $_GET['color'];
        }
        echo $this->agendaModel->addEvent($title, $start, $end, $color);

        return;
    }

    public function addRecurringEvent(){
        if(isset($_GET['title'])){
            $title = $_GET['title'];
            $start = $_GET['start'];
            $end = $_GET['end'];
            $color = $_GET['color'];
            $recur = $_GET['recur'];
        }
        echo $this->agendaModel->addRecurringEvent($title, $start, $end, $color, $recur);

        return;
    }

    public function addAppointment(){
        if(isset($_GET['start'])){
            $start = $_GET['start'];

        }
        echo $this->agendaModel->addAppointment($start);

        return;
    }



    public function changeEvent(){
        if(isset($_GET['title'])){
            $title = $_GET['title'];
            $start = $_GET['start'];
            $end = $_GET['end'];
            $id = $_GET['id'];
        }
        $this->agendaModel->changeEvent($title, $start, $end, $id);

        return;
    }


    public function changeAppointment(){
        if(isset($_GET['id'])){
            $start = $_GET['start'];
            $id = $_GET['id'];
        }
        $this->agendaModel->changeAppointment($start, $id);

        return;
    }

    public function removeEvent(){
        if(isset($_GET['id'])){

            $id = $_GET['id'];
        }
        $this->agendaModel->removeEvent($id);

        return;
    }

    public function removeRecurring(){
        if(isset($_GET['id'])){

            $id = $_GET['id'];
        }
        $this->agendaModel->removeRecurring($id);

        return;
    }

    public function removeAppointment(){
        if(isset($_GET['id'])){

            $id = $_GET['id'];
        }
        $this->agendaModel->removeAppointment($id);

        return;
    }
}