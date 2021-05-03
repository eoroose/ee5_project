<?php

namespace App\Controllers;

use App\Models\avatarModel;
use App\Models\UserModel;

class choreController extends BaseController
{

    private $choresModel;

    public function __construct()
    {
        $this->choresModel = new \App\Models\ChoresModel();
    }


    public function index()
    {
        // if(session()->get('role')=='inhabitant')
        // {
        //     return redirect()->to('/');
        // }
        // else{
            $this->data["chores"] = $this->choresModel->getChores();
            //echo sizeof($this->data["chores"]);
            $this->data["users"]=$this->getavatar();
            //echo sizeof($this->data["users"]);

            //echo '<pre>'; print_r($this->data); echo '</pre>';
            echo view('templates/header', $this->data);
            echo view('dragndrop');
            echo view('templates/footer');

        //}
    }

    public function changeChore(){
        header('Content-Type: application/json');

        $inhabitantID=$_GET['inhabitantID'];
        $choreID=$_GET['choreID'];

        $this->choresModel->changeChore($inhabitantID,$choreID);
    }
    private function getavatar(){
        $user = $this->choresModel->getInhabitants();
       // echo '<pre>'; print_r($user); echo '</pre>';
        $data=[];
        foreach ($user as $row){
            $avatarModel=new avatarModel();
            $location=$avatarModel->where('id',$row['avatar'])->first();
            $test=array(
                "firstname"=>$row['firstname'],
                "lastname"=>$row['lastname'],
                "chore"=>$row['chore'],
                "inhabitantID"=>$row['inhabitantID'],
                "location"=>$location['location'],
            );
            array_push($data,$test);
        }
        return $data;
    }

}