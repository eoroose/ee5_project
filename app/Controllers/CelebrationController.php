<?php

namespace App\Controllers;

use App\Models\appointmentModel;
use App\Models\avatarModel;
use App\Models\employeeModel;
use App\Models\godchildModel;
use App\Models\godparentModel;
use App\Models\inhabitantModel;
use App\Models\JournalModel;
use App\Models\UserModel;
use App\Models\customModel;

class CelebrationController extends BaseController
{

    public function index() {

        if(session()->get('role')=='inhabitant') {
            return redirect()->to('/');
        } else {

            $db=db_connect();
            $customModel=new customModel($db);
            $result=$customModel->getActiveInhabitants();
            $data=array('inhabitants'=> $result);
            echo view('templates/header', $data);
            echo view('celebration');
            echo view('templates/footer');
        }
    }
}