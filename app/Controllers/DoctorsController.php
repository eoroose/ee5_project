<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\customModel;
use App\Models\doctorModel;
use App\Models\inhabitantModel;
use App\Models\UserModel;

class DoctorsController extends BaseController
{

    public function index() {

        if(session()->get('role')=='inhabitant') {
            return redirect()->to('/');
        } else {
            $data=[];
            $data["doctors"]=$this->getDoctors();
            echo view('templates/header',$data);
            echo view('doctors');
            echo view('templates/footer');
        }
    }

    private function getDoctors()
    {
        $doctorsModel= new doctorModel();
        return $doctorsModel->select()->where('isActive',true)->get()->getResultArray();

    }
    public function doctorprofile($id){
        if(session()->get('role')=='inhabitant') {
            return redirect()->to('/');
        } else {
            //echo 'test';
            //echo $id;
            $data=[];
            $doctorsModel= new doctorModel();
            $data['doctor']=$doctorsModel->select()->where('doctorID',$id)->first();
            $data['appointments']=$this->afspraken($id);
            $data['inhabitants']=$this->inhabitants();
            //echo '<pre>'; print_r($data ); echo '</pre>';

            echo view('templates/header',$data);
            echo view('doctorsprofile');
            echo view('templates/footer');
        }
    }
    private function inhabitants()
    {
        $db=db_connect();
        $customModel= new customModel($db);
        $inhabitants= $customModel->getActiveInhabitants();
       return $inhabitants;
    }
    private function afspraken($id)
    {
        $data=[];
        date_default_timezone_set('Europe/Brussels');
        $date=date('Y-m-d 00:00:00',time());
        //echo '<pre>'; print_r($date ); echo '</pre>';
        $appointmentModel= new appointmentModel();
        $result=$appointmentModel->select()->where('doctorID',$id)->where("date>=",$date)->where('isActive',true)->orderBy('date', 'ASC')->get()->getResultArray();
        $inhabitantModel=new inhabitantModel();
        $userModel=new UserModel();
        foreach ($result as $appointment) {
            $inhabitant=$inhabitantModel->select()->where('inhabitantID',$appointment['inhabitantID'])->first();
            //echo '<pre>'; print_r($inhabitant ); echo '</pre>';
            $user=$userModel->select()->where('userID',$inhabitant['userID'])->first();
           // echo '<pre>'; print_r($user ); echo '</pre>';
            $appointment['inhabitant_Firstname']=$user['firstname'];
            $appointment['inhabitant_Lastname']=$user['lastname'];
            $dateA=$appointment['date'];
            $appointment['date']=date('d-m-y H:i',strtotime($dateA));
            array_push($data,$appointment);
        }
        //echo '<pre>'; print_r($data ); echo '</pre>';
        return $data;
    }
    public function editApoint(){
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else
        {
            if(isset($_POST['id']))
            {
                $appointmentModel=new appointmentModel();
                $id=$_POST['id'];
                $appointmentModel->where('appointmentID',$id)->set('date',$_POST['date'])->update();
                $appointmentModel->where('appointmentID',$id)->set('reason',$_POST['reason'])->update();

            }
        }
    }
    public function editname(){
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else
        {
            if(isset($_POST['id']))
            {
                $doctorsmodel=new doctorModel();
                $id=$_POST['id'];
                $doctorsmodel->where('doctorID',$id)->set('firstname',$_POST['firstname'])->update();
                $doctorsmodel->where('doctorID',$id)->set('lastname',$_POST['lastname'])->update();

            }
        }
    }
    public function editstad(){
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else
        {
            if(isset($_POST['id']))
            {
                $doctorsmodel=new doctorModel();
                $id=$_POST['id'];
                $doctorsmodel->where('doctorID',$id)->set('city',$_POST['stad'])->update();

            }
        }
    }
    public function editaddres(){
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else
        {
            if(isset($_POST['id']))
            {
                $doctorsmodel=new doctorModel();
                $id=$_POST['id'];
                $doctorsmodel->where('doctorID',$id)->set('address',$_POST['addres'])->update();

            }
        }
    }
    public function edittelefoon(){
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else
        {
            if(isset($_POST['id']))
            {
                $doctorsmodel=new doctorModel();
                $id=$_POST['id'];
                $doctorsmodel->where('doctorID',$id)->set('phoneNumber',$_POST['telefoon'])->update();

            }
        }
    }

    public function editgender(){
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else
        {
            if(isset($_POST['id']))
            {
                $doctorsmodel=new doctorModel();
                $id=$_POST['id'];
                $doctorsmodel->where('doctorID',$id)->set('gender',$_POST['gender'])->update();

            }
        }
    }
}