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

    public function register(){
        $data=[];
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else
        {
            helper(['form']);
            $rules =[
                'firstname' => 'required|min_length[3]|max_length[75]',
                'Achternaam' => 'required|min_length[3]|max_length[75]',
                'Land' => 'required|min_length[3]|max_length[75]',
                'Stad' => 'required|min_length[3]|max_length[75]',
                'Address' => 'required|min_length[3]|max_length[75]',
                'phone'=>'required|min_length[3]|max_length[16]',
                'Gender'=>"required"
            ];
            if(!$this->validate($rules))
            {
                return $this->validator->listErrors();

            }
            else{
                $newData=array(
                    'firstname'=>$this->request->getVar('firstname'),
                    'lastname'=>$this->request->getVar('Achternaam'),
                    'country'=>$this->request->getVar('Land'),
                    'city'=>$this->request->getVar('Stad'),
                    'address'=>$this->request->getVar('Address'),
                    'phoneNumber'=>$this->request->getVar('phone'),
                    'gender'=>$this->request->getVar('Gender'),
                );
                $docterModel=new doctorModel();
                $docterModel->save($newData);
                return redirect()->to("/doctors");
            }
        }

    }
    public function deletedoctor(){
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else
        {
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                $doctorModel = new doctorModel();
                $doctorModel->where('doctorID', $id)->set('isActive', false)->update();
                $apointmentModel= new appointmentModel();
                $apointmentModel->where('doctorID', $id)->set('isActive', false)->update();
            }
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
            $appointment['date2']=date('Y-m-d\TH:i',strtotime($dateA));
            array_push($data,$appointment);
        }
        //echo '<pre>'; print_r($data ); echo '</pre>';
        return $data;
    }

    public function deleteAppoint(){
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
               $appointmentModel->where('appointmentID',$id)->set('isActive',false)->update();
            }
        }
    }
    public function insert(){
        $data=[];
        if(session()->get('role')=='inhabitant')
        {
            return redirect()->to('/');
        }
        else
        {
            helper(['form']);
            $rules =[
                'date' => 'required',
                'reason' => 'required|min_length[3]',
                'doctorID' => 'required',
                'inhabitantID' => 'required',
            ];
            if(!$this->validate($rules))
            {
                $data['validation']= $this->validator;
            }
            else{
                $appointmentModel=new appointmentModel();
                $newData=array(
                    'date'=>$this->request->getVar('date'),
                    'reason'=>$this->request->getVar('reason'),
                    'doctorID'=>$this->request->getVar('doctorID'),
                    'inhabitantID'=>$this->request->getVar('inhabitantID'),
                    "isActive"=>true
                );
                $appointmentModel->save($newData);
                return redirect()->to("/doctors/doctorprofile/".$this->request->getVar('doctorID'));

            }
            $doctorsModel= new doctorModel();
            $id=$this->request->getVar('doctorID');
            echo $id;
            $data['doctor']=$doctorsModel->select()->where('doctorID',$id)->first();
            $data['appointments']=$this->afspraken($id);
            $data['inhabitants']=$this->inhabitants();
            //echo '<pre>'; print_r($data ); echo '</pre>';

            echo view('templates/header',$data);
            echo view('doctorsprofile');
            echo view('templates/footer');
        }
    }
    public function editAppointInhabitant(){

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
                $appointmentModel->where('appointmentID',$id)->set('inhabitantID',$_POST['inhabitantID'])->update();
            }
        }
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