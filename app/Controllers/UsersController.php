<?php

namespace App\Controllers;

use App\Models\customModel;
use App\Models\inhabitantModel;

class UsersController extends BaseController
{

    private $inhabitantModel;

    public function __construct()
    {
        $this->inhabitantModel = new \App\Models\inhabitantModel2();
    }

    public function index() {

        if(session()->get('role')=='admin') {
            echo view('templates/header');
            $this->data['inhabitants'] = $this->inhabitantModel->get_inhabitants();
            $this->data['users'] = $this->inhabitantModel->get_users();
            echo view('users', $this->data);
            echo view('templates/footer');
        } else {
            return redirect()->to('/');
        }
    }

    public function inhabitantsPage() {

        if(session()->get('role')=='employee') {
            echo view('templates/header');
            $this->data['inhabitants'] = $this->inhabitantModel->get_inhabitants();
            echo view('inhabitants', $this->data);
            echo view('templates/footer');
        } else {
            return redirect()->to('/');
        }
    }

    public function employee()
    {
        $userID = htmlspecialchars($_GET["user"]);
        $this->data['inhabitant'] = $this->inhabitantModel->get_inhabitant_info($userID);
        return view('employee', $this->data);
    }

    public function inhabitant()
    {
        $userID = htmlspecialchars($_GET["user"]);
        $this->data['inhabitant'] = $this->inhabitantModel->get_inhabitant_info($userID);
        $this->data['notes'] = $this->inhabitantModel->get_notes($userID);
        $this->data['appointments'] = $this->inhabitantModel->get_doctors_appointments($userID);
        $this->data['cards'] = $this->inhabitantModel->get_yellow_cards($userID);
        $this->data['chore'] = $this->inhabitantModel->get_chores($userID);
        $this->data['progress']=$this->progress($userID);
        $this->data['godparent'] = $this->inhabitantModel->get_godparent($userID);
        $this->data['godchildren'] = $this->inhabitantModel->get_godchildren($userID);
        echo view('templates/header');
        echo view('inhabitant', $this->data);
        echo view('templates/footer');
    }

    private function getInhabitantid($id)
    {
        $inhabitantmodel = new inhabitantModel();
        $inhabitantID = $inhabitantmodel->select('inhabitantID')->where('userID',$id)->first();
        return $inhabitantID;
    }

    private function progress($id)
    {
        $inhabitantID= $this->getInhabitantid($id);
           $db=db_connect();
           $custommodel=new customModel($db);
           $resultProgress =$custommodel->getCompletedTasksPhases($inhabitantID);
           $resulttask=$custommodel->getActiveTasks();
          // echo '<pre>'; print_r($resulttask); echo '</pre>';
          // echo '<pre>'; print_r($resultProgress); echo '</pre>';
           $data=array();
           foreach ($resulttask as $tasks)
           {
               $percentage=0;
               foreach ($resultProgress as $progress)
               {
                   if($tasks['PHASE']==$progress['PHASE'])
                   {
                       $percentage= round(($progress['Quantity']/$tasks['Quantity'])*100,2);
                //       echo '<pre>'; echo  $percentage; echo '</pre>';
                   }
               }
               $a=array('phase'=>$tasks['PHASE']
               ,'percentage'=>$percentage);
               array_push($data,$a);

           }
           //echo '<pre>'; print_r($data); echo '</pre>';
           return $data;
    }

    public function setUsername()
    {
        if(isset($_POST['username'])){
            $id = $_POST['id'];
            $username = $_POST['username'];
        }
        else {
            $id = 0;
            $username = 'error';
        }
        $this->inhabitantModel->set_username($id, $username);
    }

    public function setFirstname()
    {
        if(isset($_POST['firstname'])){
            $id = $_POST['id'];
            $firstname = $_POST['firstname'];
        }
        else {
            $id = 0;
            $firstname = 'error';
        }
        $this->inhabitantModel->set_firstname($id, $firstname);
    }

    public function setLastname()
    {
        if(isset($_POST['lastname'])){
            $id = $_POST['id'];
            $lastname = $_POST['lastname'];
        }
        else {
            $id = 0;
            $lastname = 'error';
        }
        $this->inhabitantModel->set_lastname($id, $lastname);
    }

    public function setBirthday()
    {
        if(isset($_POST['birthday'])){
            $id = $_POST['id'];
            $birthday = $_POST['birthday'];
        }
        else {
            $id = 0;
            $birthday = 'error';
        }
        $this->inhabitantModel->set_birthday($id, $birthday);
    }

    public function setDateAdded()
    {
        if(isset($_POST['dateAdded'])){
            $id = $_POST['id'];
            $dateAdded = $_POST['dateAdded'];
        }
        else {
            $id = 0;
            $dateAdded = 'error';
        }
        $this->inhabitantModel->set_dateAdded($id, $dateAdded);
    }

    public function setArrivalDate()
    {
        if(isset($_POST['arrivalDate'])){
            $id = $_POST['id'];
            $arrivalDate = $_POST['arrivalDate'];
        }
        else {
            $id = 0;
            $arrivalDate = 'error';
        }
        $this->inhabitantModel->set_arrivalDate($id, $arrivalDate);
    }

    public function setDepartureDate()
    {
        if(isset($_POST['departureDate'])){
            $id = $_POST['id'];
            $departureDate = $_POST['departureDate'];
        }
        else {
            $id = 0;
            $departureDate = 'error';
        }
        $this->inhabitantModel->set_departureDate($id, $departureDate);
    }

    public function setChore()
    {
        if(isset($_POST['chore'])){
            $id = $_POST['id'];
            $chore = $_POST['chore'];
        }
        else {
            $id = 0;
            $chore = 'error';
        }
        $this->inhabitantModel->set_chore($id, $chore);
    }

    public function setAppointment()
    {
        if(isset($_POST['firstnameDoctor'])){
            $id = $_POST['id'];
            $firstnameDoctor = $_POST['firstnameDoctor'];
            $lastnameDoctor = $_POST['lastnameDoctor'];
            $date = $_POST['date'];
            $reason = $_POST['reason'];
        }
        else {
        }
        $this->inhabitantModel->set_appointment($id, $firstnameDoctor, $lastnameDoctor, $date, $reason);
    }

    public function deleteAppointment()
    {
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        $this->inhabitantModel->delete_appointment($id);
    }

    public function insertAppointment()
    {
        $doctor = $this->request->getVar('doctor2');
        $date = $this->request->getVar('date2');
        $reason = $this->request->getVar('reason2');
        $id = $this->request->getVar('userID');

        $this->inhabitantModel->insert_appointment($id, $doctor, $date, $reason);
    }
}
