<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\customModel;
use App\Models\inhabitantModel;
use App\Models\UserModel;
use phpDocumentor\Reflection\Types\True_;

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
            $this->data['activeinhabitants'] = $this->inhabitantModel->get_active_inhabitants();
            $this->data['archivedinhabitants'] = $this->inhabitantModel->get_archived_inhabitants();
            $this->data['activeemployees'] = $this->inhabitantModel->get_active_employees();
            $this->data['archivedemployees'] = $this->inhabitantModel->get_archived_employees();
            echo view('users', $this->data);
            echo view('templates/footer');
        } else {
            return redirect()->to('/');
        }
    }

    public function inhabitantsPage() {

        if(session()->get('role')=='employee') {
            echo view('templates/header');
            $this->data['activeinhabitants'] = $this->inhabitantModel->get_active_inhabitants();
            $this->data['archivedinhabitants'] = $this->inhabitantModel->get_archived_inhabitants();
            echo view('inhabitants', $this->data);
            echo view('templates/footer');
        } else {
            return redirect()->to('/');
        }
    }

    public function archivedInhabitantsPage()
    {
        echo view('templates/header');
        $this->data['activeinhabitants'] = [];
        $this->data['archivedinhabitants'] = $this->inhabitantModel->get_archived_inhabitants();
        $this->data['activeemployees'] = [];
        $this->data['archivedemployees'] = $this->inhabitantModel->get_archived_employees();
        echo view('users', $this->data);
        echo view('templates/footer');
    }


    public function employee($userID)
    {
        $this->data['userID']=$userID;
        $this->data['isActive'] = $this->inhabitantModel->get_isActive($userID);
        $this->data['isAdmin'] = $this->inhabitantModel->get_isAdmin($userID);
        $this->data['inhabitant'] = $this->inhabitantModel->get_inhabitant_info($userID);
        $this->data['password'] = $this->inhabitantModel->get_inhabitant_info($userID);
        echo view('templates/header');
        echo view('employee', $this->data);
        echo view('templates/footer');
    }

    public function inhabitant($userID)
    {
        $this->data['userID']=$userID;
        $this->data['isActive'] = $this->inhabitantModel->get_isActive($userID);
        $this->data['inhabitant'] = $this->inhabitantModel->get_inhabitant_info($userID);
        $this->data['notes'] = $this->inhabitantModel->get_notes($userID);
        $this->data['appointments'] = $this->inhabitantModel->get_doctors_appointments($userID);
        $this->data['doctors'] = $this->inhabitantModel->get_doctors();
        $this->data['cards'] = $this->inhabitantModel->get_yellow_cards($userID);
        $this->data['chore'] = $this->inhabitantModel->get_chores($userID);
        $this->data['progress']=$this->progress($userID);
        $this->data['godparent'] = $this->inhabitantModel->get_godparent($userID);
        $this->data['inhabitants'] = $this->inhabitantModel->get_active_inhabitants();
        $this->data['godchildren'] = $this->inhabitantModel->get_godchildren($userID);
        if(session()->get('role')=='admin') {
            $this->data['password'] = $this->inhabitantModel->get_inhabitant_info($userID);
        }
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
               $tasks_completed=0;
               foreach ($resultProgress as $progress)
               {
                   if($tasks['PHASE']==$progress['PHASE'])
                   {
                       $percentage= round(($progress['Quantity']/$tasks['Quantity'])*100,2);
                       $tasks_completed = $progress['Quantity'];
                //       echo '<pre>'; echo  $percentage; echo '</pre>';
                   }
               }
               $a=array('phase'=>$tasks['PHASE']
               ,'percentage'=>$percentage
               ,'tasks_completed'=>$tasks_completed
               ,'tasks_total'=>$tasks['Quantity']);
               array_push($data,$a);

           }
           //echo '<pre>'; print_r($data); echo '</pre>';
           return $data;
    }

    public function setUsernameEmployee()
    {
        $data=[];
        if($this->request->getMethod()=='post'){
            $rules = [ 'username' => 'required|min_length[3]|max_length[50]|validateUserName[email,password]' ];
            $errors = [ 'username' => ['validateUserName' => 'Kies een unieke username'] ];
            if(!$this->validate($rules,$errors)){
                $data['validation'] = $this->validator;
            }
            else{
                $user_model = new UserModel();
                $userID = $_POST['id'];
                $user=$user_model->where('userId',$userID)->first();
                $user_model->where('userId',$userID)->set('username',$this->request->getVar('username'))->update();
                $session=session();
                $session->setFlashdata('succes','Changed username');
            }
        }
        $userID=$this->request->getVar('from2id');
        $data['userID']=$userID;
        $data['isActive'] = $this->inhabitantModel->get_isActive($userID);
        $data['isAdmin'] = $this->inhabitantModel->get_isAdmin($userID);
        $data['inhabitant'] = $this->inhabitantModel->get_inhabitant_info($userID);
        $data['password'] = $this->inhabitantModel->get_inhabitant_info($userID);
        echo view('templates/header');
        echo view('employee', $data);
        echo view('templates/footer');
    }


    public function setUsernameInhabitant()
    {
        $data=[];
        $userID=$this->request->getVar('from2id');
        if($this->request->getMethod()=='post'){
            $rules = [ 'username' => 'required|min_length[3]|max_length[50]|validateUserName[email,password]' ];
            $errors = [ 'username' => ['validateUserName' => 'Kies een unieke username'] ];
            if(!$this->validate($rules,$errors)){
                $data['validation'] = $this->validator;
            }
            else{
                $user_model = new UserModel();
                $user=$user_model->where('userId',$userID)->first();
                $user_model->where('userId',$userID)->set('username',$this->request->getVar('username'))->update();
                $session=session();
                $session->setFlashdata('succes','Changed username');
            }
        }
        $data['userID']=$userID;
        $data['isActive'] = $this->inhabitantModel->get_isActive($userID);
        $data['inhabitant'] = $this->inhabitantModel->get_inhabitant_info($userID);
        $data['notes'] = $this->inhabitantModel->get_notes($userID);
        $data['appointments'] = $this->inhabitantModel->get_doctors_appointments($userID);
        $data['doctors'] = $this->inhabitantModel->get_doctors();
        $data['cards'] = $this->inhabitantModel->get_yellow_cards($userID);
        $data['chore'] = $this->inhabitantModel->get_chores($userID);
        $data['progress']=$this->progress($userID);
        $data['godparent'] = $this->inhabitantModel->get_godparent($userID);
        $data['inhabitants'] = $this->inhabitantModel->get_active_inhabitants();
        $data['godchildren'] = $this->inhabitantModel->get_godchildren($userID);
        if(session()->get('role')=='admin') {
            $data['password'] = $this->inhabitantModel->get_inhabitant_info($userID);
        }
        echo view('templates/header');
        echo view('inhabitant', $data);
        echo view('templates/footer');
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

    public function changePassword(){
        helper(['form']);
        if($this->request->getMethod()=='post'){
            $rules =[
                'new-password' => 'required|min_length[8]|max_length[255]',
                'confirm-password' => 'matches[new-password]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            }
            else{
                $model = new UserModel();
                $userID=$this->request->getVar("userID");
                $user=$model->where('userId',$userID)->first();
                    $model->where('userId',$userID)->set('password',$this->request->getVar('new-password'))->update();
                    $session=session();
                    $session->setFlashdata('succes','Changed Password');
                    return redirect()->to('/UsersController/index');
            }
        }
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

    public function getFirstnameDoctor()
    {
        if(isset($_GET['doctorID'])){
            $doctorID = $_GET['doctorID'];
            $firstname_doctor = $this->inhabitantModel->get_firstname_doctor($doctorID);
        }
        return $firstname_doctor;
    }

    public function getLastnameDoctor()
    {
        if(isset($_GET['doctorID'])){
            $doctorID = $_GET['doctorID'];
            $lastname_doctor = $this->inhabitantModel->get_lastname_doctor($doctorID);
        }
        return $lastname_doctor;
    }

    public function setAppointment()
    {
        if(isset($_POST['doctorID'])){
            $appointmentid = $_POST['appointmentid'];
            $doctorid = $_POST['doctorID'];
            $date = $_POST['date'];
            $reason = $_POST['reason'];
        }
        else {
        }
        $this->inhabitantModel->set_appointment($appointmentid, $doctorid, $date, $reason);
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
        $doctor = $_POST['doctor'];
        $date = $_POST['date'];
        $reason = $_POST['reason'];
        $id = $_POST['id'];

        $this->inhabitantModel->insert_appointment($id, $doctor, $date, $reason);
    }

    public function setCard()
    {
        if(isset($_POST['cardid'])){
            $cardid = $_POST['cardid'];
            $date = $_POST['date'];
            $reason = $_POST['reason'];
            $isActive = $_POST['isActive'];
        }
        else {
        }
        $this->inhabitantModel->set_card($cardid, $date, $reason, $isActive);
    }

    public function setGodparent()
    {
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $godparentID = $_POST['godparentID'];
        }
        else {
        }
        $this->inhabitantModel->set_godparent($id, $godparentID);
    }

    public function setNote()
    {
        if(isset($_POST['noteid'])){
            $noteid = $_POST['noteid'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $this->inhabitantModel->set_note($noteid, $title, $description);
        }
        else {
        }
    }

    public function deleteNote()
    {
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        $this->inhabitantModel->delete_note($id);
    }

    public function insertNote()
    {
        $employeeuserid = session()->get('id');
        $title = $_POST['title'];
        $description = $_POST['description'];
        $inhabitantuserid = $_POST['id'];

        $this->inhabitantModel->insert_note($employeeuserid, $inhabitantuserid, $title, $description);
    }



    public function archiveUser()
    {
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        $this->inhabitantModel->archive_user($id);
    }

    public function dearchiveUser()
    {
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        $this->inhabitantModel->dearchive_user($id);
    }

    public function makeAdmin()
    {
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        $this->inhabitantModel->make_admin($id);
    }

    public function makeEmployee()
    {
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        $this->inhabitantModel->make_employee($id);
    }
}
