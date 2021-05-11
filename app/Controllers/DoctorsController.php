<?php

namespace App\Controllers;

use App\Models\doctorModel;

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
    public function doctorprofile($id){}
}