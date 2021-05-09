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
        $this->data['chores'] = $this->inhabitantModel->get_chores($userID);
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

}